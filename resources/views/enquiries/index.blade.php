<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
    {{-- <form method="POST" action="{{ route('enquiries.store') }}">
     {{ csrf_field() }}
        <div class="form-group">
        
            <strong>Description:</strong>
            {!! Form::textarea('description', null, array('placeholder' => 'Property Type','class' => 'form-control')) !!}
        </div> --}}
        {{-- {!! Form::open(array('route' => 'enquiries.store','method'=>'POST')) !!} --}}
         
    
       <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('enquiries.create') }}"> Enquiry</a>
            </div>
           
    {{-- </div> --}}
     {{-- {!! Form::close() !!} --}}
    {{-- </form> --}}
        </div>
        </div>