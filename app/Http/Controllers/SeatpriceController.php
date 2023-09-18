<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\TypeLeather;
use App\Models\SeatPrice;
use DB;
class SeatpriceController extends Controller
{

    public function __construct() {
        // Staff Permission Check
        $this->middleware(['permission:view_seatprice'])->only('index');
        $this->middleware(['permission:delete_seatprice'])->only('destroy');
        $this->middleware(['permission:edit_seatprice'])->only('edit');
        $this->middleware(['permission:publish_seatprice'])->only('change_status');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('price_seat')->get();
        $typeleather = DB::table('leather_type')->orderBy('id','asc')->get();
        $leather = TypeLeather::orderby('id','asc')->get();
        $size = DB::table('size_seat')->orderBy('id','asc')->get();
        return view('backend.product.seatprice.index', compact('data','typeleather','leather','size'));
    }


    public function edit($d)
    {
        $data = DB::table('price_seat')->orderby('id','desc')->get();
        $typeleather = DB::table('leather_type')->orderBy('id','asc')->get();
        $leather = TypeLeather::orderby('id','asc')->get();
        $size = DB::table('size_seat')->orderBy('id','asc')->get();
        $edit = DB::table('price_seat')->where('id',base64_decode($d))->first();
        return view('backend.product.seatprice.edit', compact('data','edit','typeleather','leather','size'));
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
                $d = new SeatPrice;
                $d->vehicle_type = $request->vehicle;
                $d->application = $request->application;
                $d->row = $request->row;
                $d->price = $request->price;
                $d->leather_type = $request->typeleather;
                $d->save();
                flash(translate('Data has been inserted successfully'))->success();
                return redirect('admin/seatprice');
        } catch (\Throwable $th) {
            flash(translate($th->getMessage()))->warning();
            return redirect('admin/seatprice');
        }

    }



    public function update(Request $request, $id)
    {
        $d = SeatPrice::find($id);
        $d->vehicle_type = $request->vehicle;
        $d->application = $request->application;
        $d->row = $request->row;
        $d->price = $request->price;
        $d->leather_type = $request->typeleather;
        $d->save();
        flash(translate('Data has been inserted successfully'))->success();
        return redirect('admin/seatprice');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banner = SeatPrice::findOrFail(base64_decode($id));
        if(SeatPrice::destroy(base64_decode($id))){
            //unlink($slider->photo);
            flash(translate('Data has been deleted successfully'))->success();
        }
        else{
            flash(translate('Something went wrong'))->error();
        }
        return redirect()->route('seatprice.index');
    }
}
