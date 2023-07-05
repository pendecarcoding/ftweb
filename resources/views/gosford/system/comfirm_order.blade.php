@extends('gosford.layouts.template')
@section('content')
    <div class="mdl-layout mdl-js-layout color--gray is-small-screen login">
        @include('gosford.system.header')
        <main class="mdl-layout__content" style="background: rgb(247, 246, 246);flex-direction: column;">
            <div class="container" style="text-align: center;    padding: 50px 0px;">
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

                            <a href="{{route('gosford.listorder')}}" style="padding: 0px 30px;" type="submit" class="mdl-button mdl-js-button mdl-button--raised color--gray" data-upgraded=",MaterialButton">
                                Done
                            </a>

                        </center>
                    </div>
                </div>

            </div>

        </main>
    </div>
@endsection
