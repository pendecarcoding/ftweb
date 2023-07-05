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
                        <div class="mdl-card mdl-card__login mdl-shadow--2dp">
                            <div class="mdl-card__supporting-text color--dark-gray">
                                <div class="mdl-grid">
                                    <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone">
                                        <span class="text-color--smooth-black text-center">
                                            <center>Verify Your Email</center>
                                        </span>
                                    </div>
                                    @include('gosford.layouts.alert')
                                    <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone">
                                        <form action="{{ route('gosford.actlogin') }}" method="post">@csrf
                                            <div
                                                class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                                                <center><img style="width:80px" src="/public/aceweb/assets/img/envelope.png"
                                                        alt=""></center>
                                                <div style="text-align: center;padding: 25px 0px">
                                                    <p style="color: #727272;line-height: 1%;">You’re almost there! We have
                                                        sent an email to</p>
                                                    <b style="color:black">@php(!empty($email)) ? print $email:''
                                                        @endphp</b>
                                                    <br>
                                                    <br>
                                                    <p style="color: #727272;">@php(!empty($success)) ? print
                                                        $success:'' @endphp</p>
                                                </div>
                                                <div
                                                    style="text-align: center;color: #727272;font-size: 13px;line-height: 1%;">
                                                    Didn’t get the mail?
                                                </div>
                                            </div>
                                            <center>

                                                <button class="mdl-button mdl-js-button mdl-button--raised color--gray">
                                                    Resend Email
                                                </button>

                                            </center>
                                        </form>




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
