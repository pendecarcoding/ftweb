<?php

namespace App\Http\Controllers\towncolor;
use App\Http\Controllers\Controller;
use App\Http\Resources\V2\BannerCollection;
use App\Models\Color;
use App\Models\Twotown;
use Illuminate\Http\Request;
use App\Models\TypeLeather;

class TwotowncolorController extends Controller
{

    public function __construct() {
        // Staff Permission Check
        $this->middleware(['permission:view_twotowncolor'])->only('index');
        $this->middleware(['permission:add_twotowncolor'])->only('create');
        $this->middleware(['permission:edit_twotowncolor'])->only('edit');
        $this->middleware(['permission:delete_twotowncolor'])->only('destroy');
    }


    public function index(){
        $data = Twotown::orderby('id','desc')->get();
        return view('backend.product.twotown.index',compact('data'));
    }

    public function create(){
        $leather = TypeLeather::all();
        $color   = Color::all();
        return view('backend.product.twotown.create',compact('leather','color'));
    }
  /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
       try {
            $color_1 = implode(',',$request->color1);
            $color_2 = implode(',',$request->color2);


            $d = new Twotown;
            $d->name_town     = $request->name;
            $d->color_1     = $color_1;
            $d->color_2     = $color_2;
            $d->price = $request->price;
            $d->type_leather = $request->type_leather;
            $d->img = $request->img;
            $d->base_img = $request->base_img;
            $d->base_img = $request->base_img;
            $d->color_img1 = $request->color_img1;
            $d->color_img2 = $request->color_img2;
            $d->save();
            flash(translate('Product has been inserted successfully'))->success();
            return redirect()->route('twotowncolor.index');
       } catch (\Throwable $th) {
        flash(translate($th->getMessage()))->warning();
        return redirect()->route('twotowncolor.index');
       }
    }

    function change_status(request $request){
        $data = Twotown::where('id',$request->id)->first();
        try {
            Twotown::where('id',$request->id)->update(['published'=>$request->status]);
            return 1;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }

    }

    public function edit($id){
        $data    = Twotown::where('id',base64_decode($id))->first();
        $leather = TypeLeather::all();
        $color   = Color::all();
        return view('backend.product.twotown.edit',compact('leather','color','data'));
    }

    public function update(Request $request,$id){
        try {
             $color_1 = implode(',',$request->color1);
             $color_2 = implode(',',$request->color2);


             $d = Twotown::find($id);
             $d->name_town     = $request->name;
             $d->color_1     = $color_1;
             $d->color_2     = $color_2;
             $d->price = $request->price;
             $d->type_leather = $request->type_leather;
             $d->img = $request->img;
             $d->base_img = $request->base_img;
             $d->base_img = $request->base_img;
             $d->color_img1 = $request->color_img1;
             $d->color_img2 = $request->color_img2;
             $d->save();
             flash(translate('Product has been inserted successfully'))->success();
             return redirect()->route('twotowncolor.index');
        } catch (\Throwable $th) {
         flash(translate($th->getMessage()))->warning();
         return redirect()->route('twotowncolor.index');
        }
     }

     public function destroy($id)
     {
         if(Twotown::destroy(base64_decode($id))){
             //unlink($slider->photo);
             flash(translate('Product has been deleted successfully'))->success();
         }
         else{
             flash(translate('Something went wrong'))->error();
         }
         return redirect()->route('twotowncolor.index');
     }
}
