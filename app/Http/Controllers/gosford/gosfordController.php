<?php

namespace App\Http\Controllers\gosford;
use App\Http\Controllers\Controller;
use Auth;
use Hash;
use Mail;
use Cache;
use Cookie;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\AffiliateConfig;
use App\Models\CustomerPackage;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Response;
use Illuminate\Auth\Events\PasswordReset;
use App\Mail\SecondEmailVerifyMailManager;
use App\Models\Brand;
use App\Models\Car;
use Session;
use Barryvdh\DomPDF\Facade\Pdf;
use Faker\Provider\Uuid;
use DB;
use  App\Models\GsystemAccount;
use App\Models\GsystemOrder;
use App\Models\TypeCar;

class gosfordController extends Controller
{
   public function login(){
    if(Session::get('gystem_login')){
        return redirect()->route('gosford.search');
    }else{
        return view('gosford.login');
    }

   }
   public function logout(){
    Session::flush();
    return redirect()->route('gosford.login');
   }

   public function logouts(){
    Session::flush();
    return redirect('/product_project');
   }
   public function register(){
    return view('gosford.register');
   }

   public function registerfront(){
    return view('gosford.frontend.register');
   }

   public function comfirregister($kode){
        try {
            $data = GsystemAccount::where('verify_code',base64_decode($kode))->first();
            if($data == null){
                $status=[
                    'status'=>'Invalid',
                    'message'=>'invalid verification code. make sure you really get a valid verification code'
                ];
                return view('gosford.statusverify',compact('status'));
            }else{
                $status=[
                    'status'=>'Verified',
                    'message'=>'You have successfully verified the account.'
                ];
                //changed status account
                $data=[
                    'status'=>'A',
                    'verify_code'=>null
                ];
                GsystemAccount::where('verify_code',base64_decode($kode))->update($data);
                return view('gosford.statusverify',compact('status'));
            }
        } catch (\Throwable $th) {

        }
   }


   public function actlogin(Request $r){
    $r->validate([
        'username'=>'required',
        'password' => 'required',
    ]);
    try {
        $data = GsystemAccount::where('email',$r->username)->orwhere('username',$r->username)->first();
        if($data != null){
            if (Hash::check($r->password, $data->password)) {
                Session::put('id_account',$data->id);
                Session::put('gystem_login',true);
                return redirect()->route('gosford.search');
            } else {
                // The hashed value does not match the plain text
                return back()->with('danger','Your password is wrong. make sure you enter the correct password');
            }
        }else{
            return back()->with('danger','Account not found !');
        }

    } catch (\Throwable $th) {
        //throw $th;
    }
   }

   public function actloginfront(Request $r){
    $r->validate([
        'username'=>'required',
        'password' => 'required',
    ]);
    try {
        $data = GsystemAccount::where('email',$r->username)->orwhere('username',$r->username)->first();
        if($data != null){
            if (Hash::check($r->password, $data->password)) {
                Session::put('id_account',$data->id);
                Session::put('gystem_login',true);
                if(Session::get('optionlast') != null){
                    $car  = Car::where('slug',Session::get('optionlast'))->join('products','products.car_id','cars.id')->first();
                    return view('gosford.frontend.option_sumary',compact('car'));
                }else{
                    return redirect('product_project');
                }

            } else {
                // The hashed value does not match the plain text
                return back()->with('danger','Your password is wrong. make sure you enter the correct password');
            }
        }else{
            return back()->with('danger','Account not found !');
        }

    } catch (\Throwable $th) {
        print $th->getMessage();
    }
   }

