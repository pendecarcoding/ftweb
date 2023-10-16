<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Milestone;

class MilestoneController extends Controller
{

    public function __construct() {
        // Staff Permission Check
        $this->middleware(['permission:view_milestone'])->only('index');
        $this->middleware(['permission:add_milestone'])->only('create');
        $this->middleware(['permission:edit_milestone'])->only('edit');
        $this->middleware(['permission:delete_milestone'])->only('destroy');
        $this->middleware(['permission:publish_milestone'])->only('change_status');
    }
    public function index(Request $r)
    {
        $policy = Milestone::all();
        return view('backend.blog_system.milestone.index', compact('policy'));
    }

    public function create(){
        return view('backend.blog_system.milestone.create');
    }

    //updates the policy pages
    public function store(Request $request){
        try {
            $banner = new Milestone;
            $banner->img = $request->img;
            $banner->year = $request->year;
            $banner->content = $request->content;
            $banner->save();
            flash(translate('Milestone has been inserted successfully'))->success();
            return redirect('admin/data-milestone');
    } catch (\Throwable $th) {
        flash(translate($th->getMessage()))->warning();
        return redirect('admin/data-milestone');
    }
    }

    public function update(Request $request, $id)
    {
        try {
            $banner = Milestone::find($id);
            $banner->img = $request->img;
            $banner->year = $request->year;
            $banner->content = $request->content;
            $banner->save();
            flash(translate('Milestone has been inserted successfully'))->success();
            return redirect('admin/data-milestone');
    } catch (\Throwable $th) {
        flash(translate($th->getMessage()))->warning();
        return redirect('admin/data-milestone');
    }
    }

    public function edit($id)
    {
        try {
            $data = Milestone::find(base64_decode($id));
            return view('backend.blog_system.milestone.edit', compact('data'));
        } catch (\Throwable $th) {
            flash(translate($th->getMessage()))->warning();
            return back();
        }


    }

    public function destroy($id)
    {
        $banner = Milestone::findOrFail(base64_decode($id));
        if(Milestone::destroy(base64_decode($id))){
            //unlink($slider->photo);
            flash(translate('Milestone has been deleted successfully'))->success();
        }
        else{
            flash(translate('Something went wrong'))->error();
        }
        return redirect()->route('milestone.index');
    }
}
