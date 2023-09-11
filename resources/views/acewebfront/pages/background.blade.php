@extends('acewebfront.layouts')
@section('content')
    <main>
        @include('acewebfront.widget.allbaner')
        <div class="section-full bg-white content-inner">
            <div>
                <div class="section-head text-center ">
                    <h2 style="color: #EA0B0B;" class="text-uppercase">COMPANIES BACKGROUND</h2>

                    <h5>GROUP MILESTONE 2001-2022</h5>
                </div>
                <div class="section-content ">
                    <div class="portfolio-carousel-nogap owl-carousel lightgallery gallery owl-btn-center-lr">
                        @for($i=0;$i < 16; $i++)
                        <div class="item">

                            <div class="blog-post latest-blog-1 date-style-3 skew-date">
                                <!-- <div><h1 class="font-bg-history">2022</h1></div> -->
                                <div style="height: 450px;" class="dlab-post-media dlab-img-effect zoom-slow"><img  src="/public/background/{{$i}}_bg.png" alt=""></div>
                                <div class="dlab-post-info p-t20" style="padding: 20px;">
                                    <div>
                                        {!! name_companyofbg()[$i] !!}
                                    </div>

                                    <div class="dlab-post-text" style="max-height: 200px; position: relative;">
                                        @if(file_exists('public/background/go_'.$i.'.png'))<img style="width:100%;max-height: 150px;" src="/public/background/go_{{$i}}.png" alt="">@endif
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
        $(document).ready(function(){
          $(".owl-carousel").owlCarousel({
            items: 4, // Number of items to show
            loop: true, // Enable loop
            autoplay: true, // Enable autoplay
            autoplayTimeout: 30000,
            animateOut: 'fadeOut', // CSS class for slide-out animation
            animateIn: 'fadeIn', // CSS class for slide-in animation
            nav: true, // Show navigation buttons
            navText: ['<i class="fas fa-chevron-left"></i>', '<i class="fas fa-chevron-right"></i>'], // Icons for previous and next buttons
          });
        });
      </script>

@endsection
