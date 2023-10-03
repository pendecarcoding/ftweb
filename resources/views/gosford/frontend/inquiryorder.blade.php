@extends('acewebfront.layouts')
@section('meta')
    <meta property="og:image" content="{{ uploaded_asset(get_setting('site_icon')) }}" />
@endsection
@section('content')
    <main>
        <section class="pt-5 pb-5" style="margin:50px 0px">

            <div class="wrap-content">
                <div class="p-a30 bg-white m-b40" style="padding-bottom: 48px;">
                    <div class="section-content">
                        <h2 class="text-uppercase">Inquiry Details</h2>
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
                        <form action="{{route('gosford.order.updateinquiry',$id)}}" method="post">
                            @csrf
                            <input name="_method" type="hidden" value="PATCH">
                            <div class="m-b10">
                                <h5 class="text-uppercase">Contact Details</h5>
                                <p style="font-size:x-small;">Please share your contact details for our next steps.</p>
                                  <input type="hidden" name="id" value="{{$data->id}}">
                                 <input type="text" class="form-control" name="name" placeholder="Name*" required>
                                 <br>
                                 <input type="text" class="form-control" name="contact_number" placeholder="Contact Number*" required>
                                 <br>
                                 <input type="email" class="form-control" name="email" placeholder="Email Address*" required>
                                <br>
                                 <textarea class="form-control" name="info" style="height: 100px;" required></textarea>


                                <br>
                                <div class="m-b10">
                                    <div style="float:right">
                                        <div style="display: flex;gap:20px">
                                            <a href="{{url('product_project')}}"

                                                style="padding: 0px 30px;"
                                                class="mdl-button mdl-js-button mdl-button--raised btn-back"
                                                data-upgraded=",MaterialButton">
                                                Back
                                        </a>
                                            <button
                                                style="padding: 0px 30px;" type="submit"
                                                class="mdl-button mdl-js-button mdl-button--raised color--gray"
                                                data-upgraded=",MaterialButton">
                                                Submit
                                        </button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </section>
        <section class="pt-5 pb-5">

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
