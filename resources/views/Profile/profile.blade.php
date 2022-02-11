@extends('layouts.app')
@push('style')
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
@endpush
@section('content')
<p>
  @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
    @auth
    Welcome  {{ Auth::user()->name}}

    @endauth</p>
<div class="container">
    <div class="row justify-content-left">
        
       <ul>
          <li><a href="{{ route('post.list') }}" class="">list post </a></li> 
          <li><a href="{{ route('post.add') }}" class="">create a post </a></li> 
          <li><a href="{{ route('category.list') }}" class="">list category </a> </li> 
          <li><a href="{{ route('category.add') }}" class="">create a category </a></li> 
          <li class="su-menu" > List chart
            <a href="/google-bar-chart" class="" style="li.su-menu a{ display:block }"> +chart category/date </a>  
          <a href="/google-bar-chart-post" class="">+chart post/user par date  </a> </li> 

        </ul> 

    </div>
</div>
@endsection