<?php

namespace App\Http\Controllers\gosford;
use App\Http\Controllers\Controller;
use App\Models\Patterndesign;
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
use App\Models\GenericLeather;
use Session;
use Barryvdh\DomPDF\Facade\Pdf;
use Faker\Provider\Uuid;
use DB;
use  App\Models\GsystemAccount;
use App\Models\GsystemOrder;
use App\Models\Twotown;
use App\Models\TypeCar;
use App\Models\Piping;
use App\Models\TypeLeather;

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
   public function forgotpass(){
    return view('gosford.frontend.forgotpass');
   }

   public function resetpass(Request $r){
    $c = GsystemAccount::where('email',$r->email)->count();
    if($c == 0){
     return back()->with('danger','Email Account not available');
    }else{
     $kode = Str::uuid()->toString();
     $data = [
         'reset_code'=>$kode
     ];
     $act = GsystemAccount::where('email',$r->email)->update($data);
     $array['subject'] = translate('Forgot Password');
     $array['from'] = env('MAIL_FROM_ADDRESS');
     $array['content']="for update password click the link below";
     $array['link'] = env('URL_WEB').'g_system/ft_account/recoverypassword?kode='.base64_encode($kode);


     Mail::to($r->email)->queue(new SecondEmailVerifyMailManager($array));
     return back()->with('success','Password recovery link sent to email. please check your email');
    }
   }

   function confircoderecovery(Request $r){
    $shsxgsd = base64_decode($r->kode);
    $check= GsystemAccount::where('reset_code',$shsxgsd)->where('reset_code','!=','')->where('reset_code','!=',null)->count();
    if($check > 0){
        return view('gosford.frontend.confirpass',compact('shsxgsd'));
    }else{
        return redirect('/')->with('wrongrecovery','Code Recovery is not found !');
    }

   }

   public function confirpassword(Request $r){
    $r->validate([
        'shsxgsd'=>'required',
        'password_confirmation'=>'required',
        'password' => 'required|confirmed',
    ]);
    try {
        GsystemAccount::where('reset_code',$r->shsxgsd)->update(['password'=>Hash::make($r->password),'reset_code'=>'']);
        return redirect('/')->with('changepassdone','Your password has been changed. please log back in');
    } catch (\Throwable $th) {
        return back()->with('danger',$th->getmessage());
    }
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
                return redirect()->url('mypage');
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
                    return redirect('mypage');
                }

            } else {
                // The hashed value does not match the plain text
                return back()->with('wrongpassword','Your password is wrong. make sure you enter the correct password');
            }
        }else{
            return back()->with('wrongpassword','Account not found !');
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

   function profilupdate(Request $r){
    $r->validate([
        'full_name'=>'required',
        'email' => 'required',
        'contact_number'=>'required',
        'address'=>'required',
    ]);
    try {
        $data=[
            'contact_number'=>$r->contact_number,
            'email'=>$r->email,
            'full_name'=>$r->full_name,
            'address'=>$r->address,
        ];
        GsystemAccount::where('id',Session::get('id_account'))->update($data);
        return back()->with('success','Profile updated successfully');
    } catch (\Throwable $th) {
        return back()->with('danger',$th->getMessage());
    }
   }

   function updatepass(Request $r){
    $r->validate([
        'oldpassword'=>'required',
        'newpassword' => 'required',
        'confirmpassword'=>'required|same:newpassword',
    ]);
    try {
        $acc = GsystemAccount::where('id',Session::get('id_account'))->first();
        if (Hash::check($r->oldpassword, $acc->password)) {
            $data=[
                'password'=>Hash::make($r->newpassword),
            ];
            GsystemAccount::where('id',Session::get('id_account'))->update($data);
            return back()->with('success','Password updated successfully');
       }else{
            return back()->with('danger','old password does not match');
       }
    } catch (\Throwable $th) {
        return back()->with('danger',$th->getMessage());
    }
   }

   function uploadimage(Request $request){
    $request->validate([
        'image' => 'required|image|mimes:jpeg,png,jpg,gif', // Adjust max size as needed
    ]);
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $account = GsystemAccount::where('id',Session::get('id_account'))->first();
        if ($account->image) {
            $oldImagePath = public_path('users') . '/' . $account->image;
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }

        $data=[
            'image'=>$imageName
        ];
        try {
            GsystemAccount::where('id',Session::get('id_account'))->update($data);
            $image->move(public_path('users'), $imageName);
        } catch (\Throwable $th) {
            //throw $th;
        }
        return response()->json(['message' => 'Image uploaded successfully']);
    }
    return response()->json(['message' => 'No image provided'], 400);
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
    $car   = Car::where('make',$r->carmake)->where('cars.name',$model)->where('year',$r->year)->join('products','products.car_id','cars.id')->get();
    $model = Car::where('name',$model)->first();
    return view('gosford.frontend.product.choice_design',compact('car','year','model','carmake'));
    // print $model.'<br>'.$carmake.'<br>'.$year;
    // print json_encode($car);
   }

   //Two TownColor
   function twotowncolor(Request $r){
        $data = Twotown::orderby('name_town','asc')->paginate(12);
        return view('gosford.frontend.twotowncolor.index',compact('data'));
   }

   function twotowncolordetail($id){
    $data = Twotown::where('id',base64_decode($id))->first();
    $color1 =explode(',',$data->color_1);
    $color2 = explode(',',$data->color_2);
    return view('gosford.frontend.twotowncolor.detail',compact('data','color1','color2'));

   }

   function embrodery(Request $r){
    return view('gosford.frontend.embrodery.index');
   }

   function embroderydetail(Request $r){
    return view('gosford.frontend.embrodery.detail');
   }

   function piping(Request $r){
    $data = Piping::where('published','Y')->orderby('name_piping','asc')->paginate(12);
    return view('gosford.frontend.piping.index',compact('data'));
   }

   function pipingdetail($id){
    $data = Piping::where('published','Y')->where('id',base64_decode($id))->first();
    return view('gosford.frontend.piping.detail',compact('data'));
   }

   //Pattern Design
   function patterndesign(Request $r){
    $data = Patterndesign::where('published','Y')->orderByRaw('CAST(SUBSTRING(name_pattern, 8) AS UNSIGNED)')->paginate(12);
    return view('gosford.frontend.pattern.index',compact('data'));
   }

   function detailpattern($id){
    $data = Patterndesign::where('id',base64_decode($id))->where('published','Y')->first();
    return view('gosford.frontend.pattern.detail',compact('data'));
   }

   //emblem
   function emblem(Request $r){
    return view('gosford.frontend.emblem.index');
   }
   function emblemdetail(Request $r){
    return view('gosford.frontend.emblem.detail');
   }


   function orderleather(Request $r){
        $data = [
            'id_leather'=>$r->id_leather,
            'name'=>$r->name,
            'contact'=>$r->contact,
            'email'=>$r->email,
            'car_make'=>$r->car_make,
            'car_model'=>$r->car_model,
            'year'=>$r->year,
        ];
        try {
            DB::table('order_leather')->insert($data);
            return view('gosford.frontend.comfirm_order');
        } catch (\Throwable $th) {

        }
   }


   //Detail Product

   function detailproduct(Request $r){
    return view('gosford.frontend.product.detail_product');
   }

   function fetchpriceseat(Request $request){
    $vehicleType = $request->input('vehicle_type');
    $application = $request->input('application');
    $leatherType = $request->input('leather_type');
    $row = $request->input('row');

    // Lakukan query ke database untuk mendapatkan harga
    $price = DB::table('price_seat')->where('vehicle_type', $vehicleType)
        ->where('application', $application)
        ->where('leather_type', $leatherType)
        ->where('row', $row)
        ->value('price'); // Mengambil nilai harga

    // Kirimkan harga sebagai respons
    return response()->json(['price' => $price]);
   }

   function detailproductoptionmake(Request $r){
    if(!empty($r->id)){
        $leather = GenericLeather::where('id',$r->id)->first();
        $brand   = Brand::all();
        $aplication     =  TypeLeather::orderBy('shortby','asc')->get();
        $typeleather    =  DB::table('leather_type')->orderBy('id','asc')->get();
        $vehicle        =  DB::table('size_seat')->orderBy('id','asc')->get();
        // $size           =  DB::table('size_seat')->orderBy('id','asc')->get();
        return view('gosford.frontend.product.detail_product_selectmake',compact('vehicle','brand','leather','aplication','typeleather'));
    }else{
        return back()->with('danger','You must select the leather');
    }

   }

   function getmodelfrommake($make=null){
    $carModels = array();
    $carModels = Car::where('make', $make)->groupBy('name')->get(['id', 'name']);
    return response()->json($carModels);
   }
   function getyearfrommodel($model=null){
    $carModels = array();
    $carModels = Car::where('name', $model)->groupBy('year')->orderBy('year','desc')->get(['year']);
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
    // if(Session::get('gystem_login')){
    //     try {
    //         // $decorator = __NAMESPACE__ . '\\Payment\\' . str_replace(' ', '', ucwords(str_replace('_', ' ', $request->payment_option))) . "Controller";
    //         // if (class_exists($decorator)) {
    //         //             // print "okw";
    //         //             return (new $decorator)->pay($r);
    //         // }
    //         $prefix = "INV";
    //         $date = date("YmdHis"); // Get the current date and time in "YmdHis" format
    //         $randomNumber = mt_rand(1000, 9999); // Generate a random 4-digit number // Generate a unique identifier
    //         $invoiceNumber = $prefix . $date . $randomNumber;
    //         $material = explode(',',$r->material);
    //         $data=[
    //             'order_code'=>$invoiceNumber,
    //             'user_id'=>Session::get('id_account'),
    //             'product_id'=>$r->id_product,
    //             'material'=>$material[1],
    //             'total'=>$r->total,
    //             'payment_status'=>'paid',
    //             'order_status'=>'Pending'
    //         ];
            // GsystemOrder::insert($data);
            return view('gosford.frontend.comfirm_order');
    //     } catch (\Throwable $th) {
    //         print $th->getMessage();
    //     }
    // }else{
    //     print "test";
    // }


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
    $profil = GsystemAccount::where('id',Session::get('id_account'))->first();
    $data = GsystemOrder::join('products','products.id','gsystem_orders.product_id')->where('gsystem_orders.user_id',Session::get('id_account'))->get();
    return view('gosford.system.orderlist',compact('data','profil'));
   }

   function finishdesign(Request $r){

            return view('gosford.frontend.finishdesign');



   }
}
