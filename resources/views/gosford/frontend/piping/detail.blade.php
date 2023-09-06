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
                                    <h5 style="color: black;font-weight: bold;">Piping</h5>
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
                                                        <img data-bs-target="#myCarousel" data-bs-slide-to="0"
                                                            class="active" aria-current="true" aria-label="Slide 1"
                                                            style="width:100px;height:100px"
                                                            src="/public/go_system/images/piping-detail.jpg">
                                                        <img data-bs-target="#myCarousel" data-bs-slide-to="1"
                                                            aria-label="Slide 2" style="width:100px;height:100px"
                                                            src="/public/go_system/images/piping-detail2.jpg">
                                                        <img data-bs-target="#myCarousel" data-bs-slide-to="2"
                                                            aria-label="Slide 3" style="width:100px;height:100px"
                                                            src="/public/go_system/images/piping-detail3.jpg">
                                                    </div>
                                                    <div class="carousel-inner">
                                                        <div class="carousel-item active">
                                                            <div class="img-wraping">
                                                                <img style="width:100%;height: auto;"
                                                                    src="/public/go_system/images/piping-detail.jpg"
                                                                    alt="">
                                                                <img style="width:100%;height: auto;"
                                                                    class="leather-pattern"
                                                                    src="/public/go_system/images/piping-detail.png"
                                                                    alt="">
                                                            </div>
                                                        </div>

                                                        <div class="carousel-item">
                                                            <div class="img-wraping">
                                                                <img style="width:100%;height: auto;"
                                                                    src="/public/go_system/images/piping-detail2.jpg"
                                                                    alt="">
                                                                <img style="width:100%;height: auto;"
                                                                    class="leather-pattern"
                                                                    src="/public/go_system/images/piping-detail2.png"
                                                                    alt="">
                                                            </div>
                                                        </div>


                                                        <div class="carousel-item">
                                                            <div class="img-wraping">
                                                                <img style="width:100%;height: auto;"
                                                                    src="/public/go_system/images/piping-detail3.jpg"
                                                                    alt="">
                                                                <img style="width:100%;height: auto;"
                                                                    class="leather-pattern"
                                                                    src="/public/go_system/images/piping-detail3.png"
                                                                    alt="">
                                                            </div>
                                                        </div>



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
                                                <div
                                                    style="display: flex;flex-direction: row;justify-content: space-between;margin: 0px 10%;">
                                                    <div style="display: flex;flex-direction: column;">
                                                        <h6 class="title-right-product">Make:</h6>
                                                        <p class="content-right-product"> BMW</p>
                                                    </div>
                                                    <div style="display: flex;flex-direction: column;">
                                                        <h6 class="title-right-product">Model:</h6>
                                                        <p class="content-right-product">2-Series</p>
                                                    </div>
                                                    <div style="display: flex;flex-direction: column;">
                                                        <h6 class="title-right-product">Year:</h6>
                                                        <p class="content-right-product">2017</p>
                                                    </div>
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
                                                    <div style="display: flex;flex-direction: row;">
                                                        <div class="card-coloroption" style="background-color: #452E34;">
                                                        </div>
                                                        <div class="card-coloroption" style="background-color: #9FC4CE;">
                                                        </div>
                                                        <div class="card-coloroption" style="background-color: #442452;">
                                                        </div>
                                                        <div class="card-coloroption" style="background-color: #8F5153;">
                                                        </div>
                                                        <div class="card-coloroption" style="background-color: #E35A7E;">
                                                        </div>
                                                    </div>
                                                    <div style="display: flex;flex-direction: row;">
                                                        <div class="card-coloroption" style="background-color: #7C6F3B;">
                                                        </div>
                                                        <div class="card-coloroption" style="background-color: #D4C0AD;">
                                                        </div>
                                                        <div class="card-coloroption" style="background-color: #484343;">
                                                        </div>
                                                        <div class="card-coloroption" style="background-color: #272526;">
                                                        </div>
                                                        <div class="card-coloroption" style="background-color: #AAA29C;">
                                                        </div>
                                                    </div>
                                                    <!--END COLOR OPTION-->
                                                    <div style="display: flex;flex-direction: column;">
                                                        <hr class="hr-product-detail">
                                                    </div>
                                                    <div style="display: flex;flex-direction: column;">
                                                        <div style="display: flex;justify-content: space-between;">
                                                            <h4 style="font-weight: bold;">Total</h4>
                                                            <h4 id="total" style="color:#BF1D2C;font-weight:bold;">RM
                                                                XXXX</h4>
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
