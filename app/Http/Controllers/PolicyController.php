<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Policy;

class PolicyController extends Controller
{

    public function __construct() {
        // Staff Permission Check
        $this->middleware(['permission:view_policy'])->only('index');
        $this->middleware(['permission:add_policy'])->only('create');
        $this->middleware(['permission:edit_policy'])->only('edit');
        $this->middleware(['permission:delete_policy'])->only('destroy');
        $this->middleware(['permission:publish_policy'])->only('change_status');
    }
    public function index(Request $r)
    {
        $policy = Policy::all();
        return view('backend.blog_system.policy.index', compact('policy'));
    }

    public function create(){
        return view('backend.blog_system.policy.create');
    }

    //updates the policy pages
    public function store(Request $request){
        try {
            $banner = new Policy;
            $banner->icon = $request->icon;
            $banner->pdf = $request->pdf;
            $banner->name = $request->name;
            $banner->save();
            flash(translate('Policy has been inserted successfully'))->success();
            return redirect('admin/data-policy');
    } catch (\Throwable $th) {
        flash(translate($th->getMessage()))->warning();
        return redirect('admin/data-policy');
    }
    }

    public function update(Request $request, $id)
    {
        try {
            $banner = Policy::find($id);
            $banner->icon = $request->icon;
            $banner->pdf = $request->pdf;
            $banner->name = $request->name;
            $banner->save();
            flash(translate('Policy has been inserted successfully'))->success();
            return redirect('admin/data-policy');
    } catch (\Throwable $th) {
        flash(translate($th->getMessage()))->warning();
        return redirect('admin/data-policy');
    }
    }

    public function edit($id)
    {

        $banner = Policy::find($id);
        return view('backend.blog_system.policy.edit', compact('banner'));

    }

    public function destroy($id)
    {
        $banner = Policy::findOrFail($id);
        if(Policy::destroy($id)){
            //unlink($slider->photo);
            flash(translate('Policy has been deleted successfully'))->success();
        }
        else{
            flash(translate('Something went wrong'))->error();
        }
        return redirect()->route('data-policy.index');
    }
}
