<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use Auth;
use App\User;
use App\MSG91;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::latest()->paginate(10);
        return view('users.index',compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    // protected function create(array $data)
    // {

    //     $user = User::create([
    //         'name' => $data['name'],
    //         'email' => $data['email'],
    //         'password' => bcrypt($data['password']),
    //     ]);

    //     $verifyUser = VerifyUser::create([
    //         'user_id' => $user->id,
    //         'token' => str_random(40)
    //     ]);

    //     Mail::to($user->email)->send(new VerifyMail($user));

    //     return $user;
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        User::create($request->all());
        return redirect()->route('users.index')
                        ->with('success','user created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        
        return view('users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function myCaptchaPost(Request $request)
    {
        request()->validate([
            'email' => 'required|email',
            'password' => 'required',
            'captcha' => 'required|captcha'
        ],
        ['captcha.captcha'=>'Invalid captcha code.']);
        User::create($request->all());
        return redirect()->route('users.index')
                        ->with('success','user created successfully');
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

    // public function generateOTP(){
    //     $otp = mt_rand(1000,9999);
    //     return $otp;
    // }

/**Email Verification */

public function verifyUser($token)
    {
        $verifyUser = VerifyUser::where('token', $token)->first();
        if(isset($verifyUser) ){
            $user = $verifyUser->user;
            if(!$user->verified) {
                $verifyUser->user->verified = 1;
                $verifyUser->user->save();
                $status = "Your e-mail is verified. You can now login.";
            }else{
                $status = "Your e-mail is already verified. You can now login.";
            }
        }else{
            return redirect('/login')->with('warning', "Sorry your email cannot be identified.");
        }

        return redirect('/login')->with('status', $status);
    }

    /**OTP Verification */
    public function home(Request $request){
		
		if (Auth::user() != null){

			//Getting User information.
			$users = User::where('id', Auth::user()->id)->first();
			$users['phone_no'] = substr($users['phone_no'], -4);

			return view("users.form",compact('users'));			
		}else{
			return redirect('/');
		}		
    }
    public function sendOtp(Request $request){

		$response = array();
		$userId = Auth::user()->id;

		$users = User::where('id', $userId)->first();

		if ( isset($users['mobile']) && $users['mobile'] =="" ) {
			$response['error'] = 1; 
			$response['message'] = 'Invalid mobile number';
			$response['loggedIn'] = 1;
		} else {
			$otp = rand(100000, 999999);
			$MSG91 = new MSG91();

			$msg91Response = $MSG91->sendSMS($otp,$users['mobile']);
				
			if($msg91Response['error']){
				$response['error'] = 1;
				$response['message'] = $msg91Response['message'];
				$response['loggedIn'] = 1;
			}else{
				
				Session::put('OTP', $otp);

				$response['error'] = 0;
				$response['message'] = 'Your OTP is created.';
				$response['OTP'] = $otp;
				$response['loggedIn'] = 1; 
			}
		}
		echo json_encode($response);
	}

	/**
	* Function to verify OTP.
	*
	* @return Response
	*/
	public function verifyOtp(Request $request){

		$response = array();

		$enteredOtp = $request->input('otp');
		$userId = Auth::user()->id;  //Getting UserID.

		if($userId == "" || $userId == null){
			$response['error'] = 1;
			$response['message'] = 'You are logged out, Login again.';
			$response['loggedIn'] = 0;
		}else{
			$OTP = $request->session()->get('OTP');
			if($OTP === $enteredOtp){

				// Updating user's status "isVerified" as 1.

				User::where('id', $userId)->update(['isVerified' => 1]);

				//Removing Session variable
				Session::forget('OTP');

				$response['error'] = 0;
				$response['isVerified'] = 1;
				$response['loggedIn'] = 1;				
				$response['message'] = "Your Number is Verified.";				
			}else{
				$response['error'] = 1;
				$response['isVerified'] = 0;
				$response['loggedIn'] = 1;				
				$response['message'] = "OTP does not match.";	
			}
		}
		echo json_encode($response);
    }
    
}