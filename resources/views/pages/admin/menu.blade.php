<div class="menu nav-scroller py-2 {{ $mode . '-mode' }}">
    <div class="container">
        <div class="menu-blocks d-flex justify-content-between">
            <div class="brand turn-trigger navbar-brand">
                <a href="/" class="d-flex align-items-center">
                    <div class="logo logo-brand position-relative d-inline-block">
                        <img src="{{ asset('/assets/img/teacode/teacode_circle_bordred_200.png') }}" width="30"
                            height="30" class="logo turn img-fluid rounded-circle square-35" alt="Logo">
                    </div>
                    <h4 class="brand-txt ms-2 d-inline-block ">TeaCode</h4>
                </a>
            </div>
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container-fluid justify-content-end">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa-solid fa-bars"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            @isset($menu)
                                @foreach ($menu as $item)
                                <li class="nav-item">
                                    <a class="menu-item p-2 text-capitalize nav-link {{ request()->getRequestUri() == '/'.$item->slug ? 'active' : '' }}" href="/{{ $item->slug }}">{{ $item->title }}</a>
                                </li>
                                @endforeach
                            @endisset
                            @guest
                                @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="menu-item p-2 text-capitalize nav-link" href="{{ route('login') }}">
                                        Login
                                    </a>
                                </li>
                                @endif
                            @else
                            <li class="nav-item">
                                <a class="menu-item p-2 text-capitalize nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    Logout <i class="fa-solid fa-power-off fs-6"></i>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                            @endguest
                </div>
            </nav>
        </div>
    </div>
</div>
