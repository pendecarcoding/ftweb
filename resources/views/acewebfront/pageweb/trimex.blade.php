@extends('acewebfront.layouts')
@section('content')
    <div class="page-content bg-white">
        @include('acewebfront.widget.allbaner')
        <!-- Slider -->
        <!-- <div class="section-trimex-up-card">
                <div class="dlab-bnr-inr overlay-black-middle" style="background-image:url(/public/page/trimex/section.png);">
                    <div class="container">

                        <div class="trimex-top-card dlab-post-info p-lr20 p-b10 p-t20 bg-white">
                            <div class="dlab-post-title " style="font-size: 40px;font-weight: bold;position: relative;height: 133px;">
                              <div class="clearfix">
                                <h2>YOUR TRUSTED
                                    LEATHER SEAT PARTNER</h2>
                                <img class="img-trimex-up" src="/public/page/trimex/image 416.png">
                              </div>
                            </div>

                            <div class="dlab-post-text">
                                <p style="text-align: justify;">TRIMEX is a company that manufactures OEM-styled leather-trimmed interiors and patented technology designed to enhance comfort and safety for the next generation of automobiles. Providing the highest quality products on the market, and maintaining stringent safety standards, TRIMEX is built upon the foundations of honesty, trust, faith, and respect. We still build pride into every product and appreciate your business.</p>
                            </div>
                            <div class="dlab-post-readmore">
                                <a href="#" title="READ MORE" rel="bookmark" class="site-button-link">READ MORE<i class="fas fa-angle-double-right"></i></a>
                            </div>
                        </div>
                    </div>


                </div>
            </div> -->


        <!-- Slider END -->

        <div class="section-full bg-white content-inner">
            <div class="wrap-content">
                <div class="section-head text-center ">
                    <h2 class="text-capitalize">Our Line of Precision</h2>

                </div>
            </div>
            <div class="section-content ">
                <div class="portfolio-carousel-nogap owl-carousel lightgallery gallery owl-btn-center-lr">
                    @for ($i = 0; $i < 15; $i++)
                        <div class="item" style="padding: 20px;">
                            <div class="dlab-box">
                                <div class="dlab-media" style="border-radius: 5px;"> <a href="#"><img
                                            class="img-what-we-do"
                                            src="/public/page/trimex/assembly/{{ $i }}.png" alt=""></a>
                                </div>
                                <div class="dlab-info p-a20 text-center bg-gray">

                                    <p style="text-transform: capitalize;" class="m-b0" class="wwd-text text-capitalize">{{ assemblyimg()[$i] }}</p>
                                </div>
                            </div>
                        </div>
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
                    <div class="section-head text-left" style="    margin: 15% 0px;">
                        <h2 class="text-capitalize"
                            style="color: rgb(255, 255, 255);font-family: 'Poppins';font-weight: bold;">PARTNER</h2>
                        <h4 style="color: rgb(255, 255, 255);font-family: 'Poppins';">About our Prodictivity</h4>
                        <p class="font-patner">
                            Leather car seats are a crucial element in modern automobiles for enhancing the driving
                            experience and productivity. These seats provide outstanding comfort and support, allowing
                            drivers to stay focused for longer periods and reducing fatigue.</p>
                    </div>

                </div>
                <div class="col-sm-12 col-lg-6 m-b30">
                    <div class="video-box">
                        <iframe width="100%" height="450px" src="https://www.youtube.com/embed/ujKY5IC6GsQ"
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
