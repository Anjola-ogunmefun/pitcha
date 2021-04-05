@extends('layouts.app')

@section('content')

<body class="antialiased">
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
       
            <div class="form-group row">
                            <label for="search" class="col-md-4 col-form-label text-md-right"></label>

                            <div class="col-md-6">
                            <input id="search" type="text" placeholder="search user" class="form-control @error('search') is-invalid @enderror" name="search" value="{{ old('search') }}" autocomplete="search">
                           </div>
            </div>
            <form action="{{ route('search') }}" method="GET">
                <input type="text" name="search" required/>
                <button type="submit">Search</button>
            </form>
    </div>

    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
