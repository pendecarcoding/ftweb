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
                        @include('gosford.layouts.alert')
                <div class="main-body">
                      <div class="row gutters-sm">
                        @include('gosford.frontend.panel-profil')
                        <div style="display:none" id="formeditProfil" class="col-md-8">
                          <form action="{{route('gosford.profil.update')}}" method="post">{{csrf_field()}}
                          <div class="card mb-3">
                            <div class="card-body">
                              <div class="row">
                                <div class="col-sm-3">
                                  <h6 class="mb-0">Full Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                  <input name="full_name" value="{{$profil->full_name}}" type="text" class="form-control">
                                </div>
                              </div>
                              <hr>
                              <div class="row">
                                <div class="col-sm-3">
                                  <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input name="email" type="text" class="form-control" value="{{$profil->email}}">
                                </div>
                              </div>
                              <hr>
                              <div class="row">
                                <div class="col-sm-3">
                                  <h6 class="mb-0">Contact Number</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input name="contact_number" value="{{$profil->contact_number}}" type="text" class="form-control">
                                </div>
                              </div>
                              <hr>
                              <div class="row">
                                <div class="col-sm-3">
                                  <h6 class="mb-0">Address</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                   <textarea name="address"  class="form-control" required></textarea>
                                </div>
                              </div>
                              <hr>
                              <div class="row">
                                <div class="col-sm-12">
                                  <button  style="width:100%" class="btn btn-danger " type="submit">Update</a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </form>
                        </div>
                        <div id="beforeedit" class="col-md-8">
                          <div class="card mb-3">
                            <div class="card-body">
                              <div class="row">
                                <div class="col-sm-3">
                                  <h6 class="mb-0">Full Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{$profil->full_name}}
                                </div>
                              </div>
                              <hr>
                              <div class="row">
                                <div class="col-sm-3">
                                  <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{$profil->email}}
                                </div>
                              </div>
                              <hr>
                              <div class="row">
                                <div class="col-sm-3">
                                  <h6 class="mb-0">Contact Number</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{$profil->contact_number}}
                                </div>
                              </div>

                              <hr>
                              <div class="row">
                                <div class="col-sm-3">
                                  <h6 class="mb-0">Address</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{$profil->address}}
                                </div>
                              </div>
                              <hr>

                            </div>
                          </div>





                        </div>
                      </div>

                    </div>
                </div>


        </main>
    </div>
    <script>
        function editprofil() {
        const beforeedit = document.getElementById('beforeedit');
        const formeditProfil = document.getElementById('formeditProfil');
        const toggleProfil = document.getElementById('toggleProfil');
        // Hide the element by setting display to 'none'
        const currentDisplay = beforeedit.style.display;
        if (currentDisplay === 'none') {
            beforeedit.style.display = 'block';
            formeditProfil.style.display = 'none';
            toggleProfil.innerText = 'Edit Profil';
        } else {
            beforeedit.style.display = 'none';
            formeditProfil.style.display = 'block';
            toggleProfil.innerText = 'Cancel';
        }
        }
    </script>
@endsection
