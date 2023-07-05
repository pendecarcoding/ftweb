<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permission;
class PermissionController extends Controller
{

    public function __construct() {
        // Staff Permission Check
        $this->middleware(['permission:view_permission'])->only('index');
        $this->middleware(['permission:add_permission'])->only('create');
        $this->middleware(['permission:edit_permission'])->only('edit');
        $this->middleware(['permission:delete_permission'])->only('destroy');
        $this->middleware(['permission:publish_permission'])->only('change_status');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Permission::all();
        return view('backend.permission.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.permission.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

                $d = new Permission;
                $d->name = $request->name_permission;
                $d->section = $request->section;
                $d->guard_name = 'web';
                $d->save();
                flash(translate('Permission has been inserted successfully'))->success();
                return redirect()->route('permission.index');
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

        $data = Permission::find(base64_decode($id));
        return view('backend.permission.edit', compact('data'));

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
        $d = Permission::find(base64_decode($id));
        $d->name = $request->name_permission;
        $d->section = $request->section;
        $d->guard_name = 'web';
        $d->save();
        flash(translate('Permission has been updated successfully'))->success();
        return redirect()->route('permission.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $d = Patner::findOrFail(base64_decode($id));
        if(Patner::destroy(base64_decode($id))){
            //unlink($slider->photo);
            flash(translate('Patners has been deleted successfully'))->success();
        }
        else{
            flash(translate('Something went wrong'))->error();
        }
        return redirect()->route('patners.index');
    }
}
