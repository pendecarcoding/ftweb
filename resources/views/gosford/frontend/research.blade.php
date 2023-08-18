@extends('acewebfront.layouts')
@section('meta')
    <meta property="og:image" content="{{ uploaded_asset(get_setting('site_icon')) }}" />
@endsection
@section('content')
    <main>
        <section class="ace-sliders" style="    height: 311px;">
        <div style="top: 0;
        position: absolute;
        width: 100%;">
            <div style="width:100%;    height: 376px;position: relative;overflow: hidden;display: flex;
            flex-direction: column;">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        @php
                            $noslide = 0;
                        @endphp
                        @foreach ($slider as $is => $v)
                            @if (count($slider) > 1)
                                <button id="btn-slider" type="button" data-bs-target="#carouselExampleIndicators"
                                    data-bs-slide-to="{{ $is }}"
                                    class="btn-slide @if ($is == 0) active @endif"
                                    @if ($is == 0) aria-current="true" @endif
                                    aria-label="Slide {{ $is }}"></button>
                            @endif
                        @endforeach
                    </div>
                    <div class="carousel-inner">
                        @foreach ($slider as $is => $v)
                            <div class="carousel-item @if ($is == 0) active @endif">
                                <img class="slider-banner" style="width: 100%;height: 380px;object-fit: cover;" src="{{ asset('public/' . $v->file_name) }}" />
                                <div class="col-md-6">
                                    <div class="container">

                                        <div data-aos="fade-up" class="carousel-caption text-start">
                                            <h1>
                                                {{ $v->caption }}
                                            </h1>
                                            <p class="ace-banner-p">{{ $v->sub_caption }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
        </section>

        <section class="pt-5 pb-5" style="padding-top: 0rem !important;">
            <div style="display: flex;flex-direction: column;">
                <div style="position: relative;">
                    <div class="row" style="padding-left: 0px;padding-right: 0px;--bs-gutter-x: 0;">
                        <div class="col-md-6 col-lg-6 col-sm-12">
                            <div style="padding: 15%;">
                            <h5 style="color: #E20000;">CUT DESIGN | MANUFACTURING.</h5>
                            <p style="text-align: justify;">We are delighted to present our latest masterpiece to you – high-quality automotive leather. This copy will showcase the true charm of this exquisite creation.
                                Designed exclusively for car owners, our top-tier leather embodies our unwavering commitment to perfection. Each piece of leather material undergoes rigorous selection, ensuring that only the finest, handpicked leather finds its way into our car interiors. Your distinguished status deserves nothing less than the most elegant indulgence.
                                The high-quality leather boasts an astonishingly soft touch, providing a luxurious sensation that soothes both body and mind. Selected from the finest raw materials, the leather's durability surpasses ordinary standards, maintaining its shine and color as if new for a prolonged period. Whether your journey is long or short, this elegance and refinement will accompany you all the way.</p>
                            </div>


                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12" style="position: relative;overflow: hidden;">
                            <img style="width: 100%;" src="/public/go_system/images/research/cut_img.svg" alt="">
                        </div>
                    </div>
                </div>
                <div style="position: relative;">
                    <div class="row" style="padding-left: 0px;padding-right: 0px;--bs-gutter-x: 0;">
                        <div class="col-md-6 col-lg-6 col-sm-12" style="position: relative;overflow: hidden;">
                            <img style="width: 100%;" src="/public/go_system/images/research/cut_img_2.svg" alt="">
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12">
                            <div style="padding: 15%;">
                            <h5 style="color: #E20000;">CUT DESIGN | MANUFACTURING.</h5>
                            <p style="text-align: justify;">We are delighted to present our latest masterpiece to you – high-quality automotive leather. This copy will showcase the true charm of this exquisite creation.
                                Designed exclusively for car owners, our top-tier leather embodies our unwavering commitment to perfection. Each piece of leather material undergoes rigorous selection, ensuring that only the finest, handpicked leather finds its way into our car interiors. Your distinguished status deserves nothing less than the most elegant indulgence.
                                The high-quality leather boasts an astonishingly soft touch, providing a luxurious sensation that soothes both body and mind. Selected from the finest raw materials, the leather's durability surpasses ordinary standards, maintaining its shine and color as if new for a prolonged period. Whether your journey is long or short, this elegance and refinement will accompany you all the way.</p>
                            </div>


                        </div>

                    </div>
                </div>

                <div style="position: relative;">
                    <div class="row" style="padding-left: 0px;padding-right: 0px;--bs-gutter-x: 0;">
                        <div class="col-md-6 col-lg-6 col-sm-12">
                            <div style="padding: 15%;">
                            <h5 style="color: #E20000;">CUT DESIGN | MANUFACTURING.</h5>
                            <p style="text-align: justify;">We are delighted to present our latest masterpiece to you – high-quality automotive leather. This copy will showcase the true charm of this exquisite creation.
                                Designed exclusively for car owners, our top-tier leather embodies our unwavering commitment to perfection. Each piece of leather material undergoes rigorous selection, ensuring that only the finest, handpicked leather finds its way into our car interiors. Your distinguished status deserves nothing less than the most elegant indulgence.
                                The high-quality leather boasts an astonishingly soft touch, providing a luxurious sensation that soothes both body and mind. Selected from the finest raw materials, the leather's durability surpasses ordinary standards, maintaining its shine and color as if new for a prolonged period. Whether your journey is long or short, this elegance and refinement will accompany you all the way.</p>
                            </div>


                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12" style="position: relative;overflow: hidden;">
                            <iframe width="930" height="523" src="https://www.youtube.com/embed/qVcqi1GuEiw" title="HOW TO CUT &amp; ENGRAVE LEATHER | WATTSAN CNC MACHINE" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        </div>


                    </div>
                </div>

                <div style="position: relative;">
                    <div class="row" style="padding-left: 0px;padding-right: 0px;--bs-gutter-x: 0;">
                        <div class="col-md-6 col-lg-6 col-sm-12" style="position: relative;overflow: hidden;">
                            <img style="width: 100%;" src="/public/go_system/images/research/cut_img_2.svg" alt="">
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12">
                            <div style="padding: 15%;">
                            <h5 style="color: #E20000;">CUT DESIGN | MANUFACTURING.</h5>
                            <p style="text-align: justify;">We are delighted to present our latest masterpiece to you – high-quality automotive leather. This copy will showcase the true charm of this exquisite creation.
                                Designed exclusively for car owners, our top-tier leather embodies our unwavering commitment to perfection. Each piece of leather material undergoes rigorous selection, ensuring that only the finest, handpicked leather finds its way into our car interiors. Your distinguished status deserves nothing less than the most elegant indulgence.
                                The high-quality leather boasts an astonishingly soft touch, providing a luxurious sensation that soothes both body and mind. Selected from the finest raw materials, the leather's durability surpasses ordinary standards, maintaining its shine and color as if new for a prolonged period. Whether your journey is long or short, this elegance and refinement will accompany you all the way.</p>
                            </div>


                        </div>

                    </div>
                </div>

                <div style="position: relative;">
                    <div class="row" style="padding-left: 0px;padding-right: 0px;--bs-gutter-x: 0;">
                        <div class="col-md-6 col-lg-6 col-sm-12">
                            <div style="padding: 15%;">
                            <h5 style="color: #E20000;">CUT DESIGN | MANUFACTURING.</h5>
                            <p style="text-align: justify;">We are delighted to present our latest masterpiece to you – high-quality automotive leather. This copy will showcase the true charm of this exquisite creation.
                                Designed exclusively for car owners, our top-tier leather embodies our unwavering commitment to perfection. Each piece of leather material undergoes rigorous selection, ensuring that only the finest, handpicked leather finds its way into our car interiors. Your distinguished status deserves nothing less than the most elegant indulgence.
                                The high-quality leather boasts an astonishingly soft touch, providing a luxurious sensation that soothes both body and mind. Selected from the finest raw materials, the leather's durability surpasses ordinary standards, maintaining its shine and color as if new for a prolonged period. Whether your journey is long or short, this elegance and refinement will accompany you all the way.</p>
                            </div>


                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12" style="position: relative;overflow: hidden;">
                            <img style="width: 100%;" src="/public/go_system/images/research/cut_img.svg" alt="">
                        </div>
                    </div>
                </div>

                <div style="position: relative;">
                    <div class="row" style="padding-left: 0px;padding-right: 0px;--bs-gutter-x: 0;">
                        <div class="col-md-6 col-lg-6 col-sm-12" style="position: relative;overflow: hidden;">
                            <img style="width: 100%;" src="/public/go_system/images/research/cut_img_3.svg" alt="">
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12">
                            <div style="padding: 15%;">
                            <h5 style="color: #E20000;">CUT DESIGN | MANUFACTURING.</h5>
                            <p style="text-align: justify;">We are delighted to present our latest masterpiece to you – high-quality automotive leather. This copy will showcase the true charm of this exquisite creation.
                                Designed exclusively for car owners, our top-tier leather embodies our unwavering commitment to perfection. Each piece of leather material undergoes rigorous selection, ensuring that only the finest, handpicked leather finds its way into our car interiors. Your distinguished status deserves nothing less than the most elegant indulgence.
                                The high-quality leather boasts an astonishingly soft touch, providing a luxurious sensation that soothes both body and mind. Selected from the finest raw materials, the leather's durability surpasses ordinary standards, maintaining its shine and color as if new for a prolonged period. Whether your journey is long or short, this elegance and refinement will accompany you all the way.</p>
                            </div>


                        </div>

                    </div>
                </div>


            </div>

        </section>


    </main>
@endsection
