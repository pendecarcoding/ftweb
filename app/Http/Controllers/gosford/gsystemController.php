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
use Session;
use Barryvdh\DomPDF\Facade\Pdf;
use Faker\Provider\Uuid;
use DB;

class gsystemController extends Controller
{
   public function search(){
    return view('gosford.login');
   }

}
