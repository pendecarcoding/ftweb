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

        <section class="pt-5 pb-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="description-service">We are delighted to present our latest
                            masterpiece to you – high-quality automotive leather. This copy will showcase the true charm of
                            this exquisite creation.
                            Designed exclusively for car owners, our top-tier leather embodies our unwavering commitment to
                            perfection. Each piece of leather material undergoes rigorous selection, ensuring that only the
                            finest, handpicked leather finds its way into our car interiors. Your distinguished status
                            deserves nothing less than the most elegant indulgence.
                            The high-quality leather boasts an astonishingly soft touch, providing a luxurious sensation
                            that soothes both body and mind. Selected from the finest raw materials, the leather's
                            durability surpasses ordinary standards, maintaining its shine and color as if new for a
                            prolonged period. Whether your journey is long or short, this elegance and refinement will
                            accompany you all the way.
                            Our leather represents more than just beauty; it exemplifies practicality and functionality.
                            Robust leather fibers and impeccable craftsmanship ensure outstanding abrasion resistance,
                            making it capable of withstanding daily wear while retaining a fresh appearance.
                            Excellence in quality goes hand in hand with our commitment to protecting the Earth. We are
                            dedicated to promoting environmental consciousness by adopting sustainable production methods,
                            ensuring that the leather manufacturing process is as eco-friendly as possible, without
                            unnecessary resource wastage. By choosing our leather, you are also contributing to a greener
                            future for our planet.
                        </div>


                    </div>
                </div>
            </div>
        </section>
        <section class="pt-5 pb-5">
            <div class="row">
                <div class="col-md-12">
                    <div style="position: relative;display: flex;justify-content: center;">
                        <img class="img-responsive" src="/public/go_system/images/type.png" alt="">
                    </div>


                </div>
            </div>
        </section>
        <section class="pt-5 pb-5">
            <div style="text-align: center;font-weight: bold;padding: 20px;">
                <h2 style="font-weight: bold;">Styling Customisation</h2>
            </div>
            <div class="row d-flex" style="justify-content: center;">

                <div class="col-sm-6 col-md-2  d-flex ">

                    <a href="{{ route('gosford.twotowncolor') }}"
                        class="card  card-body border-light  justify-content-between text-white shadow">
                        <!-- <a >  -->
                        <img src="/public/go_system/images/menu/menu_1.png" alt="">
                        <!-- </a> -->
                        <div class="title-menu-style">Two Tone Color</div>
                    </a>

                </div>
                <div class="col-sm-6 col-md-2  d-flex ">
                    <a href="{{ route('gosford.embrodery') }}"
                        class="card  card-body border-light  justify-content-between  text-white shadow">
                        <img src="/public/go_system/images/menu/menu_2.png" alt="">
                        <div class="title-menu-style">Embrodery</div>
                    </a>
                </div>
                <div class="col-sm-6 col-md-2  d-flex ">
                    <a href="{{ route('gosford.patterndesign') }}"
                        class="card  card-body border-light  justify-content-between  text-white shadow">
                        <img src="/public/go_system/images/menu/menu_3.png" alt="">
                        <div class="title-menu-style">Pattern Design</div>
                    </a>
                </div>
                <div class="col-sm-6 col-md-2  d-flex ">
                    <a href="{{ route('gosford.piping') }}"
                        class="card  card-body border-light  justify-content-between  text-white shadow">
                        <img src="/public/go_system/images/menu/menu_4.png" alt="">
                        <div class="title-menu-style">Piping</div>
                    </a>
                </div>
                <div class="col-sm-6 col-md-2  d-flex ">
                    <a href="{{ route('gosford.emblem') }}"
                        class="card  card-body border-light  justify-content-between  text-white shadow">
                        <img src="/public/go_system/images/menu/menu_5.png" alt="">
                        <div class="title-menu-style">Logo / Emblem</div>
                    </a>
                </div>

            </div>


            </div>
        </section>

    </main>
@endsection
