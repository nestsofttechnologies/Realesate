<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add Contact Details</h2>
            </div>
            
        </div>
    </div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {!! Form::text('name', null, array('placeholder' => 'Name of the Owner','class' => 'form-control')) !!}
        </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Email ID:</strong>
            
            {!! Form::text('email', null, array('placeholder' => 'Email ID','class' => 'form-control')) !!}
        </div>
        </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Contact ID:</strong>
            
            {!! Form::text('phone_no', null, array('placeholder' => 'Contact Number','class' => 'form-control')) !!}
        </div>
        </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Location:</strong>
            
            {!! Form::text('owner_location', null, array('placeholder' => 'Location','class' => 'form-control')) !!}
        </div>
        </div>
        
    
   
</div>

