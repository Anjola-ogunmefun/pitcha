@extends('layouts.app')

@section('content')

        @if (session('status'))
             <div class="alert alert-success">
                {{ session('status') }}
                <button class="close" data-dismiss="alert">&times;</button>
            </div>
        @endif


        <div class="container">
    <div class="row row-sm-12">
         @forelse($all_posts as $post)
            <div class="col-sm-12">
                <img class="img-fluid" src="{{ $post->image_url }}" alt="uploaded photo" id="image">
     
                <p class="lead">{{ $post->comment }}</p>  
             
                <form action="{{ route('delete',['id'=> $post->id ]) }}" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    @method('DELETE')

                    <button type="button" class="btn btn-danger">{{ __('Delete') }}</button>
  
                </form> 
        </div>
        @empty 
          <p class="lead"> There are no posts available yet! </p>
        @endforelse
    </div>
</div>



 <!-- @forelse($all_posts as $post)

    <div style="display:grid;grid-template-row:1fr 1fr 1fr;grid-gap:5px;">
        <img style="height:50%; width:20%;margin-left:70px;position:relative;" src="{{ $post->image_url }}" alt="new photo">
      <p style="text-size:10px;margin-left:10px">{{ $post->comment }}</p>


     <form action="{{ route('delete',['id'=> $post->id ]) }}" method="POST">
         <input type="hidden" name="_token" value="{{ csrf_token() }}">
         @method('DELETE')

       <button type="submit" class="btn btn-danger" style="vertical-align:middle; margin left:40px">{{ __('Delete') }}</button>
    
        </form>

    </div>
    @empty -->
@endforelse
@endsection
