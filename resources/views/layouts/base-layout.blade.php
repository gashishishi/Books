@include('components.header')

@yield('hero')


@php $uri = ['login','register','password/reset']; @endphp
@if(!in_array(request()->path(), $uri))
    @include('components.search-form')
@endif

@yield('content')


@include('components.footer')