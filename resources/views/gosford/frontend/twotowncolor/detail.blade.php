@extends('acewebfront.layouts')
@section('meta')
    <meta property="og:image" content="{{ uploaded_asset(get_setting('site_icon')) }}" />
@endsection
@section('content')
    <main>
        <section class="ace-investor">

            <div class="col-md-12">
                <div class="banner-static">
                    <img class="img-responsive-banner" src="/public/aceweb/assets/img/contact-banner.png"
                        alt="ACE-BANNER-PRODUCT" />
                </div>
            </div>
        </section>

        <section class="gtp-anouncements" style="background-color: rgb(247, 246, 246);">
            <div class="content-ace">
                <div class="wrap-content">

                    <div style="padding-top: 0px" class="ace-isi">


                        <div class="container">
                            <div class="container">
                                <center>
                                    <h5 style="color: black;font-weight: bold;">Two Tone Color</h5>
                                </center>
                                <br>
                                <div class="row">
                                    <div class="col-md-8 col-sm-12">
                                        <div class="card">
                                            <div class="slider-product">
                                                <div style="display: flex;flex-direction: column; padding: 20px;">
                                                    <p>A012-Nappa Leather</p>
                                                    <img style="height: 400px;" class="img-responsive"
                                                        src="/public/go_system/images/twotowncolordetail.png" alt="">


                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <div class="card">
                                            <div style="padding:20px;">
                                                <div
                                                    style="display: flex;flex-direction: row;justify-content: space-between;">
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



                                                    Step-1 | Color Option
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
                                                    <!--COLOR 2 Option-->
                                                    Step-2 | Color Option

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
                                                    <!--END COLOR 2 OPTION-->



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
                                                            <a href="{{ route('gosford.twotowncolor') }}"
                                                                style="padding: 0px 30px;" type="submit"
                                                                class="mdl-button mdl-js-button mdl-button--raised btn-back"
                                                                data-upgraded=",MaterialButton">
                                                                Back
                                                            </a>
                                                            <a href="{{ route('gosford.finish.design') }}" style="padding: 0px 30px;" type="submit"
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


@endsection
