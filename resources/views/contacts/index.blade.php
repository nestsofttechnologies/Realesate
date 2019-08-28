@extends('layouts.default')
@section('content')
<br/>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Contacts</h2>
            </div>
            <br/>
            
            <div class="pull-right">
                {{-- <a class="btn btn-success" href="{{ route('clients.create') }}"> Create New Client</a> --}}
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
            <th>Name</th>
            <th>Email</th>
            <th>Phone Number</th>
            
            {{-- <th width="280px">Operation</th> --}}
        </tr>
    @foreach ($contacts as $contact)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $contact->name}}</td>
        <td>{{ $contact->email}}</td>
        <td>{{ $contact->phone_no}}</td>
        
        
    </tr>
    @endforeach
    </table>
    <br/>
    <br/>
    
    {!! $contacts->render() !!}
@endsection