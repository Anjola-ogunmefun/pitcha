@extends('layouts.app')

@section('nav-bar')
 <div class="container">
          <ul class="navbar-nav mr-auto">
        <li class="nav-item">
             <a class="nav-link" href="{{ route('profile') }}">{{ __('Profile') }}</a>
         </li>
         <li class="nav-item">
              <a class="nav-link" href="{{ route('post') }}">{{ __('Upload photo') }}</a>
        </li>
    </ul>
 </div>
@endsection

@section('content')
<head>
<script src="{{ asset('js/app.js') }}" defer></script>


</head>

@if (session('status'))
             <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

    <form action="{{ route('search') }}" method="GET">
        <div class="input-group mb-3 w-25 p-3 ml-auto">
                <input id="search" type="text" class="form-control" placeholder="search user" name="search" autofocus aria-describedby="search" required/>
                <button class="btn btn-primary" type="submit" id="search">Search</button>
        </div>
        </form>


        <div class="container">
    <div class="col">
            @foreach ($all_posts as $post)
            <div class="row-sm-12">
                <img class="img-fluid" src="{{ $post->image_url }}" alt="new photo" id="image">
                
             <!-- <div class="row-6 d-flex flex-row" id="likes">
             @if ($post->isAuthUserLikedPost()) 
                 <dislike-component :post="{{ $post->id }}" ></dislike-component>
                 @else
                 <like-component :post="{{ $post->id }}"></like-component>    

                 @endif
                </div> -->

            <div class="col-6 d-flex flex-row" id="likes">
            <like-component :post="{{ $post->id }}"></like-component>
            <dislike-component :post="{{ $post->id }}" ></dislike-component>
             </div>

                <div class="row-6 d-flex flex-row" id="below">
                    <img class="img-fluid" src="{{$post->user->profile->image_url}}" >

                    <h5><strong>{{$post->user->first_name}}{{$post->user->last_name}}</strong></h5>
                    
                </div>
                
                <p class="lead"> {{ $post->comment }} </p>

           
        </div>
        @endforeach
    </div>
</div>

@endsection
