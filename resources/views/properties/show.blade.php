@extends('layouts.default')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                 <h2> More Details About Property</h2>
                 </div>
                 <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('properties.index') }}"> Back</a>
                </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Property Type:</strong>
                {{ $property->property_type}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>District:</strong>
                {{ $property->district}}
            </div>
        </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Location:</strong>
                {{ $property->location}}
            </div>
        </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Property for:</strong>
                {{ $property->property_for}}
            </div>
        </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Area/Rent Details:</strong>
                {{ $property->area}}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Image:</strong>
                <img width="100" src="../../storage/app/uploads/property/{{$property -> property_image}}"   alt = "<?php echo $property -> image ?> ">
            </div>
        </div>

        {{-- <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Property Description:</strong>
                {{ $description->description}}
            </div>
        </div> --}}
         
        
    </div>
     {!! Form::open() !!}
      @include('enquiries.index');
    {!! Form::close() !!}
    {{-- <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Enquiry</button>
    </div> --}}
@endsection