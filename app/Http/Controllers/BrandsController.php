<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BrandsController extends Controller
{
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
        $brands = null;
        if($order && $dir) {
            $brands = Brand::orderBy($order, $dir);

            $page_appends = [
                'order' => $order,
                'dir' => $dir,
            ];
        }else {
            $brands = Brand::orderBy('name', 'asc');
        }
        $brands = $brands->paginate(10);

        $data['brands'] = $brands;
        $data['dir'] = $dir == 'asc' ? 'desc' : 'asc';
        $data['page_appends'] = $page_appends;

        return view('admin\brands\index')->with(compact('brands', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/brands/create');
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
            return redirect('admin/brands/create')
                ->withErrors($validator)
                ->withInput();
        }

        $brand = new Brand();
        $brand->name = $request->get('name');
        $brand->save();

        $request->session()->flash('alert-success', 'Merk succesvol toegevoegd!');
        return redirect('admin/brands');
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
        return view('admin\brands\edit');
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
        $brand = Brand::find($id);

        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            return redirect('admin/brands/edit')
                ->withErrors($validator)
                ->withInput();
        }

        $brand->name = $request->get('name');
        $brand->save();

        $request->session()->flash('alert-success', 'Merk succesvol bewaard!');
        return redirect('admin/brands');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Brand::find($id)->delete();

        $request->session()->flash('alert-success', 'Merk succesvol verwijderd!');
        return redirect('admin/brands');
    }

    public function modelsForBrand(Request $request, $id) {
        $brand = Brand::find($id);
        return response()->json($brand->models->pluck('name', 'id'));
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|unique:brands'
        ]);
    }
}
