<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persentation;
use App\Models\Contact;
use File;
use DB;

class ContactController extends Controller
{

    public function __construct() {
        // Staff Permission Check
        $this->middleware(['permission:view_contact'])->only('index');
        $this->middleware(['permission:add_contact'])->only('create');
        $this->middleware(['permission:edit_contact'])->only('edit');
        $this->middleware(['permission:delete_contact'])->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Contact::select('contacts.id as id','contacts.title as title','contacts.img as img','contacts.content as content','contacts.devision as devision')->join('devisions','devisions.id','contacts.devision')->orderby('short','ASC')->get();
        return view('backend.contact.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $devision = DB::table('devisions')->orderby('short','asc')->get();
        return view('backend.contact.create',compact('devision'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
                $d = new Contact;
                $d->title = $request->title;
                $d->devision = $request->devision;
                $d->img = $request->foto;
                $d->content = $request->content;
                $d->save();
                flash(translate('Contact has been inserted successfully'))->success();
                return redirect()->route('contact.index');

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

        $data = Contact::find(base64_decode($id));
        $devision = DB::table('devisions')->orderby('short','asc')->get();
        return view('backend.contact.edit', compact('data','devision'));

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
        $d = Contact::find(base64_decode($id));
        $d->title = $request->title;
        $d->devision = $request->devision;
        $d->img = $request->foto;
        $d->content = $request->content;
        $d->save();
        flash(translate('Contact has been updated successfully'))->success();
        return redirect()->route('contact.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function destroy($id)
     {
         if(Contact::destroy(base64_decode($id))){
             //unlink($slider->photo);
             flash(translate('Contact has been deleted successfully'))->success();
         }
         else{
             flash(translate('Something went wrong'))->error();
         }
         return redirect()->route('contact.index');
     }
}
