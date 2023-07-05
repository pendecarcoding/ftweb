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
                                    <button  class="btn-step mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-red" data-upgraded=",MaterialButton,MaterialRipple">
                                    <span class="mdl-button__ripple-container"><span class="mdl-ripple is-animating" style="width: 262.161px; height: 262.161px; transform: translate(-50%, -50%) translate(78px, 4px);"></span></span>
                                    </button>
                                    <p>Select vehicle</p>
                                 </div>
                                 <div class="title-step-order active-step">
                                    <button  class="btn-step mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-red" data-upgraded=",MaterialButton,MaterialRipple">
                                        <span class="mdl-button__ripple-container"><span class="mdl-ripple is-animating" style="width: 262.161px; height: 262.161px; transform: translate(-50%, -50%) translate(78px, 4px);"></span></span>
                                        </button><p>Choose design</p>
                                 </div>

                                 <div class="title-step-order">
                                    <button class="btn-step mdl-button mdl-js-button mdl-button--raised button--colored-light-blue" disabled="" data-upgraded=",MaterialButton"></button>
                                    <p>Options Summary</p>
                                 </div>
                                </div>
                                <div class="title-order">
                                    <h3>Vehicles: {{$year}} {{make_car($carmake)->name}} {{type_car($model)->type}} <span><a href="{{url('product_project')}}" class="btn" style="background-color: #474747;color:white;border-radius: 20px;"><div style="display: flex;"><i style="margin-top: 4px;" class="fa fa-refresh"></i>&nbsp; Change</div></a></span></h3>

                                </div>

                                <div class="container">
                                    <div class="row">
                                        @foreach($car as $i => $vcar)
                                        <div class="col-lg-3 col-md-6 col-sm-6 d-flex">
                                          <div class="card w-100 my-2 shadow-2-strong">
                                            <img src="{{getimage($vcar->thumbnail_img)}}" class="card-img-top">
                                            <div class="card-body d-flex flex-column">
                                              <p class="category-product">{{getcar($vcar->car_id)->name}}</p>
                                              <p class="name-product">{{$vcar->name}}</p>
                                              <h6 class="price-product">{{ single_price($vcar->unit_price) }}</h6>
                                            </div>
                                            <a href="{{route('gosford.front.optionsummary',$vcar->slug)}}"><div class="choice-design"><center>Choose this design</center></div></a>
                                          </div>
                                        </div>
                                        @endforeach
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
