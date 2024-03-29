@extends('layouts.default')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New User</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
            </div>
        </div>
    </div>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {!! Form::open(array('route' => 'myCaptcha.post','method'=>'POST'   )) !!}
         @include('users.form')
    {!! Form::close() !!}
     {{-- {!! Form::open(array('route' => 'users.store','method'=>'POST','action'=>'{{ route('myCaptcha.post') }}')) !!}
         @include('users.form')
    {!! Form::close() !!} --}}
@endsection