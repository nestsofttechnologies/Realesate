<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add Land Facilities</h2>
            </div>
            
        </div>
    </div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
            <strong>Property for:</strong><br/>
            {{-- {!! Form::text('property_for', null, array('placeholder' => 'Property for','class' => 'form-control')) !!} --}}
            {!! Form::radio('feature',null,array( 'class' => 'form-control','name' =>'feature', 'value' => 'Road Facing'))!!}Road Facing  
            {!! Form::radio('feature',null,array( 'class' => 'form-control','name' =>'feature', 'value' => 'Gated Property'))!!}Gated Property    
      
            {{-- {!! Form::radio('feature',null,array( 'class' => 'form-control','name' =>'feature', 'value' => 'Road Facing'{{(old('feature') == 'Gated Property') ?'checked':'' ))}}))!!}Road Facing  
    {!! Form::radio('feature',null,array( 'class' => 'form-control','name' =>'feature', 'value' => 'Road Facing'{{(old('feature') == 'Gated Property') ?'checked':'' ))}}))!!}Road Facing  --}}
     </div>
    </div>
        
        
    
       
     <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>&nbsp;&nbsp;&nbsp;
             <button type="submit" class="btn btn-primary">Send Enquiry</button>
    </div> 
</div>

