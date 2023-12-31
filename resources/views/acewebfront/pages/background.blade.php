@extends('acewebfront.layouts')
@section('meta')
    <meta property="og:image" content="{{ uploaded_asset(get_setting('system_logo_white')) }}">
@endsection
@section('content')
    <main>
        @include('acewebfront.widget.allbaner')
        <div class="section-full bg-white content-inner">
            <div>
                <div class="section-head text-left about wrap-content ">


                    <h5 class="title-ace">GROUP MILESTONE<span class="h-dash" style="font-weight: bold">—</span></h5>

                </div>
                <div class="section-content ">
                    <div class="portfolio-carousel-nogap owl-carousel lightgallery gallery owl-btn-center-lr">
                        @foreach($data as $i => $v)
    <div class="item" style="margin-right: 5px; margin-left: 5px;">
        <div class="blog-post latest-blog-1 date-style-3 skew-date" style="display: flex; flex-direction: column;">
            <div class="dlab-post-media img-bg-mil-wrap"><img style="border-radius: 12px;" src="{{ getimage($v->img) }}" alt=""></div>
            <div class="dlab-post-info p-t20" style="padding: 20px;">
                <div class="h5-milestone">
                    @php
                        // Count the number of words
                        $words = str_word_count(strip_tags($v->content));
                        $maxWords = 11; // Maximum 4 words for preview
                    @endphp
                    @if ($words > $maxWords)
                        <div class="h5-milestone" id="content-{{ $i }}">
                            {!! implode(' ', array_slice(str_word_count($v->content, 1), 0, $maxWords)) !!}... <span style="cursor: pointer;" onclick="toggleReadMore({{ $i }})">Read more</span>
                        </div>
                        <div class="h5-milestone" id="full-content-{{ $i }}" style="display: none;">
                            {!! $v->content !!}
                            <span style="cursor: pointer;" onclick="toggleReadLess({{ $i }})">Read less</span>
                        </div>
                    @else
                        {!! $v->content !!}
                    @endif
                </div>
                <div class="dlab-post-text" style="max-height: 100px; position: relative;">
                    <!-- @if (file_exists('public/background/go_' . $i . '.png'))
                        <img style="width:100%;max-height: 100px;object-fit: contain;" src="/public/background/go_{{ $i }}.png" alt="">
                    @endif -->
                </div>
            </div>
        </div>
    </div>
@endforeach



                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        // Function to toggle "Read more"
        function toggleReadMore(index) {
            document.getElementById('content-' + index).style.display = 'none';
            document.getElementById('full-content-' + index).style.display = 'block';
        }

        // Function to toggle "Read less"
        function toggleReadLess(index) {
            document.getElementById('content-' + index).style.display = 'block';
            document.getElementById('full-content-' + index).style.display = 'none';
        }

        // Automatically apply "Read more" for content exceeding 4 words
        window.onload = function() {
            @foreach($data as $i => $v)
                var content = document.getElementById('content-{{ $i }}');
                var fullContent = document.getElementById('full-content-{{ $i }}');
                if (content && fullContent) {
                    var words = content.textContent.trim().split(/\s+/).filter(function(word) {
                        return word.trim() !== '';
                    });
                    var maxWords = 11;
                    if (words.length > maxWords) {
                        content.innerHTML = words.slice(0, maxWords).join(' ') + '... <span style="cursor: pointer;" onclick="toggleReadMore({{ $i }})">Read more</span>';
                        fullContent.innerHTML += ' <span style="cursor: pointer;" onclick="toggleReadLess({{ $i }})"></span>';
                    }
                }
            @endforeach
        };
    </script>

    <script>
        $(document).ready(function() {
            // Function to check if the screen width is less than a certain threshold (e.g., for mobile devices)
            function isMobile() {
                return window.innerWidth < 768; // You can adjust the threshold as needed
            }

            // Initialize Owl Carousel
            function initializeCarousel() {
                var itemsToShow = isMobile() ? 3 : 6; // Change the number of items based on screen size

                $(".owl-carousel").owlCarousel({
                    items: itemsToShow,
                    loop: false,
                    autoplay: true,
                    autoplayTimeout: 30000,
                    animateOut: 'fadeOut',
                    animateIn: 'fadeIn',
                    nav: true,
                    navText: ['<i class="fas fa-chevron-left"></i>',
                        '<i class="fas fa-chevron-right"></i>'
                    ],
                });
            }

            // Call the initializeCarousel function
            initializeCarousel();

            // Reinitialize Owl Carousel when the window is resized
            $(window).on('resize', function() {
                initializeCarousel();
            });
        });
    </script>
@endsection
