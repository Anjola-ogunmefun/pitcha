@extends('layouts.app')

@section('content')

        @if (session('status'))
             <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
    @forelse($friends as $friend)

      <p style="text-size:10px;margin-left:10px">
      Your friend id; {{($friend->friend_id)}}
      </p>
    </div>
    @empty
    <p>You have no friends yet</p>
@endforelse






@endsection
