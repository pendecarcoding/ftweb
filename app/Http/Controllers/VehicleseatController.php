<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\VehicleSeat;

class VehicleseatController extends Controller
{

    public function __construct() {
        // Staff Permission Check
        $this->middleware(['permission:view_vehicleseat'])->only('index');
        $this->middleware(['permission:delete_vehicleseat'])->only('destroy');
        $this->middleware(['permission:edit_vehicleseat'])->only('edit');
        $this->middleware(['permission:publish_vehicleseat'])->only('change_status');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = VehicleSeat::orderby('id','desc')->get();
        return view('backend.product.vehicle.index', compact('data'));
    }


    public function edit($d)
    {
        $data = VehicleSeat::orderby('id','desc')->get();
        $edit = VehicleSeat::where('id',base64_decode($d))->first();
        return view('backend.product.vehicle.edit', compact('data','edit'));
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
                $d = new VehicleSeat;
                $d->size = $request->name;
                $d->save();
                flash(translate('Data has been inserted successfully'))->success();
                return redirect('admin/vehicleseat');
        } catch (\Throwable $th) {
            flash(translate($th->getMessage()))->warning();
            return redirect('admin/vehicleseat');
        }

    }



    public function update(Request $request, $id)
    {
        $d = VehicleSeat::find($id);
        $d->size = $request->name;
        $d->save();
        flash(translate('Data has been updated successfully'))->success();
        return redirect()->route('vehicleseat.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banner = VehicleSeat::findOrFail($id);
        if(VehicleSeat::destroy($id)){
            //unlink($slider->photo);
            flash(translate('Data has been deleted successfully'))->success();
        }
        else{
            flash(translate('Something went wrong'))->error();
        }
        return redirect()->route('vehicleseat.index');
    }
}
