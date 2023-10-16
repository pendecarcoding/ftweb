@extends('acewebfront.layouts')
@section('meta')
    <meta property="og:image" content="{{ uploaded_asset(get_setting('site_icon')) }}" />
@endsection
@section('content')
    <main>
        <section class="pt-5 pb-5" style="margin:50px 0px">

            <div class="wrap-content">
                <div class="p-a30 bg-white m-b40" style="padding: 65px;">
                    <div class="section-content">
                        <h2 class="text-uppercase">Info Order</h2>
                        <div class="m-b10">
                            <h5 class="text-uppercase">Automotive Seat Cover</h5>
                            <li>{{getvehicle($data->type_car)->size}}</li>
                            <li>{{gettypeleather($data->id_leather)->leather}}</li>
                            <li>{{getaplicationleather($data->id_coverage)->name_leather}}</li>

                            <div style="float:right">RM{{$data->priceseat}}</div>
                            <div class="dlab-divider bg-gray-dark text-gray-dark"></div>
                        </div>
                        <div class="m-b10">
                            <h5 class="text-uppercase">Selection</h5>
                            @foreach($color as $vcolor)
                             <div style="display: flex;justify-content: space-between;">
                                <li>@if(count($color) > 1) Two Tone Color :    @else  Single Color :  @endif    {{$vcolor['color']}}</li>
                                <div style="float:right">RM{{$vcolor['price']}}</div>
                             </div>

                            @endforeach
                            @foreach($design as $vdesign)
                            <div style="display: flex;justify-content: space-between;">
                             <li>Pattern : {{$vdesign['name']}}</li>
                             <div style="float:right">RM{{$vdesign['price']}}</div>
                            </div>
                            @endforeach
                            @if(count($interior) > 0)
                            <hr>
                            <li>Interior Part :</li>
                            @foreach($interior as $vinterior)
                            <div style="display: flex;justify-content: space-between;">
                             <li>{{$vinterior['name_interior']}}</li>
                             <div style="float:right">RM{{$vinterior['price']}}</div>
                            </div>
                            @endforeach
                            @endif

                            <div class="dlab-divider bg-gray-dark text-gray-dark"></div>
                        </div>
                        <div class="m-b10">
                            <div style="display: flex;justify-content: space-between;">
                                <p class="text-capitalize" style="font-size:x-small;">*Prices display are subject to change without prior notice.</p>
                                <div>Total : <span style="color:brown">RM {{$data->totalprice}}</span></div>
                            </div>



                        </div>
                        <br><br><br>

                    </div>
                </div>

            </div>
        </section>
        <section class="pt-5 pb-5">

        </section>


    </main>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="/public/go_system/js/getprice.js"></script>

@endsection
