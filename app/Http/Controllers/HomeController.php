<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;
use Auth;
use App\properties;
use App\facilities;
use App\User;
use App\clients;
use DB;

class HomeController extends Controller
{


    use AuthenticatesUsers;


    protected $redirectTo = '/home';

//     public function __construct()
// {
//    $this->middleware('auth');
// }

    public function mySearch(Request $request)
    {
    	if($request->has('search')){
    		$properties = properties::search($request->get('search'))->get();	
    	}else{
    		$properties = properties::get();
    	}


    	return view('my-search', compact('properties'));
    }

    public function facilitySearch(Request $request)
    {
    	if($request->has('search')){
            $properties = properties::search($request->get('search'))->get();
            $facilities = facilities::search($request->get('search'))->get();
                        
            // $properties = properties::min($request->get('search'))->get();	
            // $properties = properties::max($request->get('search'))->get();
            // $properties = DB::table('properties')->min('area');
            // $minprice = DB::table('properties')->select('*')->min('area');
      
            // $maxprice =  DB::table('properties')->select('*')->max('area');
        }
        else{
            $properties = properties::get();
            $facilities = facilities::get();
    	}
    	return view('facility-search', compact('properties','facilities'));
    }



    public function myCaptchaOne()
    {
        return view('myCaptchaOne');
    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function myCaptchaLoginPost(Request $request)
    {
        request()->validate([
            'email' => 'required|email',
            'password' => 'required',
            'captcha' => 'required|captcha'
        ],
        ['captcha.captcha'=>'Invalid captcha code.']);
         //dd("You are here :) .");
        $email = $request -> Input('email');
        $password = $request -> Input('password');
       if(Auth::attempt(['email'=>'$email','password'=>'$password']))
       {
        //User::create($request->all());
        return redirect()->route('properties.index')
                        ->with('success','You are logged In');
       }
       else{
           return redirect('my-captcha')->with('Error','Invalid User ID and Password');
       }
    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function refreshCaptcha()
    {
        return response()->json(['captcha'=> captcha_img()]);
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    // /**
    //  * Show the application dashboard.
    //  *
    //  * @return \Illuminate\Contracts\Support\Renderable
    //  */
    public function index()
    {
        return view('home');
    }
}
