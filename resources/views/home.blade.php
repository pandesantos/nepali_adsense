@extends('templates.default')

@section('content')
	@include('templates.alerts')
    @include('templates.header')
    @if(!Auth::check())
	    @include('auth.signin')
	    @include('auth.signup')
	    @include('templates.services')
	    @include('templates.plan')
	    @include('templates.team')
	@endif
@stop