@extends('gosford.layouts.template')
@section('content')
    <div class="mdl-layout mdl-js-layout color--gray is-small-screen login">
        <header class="mdl-layout__header is-casting-shadow">
            <div aria-expanded="false" role="button" tabindex="0" class="mdl-layout__drawer-button">
                <img src="/public/go_system/images/logo.png" alt="">
            </div>
            <div class="mdl-layout__header-row">
                <div class="mdl-layout-spacer"></div>
                <!-- Search-->

            </div>
        </header>
        <main class="mdl-layout__content">
            <div class="mdl-card mdl-card__login mdl-shadow--2dp">
                <div class="mdl-card__supporting-text color--dark-gray">
                    <div class="mdl-grid">
                        <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone">
                            <span class="text-color--smooth-black text-center">
                                <center>Create Gosford Account</center>
                            </span>
                        </div>
                        @include('gosford.layouts.alert')
                        <form action="{{route('gosford.addacount')}}" method="post">@csrf
                        <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                                <input name="username" class="mdl-textfield__input" type="text" required>
                                <label  class="mdl-textfield__label" for="username">Username</label>
                            </div>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                                <input name="contact_number" class="mdl-textfield__input" type="text" required>
                                <label class="mdl-textfield__label" for="e-mail">Contact Number  (Please enter a valid contact number)</label>
                            </div>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                                <input name="email" class="mdl-textfield__input" type="text" required>
                                <label class="mdl-textfield__label" for="e-mail">Email Address (Please enter a valid email address)</label>
                            </div>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                                <input name="password" class="mdl-textfield__input" type="password" id="password" required>
                                <label class="mdl-textfield__label" for="password">Password</label>
                                <i class="fa-solid fa-eye" id="eye"></i>
                            </div>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                                <input name="password_confirmation" class="mdl-textfield__input" type="password" id="password_confirmation" required>
                                <label class="mdl-textfield__label" for="password">Confirm Password</label>
                                <i class="fa-solid fa-eye" id="eye"></i>
                            </div>
                            <div style="text-align: center;color:#747474 ;" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                                <span><img src="/public/aceweb/assets/img/check-circle.png" alt=""></span><span> &nbsp; I’ve read and agree to</span> <span><a href="#">Terms & Conditions</a></span>
                            </div>

                            <center>

                                    <button type="submit" class="mdl-button mdl-js-button mdl-button--raised color--gray">
                                        REGISTER
                                    </button>

                            </center>
                        </form>
                            <center>
                                <div style="justify-content: center;"
                                    class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone submit-cell">
                                    <a class="login-link">Already have an account?</a>
                                    <div style="flex-grow: 0.05;" class="mdl-layout-spacer"></div>
                                    <a style="color: #00bcd4;" href="{{route('gosford.login')}}" class="login-link">Login here</a>

                                </div>
                            </center>



                        </div>

                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection
