<?php

namespace App\Http\Controllers;

use App\Http\Services\BrandService;
use App\Http\Services\FuelTypeService;
use App\Http\Services\ListingService;
use App\Http\Services\PropertyService;
use App\Http\Services\VehicleModelService;
use App\Image;
use App\Listing;
use App\Vehicle;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ListingsController extends Controller
{

    private $_fuelTypeService;
    private $_brandService;
    private $_modelService;
    private $_propertyService;
    private $_listingService;

    public function __construct(FuelTypeService $fuelTypeService, BrandService $brandService,
                                VehicleModelService $modelService, PropertyService $propertyService,
                                ListingService $listingService)
    {
        $this->_fuelTypeService = $fuelTypeService;
        $this->_brandService = $brandService;
        $this->_modelService = $modelService;
        $this->_propertyService = $propertyService;
        $this->_listingService = $listingService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $order = $request->get('order');
        $dir = $request->get('dir');
        $page_appends = null;
        $vehicles = null;
        if($order && $dir) {
            $vehicles = Vehicle::orderBy($order, $dir);

            $page_appends = [
                'order' => $order,
                'dir' => $dir,
            ];
        }else {
            $vehicles = Vehicle::orderBy('vehicle_model_id', 'asc');
        }
        $vehicles = $vehicles->paginate(10);
        $listings = Listing::all();
        $models = $this->_modelService->getVehicleModelsForDropdown();

        $data['vehicles'] = $vehicles;
        $data['dir'] = $dir == 'asc' ? 'desc' : 'asc';
        $data['page_appends'] = $page_appends;

        return view('admin\listings\index')->with(compact('listings', 'models', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fuelTypes = $this->_fuelTypeService->getFuelTypesForDropdown();
        $brands = $this->_brandService->getBrandsForDropdown();
        $models = json_encode($this->_modelService->getVehicleModels()->toJson());
        $properties = $this->_propertyService->getProperties();
        $listing = null;
        return view('admin/listings/create')->with(compact('fuelTypes', 'brands', 'models', 'properties', 'listing'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            return redirect('admin/listings/create')
                ->withErrors($validator)
                ->withInput();
        }

        $vehicle = new Vehicle();
        $this->saveVehicle($request, $vehicle);

        $this->syncProperties($vehicle, $request->get('properties') == null ? array() : $request->get('properties'));

        $listing = new Listing();
        $this->saveListing($request, $listing, $vehicle);
        $this->saveImages($request, $listing);

        $request->session()->flash('alert-success', 'Voertuig succesvol toegevoegd!');
        return redirect('admin/listings');
    }

    /**
     * Display the specified resource.
     *
     * @param $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $listing = Listing::where('slug', $slug)->first();
        return view('pages\listing')->with(compact('listing'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $listing = Listing::find($id);
        $fuelTypes = $this->_fuelTypeService->getFuelTypesForDropdown();
        $brands = $this->_brandService->getBrandsForDropdown();
        $models = json_encode($this->_modelService->getVehicleModels()->toJson());
        $properties = $this->_propertyService->getProperties();
        return view('admin\listings\edit')->with(compact('listing', 'fuelTypes', 'brands', 'models', 'properties'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $listing = Listing::find($id);
        $vehicle = $listing->vehicle;

        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            return redirect('admin/listings/'. $vehicle->id .'/edit')
                ->withErrors($validator)
                ->withInput();
        }

        $this->saveVehicle($request, $vehicle);

        $this->syncProperties($vehicle, $request->get('properties') == null ? array() : $request->get('properties'));

        $this->saveListing($request, $listing, $vehicle);
        $this->saveImages($request, $listing);

        $request->session()->flash('alert-success', 'Voertuig succesvol bewaard!');
        return redirect('admin/listings');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Vehicle::find($id)->delete();

        $request->session()->flash('alert-success', 'Voertuig succesvol verwijderd!');
        return redirect('admin/listings');
    }

    /**
     * Sync up the list of properties in the database
     *
     * @param  Vehicle $vehicle
     * @param  array   $properties
     */
    private function syncProperties(Vehicle $vehicle, array $properties)
    {
        $vehicle->vehicleProperties()->sync($properties);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'brand' => 'required',
            'model' => 'required',
            'first_registered' => 'required',
            'fuel_type' => 'required',
            'kilometers' => 'required',
            'n_owners' => 'required',
            'color' => 'required',
            'color_type' => 'required',
            'color_interior' => 'required',
            'interior' => 'required',
            'transmission' => 'required',
            'body_type' => 'required',
            'power' => 'required',
            'n_gears' => 'required',
            'n_seats' => 'required',
            'n_doors' => 'required',
            'n_cylinders' => 'required',
            'cylinder_capacity' => 'required',
            'co2_emission' => 'required',
            'emission_standard' => 'required',
            'weight' => 'required',

        ]);
    }

    private function saveVehicle(Request $request, Vehicle $vehicle) {
        $vehicle->brand_id = $request->get('brand');
        $vehicle->vehicle_model_id = $request->get('model');
        $vehicle->first_registered = Carbon::createFromFormat('d/m/Y', $request->get('first_registered'));
        $vehicle->n_owners = $request->get('n_owners');
        $vehicle->fuel_type_id = $request->get('fuel_type');
        $vehicle->kilometers = $request->get('kilometers');
        $vehicle->color = $request->get('color');
        $vehicle->color_type = $request->get('color_type');
        $vehicle->color_interior = $request->get('color_interior');
        $vehicle->interior = $request->get('interior');
        $vehicle->body_type = $request->get('body_type');
        $vehicle->transmission = $request->get('transmission');
        $vehicle->n_gears = $request->get('n_gears');
        $vehicle->n_seats = $request->get('n_seats');
        $vehicle->n_doors = $request->get('n_doors');
        $vehicle->n_cylinders = $request->get('n_cylinders');
        $vehicle->power = $request->get('power');
        $vehicle->cylinder_capacity = $request->get('cylinder_capacity');
        $vehicle->co2_emission = $request->get('co2_emission');
        $vehicle->emission_standard = $request->get('emission_standard');
        $vehicle->weight = $request->get('weight');
        $vehicle->damaged = $request->get('damaged') == null ? 0 : 1;
        $vehicle->save();
    }

    private function saveListing(Request $request, Listing $listing, Vehicle $vehicle) {
        $listing->title = $request->get('title');
        $listing->price = $request->get('price');
        $listing->active = $request->get('active') == null ? 0 : 1;
        $listing->sold = $request->get('sold') == null ? 0 : 1;
        $vehicle->listing()->save($listing);
    }

    private function saveImages($request, $listing) {
        $image_ids = $request->get('images') == null ? array() : $request->get('images');

        foreach($image_ids as $image_id) {
            $listing->images()->save(Image::find($image_id));
        }
    }
}
