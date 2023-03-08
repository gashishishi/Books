@extends('layouts.base-layout')
@section('title','laravel books mypage')

@section('content')
<section class="container mt-3">
@isset($errorMsg)
    <p>エラーが発生しました。</p>
@else

@if(Auth::check())
<div id="my-rental">
    <p>レンタル履歴</p>
    @if(!empty($items))
        @component('components.show-history',['items'=>$items])
        @endcomponent
    @endif
</div>
@else
<p>ログインしていません</p>
<a href="/login">{{__('Login')}}</a>
@endif
@endisset

</section>
@endsection