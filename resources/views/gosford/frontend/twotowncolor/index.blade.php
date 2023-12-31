@extends('acewebfront.layouts')
@section('meta')
    <meta property="og:image" content="{{ uploaded_asset(get_setting('site_icon')) }}" />
@endsection
@section('content')
<style>
    .lg-img-wrap{
    padding:50px;
}
.lg-outer .lg-object {
    display: inline-block;
    vertical-align: middle;
    max-width: 100%;
    max-height: 100%;
    width: 900px;
    object-fit: cover;
    height: auto;
    position: relative;
}
@media screen and (min-width:1920px) {
    .lg-outer .lg-object {
    display: inline-block;
    vertical-align: middle;
    max-width: 100%;
    max-height: 100%;
    width: 1230px;
    object-fit: cover;
    height: auto;
    position: relative;
}
}
</style>
    <main>
        @include('acewebfront.widget.allbaner')
        <section class="gtp-anouncements" style="background-color: rgb(247, 246, 246);">
            <div class="content-ace">
                <div class="wrap-content">
                    <div style="padding-top: 0px" class="ace-isi">
                        <div class="container">
                            <a href="{{ url('product_project') }}" style="float:right" class="btn btn-danger"><i
                                    class="fa fa-times"></i></a>
                            <center>
                                <h2>Two Tone Color</h2>
                            </center>

                            <br>
                            <div class="row" id="gallery">
                                @foreach ($data as $i => $v)

                                    <div class="col-md-2" href="{{ getimage($v->img) }}">
                                        <div class="card towncard">
                                            <!-- <a href="{{ route('gosford.twotowncolor.detail', base64_encode($v->id)) }}" -->

                                            <div
                                                class="card-body">
                                                <!-- Card content goes here -->
                                                <img style="width:100%" src="{{ getimage($v->img) }}" alt="">
                                                <p class="card-text center" style="margin-top: 11px;">{{ $v->name_town }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                            <div style="display: flex;justify-content: center;">{{ $data->links() }}</div>
                            <div style="text-align: center;padding: 20px 0px;">
                                <h2>Other Product Option</h2>
                                <br>
                                <div style="display: flex;flex-direction: row;justify-content: space-between;gap:10px">

                                    <div class="card" style="padding: 10px;width:100%"><a
                                            href="{{ route('gosford.piping') }}" class="menu-href">Stitching & Piping</a></div>
                                    <!-- <div class="card" style="padding: 10px;width:100%"><a
                                                href="{{ route('gosford.emblem') }}" class="menu-href">Logo/Emblem</a></div> -->
                                    <div class="card" style="padding: 10px;width:100%"><a
                                            href="{{ route('gosford.patterndesign') }}" class="menu-href">Pattern
                                            Design</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script>
        // Initialize LightGallery
        lightGallery(document.getElementById('gallery'), {
        thumbnail: true,
        download:false
    });

    </script>

@endsection

