@extends('layouts.app')

@section('content')

        @if (session('status'))
             <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
    @forelse($all_posts as $post)

        <div style="display:grid;grid-template-row:1fr 1fr 1fr;grid-gap:5px;">
        <img style="height:50%; width:20%;margin-left:70px;position:relative;" src="{{ $post->image_url }}" alt="new photo">
      <p style="text-size:10px;margin-left:10px">
      {{ $post->comment }}
      </p>
    <form action="{{ route('delete',['id'=> $post->id ]) }}" method="POST">
    @method('DELETE')
    @csrf
    <button type="submit" class="" style="vertical-align:middle; margin left:40px">{{ __('Delete') }}</button>
    
    </form>

    </div>
    @empty
    <p>there are no posts available yet</p>
@endforelse






@endsection
