<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\BrandTranslation;
use App\Models\Product;
use App\Models\Car;
use App\Models\TypeCar;
use Illuminate\Support\Str;

class CarsController extends Controller
{
    public function __construct() {
        // Staff Permission Check
        $this->middleware(['permission:view_all_cars'])->only('index');
        $this->middleware(['permission:add_cars'])->only('create');
        $this->middleware(['permission:edit_cars'])->only('edit');
        $this->middleware(['permission:delete_cars'])->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $brand = Brand::all();
        $type  = TypeCar::all();
        $data  = Car::orderBy('name', 'asc')->get();
        return view('backend.product.car.index', compact('data','brand','type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $car = new Car;
        $car->name = $request->name;
        $car->make = $request->make;
        $car->year = $request->year;
        $car->type = $request->type;
        $car->image = $request->image;
        $car->save();
        flash(translate('Car has been inserted successfully'))->success();
        return back();

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
    public function edit(Request $request, $id)
    {
        $lang   = $request->lang;
        $edit  = Car::findOrFail($id);
        $brand  = Brand::all();
        $type   = TypeCar::all();
        $data   = Car::orderBy('name', 'asc')->get();
        return view('backend.product.car.edit', compact('brand','type','edit','data'));
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
        $car = Car::findOrFail($id);
        $car->name = $request->name;
        $car->make = $request->make;
        $car->year = $request->year;
        $car->type = $request->type;
        $car->image = $request->image;
        $car->save();
        flash(translate('Car has been updated successfully'))->success();
        return back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = Car::findOrFail($id);
        // Product::where('brand_id', $brand->id)->delete();
        // foreach ($brand->brand_translations as $key => $brand_translation) {
        //     $brand_translation->delete();
        // }
        Car::destroy($id);

        flash(translate('Car has been deleted successfully'))->success();
        return redirect()->route('cars.index');

    }
}
