<div id="activities" class="activities section-wrapper">
    <div class="section">
        @foreach ($data->activities as $key => $activity)
        <div class="activity-wrapper {{ $key % 2 != 0 ? '' : ' tc-blue-bg' }}">
            <div class="container">
                <div class="row align-items-center activity-row">
                    <div class="col-lg-6 col-md-7">
                        <h3 class="activity-header text-capitalize mb-2
                        {{ $key % 2 != 0 ? ' tc-almost-black' : 'text-white' }}">{{ $activity->title }}</h3>
                        <div class="description {{ $key % 2 != 0 ? ' tc-almost-black' : ' text-white' }}">
                            {!! $activity->description->text !!}
                            @if (isset($activity->description->list))
                            @php $listType = explode('-', '<ul>-</ul>') @endphp
                                @if (isset($activity->description->listType))
                                    @php $listType = explode('-', $activity->description->listType) @endphp
                                @endif
                                {!! $listType[0] !!}
                                @foreach ($activity->description->list as $listItem)
                                <li>{!! $listItem !!}</li>
                                @endforeach
                                {!! $listType[1] !!}
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-5 activity-img">
                        <div class="img-wrapper">
                            <img class="img-fluid" src="{{ asset($activity->img) }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
