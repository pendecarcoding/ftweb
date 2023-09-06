<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leadership;
class LeadershipController extends Controller
{

    public function __construct() {
        // Staff Permission Check
        $this->middleware(['permission:view_leadership'])->only('index');
        $this->middleware(['permission:add_leadership'])->only('create');
        $this->middleware(['permission:edit_leadership'])->only('edit');
        $this->middleware(['permission:delete_leadershipt'])->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Leadership::all();
        return view('backend.leadership.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.leadership.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
                $part = implode(',',$request->part);
                $d = new Leadership;
                $d->name     = $request->name;
                $d->position = $request->position;
                $d->foto = $request->foto;
                $d->content = $request->content;
                $d->head = $request->top;
                $d->short = $request->short;
                $d->part = $part;
                $d->save();
                flash(translate('Leadership has been inserted successfully'))->success();
                return redirect()->route('leadership.index');
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

        $data = Leadership::find(base64_decode($id));
        return view('backend.leadership.edit', compact('data'));

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
        $part = implode(',',$request->part);
        $d = Leadership::find(base64_decode($id));
        $d->name     = $request->name;
        $d->position = $request->position;
        $d->content = $request->content;
        $d->foto = $request->foto;
        $d->head = $request->top;
        $d->short = $request->short;
        $d->part = $part;
        $d->save();
        flash(translate('Leadership has been updated successfully'))->success();
        return redirect()->route('leadership.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Leadership::destroy(base64_decode($id))){
            //unlink($slider->photo);
            flash(translate('Leadership has been deleted successfully'))->success();
        }
        else{
            flash(translate('Something went wrong'))->error();
        }
        return redirect()->route('leadership.index');
    }
}
