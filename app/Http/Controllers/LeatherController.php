<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\TypeLeather;

class LeatherController extends Controller
{

    public function __construct() {
        // Staff Permission Check
        $this->middleware(['permission:view_leather'])->only('index');
        $this->middleware(['permission:delete_leather'])->only('destroy');
        $this->middleware(['permission:edit_leather'])->only('edit');
        $this->middleware(['permission:publish_leather'])->only('change_status');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = TypeLeather::orderby('id','desc')->get();
        return view('backend.product.leather.index', compact('data'));
    }


    public function edit($d)
    {
        $data = TypeLeather::orderby('id','desc')->get();
        $edit = TypeLeather::where('id',base64_decode($d))->first();
        return view('backend.product.leather.edit', compact('data','edit'));
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
                $d = new TypeLeather;
                // $d->img = $request->img;
                $d->leather = $request->name;
                // $d->price = $request->price;
                // $d->parentid = $request->parent;
                $d->save();
                flash(translate('Data has been inserted successfully'))->success();
                return redirect('admin/leather');
        } catch (\Throwable $th) {
            flash(translate($th->getMessage()))->warning();
            return redirect('admin/leather');
        }

    }



    public function update(Request $request, $id)
    {
        $d = TypeLeather::find($id);
        // $d->img = $request->img;
        $d->leather = $request->name;
        // $d->price = $request->price;
        // $d->parentid = $request->parent;
        $d->save();

        flash(translate('Data has been updated successfully'))->success();
        return redirect()->route('leather.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banner = TypeLeather::findOrFail($id);
        if(TypeLeather::destroy($id)){
            //unlink($slider->photo);
            flash(translate('Data has been deleted successfully'))->success();
        }
        else{
            flash(translate('Something went wrong'))->error();
        }
        return redirect()->route('leather.index');
    }
}
