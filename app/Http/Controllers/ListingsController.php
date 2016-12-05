<?php

namespace App\Http\Controllers;

use App\Http\Services\BrandService;
use App\Http\Services\FuelTypeService;
use App\Http\Services\PropertyService;
use App\Http\Services\VehicleModelService;
use App\Image;
use App\Listing;
use App\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ListingsController extends Controller
{

    private $_fuelTypeService;
    private $_brandService;
    private $_modelService;
    private $_propertyService;

    public function __construct(FuelTypeService $fuelTypeService, BrandService $brandService,
                                VehicleModelService $modelService, PropertyService $propertyService)
    {
        $this->_fuelTypeService = $fuelTypeService;
        $this->_brandService = $brandService;
        $this->_modelService = $modelService;
        $this->_propertyService = $propertyService;
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
        $models = $this->_modelService->getVehicleModelsForDropdown();

        $data['vehicles'] = $vehicles;
        $data['dir'] = $dir == 'asc' ? 'desc' : 'asc';
        $data['page_appends'] = $page_appends;

        return view('admin\listings\index')->with(compact('vehicles', 'models', 'data'));
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
        $vehicle = null;
        return view('admin/listings/create')->with(compact('fuelTypes', 'brands', 'models', 'properties', 'vehicle'));
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
        $vehicle->brand_id = $request->get('brand');
        $vehicle->vehicle_model_id = $request->get('model');
        $vehicle->first_registered = $request->get('first_registered');
        $vehicle->n_owners = $request->get('n_owners');
        $vehicle->fuel_type_id = $request->get('fuel_type');
        $vehicle->kilometers = $request->get('kilometers');
        $vehicle->color = $request->get('color');
        $vehicle->color_type = $request->get('color_type');
        $vehicle->color_interior = $request->get('color_interior');
        $vehicle->body_type = $request->get('body_type');
        $vehicle->transmission = $request->get('transmission');
        $vehicle->n_gears = $request->get('n_gears');
        $vehicle->n_seats = $request->get('n_seats');
        $vehicle->n_doors = $request->get('n_doors');
        $vehicle->power = $request->get('power');
        $vehicle->damaged = $request->get('damaged');
        $vehicle->save();

        $this->syncProperties($vehicle, $request->get('properties'));

        $listing = new Listing();
        $listing->title = $request->get('title');
        $listing->price = $request->get('price');
        $listing->active = $request->get('active');
        $listing->active = $request->get('sold');
        $vehicle->listing()->save($listing);

        $image_ids = $request->get('images');

        foreach($image_ids as $image_id) {
            $listing->images()->save(Image::find($image_id));
        }

        $request->session()->flash('alert-success', 'Voertuig succesvol toegevoegd!');
        return redirect('admin/listings');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vehicle = Vehicle::find($id);
        $fuelTypes = $this->_fuelTypeService->getFuelTypesForDropdown();
        $brands = $this->_brandService->getBrandsForDropdown();
        $models = json_encode($this->_modelService->getVehicleModels()->toJson());
        $properties = $this->_propertyService->getProperties();
        return view('admin\listings\edit')->with(compact('vehicle', 'fuelTypes', 'brands', 'models', 'properties'));
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
        $vehicle = Vehicle::find($id);

        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            return redirect('admin/listings/'. $vehicle->id .'/edit')
                ->withErrors($validator)
                ->withInput();
        }

        $vehicle->brand_id = $request->get('brand');
        $vehicle->vehicle_model_id = $request->get('model');
        $vehicle->first_registered = $request->get('first_registered');
        $vehicle->n_owners = $request->get('n_owners');
        $vehicle->fuel_type_id = $request->get('fuel_type');
        $vehicle->kilometers = $request->get('kilometers');
        $vehicle->color = $request->get('color');
        $vehicle->color_type = $request->get('color_type');
        $vehicle->color_interior = $request->get('color_interior');
        $vehicle->body_type = $request->get('body_type');
        $vehicle->transmission = $request->get('transmission');
        $vehicle->n_gears = $request->get('n_gears');
        $vehicle->n_seats = $request->get('n_seats');
        $vehicle->power = $request->get('power');
        $vehicle->save();

        $this->syncProperties($vehicle, $request->get('properties'));

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
            'transmission' => 'required',
            'body_type' => 'required',
            'power' => 'required',
            'n_gears' => 'required',
            'n_seats' => 'required'
        ]);
    }
}
