<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Property Type:</strong>
            {!! Form::text('property_type', null, array('placeholder' => 'Property Type','class' => 'form-control')) !!}
        </div>
        <div class="form-group">
            <strong>District:</strong>
            {{-- {!! Form::select('state_id',[''=>'--- Select District ---']+$states,null,['class'=>'form-control']) !!} --}}
            {!! Form::text('district', null, array('placeholder' => 'District','class' => 'form-control')) !!}
        </div>
        <div class="form-group">
            <strong>Location:</strong>
            {!! Form::text('location', null, array('placeholder' => 'Location','class' => 'form-control')) !!}
            {{-- {!! Form::select('id',[''=>'--- Select City ---'],null,['class'=>'form-control']) !!} --}}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
            <strong>Property for:</strong><br/>
            {!! Form::radio('property_for',null,array('name' =>'property_for', 'value' => 'Sale', 'class' => 'form-control'))!!}Sale  
            {!! Form::radio('property_for',null,array('name' =>'property_for', 'value' => 'Rent', 'class' => 'form-control'))!!}Rent     
            
        </div>
    </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Area/Rent Details:</strong>
            {!! Form::text('area', null, array('placeholder' => 'Area/Rent Details','class' => 'form-control')) !!}
        </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Facilities/Features:</strong>
            {{
                 Form::select('facility',
                [ ''=>'',
                  'Flat' => 'Flat',
                  'House/Villa' => 'House/Villa',
                  'Guest Room' => 'Guest Room',
                  'Resort' => 'Resort',
                  'Land' => 'Land',
                ], null,['class' => 'form-control'])}}
                
         </div>
    </div>   
        <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Property Image:</strong>
            {!! Form::file('property_image', null, array('placeholder' => 'District','class' => 'form-control')) !!}
        </div>
    </div>
    {{-- <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
    </div> --}}
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