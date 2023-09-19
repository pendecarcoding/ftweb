@extends('acewebfront.layouts')
@section('meta')
    <meta property="og:image" content="{{ uploaded_asset(get_setting('site_icon')) }}" />
@endsection
@section('content')
    <main>
        @include('acewebfront.widget.allbaner')
        <section class="pt-5 pb-5">
            <div class="container">
                <div class="section-head text-center ">
                    <h2 class="text-capitalize">Automotive Covers</h2>

                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="description-service" style="color:#999999">We are delighted to present our latest
                            masterpiece to you – high-quality automotive leather. This copy will showcase the true charm of
                            this exquisite creation.
                            Designed exclusively for car owners, our top-tier leather embodies our unwavering commitment to
                            perfection. Each piece of leather material undergoes rigorous selection, ensuring that only the
                            finest, handpicked leather finds its way into our car interiors. Your distinguished status
                            deserves nothing less than the most elegant indulgence.
                            The high-quality leather boasts an astonishingly soft touch, providing a luxurious sensation
                            that soothes both body and mind. Selected from the finest raw materials, the leather's
                            durability surpasses ordinary standards, maintaining its shine and color as if new for a
                            prolonged period. Whether your journey is long or short, this elegance and refinement will
                            accompany you all the way.
                            Our leather represents more than just beauty; it exemplifies practicality and functionality.
                            Robust leather fibers and impeccable craftsmanship ensure outstanding abrasion resistance,
                            making it capable of withstanding daily wear while retaining a fresh appearance.
                            Excellence in quality goes hand in hand with our commitment to protecting the Earth. We are
                            dedicated to promoting environmental consciousness by adopting sustainable production methods,
                            ensuring that the leather manufacturing process is as eco-friendly as possible, without
                            unnecessary resource wastage. By choosing our leather, you are also contributing to a greener
                            future for our planet.
                        </div>


                    </div>
                </div>
            </div>
        </section>
        <section class="pt-5 pb-5">

            <div class="wrap-content">

                <div class="card">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="slider-product">
                                <div style="display: flex;flex-direction: column;">
                                    <div id="normalleather">
                                        <div id="carouselExampleIndicatorsd" class="carousel slide" data-bs-ride="carousel">
                                            <div class="carousel-indicators">
                                                <button id="btn-slider" type="button" data-bs-target="#carouselExampleIndicatorsd" data-bs-slide-to="0" class="btn-slide  active " aria-current="true" aria-label="Slide 0"></button>
                                                <button id="btn-slider" type="button" data-bs-target="#carouselExampleIndicatorsd" data-bs-slide-to="1" class="btn-slide " aria-label="Slide 1"></button>
                                                <button id="btn-slider" type="button" data-bs-target="#carouselExampleIndicatorsd" data-bs-slide-to="2" class="btn-slide " aria-label="Slide 2"></button>
                                                <button id="btn-slider" type="button" data-bs-target="#carouselExampleIndicatorsd" data-bs-slide-to="3" class="btn-slide " aria-label="Slide 3"></button>
                                                <button id="btn-slider" type="button" data-bs-target="#carouselExampleIndicatorsd" data-bs-slide-to="4" class="btn-slide " aria-label="Slide 4"></button>

                                            </div>
                                            <div class="carousel-inner">
                                                    <div class="carousel-item  active ">
                                                        <img class="section-slider" style="width: 100%;object-fit: cover;    " src="/public/go_system/images/sliderproduct/normalslide1.jpg">
                                                        <div class="col-md-6">
                                                        </div>
                                                    </div>
                                                    <div class="carousel-item ">
                                                        <img class="section-slider" style="width: 100%;object-fit: cover;    " src="/public/go_system/images/sliderproduct/normalslide2.jpg">
                                                        <div class="col-md-6">
                                                        </div>
                                                    </div>
                                                    <div class="carousel-item ">
                                                        <img class="section-slider" style="width: 100%;object-fit: cover;    " src="/public/go_system/images/sliderproduct/normalslide3.jpg">
                                                        <div class="col-md-6">
                                                        </div>
                                                    </div>
                                                    <div class="carousel-item ">
                                                        <img class="section-slider" style="width: 100%;object-fit: cover;    " src="/public/go_system/images/sliderproduct/normalslide4.jpg">
                                                        <div class="col-md-6">
                                                        </div>
                                                    </div>

                                                    <div class="carousel-item ">
                                                        <img class="section-slider" style="width: 100%;object-fit: cover;    " src="/public/go_system/images/sliderproduct/normalslide5.jpg">
                                                        <div class="col-md-6">
                                                        </div>
                                                    </div>

                                            </div>
                                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicatorsd" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                              </button>
                                              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicatorsd" data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                              </button>
                                        </div>
                                    </div>

                                    <div id="grainleather" style="display: none;">
                                        <div id="carouselExampleIndicatorsdg" class="carousel slide" data-bs-ride="carousel">
                                            <div class="carousel-indicators">
                                                <button id="btn-slider" type="button" data-bs-target="#carouselExampleIndicatorsdg" data-bs-slide-to="0" class="btn-slide  active " aria-current="true" aria-label="Slide 0"></button>
                                                <button id="btn-slider" type="button" data-bs-target="#carouselExampleIndicatorsdg" data-bs-slide-to="1" class="btn-slide " aria-label="Slide 1"></button>
                                                <button id="btn-slider" type="button" data-bs-target="#carouselExampleIndicatorsdg" data-bs-slide-to="2" class="btn-slide " aria-label="Slide 2"></button>
                                                <button id="btn-slider" type="button" data-bs-target="#carouselExampleIndicatorsdg" data-bs-slide-to="3" class="btn-slide " aria-label="Slide 3"></button>
                                                <button id="btn-slider" type="button" data-bs-target="#carouselExampleIndicatorsdg" data-bs-slide-to="4" class="btn-slide " aria-label="Slide 4"></button>

                                            </div>
                                            <div class="carousel-inner">
                                                <div class="carousel-item  active ">
                                                    <img class="section-slider" style="width: 100%;object-fit: cover;    " src="/public/go_system/images/sliderproduct/normalslide1.jpg">
                                                    <div class="col-md-6">
                                                    </div>
                                                </div>
                                                <div class="carousel-item ">
                                                    <img class="section-slider" style="width: 100%;object-fit: cover;    " src="/public/go_system/images/sliderproduct/normalslide2.jpg">
                                                    <div class="col-md-6">
                                                    </div>
                                                </div>
                                                <div class="carousel-item ">
                                                    <img class="section-slider" style="width: 100%;object-fit: cover;    " src="/public/go_system/images/sliderproduct/normalslide3.jpg">
                                                    <div class="col-md-6">
                                                    </div>
                                                </div>
                                                <div class="carousel-item ">
                                                    <img class="section-slider" style="width: 100%;object-fit: cover;    " src="/public/go_system/images/sliderproduct/normalslide4.jpg">
                                                    <div class="col-md-6">
                                                    </div>
                                                </div>

                                                <div class="carousel-item ">
                                                    <img class="section-slider" style="width: 100%;object-fit: cover;    " src="/public/go_system/images/sliderproduct/normalslide5.jpg">
                                                    <div class="col-md-6">
                                                    </div>
                                                </div>

                                        </div>
                                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicatorsdg" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                              </button>
                                              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicatorsdg" data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                              </button>
                                        </div>
                                    </div>


                                    <div id="pvcleather" style="display: none;">
                                        <div id="carouselExampleIndicatorsp" class="carousel slide" data-bs-ride="carousel">
                                            <div class="carousel-indicators">
                                                <button id="btn-slider" type="button" data-bs-target="#carouselExampleIndicatorsp" data-bs-slide-to="0" class="btn-slide  active " aria-current="true" aria-label="Slide 0"></button>
                                                <button id="btn-slider" type="button" data-bs-target="#carouselExampleIndicatorsp" data-bs-slide-to="1" class="btn-slide " aria-label="Slide 1"></button>
                                                <button id="btn-slider" type="button" data-bs-target="#carouselExampleIndicatorsp" data-bs-slide-to="2" class="btn-slide " aria-label="Slide 2"></button>
                                                <button id="btn-slider" type="button" data-bs-target="#carouselExampleIndicatorsp" data-bs-slide-to="3" class="btn-slide " aria-label="Slide 3"></button>
                                                <button id="btn-slider" type="button" data-bs-target="#carouselExampleIndicatorsp" data-bs-slide-to="4" class="btn-slide " aria-label="Slide 4"></button>

                                            </div>
                                            <div class="carousel-inner">
                                                <div class="carousel-item  active ">
                                                    <img class="section-slider" style="width: 100%;object-fit: cover;    " src="/public/go_system/images/sliderproduct/normalslide1.jpg">
                                                    <div class="col-md-6">
                                                    </div>
                                                </div>
                                                <div class="carousel-item ">
                                                    <img class="section-slider" style="width: 100%;object-fit: cover;    " src="/public/go_system/images/sliderproduct/normalslide2.jpg">
                                                    <div class="col-md-6">
                                                    </div>
                                                </div>
                                                <div class="carousel-item ">
                                                    <img class="section-slider" style="width: 100%;object-fit: cover;    " src="/public/go_system/images/sliderproduct/normalslide3.jpg">
                                                    <div class="col-md-6">
                                                    </div>
                                                </div>
                                                <div class="carousel-item ">
                                                    <img class="section-slider" style="width: 100%;object-fit: cover;    " src="/public/go_system/images/sliderproduct/normalslide4.jpg">
                                                    <div class="col-md-6">
                                                    </div>
                                                </div>

                                                <div class="carousel-item ">
                                                    <img class="section-slider" style="width: 100%;object-fit: cover;    " src="/public/go_system/images/sliderproduct/normalslide5.jpg">
                                                    <div class="col-md-6">
                                                    </div>
                                                </div>

                                        </div>
                                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicatorsp" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                              </button>
                                              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicatorsp" data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                              </button>
                                        </div>
                                    </div>



                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div style="padding:20px;">
                                <div style="display: flex;justify-content: space-between;    gap: 20px">
                                    <div>
                                        <h5 style="color:gray">Select your preferred leather material</h5>
                                    </div>
                                    <div>
                                        <select class="btn btn-danger" id="leathertype" style="text-align: left;">
                                            <option value="normalleather"><h5 style="color: black;font-weight: bold;">Catania Leather</h5></option>
                                            <option value="grainleather"><h5 style="color: black;font-weight: bold;">Nappa Leather</h5></option>
                                            <option value="pvcleather"><h5 style="color: black;font-weight: bold;">PVC</h5></option>
                                        </select>
                                    </div>
                                </div>





                                    <div id="normalleatherdes">
                                    <form action="{{ route('gosford.detail.selectmake') }}" method="post">@csrf
                                        <div style="display: flex;flex-direction: column;">
                                            <hr class="hr-product-detail">
                                            <input type="hidden" name="id" id="id_leathernormal" required>
                                            <h6 style="color: grey;">Select the seat cover leather option bellow</h6>

                                            <div class="list-leather" style="    gap: 9px;
                                            display: flex;
                                            flex-wrap: wrap;
                                            position: relative;
                                            white-space: nowrap;">
                                                @foreach($normal as $i => $vl)
                                                <div style="padding: 25px;    height: 70px;    background-color: #e3e3e3;" id="materialnormal{{$vl->id}}" data-id="{{$vl->id}}" class=" materialnormal card">
                                                    <!-- <center><img src="{{getimage($vl->img)}}" alt=""></center> -->
                                                    <center><p style="font-weight: bold;">{{$vl->name_leather}}</p></center>
                                                </div>
                                                @endforeach
                                            </div>
                                            <div class="car-seat-leather-des">
                                                <div style="display: flex;gap: 12px;">
                                                    <h4 id="totalnormal" style="color:#BF1D2C;font-weight:bold;"></h4>
                                                    <h4 style="color: #BF1D2C;" id="name-materialnormal"></h4>
                                                </div>
                                                <br>
                                                <div style="    text-align: justify;">
                                                    <p style="color:gray">We are delighted to present our latest masterpiece to you high quality
                                                        automotive leather. This copy will showcase the true charm of this exquisite
                                                        creation.</p>
                                                        <p style="color:#BF1D2C;font-style: italic">Displayed price above are base on selection made, without customization option avaliable and are subject to change without prior notice. Feel free to call or book for an appointment with our office for further advice.</p>
                                                </div>

                                                <div style="display: flex;gap:20px">
                                                    <a href="{{ url('product_project') }}" style="padding: 0px 30px;"
                                                        class="mdl-button mdl-js-button mdl-button--raised btn-back"
                                                        data-upgraded=",MaterialButton">
                                                        Back
                                                    </a>
                                                    <button type="submit" style="padding: 0px 30px;" type="submit"
                                                        class="mdl-button mdl-js-button mdl-button--raised color--gray"
                                                        data-upgraded=",MaterialButton">
                                                        Submit
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    </div>

                                    <div id="grainleatherdes" style="display: none;">
                                        <form action="{{ route('gosford.detail.selectmake') }}" method="post">@csrf
                                            <div style="display: flex;flex-direction: column;">
                                                <hr class="hr-product-detail">
                                                <input type="hidden" name="id" id="id_leathergrain" required>
                                                <h6 style="color: grey;">Select the seat cover leather option bellow</h6>

                                                <div class="list-leather" style="gap: 9px;
                                                display: flex;
                                                flex-wrap: wrap;
                                                position: relative;
                                                white-space: nowrap;">
                                                    @foreach($grain as $i => $vl)
                                                    <div style="padding: 25px;    height: 70px;    background-color: #e3e3e3;" id="materialgrain{{$vl->id}}" data-id="{{$vl->id}}" class=" materialgrain card">
                                                        <!-- <center><img src="{{getimage($vl->img)}}" alt=""></center> -->
                                                        <center><p>{{$vl->name_leather}}</p></center>
                                                    </div>
                                                    @endforeach
                                                </div>
                                                <div class="car-seat-leather-des">
                                                    <div style="display: flex;gap: 12px;">
                                                        <h4 id="totalgrain" style="color:#BF1D2C;font-weight:bold;"></h4>
                                                        <h4 style="color: #BF1D2C;" id="name-materialgrain"></h4>
                                                    </div>
                                                    <br>
                                                    <div style="    text-align: justify;">
                                                        <p style="color:gray">We are delighted to present our latest masterpiece to you high quality
                                                            automotive leather. This copy will showcase the true charm of this exquisite
                                                            creation.</p>
                                                            <p style="color:#BF1D2C;font-style: italic">Displayed price above are base on selection made, without customization option avaliable and are subject to change without prior notice. Feel free to call or book for an appointment with our office for further advice.</p>
                                                    </div>
                                                    <div style="display: flex;    gap: 20px;">
                                                        <a href="{{ url('product_project') }}" style="padding: 0px 30px;"
                                                            class="mdl-button mdl-js-button mdl-button--raised btn-back"
                                                            data-upgraded=",MaterialButton">
                                                            Back
                                                        </a>
                                                        <button type="submit" style="padding: 0px 30px;" type="submit"
                                                            class="mdl-button mdl-js-button mdl-button--raised color--gray"
                                                            data-upgraded=",MaterialButton">
                                                            Submit
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                    <div id="pvcleatherdes" style="display: none;">
                                        <form action="{{ route('gosford.detail.selectmake') }}" method="post">@csrf
                                            <div style="display: flex;flex-direction: column;">
                                                <hr class="hr-product-detail">
                                                <input type="hidden" name="id" id="id_leatherpvc" required>
                                                <h6 style="color: grey;">Select the seat cover leather option bellow</h6>
                                                <div class="list-leather" style="gap: 9px;
                                                display: flex;
                                                flex-wrap: wrap;
                                                position: relative;
                                                white-space: nowrap;">
                                                    @foreach($pvc as $i => $vl)
                                                    <div style="padding: 25px;    height: 70px;background-color: #e3e3e3;" id="material{{$vl->id}}" data-id="{{$vl->id}}" class=" materialpvc card">
                                                        <!-- <center><img src="{{getimage($vl->img)}}" alt=""></center> -->
                                                        <center><p>{{$vl->name_leather}}</p></center>
                                                    </div>
                                                    @endforeach
                                                </div>
                                                <div class="car-seat-leather-des">
                                                    <div style="display: flex;gap: 12px;">
                                                        <h4 id="totalpvc" style="color:#BF1D2C;font-weight:bold;"></h4>
                                                        <h4 style="color: #BF1D2C;" id="name-materialpvc"></h4>
                                                    </div>
                                                    <br>
                                                    <div style="    text-align: justify;">
                                                        <p style="color:gray">We are delighted to present our latest masterpiece to you high quality
                                                            automotive leather. This copy will showcase the true charm of this exquisite
                                                            creation.</p>
                                                            <p style="color:#BF1D2C;font-style: italic">Displayed price above are base on selection made, without customization option avaliable and are subject to change without prior notice. Feel free to call or book for an appointment with our office for further advice.</p>
                                                    </div>
                                                    <div style="display: flex;gap:20px">
                                                        <a href="{{ url('product_project') }}" style="padding: 0px 30px;"
                                                            class="mdl-button mdl-js-button mdl-button--raised btn-back"
                                                            data-upgraded=",MaterialButton">
                                                            Back
                                                        </a>
                                                        <button type="submit" style="padding: 0px 30px;" type="submit"
                                                            class="mdl-button mdl-js-button mdl-button--raised color--gray"
                                                            data-upgraded=",MaterialButton">
                                                            Submit
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>






                            </div>



                        </div>
                    </div>
                </div>

            </div>
        </section>
        <section class="pt-5 pb-5">
            <div style="text-align: center;font-weight: bold;padding: 20px;">
                <h2 style="font-weight: bold;">Styling Customisation</h2>
            </div>
            <div class="row d-flex" style="justify-content: center;">
                <div class="col-sm-6 col-md-3  d-flex " id="gallery">
                    <!-- <div class="col-sm-6 col-md-3  d-flex "> -->
                    <a href="/public/go_system/images/menu/colors.jpg" class="card card-body border-light justify-content-between text-white shadow">
                        <!-- <a href="#" class="card card-body border-light justify-content-between text-white shadow"> -->
                        <div class="dlab-media dlab-img-overlay1">
                            <img style="height: 100%;border-radius: 10px;" src="/public/go_system/images/menu/menu-new.jpg" alt="">
                        </div>
                        <div class="title-menu-style">Color</div>
                    </a>
                    <a href="/public/go_system/images/menu/colors2.jpg">

                    </a>
                </div>
                <div class="col-sm-6 col-md-3  d-flex ">

                    <!-- <a href="{{ route('gosford.twotowncolor') }}" -->
                    <a href="{{ route('gosford.twotowncolor') }}"
                        class="card  card-body border-light  justify-content-between text-white shadow">
                        <!-- <a >  -->
                        <div class="dlab-media dlab-img-overlay1">
                            <img src="/public/go_system/images/menu/menu_1.png" alt="">
                        </div>
                        <!-- </a> -->
                        <div class="title-menu-style">Two Tone Color</div>
                    </a>

                </div>

                <div class="col-sm-6 col-md-3  d-flex ">
                    <a href="{{ route('gosford.patterndesign') }}"
                        class="card  card-body border-light  justify-content-between  text-white shadow">
                        <div class="dlab-media dlab-img-overlay1">
                            <img src="/public/go_system/images/menu/menu_3.png" alt="">
                        </div>
                        <div class="title-menu-style">Pattern Design</div>
                    </a>
                </div>
                <div class="col-sm-6 col-md-3  d-flex ">

                    <!-- <a href="{{ route('gosford.piping') }}" -->
                    <a href="{{ route('gosford.piping') }}"
                        class="card  card-body border-light  justify-content-between  text-white shadow">
                        <div class="dlab-media dlab-img-overlay1">
                            <img src="/public/go_system/images/menu/menu_4.png" alt="">
                        </div>
                        <div class="title-menu-style">Stitching</div>
                    </a>
                </div>
                <!-- <div class="col-sm-6 col-md-2  d-flex ">
                    <a href="{{ route('gosford.emblem') }}"
                        class="card  card-body border-light  justify-content-between  text-white shadow">
                        <div class="dlab-media dlab-img-overlay1">
                            <img src="/public/go_system/images/menu/menu_5.png" alt="">
                            <div class="title-menu-style">Logo / Emblem</div>
                        </div>
                    </a>
                </div> -->
            </div>
            </div>
        </section>
        <section>
            <div class="section-full about-box content-inner section-bg-gosford-color">
                <div class="container">
                    <div class="row">
                        <div data-aos="fade-right" data-aos-delay="100" class="col-sm-12 col-lg-6 m-b30 p-r50">
                            <div class="section-head text-left space-text-video">
                                <h2 class="text-capitalize" style="color: black;font-family: 'Poppins';font-weight: bold;">MISSION</h2>
                                <p class="font-patner" style="color:black">Combining people innovation with most cutting edge manufacturing solution and provide best design with highest quality product to customers.</p>
                            </div>

                        </div>
                        <div class="col-sm-12 col-lg-6 m-b30">
                            <div class="video-box" style="padding: 50px 0px;">
                                <iframe width="100%" class="yt-embed-height" src="https://www.youtube.com/embed/WEQDCxT6RFY" title="Gosford, Johor Bahru" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<script>
    $(document).ready(function() {
        // Mengambil token CSRF dari meta tag
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        var prevClickedElement = null;
        $('.materialnormal').click(function() {
            if (prevClickedElement) {
                $(prevClickedElement).css("border", "none");
            }
            var materialId = $(this).data('id');
           // $(this).css("border", "solid 2px #bf1d2c");
            prevClickedElement = this;
            $('#id_leathernormal').val(materialId);
            $.ajax({
                type: 'POST', // Ganti ke metode POST
                url: "{{url('fetch_price/sys/price')}}", // Ganti dengan URL yang sesuai di dalam Laravel
                data: {
                    _token: csrfToken, // Menggunakan token CSRF
                    id: materialId
                },
                success: function(response) {
                    // Menampilkan data yang diterima dalam elemen dengan id 'priceContainer'
                    $('#name-materialnormal').html(response.name_leather);
                    $('#totalnormal').html('Price RM '+response.price);
                    // Anda dapat menambahkan baris ini untuk menampilkan atribut lainnya
                    // $('#priceContainer').append('Atribut Lain: ' + response.nama_atribut_lain);
                }
            });
        });
    });
