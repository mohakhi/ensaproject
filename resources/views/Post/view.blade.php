@extends('layouts.app')
@push('style')
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
@endpush
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

          

        <p for="">{{ $post->title}}</p>
        <img src="{{asset('/storage/product/'.$post->path) }}" alt="" title="" width="400" height="400" />
     
        <p for="">{{ $post->description}}</p>
        <p for="">{{ $post->category_id}}</p>

            
            
            <div class="form-group" style="margin-top: 24px;">
              <a href="{{ route('post.list') }}" class="btn btn-success">Back</a>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <form action="{{ route('post.saveComment') }}" method="post" enctype="multipart/form-data">
            @csrf
           
            <div class="form-group">
                <label for="">comment</label>
                <input type="text" class="form-control" name="description"  placeholder="Enter comment">
                <input type="hidden"  name="post_id" value="{{ $post->id}}" >

              </div>

              
            <div class="form-group" style="margin-top: 24px;">
              <input type="submit" class="btn btn-primary" value="Submit">
            </div>

          </form>
         
          

    </div>
</div>

<div class="container">
  list des commantaires
  <div class="row">
    <div>
     
      @foreach($comments as $comm)
      @if ($comm->post_id == $post->id )
        <p>{{$comm->description}}</p>
      
          
      @endif
      
    @endforeach 
    </div>
  </div>
</div>
@endsection