   public function addacountfront(Request $r){
    $r->validate([
        'username'=>'required',
        'contact_number' => 'required|unique:gsystem_accounts,contact_number',
        'password_confirmation'=>'required',
        'password' => 'required|confirmed',
        'email' => 'required|email|unique:gsystem_accounts,email',
    ]);
    $kode = Str::uuid()->toString();
    try {
        GsystemAccount::insert(
            [
                'username'=>$r->username,
                'contact_number'=>$r->contact_number,
                'password'=>Hash::make($r->password),
                'email'=>$r->email,
                'ip'=>$_SERVER['REMOTE_ADDR'],
                'verify_code'=>$kode,
                'status'=>'U'
            ]
            );
            $array['subject'] = translate('registration confirmation');
            $array['from'] = env('MAIL_FROM_ADDRESS');
            $array['content']="congratulations your registration is almost complete then you need to verify your email address. for verification click the link below";
            $array['link'] = env('URL_WEB').'/g_system/gosford/comfirregister/'.base64_encode($kode);
            Mail::to($r->email)->queue(new SecondEmailVerifyMailManager($array));
            $success = 'Please check your email and click on the verification link to complete your registration.';
            $email   = $r->email;
            return view('gosford.frontend.verify',compact('email','success'));
    } catch (\Throwable $th) {
       return redirect()->route('gosford.register')->with('danger',$th->getMessage());
    }
   }
   public function addacount(Request $r){

    $r->validate([
        'username'=>'required',
        'contact_number' => 'required|unique:gsystem_accounts,contact_number',
        'password_confirmation'=>'required',
        'password' => 'required|confirmed',
        'email' => 'required|email|unique:gsystem_accounts,email',
    ]);
    $kode = Str::uuid()->toString();
    try {
        GsystemAccount::insert(
            [
                'username'=>$r->username,
                'contact_number'=>$r->contact_number,
                'password'=>Hash::make($r->password),
                'email'=>$r->email,
                'ip'=>$_SERVER['REMOTE_ADDR'],
                'verify_code'=>$kode,
                'status'=>'U'
            ]
            );
            $array['subject'] = translate('registration confirmation');
            $array['from'] = env('MAIL_FROM_ADDRESS');
            $array['content']="congratulations your registration is almost complete then you need to verify your email address. for verification click the link below";
            $array['link'] = env('URL_WEB').'/g_system/gosford/comfirregister/'.base64_encode($kode);
            Mail::to($r->email)->queue(new SecondEmailVerifyMailManager($array));
            $success = 'Please check your email and click on the verification link to complete your registration.';
            $email   = $r->email;
            return view('gosford.verify',compact('email','success'));
    } catch (\Throwable $th) {
       return redirect()->route('gosford.register')->with('danger',$th->getMessage());
    }
   }

   function search(){
      $brand   = Brand::all();
      $typecar = TypeCar::all();
      return view('gosford.system.search',compact('brand','typecar'));
   }


   function profil(){
    return view('gosford.system.profil');
   }

   function profilfrontend(){
    $profil = GsystemAccount::where('id',Session::get('id_account'))->first();
    return view('gosford.frontend.profil',compact('profil'));
   }

   function choiceDesign(Request $r){
    $r->validate([
        'carmake'=>'required',
        'model' => 'required',
        'year'=>'required',
    ]);
    $year   = $r->year;
    $model  = $r->model;
    $carmake= $r->carmake;
    $car  = Car::where('make',$r->carmake)->where('type',$r->model)->where('year',$r->year)->join('products','products.car_id','cars.id')->get();
    return view('gosford.system.choice_design',compact('car','year','model','carmake'));
   }

   function choiceDesignFront(Request $r){
    $r->validate([
        'carmake'=>'required',
        'model' => 'required',
        'year'=>'required',
    ]);
    $year   = $r->year;
    $model  = $r->model;
    $carmake= $r->carmake;
    $car  = Car::where('make',$r->carmake)->where('id',$r->model)->where('year',$r->year)->first();
    if(!empty($car)){
        return view('gosford.frontend.choice_design',compact('car','year','model','carmake'));
    }
    else{
        print "kosong";
    }

   }

   //Two TownColor
   function twotowncolor(Request $r){
        return view('gosford.frontend.twotowncolor.index');
   }

   function twotowncolordetail(Request $r){
    return view('gosford.frontend.twotowncolor.detail');

   }

