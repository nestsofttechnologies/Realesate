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
                <strong>ID:</strong>
                {{ $property->id}}
            </div>
        </div>
        
@endsection