</script>



<script>
    $(document).ready(function() {
        // Mengambil token CSRF dari meta tag
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        var prevClickedElement = null;
        $('.materialgrain').click(function() {
            if (prevClickedElement) {
                $(prevClickedElement).css("border", "none");
            }
            var materialId = $(this).data('id');
           // $(this).css("border", "solid 2px #bf1d2c");
            prevClickedElement = this;
            $('#id_leathergrain').val(materialId);
            $.ajax({
                type: 'POST', // Ganti ke metode POST
                url: "{{url('fetch_price/sys/price')}}", // Ganti dengan URL yang sesuai di dalam Laravel
                data: {
                    _token: csrfToken, // Menggunakan token CSRF
                    id: materialId
                },
                success: function(response) {
                    // Menampilkan data yang diterima dalam elemen dengan id 'priceContainer'
                    $('#name-materialgrain').html(response.name_leather);
                    $('#totalgrain').html('Price RM '+response.price);
                    // Anda dapat menambahkan baris ini untuk menampilkan atribut lainnya
                    // $('#priceContainer').append('Atribut Lain: ' + response.nama_atribut_lain);
                }
            });
        });
    });
</script>

<script>
    $(document).ready(function() {
        // Mengambil token CSRF dari meta tag
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        var prevClickedElement = null;
        $('.materialpvc').click(function() {
            if (prevClickedElement) {
                $(prevClickedElement).css("border", "none");
            }
            var materialId = $(this).data('id');
           // $(this).css("border", "solid 2px #bf1d2c");
            prevClickedElement = this;
            $('#id_leatherpvc').val(materialId);
            $.ajax({
                type: 'POST', // Ganti ke metode POST
                url: "{{url('fetch_price/sys/price')}}", // Ganti dengan URL yang sesuai di dalam Laravel
                data: {
                    _token: csrfToken, // Menggunakan token CSRF
                    id: materialId
                },
                success: function(response) {
                    // Menampilkan data yang diterima dalam elemen dengan id 'priceContainer'
                    $('#name-materialpvc').html(response.name_leather);
                    $('#totalpvc').html('Price RM '+response.price);
                    // Anda dapat menambahkan baris ini untuk menampilkan atribut lainnya
                    // $('#priceContainer').append('Atribut Lain: ' + response.nama_atribut_lain);
                }
            });
        });
    });
</script>

    <script>
    // Initialize LightGallery
    lightGallery(document.getElementById('gallery'), {
    thumbnail: true,
    download:false
});

</script>


<script>
    function updateLeatherDisplay() {
        const selectedValue = leathertypeSelect.value;

        // Hide all leather types
        const leatherTypes = ['normalleather', 'grainleather', 'pvcleather'];
        leatherTypes.forEach(type => {
            document.getElementById(type+'des').style.display = 'none';
            document.getElementById(type).style.display = 'none';
        });

        // Show the selected leather type
        if (selectedValue) {
            document.getElementById(selectedValue).style.display = 'block';
            document.getElementById(selectedValue+'des').style.display = 'block';
        }
    }

    const leathertypeSelect = document.getElementById('leathertype');

    // Initial call to set default display
    window.onload = updateLeatherDisplay;

    // Update display on selection change
    leathertypeSelect.addEventListener('change', updateLeatherDisplay);
</script>



@endsection
