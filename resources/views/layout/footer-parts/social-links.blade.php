<div class="social-icons-wrapper mt-3">
    <ul class="list-group list-group-horizontal align-items-start">
        @foreach ($data->socialLinks as $socialLink)
            @if (!isset($socialLink->hidden) || !$socialLink->hidden)
                <li class="list-group-item border-0 overflow-auto my-0 mx-2">
                    <a href="/{{ $socialLink->link }}" target="_blank" rel="noopener"
                        aria-label="{{ $socialLink->title }}" class="text-decoration-none">
                        <span class="social-icon">{!! $socialLink->icon !!}</span>
                    </a>
                </li>
            @endif
        @endforeach
    </ul>
</div>
