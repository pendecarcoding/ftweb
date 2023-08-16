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


                        <div class="step-order">
                            <div class="title-step-order active-step">
                                <button
                                    class="btn-step mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-red"
                                    data-upgraded=",MaterialButton,MaterialRipple">
                                    <span class="mdl-button__ripple-container"><span class="mdl-ripple is-animating"
                                            style="width: 262.161px; height: 262.161px; transform: translate(-50%, -50%) translate(78px, 4px);"></span></span>
                                </button>
                                <p>Select vehicle</p>
                            </div>
                            <div class="title-step-order active-step">
                                <button
                                    class="btn-step mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-red"
                                    data-upgraded=",MaterialButton,MaterialRipple">
                                    <span class="mdl-button__ripple-container"><span class="mdl-ripple is-animating"
                                            style="width: 262.161px; height: 262.161px; transform: translate(-50%, -50%) translate(78px, 4px);"></span></span>
                                </button>
                                <p>Choose design</p>
                            </div>

                            <div class="title-step-order active-step">
                                <button
                                    class="btn-step mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-red"
                                    data-upgraded=",MaterialButton,MaterialRipple">
                                    <span class="mdl-button__ripple-container"><span class="mdl-ripple is-animating"
                                            style="width: 262.161px; height: 262.161px; transform: translate(-50%, -50%) translate(78px, 4px);"></span></span>
                                </button>
                                <p>Option Summary</p>
                            </div>
                        </div>
                        <div class="title-order">
                            <h3>Options Summary</h3>

                        </div>




                        <!-- <div class="slider-product" style="height: 500px;">
                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">


                                <div class="carousel-inner">
                                    <div class="title-product-detail">{{ $car->name }}</div>
                                    @php

                                        $photos = explode(',', $car->photos);
                                        $index = -1;
                                    @endphp
                                    @foreach ($photos as $vp)
                                        @php
                                            $index++;
                                        @endphp
                                        <div
                                            class="carousel-item @if ($index == 0) active @endif">
                                            <img class="d-block center-image" src="{{ getimage($vp) }}">
                                        </div>
                                    @endforeach

                                </div>
                                <a class="carousel-control-prev icon-arrow"
                                    href="#carouselExampleIndicators" role="button" data-slide="prev">
                                    <i class="fa fa-chevron-left"></i>
                                </a>
                                <a class="carousel-control-next icon-arrow"
                                    href="#carouselExampleIndicators" role="button" data-slide="next">

                                    <i class="fa fa-chevron-right"></i>
                                </a>
                                <div class="wrap-carousel-indicators">
                                    <div class="carousel-indicators">
                                        @php

                                            $photos = explode(',', $car->photos);
                                            $index = -1;
                                        @endphp
                                        @foreach ($photos as $vp)
                                            @php
                                                $index++;
                                            @endphp
                                            <div class="img-ref-slide"
                                                data-target="#carouselExampleIndicators"
                                                data-slide-to="{{ $index }}"
                                                @if ($index == 0) class="active" @endif><img
                                                    src="{{ getimage($vp) }}" alt="Third slide"></div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div> -->


                        <div class="container">
                            <div class="row">
                                <div class="col-md-8 col-sm-12">
                                    <div class="card">
                                        <div class="slider-product" style="height: 500px;position: relative;overflow: hidden;">
                                            <div style="height: 450px" id="myCarousel" class="carousel slide"  data-bs-ride="carousel">
                                                <div class="carousel-indicators" style="bottom: -43px;">
                                                                              @php

                                                  $photos = explode(',', $car->photos);
                                                  $index = -1;
                                              @endphp
                                              @foreach ($photos as $vp)
                                                  @php
                                                      $index++;
                                                  @endphp
                                                    <img data-bs-target="#myCarousel" data-bs-slide-to="{{ $index }}" @if ($index == 0) class="active" @endif
                                                    style="width:100px;height:100px" src="{{ getimage($vp) }}" alt="Third slide">
                                              @endforeach
                                                </div>
                                                <div class="carousel-inner">
                                                    <div class="title-product-detail">{{ $car->name }}</div>
                                                    @php

                                                    $photos = explode(',', $car->photos);
                                                    $index = -1;
                                                @endphp
                                                @foreach ($photos as $vp)
                                                    @php
                                                        $index++;
                                                    @endphp
                                                    <div
                                                        class="carousel-item @if ($index == 0) active @endif">
                                                        <img class="d-block center-image" src="{{ getimage($vp) }}">
                                                    </div>
                                                @endforeach


                                                </div>
                                                <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                                                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                  <span class="visually-hidden">Previous</span>
                                                </button>
                                                <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                                                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                  <span class="visually-hidden">Next</span>
                                                </button>
                                              </div>
                                        </div>


                                    </div>
                                </div>
                                <br>
                                <div class="col-md-4 col-sm-12">
                                    <div class="card go-right-order" style="height: 500px;">
                                        <div style="padding: 27px;">
                                            <div style="display: flex;flex-direction: column;">
                                                <h6 class="title-right-product">Make:</h6>
                                                <p class="content-right-product">{{ make_car($car->brand_id)->name }}</p>
                                            </div>
                                            <div style="display: flex;flex-direction: column;">
                                                <h6 class="title-right-product">Model:</h6>
                                                <p class="content-right-product">{{ car_typebyCarId($car->car_id)->name }}</p>
                                            </div>
                                            <div style="display: flex;flex-direction: column;">
                                                <h6 class="title-right-product">Year:</h6>
                                                <p class="content-right-product">{{ $car->year }}</p>
                                            </div>
                                            @php
                                                $material = explode(',', $car->material_name);
                                                $price = explode(',', $car->material_price);

                                            @endphp
                                            <form action="{{ route('gosford.front.order_comfirmed') }}" method="post">@csrf
                                                <div style="display: flex;flex-direction: column;">
                                                    <h6 class="title-right-product">Material:</h6>
                                                    <select onchange="getValueMaterial()"
                                                        style="font-weight: bold;color: #dc3545;"
                                                        class="select-order mdl-textfield__input" type="text"
                                                        name="material" id="material" required>
                                                        @foreach ($material as $i => $vmaterial)
                                                            <option value="{{ $price[$i] . ',' . $vmaterial }}"><span
                                                                    style="color:black">{{ $vmaterial }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div style="display: flex;flex-direction: column;">
                                                    <hr class="hr-product-detail">
                                                </div>


                                                <input type="hidden" name="id_product" value="{{ $car->id }}">
                                                <input required type="hidden" value="{{$car->unit_price}}" name="total" id="totals">
                                                <div style="display: flex;flex-direction: column;">
                                                    <div style="display: flex;justify-content: space-between;">
                                                        <h4 style="font-weight: bold;">Total</h4>
                                                        <h4 id="total" style="color:#BF1D2C;font-weight:bold;">
                                                            {{ single_price($car->unit_price) }}</h4>
                                                    </div>
                                                    <div style="display: flex;justify-content: space-between;">
                                                        <a onclick="window.history.go(-1); return false;"
                                                            style="padding: 0px 30px;" type="submit"
                                                            class="mdl-button mdl-js-button mdl-button--raised btn-back"
                                                            data-upgraded=",MaterialButton">
                                                            Back
                                                        </a>
                                                        @if(Session::get('gystem_login'))
                                                        <button type="submit" style="padding: 0px 30px;" type="submit"
                                                            class="mdl-button mdl-js-button mdl-button--raised color--gray"
                                                            data-upgraded=",MaterialButton">
                                                            Submit
                                                        </button>
                                                        @else
                                                        <a style="padding: 0px 30px;" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                                        class="mdl-button mdl-js-button mdl-button--raised color--gray"
                                                        data-upgraded=",MaterialButton">
                                                        Submit
                                                    </a>
                                                        @endif
                                                    </div>
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
        <!-- <div class="wa-floating-button" onclick="openWhatsApp()">
                        <span class="whatsapp-icon"><i class="fa fa-phone"></i></span>
                    </div> -->

    </main>
    <script>
        function getValueMaterial() {
            var selectedValue = document.getElementById("material").value;
            var totals = document.getElementById("totals");
            const myArray = selectedValue.split(",");
            var doubleValue = parseFloat(myArray[0]);
            var total = (doubleValue);
            totals.value = total;
            var formattedValue = total.toLocaleString("en-MY", {
                style: "currency",
                currency: "MYR"
            });
            document.getElementById("total").innerHTML = formattedValue;
        }
    </script>
@endsection
