<div id="activities" class="activities section-wrapper">
    <div class="section">
        @foreach ($data->activities as $key => $activity)
            @if (!isset($activity->hidden) || !$activity->hidden)
                <div id="{{ $activity->slug }}" class="activity-wrapper">
                    <div class="container">
                        <div class="row align-items-center activity-row">
                            <div class="col-lg-6 col-md-7 activity-description">
                                <h3 class="activity-header text-capitalize mb-md-2 mb-4 tc-black-almost">
                                    <span class="activity-header-icon">{!!  $activity->icon !!}</span>
                                    <span class="activity-header-txt">{{ $activity->title }}</span>
                                </h3>
                                <div class="activity-body description tc-black-almost">
                                    {!! $activity->description->text !!}
                                    @if (isset($activity->description->list))
                                        <{!! $activity->description->listType ?? 'ul' !!} class="ps-4 m-0">
                                        @foreach ($activity->description->list as $listItem)
                                        <li class="capitalize-first-letter">{!! $listItem !!}</li>
                                        @endforeach
                                        </{!! $activity->description->listType ?? 'ul' !!}>
                                    @endif
                                    <div class="capitalize-first-letter btn-join-us">
                                        <a href='{{ $activity->slug }}' target='_blank'>
                                            <span class='d-inline-block capitalize-first-letter'>
                                                <span class='me-1'>click to join</span>
                                                <i class='fa-solid fa-chevron-right'></i>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-5 activity-img">
                                <div class="img-wrapper">
                                    {{-- @include('pages.index-parts.svg-includes.' . $activity->slug) --}}
                                    <img class="img-fluid w-md-75 m-auto d-block" src="{{ asset('/assets/img/activities/' . $activity->slug . '.svg') }}"
                                        alt="{{ $activity->title }}" height="210" width="210">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</div>
