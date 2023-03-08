@extends('layouts.base-layout')
@section('title','laravel books index')


@section('hero')
@endsection

@section('content')
<section class="container mt-3">
@if(!empty($msg))
<p>{{$msg}}</p>
@endif
<a href="/">{{__('Index Page')}}</a>
<section>
@endsection