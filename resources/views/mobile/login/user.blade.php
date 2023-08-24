@extends('acewebfront.layouts-mobile')
@section('content')
    <div style="height:100vh;" class="card text-left">
        <div class="card-body" style="

                margin-top: 50%;
            ">
            <div class="mb-5 text-center">
                <img src="{{ uploaded_asset(get_setting('system_logo_white')) }}" class="mw-100 mb-4" height="50">
            </div>
            <form class="pad-hor" method="POST" role="form" action="{{ route('gosford.front.actlogin') }}">
                {{ csrf_field() }}
                <div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span style="height: 40px;
                                      border-radius: 0px;"
                                class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
                        </div>
                        <input required name="username" type="text" class="form-control" placeholder="Username"
                            aria-label="Username" aria-describedby="basic-addon1">
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span style="height: 40px;
                                      border-radius: 0px;"
                                class="input-group-text" id="basic-addon1"><i class="fa fa-lock"></i></span>
                        </div>
                        <input id="password" type="password" class="form-control" name="password" required=""
                            placeholder="Password">
                    </div>
                </div>

                <div class="row mb-2">

                </div>
                <div class="form-group">
                    <button
                        style="width: 100%;
                                background-color: #dc3545;
                                border: #dc3545;"
                        type="submit" class="btn btn-primary btn-lg btn-block">
                        LOGIN
                    </button>
                    <br>
                    <center>
                        <p style="margin-top: 5px;color:#959595">Don't have an account? <span><a
                                    style="color:#959595;text-decoration: none;"
                                    href="{{ route('gosford.front.register') }}">Create
                                    account</a></span></p>

                        <p><span><a style="color:#959595;text-decoration: none;"
                                    href="{{ route('gosford.front.forgotpass') }}">Forgot Password</a></span></p>
                    </center>

                </div>
            </form>

        </div>
    </div>
@endsection