   function embrodery(Request $r){
    return view('gosford.frontend.embrodery.index');
   }

   function piping(Request $r){
    return view('gosford.frontend.piping.index');
   }

   //Pattern Design
   function patterndesign(Request $r){
    return view('gosford.frontend.pattern.index');
   }

   function detailpattern(Request $r){
    return view('gosford.frontend.pattern.detail');
   }

   //emblem
   function emblem(Request $r){
    return view('gosford.frontend.emblem.index');
   }
   function emblemdetail(Request $r){
    return view('gosford.frontend.emblem.detail');
   }

   function getmodelfrommake($make=null){
    $carModels = array();
    $carModels = Car::where('make', $make)->get(['id', 'name']);
    return response()->json($carModels);
   }
   function getyearfrommodel($model=null){
    $carModels = array();
    $carModels = Car::where('id', $model)->groupBy('year')->get(['year']);
    return response()->json($carModels);
   }


   function optionsummary($slug){
    Session::put('optionlast',$slug);
    $car  = Car::where('slug',$slug)->join('products','products.car_id','cars.id')->first();

    return view('gosford.system.option_sumary',compact('car'));
   }

   function optionsummaryfront($slug){
    Session::put('optionlast',$slug);
    $car  = Car::where('slug',$slug)->join('products','products.car_id','cars.id')->first();
    return view('gosford.frontend.option_sumary',compact('car'));
   }
   function ordercomfirmedfront(Request $r){
    if(Session::get('gystem_login')){
        try {
            // $decorator = __NAMESPACE__ . '\\Payment\\' . str_replace(' ', '', ucwords(str_replace('_', ' ', $request->payment_option))) . "Controller";
            // if (class_exists($decorator)) {
            //             // print "okw";
            //             return (new $decorator)->pay($r);
            // }
            $prefix = "INV";
            $date = date("YmdHis"); // Get the current date and time in "YmdHis" format
            $randomNumber = mt_rand(1000, 9999); // Generate a random 4-digit number // Generate a unique identifier
            $invoiceNumber = $prefix . $date . $randomNumber;
            $material = explode(',',$r->material);
            $data=[
                'order_code'=>$invoiceNumber,
                'user_id'=>Session::get('id_account'),
                'product_id'=>$r->id_product,
                'material'=>$material[1],
                'total'=>$r->total,
                'payment_status'=>'paid',
                'order_status'=>'Pending'
            ];
            GsystemOrder::insert($data);
            return view('gosford.frontend.comfirm_order');
        } catch (\Throwable $th) {
            print $th->getMessage();
        }
    }else{
        print "test";
    }


   }
   function ordercomfirmed(Request $r){
    try {
        // $decorator = __NAMESPACE__ . '\\Payment\\' . str_replace(' ', '', ucwords(str_replace('_', ' ', $request->payment_option))) . "Controller";
        // if (class_exists($decorator)) {
        //             // print "okw";
        //             return (new $decorator)->pay($r);
        // }
        $prefix = "INV";
        $date = date("YmdHis"); // Get the current date and time in "YmdHis" format
        $randomNumber = mt_rand(1000, 9999); // Generate a random 4-digit number // Generate a unique identifier
        $invoiceNumber = $prefix . $date . $randomNumber;
        $material = explode(',',$r->material);
        $data=[
            'order_code'=>$invoiceNumber,
            'user_id'=>Session::get('id_account'),
            'product_id'=>$r->id_product,
            'material'=>$material[1],
            'total'=>$r->total,
            'payment_status'=>'paid',
            'order_status'=>'Pending'
        ];
        GsystemOrder::insert($data);
        return view('gosford.system.comfirm_order');
    } catch (\Throwable $th) {
        print $th->getMessage();
    }

   }

   function listorder(){
    $data = GsystemOrder::join('products','products.id','gsystem_orders.product_id')->where('gsystem_orders.user_id',Session::get('id_account'))->get();
    return view('gosford.system.orderlist',compact('data'));
   }
}
