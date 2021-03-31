@extends('layouts.app')

@section('content')

<h3 style="text-align:right!important; margin-right:40px;" > Profile</h3>

<h2 style="margin-left:50px"> Name~ {{ ($name = auth()->user()->first_name.' '.auth()->user()->last_name) }}</h2>
<h2 style="margin-left:50px"> Email~ {{ ($email = auth()->user()->email) }}</h2>

@endsection
