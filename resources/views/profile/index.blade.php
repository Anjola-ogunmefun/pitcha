@extends('layouts.app')

@section('content')

<p style="text-align:right!important; margin-right:40px;" > Profile</p>

<h2 style="margin-left:50px"> Name~ {{ ($name = auth()->user()->first_name.' '.auth()->user()->last_name) }}</h2>
<h2 style="margin-left:50px"> Email~ {{ ($email = auth()->user()->email) }}</h2>

@endsection
