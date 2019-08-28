@extends('layouts.default')
@section('content')
<br/>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Clients Details</h2>
            </div>
            <br/>
            
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('clients.create') }}"> Create New Client</a>&nbsp;&nbsp;
                <a class="btn btn-success" href="{{ url('my-captcha') }}"> Login</a>
            </div>
        </div>
    </div>
    <br/>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Phone Number</th>
            
            {{-- <th width="280px">Operation</th> --}}
        </tr>
    @foreach ($clients as $client)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $client->first_name}}</td>
        <td>{{ $client->last_name}}</td>
        <td>{{ $client->email}}</td>
        <td>{{ $client->phone_no}}</td>
        
        
    </tr>
    @endforeach
    </table>
    <br/>
    <br/>
    
    {!! $clients->render() !!}
@endsection