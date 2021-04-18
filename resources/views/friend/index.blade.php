@extends('layouts.app')

@section('content')
<style>
    .center {
        justify-content: center;
        text-align: center;
    }

    .name{
        font-size: 30px;
        margin-top: 30px;
    }

    img {
        height:30%; 
        width:10%;
        margin-bottom: 30px;
    }
</style>

<body>
<form method="POST" action="{{ route('add') }}" enctype="multipart/form-data">
    @csrf

        @if (session('status'))
             <div class="alert alert-success">
                {{ session('status') }}
                <button class="close" data-dismiss="alert">&times;</button>
            </div>
        @endif

        <div class="container">
            <div class="col center">
                <div class="row-sm-12">
                @forelse ($profiles as $profile)
                <div class="name">
                    <p>{{ $profile->user_name }}</p>
                    <img src="{{ $profile->image_url }}">
                </div>
            @empty 
                
                    <h2 class="name center">No user found</h2>
                   
            @endforelse

                <input type="hidden" name="friend_id" value="{{ $profile->user_id }}">

            @if(auth()->id() !== $profile->user_id)
                <div class="row-md-6">
                <button type="submit" class="btn btn-primary">

                {{ auth()->user()->isFriendsWith($profile->user_id) ? __('Remove friend') : __('Add friend') }}
    
                </button>

                </div>
            </div>
          
      </div>
    @endif
        </div>

    </form>
</body>


@endsection

