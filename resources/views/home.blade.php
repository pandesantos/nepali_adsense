@extends('templates.default')

@section('content')
	@include('templates.alerts')
    @include('templates.header')
    @if(!Auth::check())
	    @include('auth.signin')
	    @include('auth.signup')
	    @include('templates.services')
	@endif
@stop