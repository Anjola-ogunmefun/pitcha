@extends('layouts.app')

@section('content')

   <img style="height:5%; width:20%;margin-left:70px;position:relative" src="{{ $user_post->image_url }}" alt="new photo">
    <div style="height:auto;width:500px;overflow:auto">
    <div style="border-style:ridge;margin:20px 0px 0px 40px">
     <p style="text-size:10px;margin-left:10px">
     {{( $user_post->comment)}}
     </p>
     </div>
    </div>

@endsection

