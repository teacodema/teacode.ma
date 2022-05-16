<div class="banner">
    <div class="container banner-container">
        <div class="banner-wrapper">
            <div class="banner-text">
                <span class="pre-title"><i class="fa-solid fa-calendar-day"></i></span>
                <span class="title">
                    <a href="{{ $data->banner->url }}" rel="noopener" aria-label="Banner Title" title="{{ $data->banner->title }}"
                        target="_blank" class="link-decorated" data-bs-toggle="tooltip" data-bs-placement="bottom">
                            Next: {{ $data->banner->_title }}
                    </a>
                </span>
            </div>
        </div>
        <div class="banner-close">
            <i class="fa-solid fa-times"></i>
        </div>
    </div>
</div>
