@for ($i = 1; $i < 6; $i++)
    @php
        $name = 'slide_' . $i;
    @endphp
    @if (isset($config->$name) && Str::length($config->$name) > 0)
    <div class="slideshow-section position-relative">
        <div class="slideshow-active activate-slider"
            data-slick='{
            "slidesToShow": 1,
            "slidesToScroll": 1,
            "dots": true,
            "arrows": true,
            "responsive": [
                {
                "breakpoint": 768,
                "settings": {
                    "arrows": false
                }
                }
            ]
        }'>
            <div class="slide-item slide-item-bag position-relative">
                <img class="slide-img d-none d-md-block" src="{{ $config->$name }}">
                <img class="slide-img d-md-none" src="{{ $config->$name }}">
                <div class="content-absolute content-slide">
                    <div class="container height-inherit d-flex align-items-center justify-content-end">
                        <div class="content-box slide-content slide-content-1 py-4">
                            <h2 class="slide-heading heading_72 animate__animated animate__fadeInUp"
                                data-animation="animate__animated animate__fadeInUp">
                                Discover The Best Product
                            </h2>
                            <p class="slide-subheading heading_24 animate__animated animate__fadeInUp"
                                data-animation="animate__animated animate__fadeInUp">
                                Wish you have a pleasant experience
                            </p>
                            <a class="btn-primary slide-btn animate__animated animate__fadeInUp"
                                href="collection-left-sidebar.html"
                                data-animation="animate__animated animate__fadeInUp">SHOP
                                NOW</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="activate-arrows"></div>
        <div class="activate-dots dot-tools"></div>
    </div>
    @endif
@endfor


