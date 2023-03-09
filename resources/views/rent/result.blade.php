@extends('layouts.base-layout')
@section('title','laravel books result')

@section('content')
<section class="container mt-3">
@isset($msg)
<p>{{$msg}}</p>
@else
<p>以下のアイテムをレンタルしました :</p>
    <p>書名 : {{$title}}</p>
    <p>著者名 : {{$author}}</p>
    <p>期間は5分間です。</p>
<p>返却期限は {{$time}}です。</p>
@endisset

<a href="/mypage">{{__('My Page')}}</a>
<br>
<a href="/">{{__('Index Page')}}</a>
</section>
@endsection