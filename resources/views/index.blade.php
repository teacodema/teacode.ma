@extends('layout')
@section('title')
    TeaCode
@endsection
@section('content')

    @include('partials.index.menu')
    <div class="container-fluid p-0">
        @include('partials.index.about')
        @include('partials.index.activities')
    </div>
    {{-- @include('partials.index.find_us') --}}
    {{-- @include('partials.index.events') --}}
    {{-- @include('partials.index.faq') --}}
    {{-- @include('partials.index.code-of-conduct') --}}
    {{-- @include('partials.index.staff') --}}

    @include('partials.index.footer')
    {{-- @include('partials.fb-btn') --}}
@endsection
