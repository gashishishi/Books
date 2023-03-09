@extends('layouts.base-layout')
@section('title','laravel books mypage')

@section('content')
<section class="container mt-3 p-0">
@isset($errorMsg)
    <p>エラーが発生しました。</p>
@else

@if(Auth::check())
<div class="row">
<aside class="bg-light col-md-2 text-center">
    <a href="mypage/history" class="d-block">履歴</a>
</aside>

<div class="col-md-10">
    @if(0 < $rentalNum['num'])
    <p>現在 {{$rentalNum['num']}} 冊レンタルしています。</p>
    @else
    <p>現在レンタル中の本はありません。</p>
    @endif

    @if(0 < $rentalNum['limit'])
    <p>あと {{$rentalNum['limit']}} 冊レンタルできます。</p>
    @else
    <p>レンタル数が上限です。</p>
    @endif
    <p>レンタル期間は5分間です。</p>
    <div id="my-rental">
        @if(!empty($items['over']))
            @component('components.show-rental',[
                            'items'=>$items['over'],
                            'class'=>'time-over',
                            'msg'=> '返却予定日時を過ぎています!'
                            ])
            @endcomponent
        @endif
        
        @if(!empty($items['within']))
            @component('components.show-rental',[
                                'items'=>$items['within'],
                                'class'=>'time-within',
                                'msg'=> 'レンタル中の本'
                                ])
            @endcomponent
        @endif
    </div>
    </div>
</div>
@else
<div>
<p>ログインしていません</p>
<a href="/login">{{__('Login')}}</a>
</div>
@endif
@endisset

</section>
@endsection