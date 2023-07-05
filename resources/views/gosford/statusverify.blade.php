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
                            <span class="text-color--smooth-black text-center"><center>@php  (!empty($status)) ? print $status['status']:'' @endphp</center></span>
                        </div>
                        @include('gosford.layouts.alert')
                        <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone">

                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                                <center>
                                    @if (!empty($status))
                                      @if($status['status']!='Invalid')
                                    <img style="width:80px" src="/public/aceweb/assets/img/success.png" alt="">
                                      @else
                                      <img style="width:80px" src="/public/aceweb/assets/img/unsuccess.png" alt="">
                                      @endif
                                      @endif
                                </center>
                                <div style="text-align: center;padding: 25px 0px">
                                   <p style="color: #727272;">@php  (!empty($status)) ? print $status['message']:'' @endphp</p>
                                </div>

                            </div>
                            <center>
                                @if (!empty($status))
                                  @if($status['status']!='Invalid')
                                    <a href="{{route('gosford.login')}}"  class="mdl-button mdl-js-button mdl-button--raised color--gray">
                                        Continue
                                    <a>
                                  @endif
                                  @endif

                            </center>





                        </div>

                    </div>
                </div>
            </div>
    </main>
</div>
@endsection


