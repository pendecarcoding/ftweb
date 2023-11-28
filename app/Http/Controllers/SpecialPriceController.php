<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\InteriorPart;
use DB;

class SpecialPriceController extends Controller
{

    public function __construct() {
        // Staff Permission Check
        $this->middleware(['permission:view_specialprice'])->only('index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data =  DB::table('size_seat')->get();
        return view('backend.product.specialprice.index', compact('data'));
    }
    public function store(Request $r)
    {
        try {
            $index = 0;
            foreach ($r->row as $v) {
                $check = DB::table('special_price')->where('type_row', $v)->first();

                $data = [
                    'type_row'            => $v,
                    'price_catania_pattern' => $r->price_catania_pattern[$index],
                    'price_nappa_pattern'   => $r->price_nappa_pattern[$index],
                    'price_catania_color'   => $r->price_catania_color[$index],
                    'price_nappa_color'     => $r->price_nappa_color[$index]
                ];

                if ($check != null) {
                    DB::table('special_price')->where('id_special', $r->id_special[$index])->update($data);
                } else {
                    DB::table('special_price')->insert($data);
                }
                $index++;
            }

            flash(translate('Data has been updated successfully'))->success();
            return back();

        } catch (\Throwable $th) {
            flash(translate($th->getMessage()))->warning();
            return back();
        }
    }



    public function update(Request $request, $id)
    {
        $data=[
            'name_interior'=>$request->name,
            'catania_price'=>$request->catania_price,
            'nappa_price'=>$request->nappa_price,
            'showon'=>implode(',',$request->showon),
            'img'=>$request->image,

        ];
        InteriorPart::where('id_interior',$id)->update($data);
        flash(translate('Data has been updated successfully'))->success();
        return redirect()->route('interiorpart.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $act = InteriorPart::where('id_interior',$id)->delete();

        if($act){
            //unlink($slider->photo);
            flash(translate('Data has been deleted successfully'))->success();
        }
        else{
            flash(translate('Something went wrong'))->error();
        }
        return redirect()->route('interiorpart.index');
    }
}
