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
                        <div class="description-service" style="color:#999999;text-align: center;">We are delighted to present our high-quality automotive
                            leather cover masterpiece. Designed exclusively for car
                            owners, our top-tier leather embodies our unwavering
                            commitment to perfection. Each piece of original leather
                            material undergoes rigorous selection, ensuring that only the
                            finest, handpicked leather finds its way into your car interiors.
                        </div>


                    </div>
                </div>
            </div>
        </section>
        <section class="pt-5 pb-5">

            <div class="wrap-content">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <h2 style="color:#555555">High-quality Automotive Leather Cover</h2>
                    </div>
                </div>
                <div class="card" style="padding-bottom: 25px;">
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
                                                        <img class="section-slider" style="width: 100%;object-fit: cover;    " src="/public/go_system/images/sliderproduct/normalslideone.jpg">
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

                                    <div id="changecolor" style="display: none;padding: 133px 0px;">
                                        <div class="img-wraping">
                                            <img style="object-fit: contain;" id="baseimage"
                                                alt="">
                                            <img style="object-fit: contain;" class="leather-pattern"
                                                id="colorimage"
                                                alt="">
                                        </div>
                                    </div>





                                </div>
                            </div>
                        </div>


                        <div class="col-md-6 col-sm-12">

                            <div style="padding: 20px 33px;">
                                <div style="display: flex;flex-direction: column;  justify-content: space-between;    gap: 20px">
                                    <div>
                                        <div>
                                            <h6 style="color:gray">Car Type :</h6>
                                        </div>
                                    </div>
                                    <div>
                                        <select class="postform bs-select-hidden" id="cartype" name="cartype">
                                            <option value="">Please Select</option>
                                            @foreach($sizetype as $i => $v)
                                             <option value="{{$v->id}}">{{$v->size}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                <br>
                                <div style="display: flex;flex-direction: column;  justify-content: space-between;    gap: 20px">
                                    <div>
                                        <div>
                                            <h6 style="color:gray">Interior Parts :</h6>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="list-leather" style="
                                        display: flex;
                                        flex-wrap: wrap;
                                        position: relative;
                                        white-space: nowrap;">

                                          <!-- <div class="form-check">
                                            <input checked class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                            <label class="form-check-label" for="flexCheckDefault">
                                              Seat Cover
                                            </label>
                                          </div> -->

                                          @foreach($interior as $i => $vinterior)
                                          <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="{{$vinterior->id_interior}}" id="checkbox{{$i}}" onclick="interiorSelected(this)">
                                            <label class="form-check-label" for="checkbox{{$i}}">
                                                {{$vinterior->name_interior}}
                                            </label>
                                        </div>

                                          @endforeach

                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div style="display: flex;flex-direction: column;  justify-content: space-between;">
                                    <div>
                                        <div>
                                            <h6 style="color:gray">Material :</h6>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="list-leather" style="    gap: 9px;
                                        display: flex;
                                        flex-wrap: wrap;
                                        position: relative;
                                        white-space: nowrap;">
                                            @foreach($leather as $i => $vl)
                                            <div id="materialselected" data-bs-toggle="tooltip" data-bs-html="true" data-bs-placement="bottom" title="" class="card-material-type custom-tooltip" onclick="MaterialSelected(this,{{$vl->id}})">
                                                <center><p style="font-weight: bold;">{{$vl->leather}}</p></center>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                                <br>
                                <div style="display: flex;flex-direction: column;  justify-content: space-between;">
                                    <div>
                                        <div>
                                            <h6 style="color:gray">Leather Coverage:</h6>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="list-leather" style="    gap: 9px;
                                        display: flex;
                                        flex-wrap: wrap;
                                        position: relative;
                                        white-space: nowrap;">
                                            @foreach($coverage as $i => $vl)
                                            <div id="coverageselected" class="card-leather-types" onclick="CoverageSelected(this,{{$vl->id}})">
                                                <center><p style="font-weight: bold;">{{$vl->name_leather}}</p></center>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                                <br>
                                <div style="display: flex;flex-direction: column;  justify-content: space-between;    gap: 10px;">
                                    <div>
                                        <div>
                                            <h6 style="color:gray">Color:</h6>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="list-leather" style="    gap: 9px;
                                        display: flex;
                                        flex-wrap: wrap;
                                        position: relative;
                                        white-space: nowrap;">

                                            <div class="card-leather-type" id="toggleColor">

                                                <center><p style="font-weight: bold;">Pick Color</p></center>
                                            </div>

                                        </div>

                                    </div>
                                    <div id="selectedColors" class="list-selected-color"></div>
                                </div>

                                <br>
                                <div style="display: flex;flex-direction: column;  justify-content: space-between;">
                                    <div>
                                        <div>
                                            <h6 style="color:gray">Pattern:</h6>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="list-leather" style="    gap: 9px;
                                        display: flex;
                                        flex-wrap: wrap;
                                        position: relative;
                                        white-space: nowrap;">

                                            <div  class="card-leather-type" id="toggleDesign">

                                                <center><p style="font-weight: bold;">Pick Design</p></center>
                                            </div>

                                        </div>
                                        <div id="selectedDesign" style="display: flex;
                                                    flex-direction: column;
                                                    gap: 10px;"></div>
                                    </div>
                                </div>





<br>
                                <div style="display: flex;flex-direction: column;  justify-content: space-between;">
                                    <div>
                                        <div>
                                            <h6 style="color:gray">Interior Parts Selection:</h6>
                                        </div>
                                    </div>
                                    <div>

<div style="    gap: 9px;
display: flex;
flex-wrap: wrap;
position: relative;
white-space: nowrap;" id="interior-list">
    <!-- Selected interior data will be displayed here -->
</div>

                                </div>




                            </div>



                        </div>

                        <div id="pick-color" class="card card-order" style="display: none;
                        padding-left: 0px;
                        padding-right: 0px;
                        border-radius: 0px;
                    ">
                            <div style="border-radius: 0px;" class="card-header card-order-header">
                                <a id="closeIcon" style="float:right" href="#"><i class="fa fa-times"></i></a>
                                <center><h4>Color</h4></center>

                            </div>
                            <div class="card-body">
                                <div style="display: flex;gap:20px">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked onclick="updateSelectionMode()">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                          Single Color
                                        </label>
                                      </div>
                                      <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2"  onclick="updateSelectionMode()">
                                        <label class="form-check-label" for="flexRadioDefault2">
                                          Two Tone Color
                                        </label>
                                      </div>
                                </div>
                                <div class="color-list-container">
                                @foreach($colors as $i =>$vcolor)
                                    <div class="color-column-list" onclick="selectColor(this, '{{$vcolor->name}}', '{{getimage($vcolor->image)}}', {{$vcolor->extraprice}},'{{$vcolor->hex_color}}')">
                                        <img id="imgcolor" class="img-color-option" src="{{getimage($vcolor->image)}}" alt="">
                                        <div id="namecolor" style="font-weight: bold;color: #555555;">{{$vcolor->name}}</div>
                                        <div style="font-size: smaller;">{{$vcolor->code}}</div>
                                        <div class="extra-price-color">@if($vcolor->extraprice > 0) +RM{{$vcolor->extraprice}} @endif</div>
                                    </div>


                                @endforeach
                                </div>



                            </div>
                            <div class="card-footer">
                                <div style="display: flex;justify-content: space-between;">
                                    <div>Subtotal : <span id="selectedPrice" style="font-size: x-large;font-weight: bold;color: brown;"></span></div>
                                    <button id="donebuttoncolor" class="btn btn-secondary" style="background-color: #555555; border-radius: 50px;    padding: 8px 45px;">Done</button>
                                </div>

                            </div>
                        </div>



                        <div id="pick-design" class="card card-order" style="display: none;
                        padding-left: 0px;
                        padding-right: 0px;
                        border-radius: 0px;
                    ">
                            <div style="border-radius: 0px;" class="card-header card-order-header">
                                <a id="closeIcondesign" style="float:right" href="#"><i class="fa fa-times"></i></a>
                                <center><h4>Pattern</h4></center>

                            </div>
                            <div class="card-body" style="
                            position: relative;
                            overflow: scroll;
                        ">

                                <div class="color-list-container">
                                    @foreach($pattern as $i => $vpattern)
                                    <div class="color-column-list" onclick="selectPattern(this, '{{$vpattern->name_pattern}}', '{{getimage($vpattern->img)}}','{{getimage($vpattern->base_img)}}','{{getimage($vpattern->color_img)}}', {{$vpattern->price}})">
                                        <img id="imgpattern{{$i}}" class="img-pattern-option" src="{{getimage($vpattern->img)}}" alt="">
                                        <div id="namepattern{{$i}}" style="font-weight: bold;color: #555555;">{{$vpattern->name_pattern}}</div>
                                        <div class="extra-price-color">@if($vpattern->price > 0) +RM{{$vpattern->price}} @endif</div>
                                    </div>
                                    @endforeach
                                </div>



                            </div>

                            <div class="card-footer">
                                <div style="display: flex;justify-content: space-between;">
                                    <div>Subtotal : <span id="selectedPriceDesign" style="font-size: x-large;font-weight: bold;color: brown;"></span></div>
                                    <button id="donebuttondesign" class="btn btn-secondary" style="background-color: #555555; border-radius: 50px;    padding: 8px 45px;">Done</button>
                                </div>

                            </div>
                        </div>





                        <div class="wrap-selection">
                            <div class="section-content">
                                <div class="col-lg-12 col-md-12 m-b30">
                                    <div class="dlab-accordion" id="accordion1">
                                        <div class="panel">
                                            <div style="    border: none;    border-radius: 10px;
                                            background-color: #8080801f;" class="acod-head">
                                                <h5 class="acod-title"> <a style="border: none;    text-align: right;" class="collapsed" aria-expanded="false">Total <span id="totalall" style="color:red">RM 0.00</span></a> </h5>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="panel">
                                        <div style="float:right">
                                            <div style="display: flex;gap:20px">
                                                <button id="clear"
                                                    onclick="clearall()"
                                                    style="padding: 0px 30px;" type="submit"
                                                    class="mdl-button mdl-js-button mdl-button--raised btn-back"
                                                    data-upgraded=",MaterialButton">
                                                    Clear All
                                            </button>
                                                <button id="submit"
                                                onclick="submitOrder()"
                                                disabled
                                                    style="padding: 0px 30px;" type="submit"
                                                    class="mdl-button mdl-js-button mdl-button--raised color--green"
                                                    data-upgraded=",MaterialButton">
                                                    Submit
                                            </button>
                                            </div>
                                        </div>
                                        </div>


                                    </div>
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
                    <a href="/public/go_system/images/menu/colors3.jpeg">

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
                                <h2 class="text-capitalize" style="color: black;font-family: 'Poppins';font-weight: bold;">Automotive Covers Manufacturing Plant</h2>
                                <!-- <p class="font-patner" style="color:black">Combining people innovation with most cutting edge manufacturing solution and provide best design with highest quality product to customers.</p> -->
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
    <script src="/public/go_system/js/getprice.js"></script>

@endsection
