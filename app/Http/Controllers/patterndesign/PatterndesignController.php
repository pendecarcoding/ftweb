<?php

namespace App\Http\Controllers\patterndesign;
use App\Http\Controllers\Controller;
use App\Http\Resources\V2\BannerCollection;
use App\Models\Color;
use App\Models\Patterndesign;
use Illuminate\Http\Request;
use App\Models\TypeLeather;

class PatterndesignController extends Controller
{

    public function __construct() {
        // Staff Permission Check
        $this->middleware(['permission:view_patterndesign'])->only('index');
        $this->middleware(['permission:add_patterndesign'])->only('create');
        $this->middleware(['permission:edit_patterndesign'])->only('edit');
        $this->middleware(['permission:delete_patterndesign'])->only('destroy');
    }


    public function index(){
        $data = Patterndesign::orderby('id','desc')->get();
        return view('backend.product.patterndesign.index',compact('data'));
    }

    public function create(){
        $color   = Color::all();
        return view('backend.product.patterndesign.create',compact('color'));
    }
  /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
       try {
            // $color_1 = implode(',',$request->color1);
            $d = new Patterndesign;
            $d->name_pattern= $request->name;
            // $d->colors     = $color_1;
            $d->price = $request->price;
            $d->img = $request->img;
            $d->base_img = $request->base_img;
            $d->color_img = $request->color_img1;
            $d->save();
            flash(translate('Product has been inserted successfully'))->success();
            return redirect()->route('patterndesignsys.index');
       } catch (\Throwable $th) {
        flash(translate($th->getMessage()))->warning();
        return redirect()->route('patterndesignsys.index');
       }
    }

    function change_status(request $request){
        $data = Patterndesign::where('id',$request->id)->first();
        try {
            Patterndesign::where('id',$request->id)->update(['published'=>$request->status]);
            return 1;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }

    }

    public function edit($id){
        $data    = Patterndesign::where('id',base64_decode($id))->first();
        $color   = Color::all();
        return view('backend.product.patterndesign.edit',compact('color','data'));
    }

    public function update(Request $request,$id){
        try {
            // $color_1 = implode(',',$request->color1);
            $d = Patterndesign::find($id);
            $d->name_pattern= $request->name;
            // $d->colors     = $color_1;
            $d->price = $request->price;
            $d->img = $request->img;
            $d->base_img = $request->base_img;
            $d->color_img = $request->color_img1;
            $d->save();
            flash(translate('Product has been inserted successfully'))->success();
            return redirect()->route('patterndesignsys.index');
        } catch (\Throwable $th) {
         flash(translate($th->getMessage()))->warning();
         return redirect()->route('patterndesignsys.index');
        }
     }

     public function destroy($id)
     {
         if(Patterndesign::destroy(base64_decode($id))){
             //unlink($slider->photo);
             flash(translate('Product has been deleted successfully'))->success();
         }
         else{
             flash(translate('Something went wrong'))->error();
         }
         return redirect()->route('patterndesignsys.index');
     }
}
