@extends('acewebfront.layouts')
@section('content')
    <main>

        @include('acewebfront.widget.allbaner')
        <section class="gtp-ann" style="height:auto;position: relative;">
            <div class="container-fluid">
                <div class="row">
                    @include('backstaff.sidebar')


                    <br>




                    <div class="col-sm-9" style="padding: 36px;">

                        <div class="well"
                            style="    top: 0;
            padding: 7px;
            display: flex;
            justify-content: space-around;
            position: fixed;
            width: -webkit-fill-available;z-index: 1;">


                        </div>
                        <div class="well" style="margin-top:50px;height: auto;position: relative;">

                            <div class="col-md-12">
                                @include('acewebfront.pages.alert')
                                <form action="{{ route('staff.update') }}" method="post">{{ csrf_field() }}
                                    <div class="image-rounded">
                                        <center>

                                            <!-- <img class="img-circle" style="width:100px;" src="https://png.pngtree.com/png-vector/20220709/ourmid/pngtree-businessman-user-avatar-wearing-suit-with-red-tie-png-image_5809521.png" alt="">
                                    -->
                                            <div class="name-login">
                                                <h4 style="color:#929292">{{ $data->display_name }}</h4>

                                                <h5 style="color:#929292">{{ $data->position }}</h5>
                                            </div>
                                        </center>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Full Name"
                                            value="{{ $data->name }}" name="name" required>
                                        <input type="hidden" value="{{ $data->id }}" name="id" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Display Name"
                                            value="{{ $data->display_name }}" name="display_name" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="POSITION"
                                            value="{{ $data->position }}" name="position" required>

                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="STAFF ID"
                                            value="{{ $data->stuff_id }}" name="stuff_id" required>

                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="EMAIL"
                                            value="{{ $data->email }}" name="email" required>

                                    </div>
                                    <div class="form-group">
                                        <button style="width:100%" class="btn btn-primary">UPDATE</button>
                                        <a data-bs-toggle="modal" data-bs-target="#exampleModal"
                                            style="width:100%;margin-top:20px" class="btn btn-warning"><i
                                                class="fa fa-key"></i>Change Password</a>

                                    </div>
                                </form>

                            </div>

                        </div>
                    </div>

                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">


                                <div class="card text-left">
                                    <div class="card-header">
                                        <a data-bs-dismiss="modal" aria-label="Close" style="float:right"
                                            class="btn btn-danger"><i class="fa fa-times"></i></a>
                                        <h5>Update Password</h5>

                                    </div>
                                    <div class="card-body"
                                        style="
                                    padding-left: 10px auto;padding-top:15px;
                                ">

                                        <form class="pad-hor" method="POST" role="form"
                                            action="{{ route('staff.update.password') }}">
                                            {{ csrf_field() }}
                                            <div style="margin-left: 20px;margin-right: 20px;">
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span
                                                            style="height: 40px;
                                                      border-radius: 0px;"
                                                            class="input-group-text" id="basic-addon1"><i
                                                                class="fa fa-key"></i></span>
                                                    </div>
                                                    <input required name="oldpass" type="password" class="form-control"
                                                        placeholder="Old Pass" aria-label="oldpass"
                                                        aria-describedby="basic-addon1">
                                                </div>
                                                <input type="hidden" value="{{ $data->id }}" name="id" required>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span
                                                            style="height: 40px;
                                                      border-radius: 0px;"
                                                            class="input-group-text" id="basic-addon1"><i
                                                                class="fa fa-key"></i></span>
                                                    </div>
                                                    <input id="password" type="password" class="form-control"
                                                        name="pass1" required="" placeholder="New Password">
                                                </div>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span
                                                            style="height: 40px;
                                                      border-radius: 0px;"
                                                            class="input-group-text" id="basic-addon1"><i
                                                                class="fa fa-key"></i></span>
                                                    </div>
                                                    <input id="password" type="password" class="form-control"
                                                        name="pass2" required="" placeholder="Confirm Password">
                                                </div>

                                            </div>

                                            <div class="row mb-2">

                                            </div>
                                            <div class="form-group">
                                                <button style="width:100%;background-color: #264e77;border: #264e77;"
                                                    type="submit" class="btn btn-primary btn-lg btn-block">
                                                    Change
                                                </button>
                                                <br>

                                            </div>
                                        </form>

                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>








                </div>
            </div>
            </div>
        </section>
    </main>
@endsection
