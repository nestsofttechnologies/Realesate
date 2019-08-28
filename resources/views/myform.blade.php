<!DOCTYPE html>
<html>
<head>
	<title>Laravel 5 - onChange event using ajax dropdown list</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
</head>
<body>


<div class="container">
  <h1>District</h1>


  {!! Form::open() !!}


    <div class="form-group">
      <label>Select District:</label>
      {!! Form::select('state_id',[''=>'--- Select District ---']+$states,null,['class'=>'form-control']) !!}
    </div>


    <div class="form-group">
      <label>Select City:</label>
      {!! Form::select('id',[''=>'--- Select City ---'],null,['class'=>'form-control']) !!}
    </div>


    <div class="form-group">
      <button class="btn btn-success" type="submit">Submit</button>
    </div>


  {!! Form::close() !!}


</div>


<script type="text/javascript">
  $("select[name='state_id']").change(function(){
      var state_id = $(this).val();
      var token = $("input[name='_token']").val();
      $.ajax({
          url: "<?php echo route('select-ajax') ?>",
          method: 'POST',
          data: {state_id:state_id, _token:token},
          success: function(data) {
            $("select[name='id'").html('');
            $("select[name='id'").html(data.options);
          }
      });
  });

 
</script>


</body>
</html>