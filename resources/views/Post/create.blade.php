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

         

          <form action="{{ route('post.save') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="">title</label>
              <input type="text" class="form-control" name="title" value="{{ old('title') }}" placeholder="Enter title">
              <font style="color:red"> {{ $errors->has('title') ?  $errors->first('title') : '' }} </font>
            </div>
            <div class="form-group">
                <label for="">description</label>
                <textarea  class="form-control" name="description" value="{{ old('description') }}" placeholder="Enter description"></textarea>
                <font style="color:red"> {{ $errors->has('description') ?  $errors->first('description') : '' }} </font>
            </div>

            <div class="form-group">
                <select name="category_id" class="form-control">
                    @foreach($categories as $category)
                        <option value="{{$category->id }}">{{$category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <input type="file" name="file" required>
            </div>
           
            
            
            <div class="form-group" style="margin-top: 24px;">
              <input type="submit" class="btn btn-primary" value="Submit">
            </div>

          </form>
        </div>
    </div>
</div>
@endsection
 