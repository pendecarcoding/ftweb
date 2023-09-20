@extends('acewebfront.layouts')
@section('meta')
    <meta property="og:image" content="{{ uploaded_asset(get_setting('site_icon')) }}" />
@endsection
@section('content')
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
                                <h2>Stitching</h2>
                            </center>
                            <br>
                            <div class="row">

                                @foreach ($data as $i => $v)
                                    <div class="col-md-3">
                                        <div class="card towncard">
                                            <div class="card-body">
                                                <!-- Card content goes here -->
                                                <img style="width:100%" src="{{ getimage($v->img) }}" alt="">
                                                <div class="card-body d-flex flex-column">
                                                    <!-- <p class="category-product">ALL CAR</p> -->
                                                    <p class="name-product">{{ $v->name_piping }}</p>
                                                    <!-- <h6 class="price-product">RM {{ $v->price }}</h6> -->
                                                </div>
                                                <a style="cursor: none;" href="#">
                                                    <!-- <a href="{{ route('gosford.piping.detail', base64_encode($v->id)) }}"> -->
                                                    <!-- <div class="choice-design"> -->
                                                        <!-- <center>Choose this design</center> -->
                                                    <!-- </div> -->
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                                <div style="display: flex;justify-content: center;">{{ $data->links() }}</div>

                            </div>

                            <div style="text-align: center;padding: 20px 0px;">
                                <h2>Other Product Option</h2>
                                <br>
                                <div style="display: flex;flex-direction: row;justify-content: space-between;gap:10px">
                                    <div class="card" style="padding: 10px;width:100%"><a
                                            href="{{ route('gosford.twotowncolor') }}" class="menu-href">Two Tone
                                            Color</a></div>

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
        <!-- <div class="wa-floating-button" onclick="openWhatsApp()">
                                        <span class="whatsapp-icon"><i class="fa fa-phone"></i></span>
                                    </div> -->

    </main>
@endsection
