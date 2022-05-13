<div class="menu nav-scroller py-2 {{ $mode . '-mode' }}">
    <div class="container">
        <div class="menu-blocks d-flex justify-content-between align-items-center">
            <div class="brand turn-trigger">
                {{-- <img src="{{ asset('/assets/img/teacode/teacode.png') }}"
                class="img-fluid rounded-circle square-50" alt=""> --}}
                <a href="/" class="d-flex align-items-center">
                    <div class="logo logo-brand position-relative d-inline-block">
                        <img src="{{ asset('/assets/img/teacode/logo.png') }}" width="30" height="30"
                        class="logo turn img-fluid rounded-circle square-35" alt="Logo">
                    </div>
                    <h4 class="brand-txt ms-2 d-inline-block ">TeaCode</h4>
                </a>
            </div>
            <nav class="nav d-flex justify-content-center">
                <a class="menu-item p-2 text-dark text-capitalize" rel="noopener"
                href="/discord" target="_blank">
                    <span class="me-1">join us</span>
                    <i class="fa-solid fa-chevron-right"></i>
                </a>
            </nav>
        </div>
    </div>
</div>
