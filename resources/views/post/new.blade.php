@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-4">
            <img src="{{ $user_post->image_url }}" alt="new photo">
        </div>
        <p style="text-size:10px;margin-left:10px">
     {{( $user_post->comment)}}
     </p>
    </div>

</div>




    <div style="height:auto;width:500px;overflow:auto">
    <div style="border-style:ridge;margin:20px 0px 0px 40px">
     <p style="text-size:10px;margin-left:10px">
     {{( $user_post->comment)}}
     </p>
     </div>
    </div>

@endsection

