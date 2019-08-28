<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add Facilities</h2>
            </div>
            
        </div>
    </div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
             {{ Form::select('facility_name',
                [ ''=>'',
                  'Flat' => 'Flat',
                  'House/Villa' => 'House/Villa',
                  'Guest Room' => 'Guest Room',
                  'Resort' => 'Resort',
                  

                ], null,['class' => 'form-control'])}}
        </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Bedroom:</strong>
            
            {!! Form::number('bedroom', null, array('placeholder' => 'Number of Bedrooms','class' => 'form-control')) !!}
        </div>
        </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Bathroom:</strong>
            
            {!! Form::number('bathroom', null, array('placeholder' => 'Number of Bathrooms','class' => 'form-control')) !!}
        </div>
        </div>
        
    <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
            <strong>Furnished Status:</strong><br/>
            {{-- {!! Form::text('property_for', null, array('placeholder' => 'Property for','class' => 'form-control')) !!} --}}
            {!! Form::radio('furnished',null,array('name' =>'for', 'value' => 'Furnished', 'class' => 'form-control'))!!}Furnished 
            {!! Form::radio('furnished',null,array('name' =>'for', 'value' => 'Semi Furnished', 'class' => 'form-control'))!!}Semi Furnished   
            {!! Form::radio('furnished',null,array('name' =>'for', 'value' => 'UnFurnished', 'class' => 'form-control'))!!}UnFurnished      
        </div>
    </div>
       
    {{-- <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
    </div> --}}
</div>

