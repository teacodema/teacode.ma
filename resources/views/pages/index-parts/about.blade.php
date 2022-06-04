<div id="about" class="about section-wrapper">
    <div class="section about-header">
        <div id="particles-js" class="particles-js">
            <div class="crescent-moon"></div>
        </div>
        <div class="container">
            <div class="row justify-content-center align-items-center mb-3">
                <div class="col-12">
                    {{-- <h2 class="brand-txt mb-2">TeaCode</h2> --}}
                    <h3 class="brand-slogan">Turning <span>Tea</span> into <span>Code</span></h3>
                    {{-- <img src="{{ asset('/assets/img/teacode/teacode.png') }}"
                    class="img-fluid rounded-circle square-75 ms-2" alt=""> --}}
                </div>
            </div>
            <div class="row">
                <div class="col-11 col-md-12 col-lg-8 offset-lg-2">
                    <div class="welcome-message">
                        <div class="welcome-message-wrapper tc-black-almost">
                            {{-- <div class="welcome text-capitalize"><span>welcome</span></div> --}}
                            <div class="txt">
                                As human beings, we love bringing value to ourselves and to others.
                                Join us and level up your programming skills in the process,
                                or give 15 to 30 min of your time to help others who need it, a value is added in both ways.
                                {{-- <div class="capitalize-first-letter">whether you are learning to code, thinking about it,
                                    looking for an internship or looking for a job in software development,</div>
                                <div class="capitalize-first-letter">join a moroccan developers community who can help you in your learning journey.</div> --}}
                            </div>
                        </div>
                        <div class="btn-actions mt-3">
                            <div class="btn-action">
                                <a href="/discord" target="_blank" rel="noopener"
                                class="btn-join-us btn tc-blue-bg text-capitalize px-3 pt-2">
                                <i class="fa-brands fa-discord"></i><span class="ms-2">Join us</span></a>
                            </div>
                            <div class="btn-action">
                                <a href="/howto" target="_blank" rel="noopener"
                                class="btn-join-us btn tc-blue-dark-2-bg text-capitalize px-3 pt-2">
                                <i class="fa-brands fa-youtube"></i><span class="ms-2">How To</span></a>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="find-us-wrapper mt-5 d-none">
                        <h4 class="capitalize-first-letter text-center mb-3">you cand find us here</h4>
                        <ul class="list-group list-group-horizontal align-items-start">
                            @foreach ($data->find_us as $socialLink)
                                <li class="list-group-item border-0 overflow-auto">
                                    <span class="link-wrapper d-inline-block ms-3">
                                        <a href="{{ $socialLink->link }}" target="_blank" class="text-decoration-none" style="color: {!! $socialLink->color !!}">
                                            {{-- <img src="{{ asset($socialLink->icon) }}" alt="" class="rounded-circle overflow-hidden square-40"> --}}
                                            {{-- {!! $socialLink->icon !!} --}}
                                            {{-- <span class="ms-1 text-capitalize">{{ $socialLink->title }}</span>
                                        </a>
                                    </span>
                                </li>
                            @endforeach
                        </ul>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>

