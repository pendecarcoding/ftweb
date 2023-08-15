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

                    <div style="padding-top: 0px" class="ace-isi about">


                        <div class="container" style="padding: 0px 28%;">
                            <div class="mdl-card mdl-card__login mdl-shadow--2dp">
                                <div class="mdl-card__supporting-text color--dark-gray">
                                    <div class="mdl-grid">
                                        <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone">
                                            <span class="text-color--smooth-black text-center-go">
                                                <center>Create Gosford Account</center>
                                            </span>
                                        </div>
                                        @include('gosford.layouts.alert')
                                        <form action="{{route('gosford.addacount.front')}}" method="post">@csrf
                                        <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone">
                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                                                <input placeholder="username" name="username" class="mdl-textfield__input" type="text" required>

                                            </div>
                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                                                <input placeholder="Contact Number  (Please enter a valid contact number)" name="contact_number" class="mdl-textfield__input" type="text" required>

                                            </div>
                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                                                <input placeholder="Email Address (Please enter a valid email address)" name="email" class="mdl-textfield__input" type="text" required>

                                            </div>
                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                                                <input placeholder="Password" name="password" class="mdl-textfield__input" type="password" id="password" required>

                                            </div>
                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                                                <input placeholder="Confirm Password" name="password_confirmation" class="mdl-textfield__input" type="password" id="password_confirmation" required>
                                            </div>
                                            <div style="text-align: center;color:#747474 ;" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                                                <span><input type="checkbox" class="btn-check" id="btn-check-outlined" autocomplete="off">
                                                    <label class="btn btn-outline-primary" for="btn-check-outlined"><img src="/public/aceweb/assets/img/check-circle.png" alt=""></label></span><span> &nbsp; I’ve read and agree to</span> <span><a class="login-link" href="#">Terms & Conditions</a></span>
                                            </div>
                                            <br>
                                            <center>

                                                    <button type="submit" class="mdl-button mdl-js-button mdl-button--raised color--gray">
                                                        REGISTER
                                                    </button>

                                            </center>
                                        </form>
                                            <center>
                                                <div style="justify-content: center;"
                                                    class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone submit-cell">
                                                    <a class="login-link hover-a">Already have an account?</a>
                                                    <div style="flex-grow: 0.05;" class="mdl-layout-spacer"></div>
                                                    <a style="color: #00bcd4;" data-bs-toggle="modal" data-bs-target="#exampleModal" class="login-link">Login here</a>

                                                </div>
                                            </center>



                                        </div>

                                    </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="modal fade modaldiscount" id="discountbanner" tabindex="-1">
                <div class="modal-dialog modal-md">
                    <div style="background-color: transparent;border:none;" class="modal-content">



                        <div class="modal-body">
                            <button style="position: absolute;
                    left: 90%;" type="button"
                                class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">X</button>
                            <img class="img-responsive" src="{{ static_asset('aceweb') }}/assets/img/popupdiscounts.gif">
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
