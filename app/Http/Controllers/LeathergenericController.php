<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\GenericLeather;
use DB;

class LeathergenericController extends Controller
{

    public function __construct() {
        // Staff Permission Check
        $this->middleware(['permission:view_leathergeneric'])->only('index');
        $this->middleware(['permission:delete_leathergeneric'])->only('destroy');
        $this->middleware(['permission:edit_leathergeneric'])->only('edit');
        $this->middleware(['permission:publish_leathergeneric'])->only('change_status');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = GenericLeather::orderby('id','desc')->get();
        $type = DB::table('leather_type')->get();
        return view('backend.product.genericleather.index', compact('data','type'));
    }


    public function edit($d)
    {
        $data = GenericLeather::orderby('id','desc')->get();
        $edit = GenericLeather::where('id',base64_decode($d))->first();
        $type = DB::table('leather_type')->get();
        return view('backend.product.genericleather.edit', compact('data','edit','type'));
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
                $d = new GenericLeather;
                $d->img = $request->img;
                $d->type = $request->type;
                $d->shortby = $request->shortby;
                $d->name_leather = $request->name;
                $d->price = $request->price;
                $d->parentid = $request->parent;
                $d->save();
                flash(translate('Data has been inserted successfully'))->success();
                return redirect('admin/leathergeneric');
        } catch (\Throwable $th) {
            flash(translate($th->getMessage()))->warning();
            return redirect('admin/leathergeneric');
        }

    }



    public function update(Request $request, $id)
    {
        $d = GenericLeather::find($id);
        $d->img = $request->img;
        $d->type = $request->type;
        $d->shortby = $request->shortby;
        $d->name_leather = $request->name;
        $d->price = $request->price;
        $d->parentid = $request->parent;
        $d->save();

        flash(translate('Data has been updated successfully'))->success();
        return redirect()->route('leathergeneric.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banner = GenericLeather::findOrFail($id);
        if(GenericLeather::destroy($id)){
            //unlink($slider->photo);
            flash(translate('Data has been deleted successfully'))->success();
        }
        else{
            flash(translate('Something went wrong'))->error();
        }
        return redirect()->route('leathergeneric.index');
    }
}
