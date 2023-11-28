<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\InteriorPart;
use DB;

class InteriorpartController extends Controller
{

    public function __construct() {
        // Staff Permission Check
        $this->middleware(['permission:view_interiorpart'])->only('index');
        $this->middleware(['permission:delete_interiorpart'])->only('destroy');
        $this->middleware(['permission:edit_interiorpart'])->only('edit');
        $this->middleware(['permission:publish_interiorpart'])->only('change_status');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leather =  DB::table('leather_type')->get();
        $data = InteriorPart::orderby('id_interior','desc')->get();
        return view('backend.product.interiorpart.index', compact('data','leather'));
    }


    public function edit($d)
    {
        $data = InteriorPart::orderby('id_interior','desc')->get();
        $edit = InteriorPart::where('id_interior',base64_decode($d))->first();
        $leather =  DB::table('leather_type')->get();
        return view('backend.product.interiorpart.edit', compact('data','edit','leather'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
                $d = new InteriorPart;
                $d->name_interior = $request->name;
                $d->catania_price = $request->catania_price;
                $d->nappa_price = $request->nappa_price;
                $d->showon = implode(',',$request->showon);
                $d->img = $request->image;
                $d->save();
                flash(translate('Data has been inserted successfully'))->success();
                return redirect('admin/interiorpart');
        } catch (\Throwable $th) {
            flash(translate($th->getMessage()))->warning();
            return redirect('admin/interiorpart');
        }

    }



    public function update(Request $request, $id)
    {
        $data=[
            'name_interior'=>$request->name,
            'catania_price'=>$request->catania_price,
            'nappa_price'=>$request->nappa_price,
            'showon'=>implode(',',$request->showon),
            'img'=>$request->image,

        ];
        InteriorPart::where('id_interior',$id)->update($data);
        flash(translate('Data has been updated successfully'))->success();
        return redirect()->route('interiorpart.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $act = InteriorPart::where('id_interior',$id)->delete();

        if($act){
            //unlink($slider->photo);
            flash(translate('Data has been deleted successfully'))->success();
        }
        else{
            flash(translate('Something went wrong'))->error();
        }
        return redirect()->route('interiorpart.index');
    }
}
