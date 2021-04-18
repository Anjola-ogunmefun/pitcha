@extends('layouts.app')

@section('nav-bar')
      <div class="container">
         <li class="nav-item">
              <a class="nav-link" href="{{ route('show') }}">{{ __('All photos') }}</a>
        </li>
    </div>
@endsection
@section('content')
@if (session('status'))
             <div class="alert alert-success">
                {{ session('status') }}
                <button class="close" data-dismiss="alert">&times;</button>
            </div>
            
        @endif
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="POST" action="{{ route('create') }}" enctype="multipart/form-data">
                     <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="card">
                        <div class="card-header">
                            <p class="antialiased"><strong>Upload Photo</strong></p>
                        </div>

                        <div class="card-body">
                            <div class="input-group mb-3 row ">
                                <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image_url" accept="image/*" required/>       
                            </div>
                        </div>
                
                        <div class="input-group mb-3 row" id="comment">
                             <input  type="text" placeholder="comment" class="form-control @error('comment') is-invalid @enderror" name="comment" value="{{ $user_post->comment ?? null }}" autofocus>
                        </div>

                        <div class="d-grid d-md-flex justify-content-center ">
                             <button type="submit" class="btn btn-primary">Add Photo</button>
                        </div>
                 </div>

                </form>
            </div>
        </div>
    </div>
</body>


@endsection

