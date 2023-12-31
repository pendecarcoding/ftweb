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
                                                <center>Login Gosford Account</center>
                                            </span>
                                        </div>
                                                                <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone">
                                            <form action="{{route('gosford.front.actlogin')}}" method="post">
                                                @csrf
                                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size is-invalid is-upgraded" data-upgraded=",MaterialTextfield">
                                                    <input class="mdl-textfield__input" type="text" name="username" required="">
                                                    <label class="mdl-textfield__label" for="e-mail">Username or email address</label>
                                                </div>
                                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size is-invalid is-upgraded" data-upgraded=",MaterialTextfield">
                                                    <input class="mdl-textfield__input" type="password" id="password" name="password" required="">
                                                    <label class="mdl-textfield__label" for="password">Password</label>
                                                    <i class="fa-solid fa-eye" id="eye"></i>
                                                </div>
                                                <center>

                                                    <button type="submit" class="mdl-button mdl-js-button mdl-button--raised color--gray" data-upgraded=",MaterialButton">
                                                        SIGN IN
                                                    </button>

                                                </center>
                                            </form>
                                            <center>
                                                <div style="justify-content: center;" class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone submit-cell">
                                                    <a class="login-link">Don't have account?</a>
                                                    <div style="flex-grow: 0.05;" class="mdl-layout-spacer"></div>
                                                    <a style="color: #00bcd4;" href="{{route('gosford.front.register')}}" class="login-link">Register Here</a>

                                                </div>
                                            </center>



                                        </div>

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
