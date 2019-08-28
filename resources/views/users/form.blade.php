<html>
<head>
    <title>How to create captcha code in Laravel 5?</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" >
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</head>
<body>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>First Name:</strong>
            {!! Form::text('first_name', null, array('placeholder' => 'First Name','class' => 'form-control')) !!}
        </div>
        <div class="form-group">
            <strong>Last Name:</strong>
            {!! Form::text('last_name', null, array('placeholder' => 'Last Name','class' => 'form-control')) !!}
        </div>
        <div class="form-group">
            <strong>Email:</strong>
            {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
        </div>
        <div class="form-group">
            <strong>Contact Number:</strong>
            {!! Form::text('phone_no', null, array('placeholder' => 'Contcat Number','class' => 'form-control')) !!}
        </div>
        <div class="form-group">
            <strong>Password:</strong><br/>
            {!! Form::password('password', null, array('placeholder' => 'Password','class' => 'form-control')) !!}
        </div>
        
    </div>



<div class="form-group{{ $errors->has('captcha') ? ' has-error' : '' }}">
                      <label for="password" class="col-md-4 control-label">Captcha</label>
                          <div class="col-md-6">
                          <div class="captcha">
                          <span>{!! captcha_img() !!}</span>
                          <button type="button" class="btn btn-success btn-refresh"><i class="fa fa-refresh"></i></button>
                          </div>
                          <input id="captcha" type="text" class="form-control" placeholder="Enter Captcha" name="captcha">
                            @if ($errors->has('captcha'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('captcha') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>

 
{{-- <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="col-md-6"> 
                                <input type="password" class="form-control" name="password_confirmation">
                             </div> 

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> --}}
                         {{-- <div class="userInfo row">
    	
    	 <div class="information">
			<h3>Your mobile number ******{{$users['phone_no'] }} is 
				<span id="isVerified">
					@if ( $users['isVerified'] === 0) not Verified. @else Verified. @endif
				</span>
			</h3>
		</div>

		<div id="otpSection" class="otpSection">

			<input type="hidden" name="_token" id="_token" ng-model="_token" value="{{ csrf_token() }}">

			<div id="sendOtpSection" class="sendOtpSection" 
				style="display:@if ( $users['isVerified'] === 0) block @else none @endif" >
				<button class="btn btn-primary sendOtp" id="sendOtp" ng-click="sendOTP({{$users['id']}})">Send OTP</button>
			</div>

			<div id="verifyOtpSection" class="verifyOtpSection" style="display:none">
				<input type="number" class="form-control" id="otp" placeholder="Enter OTP" ng-model="enteredOtp">
				<br/>
				<button class="btn btn-primary verifyOtp" id="verifyOtp" ng-click="verifyOTP()">Verify OTP</button>
			</div>
		</div>
        </div>
  --}}

    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>


 {{-- <div id="otpdiv">
    <div class="form-group">
      <label for="emotpail">OTP:</label>
      <input type="otp" class="form-control" id="otp" placeholder="Enter OTP" name="otp">
    </div>
    <button id="otpSubmit" class="btn btn-primary">Submit</button>
</div>       --}}
   

<script type="text/javascript">


$(".btn-refresh").click(function(){
  $.ajax({
     type:'GET',
     url:'/refresh_captcha',
     success:function(data){
        $(".captcha span").html(data.captcha);
     }
  });
});


</script>
{{-- <script type="text/javascript">
        'use strict';
        const BASE_URL = '{!! url().'/' !!}';
    </script>

    <script src = "{{ asset('/js/angular.min.js') }}"></script>
    <script src = "{{ asset('/js/home.js') }}"></script> --}}
{{-- <script src="js/generateOTP.js"></script> --}}
</body>
</html>