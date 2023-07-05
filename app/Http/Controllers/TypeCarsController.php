<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\BrandTranslation;
use App\Models\Product;
use App\Models\TypeCar;
use Illuminate\Support\Str;

class TypeCarsController extends Controller
{
    public function __construct() {
        // Staff Permission Check
        $this->middleware(['permission:view_all_typecars'])->only('index');
        $this->middleware(['permission:add_typecars'])->only('create');
        $this->middleware(['permission:edit_typecars'])->only('edit');
        $this->middleware(['permission:delete_typecars'])->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $types = TypeCar::orderBy('type', 'asc')->get();
        return view('backend.product.type.index', compact('types'));
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
        $brand = new TypeCar;
        $brand->type = $request->type;
        $brand->save();
        flash(translate('Brand has been inserted successfully'))->success();
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
        $types = TypeCar::orderBy('type', 'asc')->get();
        $edit  = TypeCar::where('id',$id)->first();
        return view('backend.product.type.edit', compact('types','edit'));
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
        $brand = TypeCar::findOrFail($id);
        $brand->type = $request->type;
        $brand->save();
        flash(translate('Type Car has been updated successfully'))->success();
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
        $brand = TypeCar::findOrFail($id);
        // Product::where('brand_id', $brand->id)->delete();
        // foreach ($brand->brand_translations as $key => $brand_translation) {
        //     $brand_translation->delete();
        // }
        TypeCar::destroy($id);

        flash(translate('Type Car has been deleted successfully'))->success();
        return redirect()->route('typecars.index');

    }
}
