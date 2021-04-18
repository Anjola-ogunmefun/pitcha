@extends('layouts.app')

@section('nav-bar')
      <div class="container">
         <li class="nav-item">
              <a class="nav-link" href="{{ route('edit') }}">{{ __('Edit profile') }}</a>
        </li>
    </div>
@endsection
@section('content')

<style>
    @import url("https://fonts.googleapis.com/css?family=Lato:400,400i,700");
    body {
    margin: 0;
    font-family: 'Lato', sans-serif;
    }

    .header {
    min-height: 85vh;
    /* background: #009FFF; */
    /* background: linear-gradient(to right, #ec2F4B, #009FFF); */
    color: black;
    clip-path: ellipse(100vw 60vh at 50% 50%);
    display: flex;
    align-items: center;
    justify-content: center;
    }

    .details {
    text-align: center;
    }

    .profile-pic {
    height: 8rem;
    width: 8rem;
    object-fit: center;
    border-radius: 50%;
    border: 2px solid #fff;
    }

    .location p {
    display: inline-block;
    font-size: 20px;
    }

    .location svg {
    vertical-align: middle;
    }

    .stats {
    display: flex;
    }

    .stats .col-4 {
    width: 10rem;
    text-align: center;
    }

    .heading {
    font-weight: 400;
    font-size: 2rem;
    margin: 1rem 0;
    }

</style>

<body><section class="profile">
  <header class="header">
    <div class="details">
      <img src="{{ (auth()->user()->profile->image_url) }}" alt="John Doe" class="profile-pic">
      <h1 class="heading">{{ (auth()->user()->first_name.' '.auth()->user()->last_name) }}</h1>
      <div class="location">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
  <!-- <path d="M12,11.5A2.5,2.5 0 0,1 9.5,9A2.5,2.5 0 0,1 12,6.5A2.5,2.5 0 0,1 14.5,9A2.5,2.5 0 0,1 12,11.5M12,2A7,7 0 0,0 5,9C5,14.25 12,22 12,22C12,22 19,14.25 19,9A7,7 0 0,0 12 ,2Z"></path> -->
</svg>
        <p> {{ (auth()->user()->email) }}</p>
      </div>
      <div class="stats">
        <div class="col-4">
          <h4> {{ (count(auth()->user()->posts)) }}</h4>
          <p>Posts</p>
        </div>
        <div class="col-4">
          <h4>{{ (count(auth()->user()->friends)) }}</h4>
          <p>Friends</p>
        </div>
        <div class="col-4">
          <h4>100</h4>
          <p>Discussions</p>
        </div>
      </div>
        <div class="details">
            <hr>
            <br>
        <p> {{ (auth()->user()->profile->description) }}</p>
        </div>

    </div>
  </header>
</section>
</body>

@endsection
