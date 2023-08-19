<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
class CompanyController extends Controller
{

    public function __construct() {
        // Staff Permission Check
        $this->middleware(['permission:view_company'])->only('index');
        $this->middleware(['permission:add_company'])->only('create');
        $this->middleware(['permission:edit_company'])->only('edit');
        $this->middleware(['permission:delete_company'])->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Company::all();
        return view('backend.company.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.company.create');
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

                $d = new Company;
                $d->name     = $request->name;
                $d->foto = $request->foto;
                $d->content = $request->content;
                $d->yt_link = $modifiedHtml;
                $d->save();
                flash(translate('Company has been inserted successfully'))->success();
                return redirect()->route('company.index');
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

        $data = Company::find(base64_decode($id));
        return view('backend.company.edit', compact('data'));

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
        $d = Company::find(base64_decode($id));
        $d->name     = $request->name;
        $d->foto = $request->foto;
        $d->content = $request->content;
        $d->yt_link = $modifiedHtml;
        $d->save();
        flash(translate('Company has been updated successfully'))->success();
        return redirect()->route('company.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Company::destroy(base64_decode($id))){
            //unlink($slider->photo);
            flash(translate('Company has been deleted successfully'))->success();
        }
        else{
            flash(translate('Something went wrong'))->error();
        }
        return redirect()->route('company.index');
    }
}
