<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;

class BanerController extends Controller
{

    public function __construct() {
        // Staff Permission Check
        $this->middleware(['permission:view_banner'])->only('index');
        $this->middleware(['permission:add_banner'])->only('create');
        $this->middleware(['permission:edit_banner'])->only('edit');
        $this->middleware(['permission:delete_banner'])->only('destroy');
        $this->middleware(['permission:publish_banner'])->only('change_status');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banner = Banner::orderby('id','desc')->get();
        return view('backend.blog_system.banner.index', compact('banner'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.blog_system.banner.create');
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
                $banner = new Banner;
                $banner->image = $request->image;
                $banner->page_link = $request->link;
                $banner->name_page = $request->name_page;
                $banner->save();
                flash(translate('Banner has been inserted successfully'))->success();
                return redirect('admin/banner');
        } catch (\Throwable $th) {
            flash(translate($th->getMessage()))->warning();
            return redirect('admin/banner');
        }

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

        $banner = Banner::find($id);
        return view('backend.blog_system.banner.edit', compact('banner'));

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
        $banner = Banner::find($id);
        $banner->image = $request->image;
        $banner->page_link = $request->link;
        $banner->name_page = $request->name_page;
        $banner->save();

        flash(translate('Banner has been updated successfully'))->success();
        return redirect()->route('banner.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banner = Banner::findOrFail($id);
        if(Banner::destroy($id)){
            //unlink($slider->photo);
            flash(translate('Banner has been deleted successfully'))->success();
        }
        else{
            flash(translate('Something went wrong'))->error();
        }
        return redirect()->route('banner.index');
    }
}
