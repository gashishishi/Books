@extends('layouts.base-layout')
@section('title','laravel books index')


@section('hero')
@endsection


@section('content')
<section class="container mt-3">
@if(!empty($logoutMsg))
    <p class="text-danger">{{$logoutMsg}}</p>
@endif
@if(!empty($items))
    <p>書籍一覧</p>
    @component('components.show-search',['items'=>$items])
    @endcomponent
@elseif(!empty($DBMsg))
    <p>{{$DBMsg}}</p>
@endif
<section>
@endsection