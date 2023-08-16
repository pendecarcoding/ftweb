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

                        <div id="listorder" class="col-md-8">
                          <div class="card mb-3">
                            <div class="card-body">
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
