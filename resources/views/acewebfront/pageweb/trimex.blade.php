@extends('acewebfront.layouts')
@section('content')
    <div class="page-content bg-white">
        @include('acewebfront.widget.allbaner')
        <div class="section-full bg-white content-inner">
            <div class="wrap-content">
                <div class="section-head text-center ">
                    <h2 class="text-capitalize">Manufacturing of Automotive Covers</h2>

                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="description-service" style="color:#999999;text-align: center;"><!--ayat-->
                        </div>


                    </div>
                </div>
            </div>
            <div class="section-content ">
                <div class="portfolio-carousel-nogap owl-carousel lightgallery gallery owl-btn-center-lr">
                    @foreach($image as $i => $vg)
                            <div class="item" style="padding: 20px;">
                                <div class="dlab-box">
                                    <div class="dlab-media" style="border-radius: 5px;"> <a href="#"><img
                                                class="img-what-we-do"
                                                src="{{getimage($vg->img)}}"
                                                alt=""></a>
                                    </div>
                                    <div class="dlab-info p-a20 text-center bg-gray">

                                        <p style="text-transform: capitalize;" class="m-b0"
                                            class="wwd-text text-capitalize">{{$vg->title}}</p>
                                    </div>
                                </div>
                            </div>

                    @endforeach


                </div>
            </div>
        </div>

        <div class="section-full bg-white content-inner">
            <div class="wrap-content">
                <div class="section-head text-center ">
                    <h2 class="text-capitalize">Manufacturing of Automotive Seats Covers</h2>

                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="description-service" style="color:#999999;text-align: center;">Car seats are a crucial element in modern automobiles for
                            enhancing the driving experience. Our automotive seats provide
                            outstanding comfort and support, allowing drivers to stay focused
                            for longer periods and reducing fatigue.
                        </div>


                    </div>
                </div>
            </div>


        <div class="section-content ">
                <div class="portfolio-carousel-nogap owl-carousel lightgallery gallery owl-btn-center-lr">
                    @for ($i = 0; $i < 15; $i++)
                        @if ($i == 3)
                        @else
                            <div class="item" style="padding: 20px;">
                                <div class="dlab-box">
                                    <div class="dlab-media" style="border-radius: 5px;"> <a href="#"><img
                                                class="img-what-we-do"
                                                src="/public/page/trimex/assembly/{{ $i }}.png"
                                                alt=""></a>
                                    </div>
                                    <div class="dlab-info p-a20 text-center bg-gray">

                                        <p style="text-transform: capitalize;" class="m-b0"
                                            class="wwd-text text-capitalize">{{ assemblyimg()[$i] }}</p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endfor


                </div>
            </div>
        </div>
    </div>
    <!-- Our Services -->

    <!-- Our Services End -->
    <!-- About US -->
    <div class="section-full about-box content-inner section-bg-trimex-color">
        <div class="container">
            <div class="row">
                <div data-aos="fade-right" data-aos-delay="100" class="col-lg-6 m-b30 p-r50">
                    <div class="section-head text-left space-text-video">
                        <!-- <h2 class="text-capitalize"
                            style="color: rgb(255, 255, 255);font-family: 'Poppins';font-weight: bold;">PARTNER</h2> -->
                        <h2 style="color: rgb(255, 255, 255);font-family: 'Poppins';">Automotive Seat Manufacturing Plant</h2>
                        <!-- <p class="font-patner">
                            Leather car seats are a crucial element in modern automobiles for enhancing the driving
                            experience and productivity. These seats provide outstanding comfort and support, allowing
                            drivers to stay focused for longer periods and reducing fatigue.</p> -->
                    </div>

                </div>
                <div class="col-sm-12 col-lg-6 m-b30">
                    <div class="video-box">
                        <iframe width="100%" class="yt-embed-height" src="https://www.youtube.com/embed/ujKY5IC6GsQ"
                            title="Feytech, Kulim" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen></iframe>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About US End -->
    <!-- Our Project -->

    <!-- Our Project End -->

    <!-- What Clients Says -->

    <!-- <div class="section-full bg-img-fix content-inner-1"
                    style="background-image:url(images/background/bg5.jpg); margin-top:-1px">
                    <div class="wrap-content">
                        <div class="section-head text-center text-white">
                            <h2 class="text-capitalize" style="color: #343F52;font-family: 'Poppins';font-weight: bold;">Our Products </h2>


                        </div>
                        <div class="section-content">
                            <div class="row">
                                @php
                                    $product = ['PRODUCTS', 'COLOURS', 'PATTERNING'];
                                    $descript = ['About our Prodictivity', 'LEATHER COLOUR SAMPLE IS AVAILABLE', 'YOU CAN CHOOSE INSERT PATTERNING STITCH'];
                                @endphp
                                @for ($i = 0; $i < 3; $i++)
    <div data-aos="zoom-in" data-aos-delay="{{ $i + 4 }}00" class="col-lg-4 col-sm-6 m-b30">
                                    <div class="dlab-box">
                                        <div class="dlab-media"> <a href="#"><img src="/public/page/trimex/product-{{ $i + 1 }}.png" alt=""></a> </div>
                                        <div class="dlab-info p-a30 bg-white">
                                            <h4 class="dlab-title m-t0"><a href="#" style="color: #343F52;font-family: 'Poppins';font-weight: bold;"><center>{{ $product[$i] }}</center></a></h4>
                                            <p style="text-align: center;" class="text-uppercase">{{ $descript[$i] }}</p>
                                            <a href="#" class="site-button" style="width:100%;background-color: #4260FF;">Get Started</a> </div>
                                    </div>
                                </div>
    @endfor
                            </div>
                        </div>
                    </div>
                </div> -->

    <!-- <div class="section-full content-inner bg-white contact-style-1">
                    <div class="container">
                        <div class="row">

                            <div class="col-lg-6 d-lg-flex">
                                <div class="p-a30 m-b30 align-self-stretch"
                                    style="font-family: 'Poppins';padding: 25% 0px;">
                                    <h2 class="m-b10" style="font-weight: bold;">KEEP IN TOUCH</h2>
                                    <p class="font-patner" style="color:black">Have any questions? Reach out
                                        to me from this
                                        contact form and I will get back to you shortly.</p>

                                </div>
                            </div>
                            <div class="col-lg-6">


                                <div style="padding: 25% 0px;">
                                    <form method="post" class="dzForm" action="script/contact.php">
                                        <input type="hidden" value="Contact" name="dzToDo">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <input style="    background-color: #bcbcbc24;
    border: none;"
                                                            name="dzOther[Phone]" type="text" required class="form-control"
                                                            placeholder="Name">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <input style="    background-color: #bcbcbc24;
    border: none;"
                                                            name="dzOther[Subject]" type="text" required class="form-control"
                                                            placeholder="Email">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <textarea style="    background-color: #bcbcbc24;
    border: none;" name="dzMessage" rows="4"
                                                            class="form-control" required placeholder="Your Message..."></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-4" style="    padding-left: 34px;">
                                                <button style="    border-radius: 50px;" name="submit" type="submit"
                                                    value="Submit" class="site-button "> <span>Send message</span> </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>


                            </div>

                        </div>

                    </div>
                </div> -->

    </div>
    </div>
@endsection
