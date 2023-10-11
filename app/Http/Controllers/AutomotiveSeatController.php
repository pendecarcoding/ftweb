<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\InteriorPart;
use DB;
//
class AutomotiveSeatController extends Controller
{

    public function __construct() {
        // Staff Permission Check
        $this->middleware(['permission:view_automotiveseats'])->only('index');
        $this->middleware(['permission:delete_automotiveseats'])->only('destroy');
        $this->middleware(['permission:edit_automotiveseats'])->only('edit');
        $this->middleware(['permission:publish_automotiveseats'])->only('change_status');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('img_automotive_seats')->orderby('shortby','desc')->get();
        return view('backend.product.automotiveseats.index', compact('data'));
    }


    public function edit($d)
    {
        $data = InteriorPart::orderby('id_interior','desc')->get();
        $edit = InteriorPart::where('id_interior',base64_decode($d))->first();
        return view('backend.product.automotiveseats.edit', compact('data','edit'));
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
            $data = [
                'img'=>$request->image,
                'title'=>$request->title,
                'shortby'=>$request->shortby,
            ];
            DB::table('img_automotive_seats')->insert($data);
                flash(translate('Data has been inserted successfully'))->success();
                return redirect('admin/automotiveseats');
        } catch (\Throwable $th) {
            flash(translate($th->getMessage()))->warning();
            return redirect('admin/automotiveseats');
        }

    }



    public function update(Request $request, $id)
    {
        $data=[
            'name_interior'=>$request->name,
            'price'=>$request->price,
            'img'=>$request->image,
        ];
        InteriorPart::where('id_interior',$id)->update($data);
        flash(translate('Data has been updated successfully'))->success();
        return redirect()->route('automotiveseats.index');
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
        return redirect()->route('automotiveseats.index');
    }
}
