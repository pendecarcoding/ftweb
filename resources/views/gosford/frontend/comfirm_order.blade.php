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
                                        Our friendly sales representative will contact you within 1-2 business day via email
                                        or phone to confirm your order details.</h6>

                                    <br>
                                    <center>

                                        <a href="{{ url('product_project') }}" style="padding: 0px 30px;" type="submit"
                                            class="mdl-button mdl-js-button mdl-button--raised color--gray"
                                            data-upgraded=",MaterialButton">
                                            Done
                                        </a>

                                    </center>
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
