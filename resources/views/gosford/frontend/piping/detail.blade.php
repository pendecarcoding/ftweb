@extends('acewebfront.layouts')
@section('meta')
    <meta property="og:image" content="{{ uploaded_asset(get_setting('site_icon')) }}" />
@endsection
@section('content')
    <main>
        @include('acewebfront.widget.allbaner')

        <section class="gtp-anouncements" style="background-color: rgb(247, 246, 246);">
            <div class="content-ace">
                <div class="wrap-content">

                    <div style="padding-top: 0px" class="ace-isi">


                        <div class="container">
                            <div class="container">
                                <a href="{{ url('product_project') }}" style="float:right" class="btn btn-danger"><i
                                        class="fa fa-times"></i></a>
                                <center>
                                    <h5 style="color: black;font-weight: bold;">Stitching</h5>
                                </center>
                                <br>
                                <div class="row">
                                    <div class="col-md-8 col-sm-12">
                                        <div class="card">
                                            <div class="slider-product"
                                                style="height: 500px;position: relative;overflow: hidden;">
                                                <div style="height: 450px" id="myCarousel" class="carousel slide"
                                                    data-bs-ride="carousel">
                                                    <div class="carousel-indicators" style="bottom: -43px;">
                                                        @foreach(explode(',',$data->base_img)  as $index => $img)
                                                        <img data-bs-target="#myCarousel" data-bs-slide-to="{{ $index }}" {{ $index == 0 ? 'class=active' : '' }}
                                                        aria-current="{{ $index == 0 ? 'true' : 'false' }}" aria-label="Slide {{ $index + 1 }}"
                                                        style="width:100px;height:100px"
                                                        src="{{getimage($img)}}">
                                                        @endforeach
                                                    </div>
                                                    <div class="carousel-inner">
                                                        @foreach(explode(',',$data->base_img)  as $index => $img)
                                                        @php
                                                        $imgcolor = explode(',',$data->color_img);
                                                        @endphp
                                                        <div class="carousel-item active">
                                                            <div class="img-wraping">
                                                                <img style="width:100%;height: auto;"
                                                                    src="{{getimage($img)}}"
                                                                    alt="">
                                                                <img style="width:100%;height: auto;"
                                                                    class="leather-pattern"
                                                                    src="{{getimage($imgcolor[$index])}}"
                                                                    alt="">
                                                            </div>
                                                        </div>
                                                        @endforeach


                                                    </div>
                                                    <button class="carousel-control-prev" type="button"
                                                        data-bs-target="#myCarousel" data-bs-slide="prev">
                                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                        <span class="visually-hidden">Previous</span>
                                                    </button>
                                                    <button class="carousel-control-next" type="button"
                                                        data-bs-target="#myCarousel" data-bs-slide="next">
                                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                        <span class="visually-hidden">Next</span>
                                                    </button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <div class="card">
                                            <div style="padding:20px;height: 500px;">
                                                <div style="display: flex;flex-direction: column;">
                                                    <h3>customize your color</h3>

                                                </div>


                                                <form action="{{ route('gosford.order_comfirmed') }}" method="post">@csrf

                                                    <div style="display: flex;flex-direction: column;">
                                                        <hr class="hr-product-detail">
                                                    </div>

                                                    SEAM SELECTION
                                                    <div style="display: flex;flex-direction: column;">

                                                        <select style="font-weight: bold;color: #7C7979;"
                                                            class="select-order mdl-textfield__input" type="text"
                                                            name="material" id="material" required>
                                                            <option value="">SINGLE LINE</option>
                                                            <option value="">DOUBLE LINE</option>
                                                        </select>
                                                    </div>


                                                    Color Option
                                                    <!--COLOR OPTION-->
                                                    <div style="display: flex; flex-wrap: wrap;">
                                                        @foreach(explode(',',$data->colors) as $color)
                                                        <div class="card-coloroption" style="background-color: {{$color}};">
                                                        </div>
                                                        @endforeach

                                                    </div>

                                                    <!--END COLOR OPTION-->
                                                    <div style="display: flex;flex-direction: column;">
                                                        <hr class="hr-product-detail">
                                                    </div>
                                                    <div style="display: flex;flex-direction: column;">
                                                        <div style="display: flex;justify-content: space-between;">
                                                            <h4 style="font-weight: bold;">Total</h4>
                                                            <h4 id="total" style="color:#BF1D2C;font-weight:bold;">RM
                                                                {{$data->price}}</h4>
                                                        </div>
                                                        <div style="display: flex;justify-content: space-between;">
                                                            <a href="{{ route('gosford.piping') }}"
                                                                style="padding: 0px 30px;" type="submit"
                                                                class="mdl-button mdl-js-button mdl-button--raised btn-back"
                                                                data-upgraded=",MaterialButton">
                                                                Back
                                                            </a>
                                                            <a href="{{ route('gosford.finish.design') }}"
                                                                style="padding: 0px 30px;" type="submit"
                                                                class="mdl-button mdl-js-button mdl-button--raised color--gray"
                                                                data-upgraded=",MaterialButton">
                                                                Submit
                                                            </a>
                                                        </div>
                                                    </div>
                                                </form>

                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>


        </section>
        <!-- <div class="wa-floating-button" onclick="openWhatsApp()">
                                    <span class="whatsapp-icon"><i class="fa fa-phone"></i></span>
                                </div> -->

    </main>
    <script src="/public/go_system/js/pattern-design.js"></script>
@endsection
