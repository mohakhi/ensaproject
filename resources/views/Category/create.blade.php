@extends('layouts.app')
@push('style')
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
@endpush
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif

         

          <form action="{{ route('category.save') }}" method="post">
            @csrf
            <div class="form-group">
              <label for="">Name</label>
              <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Enter name">
              <font style="color:red"> {{ $errors->has('name') ?  $errors->first('name') : '' }} </font>
            </div>

            
            
            <div class="form-group" style="margin-top: 24px;">
              <input type="submit" class="btn btn-primary" value="Submit">
            </div>

          </form>
        </div>
    </div>
</div>
@endsection
 