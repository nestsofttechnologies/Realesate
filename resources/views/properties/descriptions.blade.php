<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add Property Descriptions</h2>
            </div>
            
        </div>
    </div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
            <strong>Property ID:</strong>
            {!! Form::text('prop_id', null, array('placeholder' => 'Property Description','class' => 'form-control')) !!}
            
        </div>
        <div class="form-group">
            <strong>Property Description:</strong>
            {!! Form::textarea('description', null, array('placeholder' => 'Property Description','class' => 'form-control')) !!}
            
        </div>
        <div class="form-group">
            <strong>Landmark:</strong>
            {{-- {!! Form::select('state_id',[''=>'--- Select District ---']+$states,null,['class'=>'form-control']) !!} --}}
            {!! Form::textarea('landmark', null, array('placeholder' => 'Landmark','class' => 'form-control')) !!}
        </div>
        <div class="form-group">
            <strong>Distance:</strong>
            {!! Form::text('distance', null, array('placeholder' => 'Distance','class' => 'form-control')) !!}
            {{-- {!! Form::select('id',[''=>'--- Select City ---'],null,['class'=>'form-control']) !!} --}}
        </div>
    </div>
    
    {{-- <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
    </div> --}}
</div>

