<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persentation;
use App\Models\Research;
use File;

class ResearchController extends Controller
{

    public function __construct() {
        // Staff Permission Check
        $this->middleware(['permission:view_research'])->only('index');
        $this->middleware(['permission:add_research'])->only('create');
        $this->middleware(['permission:edit_research'])->only('edit');
        $this->middleware(['permission:delete_research'])->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Research::orderby('id','desc')->get();
        return view('backend.research.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.research.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $originalHtml = $request->yt_link;
        $modifiedHtml = preg_replace('/<iframe\s+width="(\d+)"\s+height="(\d+)"\s+/', '<iframe style="width:100%" height="$2" ', $originalHtml);

                $d = new Research;
                $d->title     = $request->title;
                $d->img = $request->foto;
                $d->content = $request->content;
                $d->yt_link = $modifiedHtml;
                $d->save();
                flash(translate('Research has been inserted successfully'))->success();
                return redirect()->route('research.index');

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

        $data = Research::find(base64_decode($id));
        return view('backend.research.edit', compact('data'));

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

        $originalHtml = $request->yt_link;
        $modifiedHtml = preg_replace('/<iframe\s+width="(\d+)"\s+height="(\d+)"\s+/', '<iframe style="width:100%" height="$2" ', $originalHtml);
        $d = Research::find(base64_decode($id));
        $d->title     = $request->title;
        $d->img = $request->foto;
        $d->content = $request->content;
        $d->yt_link = $modifiedHtml;
        $d->save();
        flash(translate('Research has been updated successfully'))->success();
        return redirect()->route('research.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function destroy($id)
     {
         if(Research::destroy(base64_decode($id))){
             //unlink($slider->photo);
             flash(translate('Research has been deleted successfully'))->success();
         }
         else{
             flash(translate('Something went wrong'))->error();
         }
         return redirect()->route('research.index');
     }
}
