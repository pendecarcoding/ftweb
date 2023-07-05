@extends('gosford.layouts.template')
@section('content')
    <div class="mdl-layout mdl-js-layout color--gray is-small-screen login">
        @include('gosford.system.header')
        <main class="mdl-layout__content" style="background: rgb(247, 246, 246);flex-direction: column;">
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

             <div class="title-step-order active-step">
                <button  class="btn-step mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-red" data-upgraded=",MaterialButton,MaterialRipple">
                    <span class="mdl-button__ripple-container"><span class="mdl-ripple is-animating" style="width: 262.161px; height: 262.161px; transform: translate(-50%, -50%) translate(78px, 4px);"></span></span>
                    </button><p>Option Summary</p>
             </div>
            </div>
            <div class="title-order">
                <h3>Options Summary</h3>

            </div>

            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-sm-12">
                        <div class="card">
                            <div class="slider-product">
                                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">


                                    <div class="carousel-inner">
                                      <div class="title-product-detail">{{$car->name}}</div>
                                      @php

                                      $photos = explode(',',$car->photos);
                                      $index  = -1;
                                      @endphp
                                      @foreach($photos as $vp)
                                      @php
                                      $index++;
                                      @endphp
                                      <div class="carousel-item @if($index==0) active @endif">
                                            <img class="d-block center-image" src="{{getimage($vp)}}">
                                      </div>
                                      @endforeach

                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                        <i class="material-icons icon-arrow">keyboard_arrow_left</i>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">

                                      <i class="material-icons icon-arrow">keyboard_arrow_right</i>
                                    </a>
                                    <div class="wrap-carousel-indicators">
                                        <div class="carousel-indicators">
                                            @php

                                            $photos = explode(',',$car->photos);
                                            $index  = -1;
                                            @endphp
                                            @foreach($photos as $vp)
                                            @php
                                            $index++;
                                            @endphp
                                            <div class="img-ref-slide" data-target="#carouselExampleIndicators" data-slide-to="{{$index}}" @if($index==0) class="active" @endif><img  src="{{getimage($vp)}}" alt="Third slide"></div>
                                            @endforeach
                                          </div>
                                    </div>
                                  </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="card">
                         <div style="padding:20px;">
                            <div style="display: flex;flex-direction: column;">
                                <h6 class="title-right-product">Make:</h6>
                                <p class="content-right-product">{{make_car($car->brand_id)->name}}</p>
                            </div>
                            <div style="display: flex;flex-direction: column;">
                                <h6 class="title-right-product">Model:</h6>
                                <p class="content-right-product">{{type_car($car->type)->type}}</p>
                            </div>
                            <div style="display: flex;flex-direction: column;">
                                <h6 class="title-right-product">Year:</h6>
                                <p class="content-right-product">{{$car->year}}</p>
                            </div>
                            @php
                                $material = explode(',',$car->material_name);
                                $price    = explode(',',$car->material_price);

                            @endphp
                            <form action="{{route('gosford.order_comfirmed')}}" method="post">@csrf
                            <div style="display: flex;flex-direction: column;">
                                <h6 class="title-right-product">Material:</h6>
                                <select onchange="getValueMaterial()" style="font-weight: bold;color: #dc3545;" class="select-order mdl-textfield__input" type="text" name="material" id="material">
                                   @foreach($material as $i => $vmaterial)
                                    <option value="{{$price[$i].','.$vmaterial}}"><span style="color:black">{{$vmaterial}} |</span> {{single_price($price[$i])}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div style="display: flex;flex-direction: column;">
                                <hr class="hr-product-detail">
                            </div>


                            <input type="hidden" name="id_product" value="{{$car->id}}">
                            <input required type="hidden" value="{{$car->unit_price}}" name="total" id="totals">
                            <div style="display: flex;flex-direction: column;">
                                <div style="display: flex;justify-content: space-between;">
                                    <h4 style="font-weight: bold;">Total</h4>
                                    <h4 id="total" style="color:#BF1D2C;font-weight:bold;">{{single_price($car->unit_price)}}</h4>
                                </div>
                                <div style="display: flex;justify-content: space-between;">
                                    <a href="{{route('gosford.search')}}" style="padding: 0px 30px;" type="submit" class="mdl-button mdl-js-button mdl-button--raised btn-back" data-upgraded=",MaterialButton">
                                        Back
                                    </a>
                                    <button type="submit" style="padding: 0px 30px;" type="submit" class="mdl-button mdl-js-button mdl-button--raised color--gray" data-upgraded=",MaterialButton">
                                        Submit
                                    </button>
                                </div>
                            </div>
                            </form>

                         </div>


                        </div>
                    </div>
                </div>
              </div>



        </main>
    </div>
    <script>
        function getValueMaterial() {
          var selectedValue = document.getElementById("material").value;
          var totals = document.getElementById("totals");
          const myArray = selectedValue.split(",");
          var doubleValue = parseFloat(myArray[0]);
          var total = (doubleValue + {{$car->unit_price}});
          totals.value=total;
          var formattedValue = total.toLocaleString("en-MY", { style: "currency", currency: "MYR" });
          document.getElementById("total").innerHTML = formattedValue;
        }
        </script>
@endsection
