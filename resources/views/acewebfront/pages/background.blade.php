@extends('acewebfront.layouts')
@section('content')
    <main>
        @include('acewebfront.widget.allbaner')
        <div class="section-full bg-white content-inner">
            <div>
                <div class="section-head text-center about ">
                    <h1>Companies Background</h1>

                    <h5 class="title-ace">GROUP MILESTONE 2001-2022</h5>
                </div>
                <div class="section-content ">
                    <div class="portfolio-carousel-nogap owl-carousel lightgallery gallery owl-btn-center-lr">
                        @for ($i = 0; $i < 16; $i++)
                            <div class="item" style="margin-right: 5px;margin-left:5px ;">

                                <div class="blog-post latest-blog-1 date-style-3 skew-date"
                                    style="display: flex;flex-direction: column;">
                                    <!-- <div><h1 class="font-bg-history">2022</h1></div> -->
                                    <div class="dlab-post-media img-bg-mil-wrap"><img style="border-radius: 12px;"
                                            src="/public/background/{{ $i }}_bg.png" alt=""></div>
                                    <div class="dlab-post-info p-t20" style="padding: 20px;">
                                        <div>
                                            {!! name_companyofbg()[$i] !!}
                                        </div>

                                        <div class="dlab-post-text" style="max-height: 100px; position: relative;">
                                            @if (file_exists('public/background/go_' . $i . '.png'))
                                                <img style="width:100%;max-height: 100px;object-fit: contain;"
                                                    src="/public/background/go_{{ $i }}.png" alt="">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endfor

                    </div>
                </div>
            </div>
        </div>
    </main>
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
                    loop: true,
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
