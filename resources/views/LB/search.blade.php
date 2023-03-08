@extends('layouts.base-layout')
@section('title','laravel books search')

@section('content')
<section class="container mt-3">
@if(count($items) > 0)
{{old('search')}}
<p>検索結果</p>
@component('components.show-search',['items'=>$items])
@endcomponent
@else
    <p>お探しの本が見つかりませんでした。</p>
@endif
</section>
@endsection