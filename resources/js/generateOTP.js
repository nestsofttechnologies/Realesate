$(function(){
    $("#submitForm").click(function(){
        var name=$("#name").val();
        var mobile= $("#mobile").val();
        var email = $("#email").val();
        var token = $("#csrf").val();
       $.ajax({
        url:'/submitForm',
        type:'POST',
        data:{
            _token:token,
            name:name,
            mobile:mobile,
            email:email},
        success:function(result){
            var result = JSON.parse(result);
            // alert(result);
            if(result.statusCode == 200){
                    $("#formdiv").removeClass('show');
                    $("#formdiv").addClass('hide');
                    $("#otpdiv").removeClass('hide'); 
                    $("#otpdiv").addClass('show'); 
                    }
            else{
                alert("something wrong... please try later");
            }
        }
       })
    })

    $("#otpSubmit").click(function(){
        var otp = $("#otp").val();
        otp = otp.trim();
        var token = $("#csrf").val();
        console.log("---",otp);
        $.ajax({
            type:"post",
            url:'/submitotp',
            data:{
                _token:token,
                otp:otp
            },
            success:function(otpResult){
                otpResult = JSON.parse(otpResult);
                if(otpResult.statusCode == 200){
                    location.replace("/showresult");
                }
                else{
                    alert("otp not match. Please try again");
                }
            }
        })
    })
})