@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="container">
  <div class="row">

  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <table class="table table-striped">
    <thead>
        <tr class="title-table">
          <td>ID</td>
          <td>category name </td>
          
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($Categories as $case)
        <tr>
            <td>{{$case->id}}</td>
            <td>{{$case->name}}</td>
            
            <td><a href="" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
</div>

</div>
@endsection