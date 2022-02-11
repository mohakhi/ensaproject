@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <table class="table table-striped ">
    <thead>
        <tr>
          <td>ID</td>
          <td>title </td>
          <td>category </td>

          <td>image </td>

          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($posts as $case)
        <tr>
            <td>{{$case->id}}</td>
            <td>{{$case->title}}</td>
            <td>
                {{ $case->category_id }}
            </td>   
            <td><img src="{{asset('/storage/product/'.$case->path) }}" alt="" title="" width="60" height="60" />
           

            </td>

            
            <td>
                <a href="{{ route('post.view',$case->id) }}" class="btn btn-sm btn-outline-danger py-0">View</a>

            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection