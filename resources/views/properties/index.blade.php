@extends('layouts.default')
@section('content')
<br/>
<br/>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Properties Details</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('properties.create') }}"> Create New Property</a>
            </div>
        </div>
    </div>
    <br/>
    <br/>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Property Type</th>
            <th>District</th>
            <th>Location</th>
            <th>Property for</th>
            <th>Area / Rent Details</th>
            <th>Facility</th>
            <th>Property Image</th>
            
            
             <th width="280px">Operation</th> 
        </tr>
    @foreach ($properties as $property)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $property->property_type}}</td>
        <td>{{ $property->district}}</td>
        <td>{{ $property->location}}</td>
        <td>{{ $property->property_for}}</td>
        <td>{{ $property->area}}</td>
        <td>{{ $property->facility}}</td>
        {{-- <td>{{ $property->property_image}}</td> --}}
        <td><img width="100" src="../storage/app/uploads/property/{{$property -> property_image}}"   alt = "<?php echo $property -> image ?> "> </td>
        <td>
        
           <a class="btn btn-info" href="{{ route('properties.show',$property->id) }}">More Details</a> 
             <a class="btn btn-primary" href="{{ route('properties.edit',$property->id) }}">Edit</a> 
            
            
              {!! Form::open(['method' => 'DELETE','route' => ['properties.destroy', $property->id],'style'=>'display:inline']) !!} 
     {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}  

       {!! Form::close() !!} 
        </td> 
    </tr>
    @endforeach
    </table>
    <br/>
    <br/>
     <div class="pull-right">
                <a class="btn btn-success" href="{{ url('/contacts') }}"> Contact Details</a>
            </div>
            {{-- {!! Form::open() !!}
         
         @include('properties.contacts.index');
    {!! Form::close() !!} --}}
    {!! $properties->render() !!}
@endsection