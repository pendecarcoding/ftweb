@extends('acewebfront.layouts')
@section('content')
    <main>
        @include('acewebfront.widget.allbaner')
        <div class="section-full bg-white content-inner">
            <div>
                <div class="section-head text-center ">
                    <h2 class="text-uppercase">COMPANIES BACKGROUND</h2>

                    <p>COMPANIES BACKGROUND</p>
                </div>
                <div class="section-content ">
                    <div class="blog-carousel owl-carousel owl-none">
                        <div class="item">
                            <div class="blog-post latest-blog-1 date-style-3 skew-date">
                                <div class="dlab-post-media dlab-img-effect zoom-slow"><img src="/public/background/2022_bg_go.png" alt=""></div>
                                <div class="dlab-post-info p-t20" style="padding: 20px;">
                                    <div>
                                        <h3>Gosford Leather Industries(GLI) JB Established</h3>
                                    </div>

                                    <div class="dlab-post-text">
                                        <img class="img-responsive" src="/public/background/go.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>
    <script>
        $(document).ready(function(){
          $(".owl-carousel").owlCarousel({
            items: 3, // Number of items to show
            loop: true, // Enable loop
            autoplay: true, // Enable autoplay
            autoplayTimeout: 30000,
            animateOut: 'fadeOut', // CSS class for slide out animation
      animateIn: 'fadeIn' // CSS class for slide in animation // Set autoplay timeout to 30 seconds (in milliseconds)
          });
        });
      </script>
@endsection
