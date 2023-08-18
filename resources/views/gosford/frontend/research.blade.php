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

                </div>
            </div>
        </section>


    </main>
@endsection
