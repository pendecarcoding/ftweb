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
                            <span class="text-color--smooth-black text-center"><center>Verify Your Email</center></span>
                        </div>
                        @include('gosford.layouts.alert')
                        <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone">
                           <form action="{{route('gosford.actlogin')}}" method="post">@csrf
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                                <center><img style="width:80px" src="/public/aceweb/assets/img/envelope.png" alt=""></center>
                                <div style="text-align: center;padding: 25px 0px">
                                   <p style="color: #727272;line-height: 1%;">You’re almost there! We have sent an email to</p>
                                   <b style="color:black">@php  (!empty($email)) ? print $email:'' @endphp</b>
                                   <br>
                                   <br>
                                   <p style="color: #727272;">@php  (!empty($success)) ? print $success:'' @endphp</p>
                                </div>
                                <div style="text-align: center;color: #727272;font-size: 13px;line-height: 1%;">
                                    Didn’t get the mail?
                                </div>
                            </div>
                            <center>

                                    <button type="submit"  class="mdl-button mdl-js-button mdl-button--raised color--gray">
                                        Resend Email
                                    </button>

                            </center>
                           </form>




                        </div>

                    </div>
                </div>
            </div>
    </main>
</div>
@endsection


