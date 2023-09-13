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
                                    <h5 style="color: black;font-weight: bold;">Two Tone Color</h5>
                                </center>
                                <br>
                                <div class="row" style="height: 600px;">
                                    <div class="col-md-8 col-sm-12">
                                        <div class="card">
                                            <div class="slider-product">
                                                <div style="display: flex;flex-direction: column; padding: 20px;">
                                                    <p>A012-Nappa Leather</p>
                                                    <div class="img-wraping-town">
                                                        <img style="height: 400px;"src="{{getimage($data->base_img)}}"
                                                            alt="">
                                                        <img style="height: 180px;" class="twon-color1"
                                                            src="{{getimage($data->color_img1)}}" alt="">
                                                        <img style="height: 112px;" class="twon-color2"
                                                            src="{{getimage($data->color_img2)}}" alt="">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <div class="card">
                                            <div style="padding:20px;">


                                                <form action="{{ route('gosford.order_comfirmed') }}" method="post">@csrf

                                                    <div style="display: flex;flex-direction: column;">
                                                        <h3>customize your color</h3>
                                                        <hr class="hr-product-detail">
                                                    </div>



                                                    Step-1 | Color Option
                                                    <!--COLOR OPTION-->
                                                    <div style="display: flex; flex-wrap: wrap;">
                                                        @foreach($color1 as $c1)
                                                        <div class="card-coloroption-one"
                                                            style="background-color: {{$c1}}">
                                                        </div>
                                                        @endforeach

                                                    </div>
                                                    <!--END COLOR OPTION-->
                                                    <!--COLOR 2 Option-->
                                                    <br>
                                                    Step-2 | Color Option

                                                    <div style="display: flex; flex-wrap: wrap;">
                                                        @foreach($color2 as $c2)
                                                        <div class="card-coloroption-two"
                                                            style="background-color: {{$c2}};">
                                                        </div>
                                                        @endforeach
                                                    </div>

                                                    <!--END COLOR 2 OPTION-->



                                                    <div style="display: flex;flex-direction: column;">
                                                        <hr class="hr-product-detail">
                                                    </div>

                                                    <div style="display: flex;flex-direction: column;">
                                                        <div style="display: flex;justify-content: space-between;">
                                                            <h4 style="font-weight: bold;">Total</h4>
                                                            <h4 id="total" style="color:#BF1D2C;font-weight:bold;">RM
                                                                {{$data->price}}</h4>
                                                        </div>
                                                        <br>
                                                        <div style="display: flex;justify-content: space-between;">
                                                            <a href="{{ route('gosford.twotowncolor') }}"
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
    </main>
    <script src="/public/go_system/js/twontwocolor.js"></script>
@endsection
