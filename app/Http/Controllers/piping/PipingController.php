<?php

namespace App\Http\Controllers\piping;
use App\Http\Controllers\Controller;
use App\Http\Resources\V2\BannerCollection;
use App\Models\Color;
use App\Models\Piping;
use Illuminate\Http\Request;
use App\Models\TypeLeather;

class PipingController extends Controller
{

    public function __construct() {
        // Staff Permission Check
        $this->middleware(['permission:view_piping'])->only('index');
        $this->middleware(['permission:add_piping'])->only('create');
        $this->middleware(['permission:edit_piping'])->only('edit');
        $this->middleware(['permission:delete_piping'])->only('destroy');
    }


    public function index(){
        $data = Piping::orderby('id','desc')->get();
        return view('backend.product.piping.index',compact('data'));
    }

    public function create(){
        $color   = Color::all();
        return view('backend.product.piping.create',compact('color'));
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
            $d = new Piping;
            $d->name_piping= $request->name;
            $d->colors     = $color_1;
            $d->price = $request->price;
            $d->img = $request->img;
            $d->base_img = $request->base_img;
            $d->color_img = $request->color_img1;
            $d->save();
            flash(translate('Product has been inserted successfully'))->success();
            return redirect()->route('pipingsys.index');
       } catch (\Throwable $th) {
        flash(translate($th->getMessage()))->warning();
        return redirect()->route('pipingsys.index');
       }
    }

    function change_status(request $request){
        $data = Piping::where('id',$request->id)->first();
        try {
            Piping::where('id',$request->id)->update(['published'=>$request->status]);
            return 1;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }

    }

    public function edit($id){
        $data    = Piping::where('id',base64_decode($id))->first();
        $color   = Color::all();
        return view('backend.product.piping.edit',compact('color','data'));
    }

    public function update(Request $request,$id){
        try {
            $color_1 = implode(',',$request->color1);
            $d = Piping::find($id);
            $d->name_piping= $request->name;
            $d->colors     = $color_1;
            $d->price = $request->price;
            $d->img = $request->img;
            $d->base_img = $request->base_img;
            $d->color_img = $request->color_img1;
            $d->save();
            flash(translate('Product has been inserted successfully'))->success();
            return redirect()->route('pipingsys.index');
        } catch (\Throwable $th) {
         flash(translate($th->getMessage()))->warning();
         return redirect()->route('pipingsys.index');
        }
     }

     public function destroy($id)
     {
         if(Piping::destroy(base64_decode($id))){
             //unlink($slider->photo);
             flash(translate('Product has been deleted successfully'))->success();
         }
         else{
             flash(translate('Something went wrong'))->error();
         }
         return redirect()->route('pipingsys.index');
     }
}
