@extends('layouts.app')


@section('content')
    
 <h3 style="text-align:right!important; margin-right:40px;margin-top:20px" > Hello {{ ($name = auth()->user()->first_name) }}</h3>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <!-- <div class="card-header">{{ __('Edit Profile') }}</div> -->

                <div class="card-body">
                    <form method="POST" action="{{ route('update') }}" enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="PUT">
                     <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <!-- @csrf
                        @method('PUT') -->
                        <div class="form-group row">
                            <label for="user_name" class="col-md-4 col-form-label text-md-right">{{ __('User Name') }}</label>
                            <div class="col-md-6">
                                <input id="user_name" type="text" class="form-control @error('user_name') is-invalid @enderror" name="user_name" value="{{ old('user_name') ?? $profile->user_name }}" autocomplete="user_name" autofocus>

                                @error('user_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone_number" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

                            <div class="col-md-6">
                                <input id="phone_number" type="tel" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') ?? $profile->phone_number }}" autocomplete="phone_number">

                                @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>

                                    <div class="col-md-6">
                                        <select class="form-control" id="gender" name="gender" value="{{ old('gender') }}"autofocus>
                                            <option value="Male">Male</option>        
                                            <option value="Female">Female</option>        
                                            <option value="Others">Others</option>        
                                            <option value="" disabled selected>Select</option>        
                                        </select>
                                    </div>

                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') ?? $profile->description }}"  autocomplete="description">

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="D_O_B" class="col-md-4 col-form-label text-md-right">{{ __('Date Of Birth') }}</label>

                            <div class="col-md-6">
                            <input id="D_O_B" type="date" class="form-control @error('D_O_B') is-invalid @enderror" name="D_O_B" value="{{ old('D_O_B') }}"autocomplete="D_O_B">

                                @error('D_O_B')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="occupation" class="col-md-4 col-form-label text-md-right">{{ __('Occupation') }}</label>

                            <div class="col-md-6">
                            <input id="occupation" type="text" class="form-control @error('occupation') is-invalid @enderror" name="occupation" value="{{ old('occupation')?? $profile->occupation }}" autocomplete="occupation">

                                @error('occupation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nationality" class="col-md-4 col-form-label text-md-right">{{ __('Nationality') }}</label>

                            <div class="col-md-6">
                            <input id="nationality" type="text" class="form-control @error('nationality') is-invalid @enderror" name="nationality" value="{{ old('nationalty') ?? $profile->nationality  }}" autocomplete="nationality">

                                @error('nationality')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- <div class="input-group mb-3">
                            <input type="file" class="form-control" id="inputGroupFile02">
                        </div> -->

                        <div class="form-group">
                            <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image_url" accept="image/*">
                         </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">

                        <button type="submit" class="btn btn-primary" style="vertical-align:middle" >{{ __('Submit') }}</button>

                        @if (session('status'))
                             <div class="alert alert-success">
                             {{ session('status') }}
                           </div>
                        @endif

                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
