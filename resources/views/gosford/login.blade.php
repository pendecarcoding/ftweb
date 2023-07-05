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
                                <center>Login Gosford Account</center>
                            </span>
                        </div>
                        @include('gosford.layouts.alert')
                        <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone">
                            <form action="{{ route('gosford.actlogin') }}" method="post">@csrf
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                                    <input class="mdl-textfield__input" type="text" name="username" required>
                                    <label class="mdl-textfield__label" for="e-mail">Username or email address</label>
                                </div>
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                                    <input class="mdl-textfield__input" type="password" id="password" name="password"
                                        required>
                                    <label class="mdl-textfield__label" for="password">Password</label>
                                    <i class="fa-solid fa-eye" id="eye"></i>
                                </div>
                                <center>

                                    <button type="submit" class="mdl-button mdl-js-button mdl-button--raised color--gray">
                                        SIGN IN
                                    </button>

                                </center>
                            </form>
                            <center>
                                <div style="justify-content: center;"
                                    class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone submit-cell">
                                    <a class="login-link">Don't have account?</a>
                                    <div style="flex-grow: 0.05;" class="mdl-layout-spacer"></div>
                                    <a style="color: #00bcd4;" href="{{ route('gosford.register') }}"
                                        class="login-link">Register Here</a>

                                </div>
                            </center>



                        </div>

                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection
