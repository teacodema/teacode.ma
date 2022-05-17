<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!-- External Addons-->
        @include('addons.google-analytics')
        @include('addons.google-optimize')

        <!-- Addons-->
        @include('addons.brand-text')
        @include('layout.header-parts.head-meta')

        {{-- @include('addons.google-tag-manager-head') --}}

        @include('layout.header-parts.assets')
        <title>{{ $data->title ?? 'TeaCode | Turning Tea into Code' }}</title>
    </head>
    <body class="antialiased {{ $mode . '-mode' }}">
        {{-- @include('addons.google-tag-manager-body') --}}
        <div class="wrapper">
                @if ($data->banner)
                    @include('addons.banner')
                @endif
                @yield('content')
        </div>
        {{-- @include('addons.fb-btn') --}}
        @include('addons.toggle-darkmode')
    </body>
</html>
