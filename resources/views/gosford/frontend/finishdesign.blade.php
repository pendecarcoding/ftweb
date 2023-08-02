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

        <!-- <section class="gtp-anouncements" style="background-color: rgb(247, 246, 246);">
            <div class="content-ace">
                <div class="wrap-content">

                    <div style="padding-top: 0px" class="ace-isi">

                        <div class="container container-co" style="text-align: center;">
                            <div class="center-made">
                                <div class="title-order">
                                    <h3>Thank You!</h3>
                                </div>
                                <div class="content-comfirm">
                                    <img style="width: 60px;" src="/public/go_system/images/vector.png" alt="">
                                    <br>
                                    <br>
                                    <h6>We have received your submission.
                                        Our friendly sales representative will contact you within 1-2 business day via email or phone to confirm your order details.</h6>

                                    <br>

                                    <center>

                                        <a href="{{url('product_project')}}" style="padding: 0px 30px;" type="submit" class="mdl-button mdl-js-button mdl-button--raised color--gray" data-upgraded=",MaterialButton">
                                            Done
                                        </a>

                                    </center>
                                </div>
                            </div>

                        </div>


                    </div>
                </div>
            </div>


        </section> -->
        <section class="pt-5 pb-5">
            <div style="text-align: center;font-weight: bold;padding: 20px;">
                <h2 style="font-weight: bold;">Thank You!</h2>
            </div>
            <div style="margin: 0px 25%"><center><h6>We have received your submission.
                Our friendly sales representative will contact you within 1-2 business day via email or phone to confirm your order details.</h6>
            </center>
            </div>
            <br>
            <div class="row d-flex" style="justify-content: center;">

                <div class="col-sm-6 col-md-2  d-flex ">

                    <a href="https://gli.test/g_system/gosford/f/twotowncolor" class="card  card-body border-light  justify-content-between text-white shadow">
                        <!-- <a >  -->
                        <img src="/public/go_system/images/menu/menu_1.png" alt="">
                        <!-- </a> -->
                        <div class="title-menu-style">Two Tone Color</div>
                    </a>

                </div>
                <div class="col-sm-6 col-md-2  d-flex ">
                    <a href="https://gli.test/g_system/gosford/f/embrodery" class="card  card-body border-light  justify-content-between  text-white shadow">
                        <img src="/public/go_system/images/menu/menu_2.png" alt="">
                        <div class="title-menu-style">Embrodery</div>
                    </a>
                </div>
                <div class="col-sm-6 col-md-2  d-flex ">
                    <a href="https://gli.test/g_system/gosford/f/patterndesign" class="card  card-body border-light  justify-content-between  text-white shadow">
                        <img src="/public/go_system/images/menu/menu_3.png" alt="">
                        <div class="title-menu-style">Pattern Design</div>
                    </a>
                </div>
                <div class="col-sm-6 col-md-2  d-flex ">
                    <a href="https://gli.test/g_system/gosford/f/piping" class="card  card-body border-light  justify-content-between  text-white shadow">
                        <img src="/public/go_system/images/menu/menu_4.png" alt="">
                        <div class="title-menu-style">Piping</div>
                    </a>
                </div>
                <div class="col-sm-6 col-md-2  d-flex ">
                    <a href="https://gli.test/g_system/gosford/f/emblem" class="card  card-body border-light  justify-content-between  text-white shadow">
                        <img src="/public/go_system/images/menu/menu_5.png" alt="">
                        <div class="title-menu-style">Logo / Emblem</div>
                    </a>
                </div>

            </div>
            <br>
            <br>
            <center>

                <a href="{{route('gosford.front.choice_design')}}" style="padding: 0px 30px;" type="submit" class="mdl-button mdl-js-button mdl-button--raised color--gray" data-upgraded=",MaterialButton">
                    Done
                </a>

            </center>



        </section>
        <!-- <div class="wa-floating-button" onclick="openWhatsApp()">
            <span class="whatsapp-icon"><i class="fa fa-phone"></i></span>
        </div> -->

    </main>



@endsection
