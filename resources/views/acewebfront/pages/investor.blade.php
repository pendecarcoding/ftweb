@extends('acewebfront.layouts')
@section('meta')
<meta property="og:image" content="{{ uploaded_asset(get_setting('system_logo_white')) }}">
@endsection
@section('content')
<main>
    @include('acewebfront.widget.allbaner')
      <!-- <section id="ace-investor-banner-desktop"  class="ace-investor-banner">
        <div class="row-personal">
            <div id="desktop-banner" class="col-md-9 col-sm-12 col-lg-9">
              <img class="img-responsive-investor" src="{{ getimage(env('INVESTOR_BANNER')) }}" alt="">
              <div class="container">
                <div class="carousel-caption text-start">
                  <h1 class="h1-investor-banner">Half Yearly Results
                    <!-- @php $created = explode(' ',$announcementnew->created_at); print $created[0] @endphp  -->
                <!-- </h1>
                  <a href="{{url('announcements/'.$announcementnew->slug)}}" class="btn btn-lg btn-read-now-banner-investor">Read Now</a>
                </div>
              </div>
            </div> -->

            <!-- <div class="col-md-3 col-sm-12 col-lg-3">
              <div class="investor-number">

                <table  class="stock-price-investor">
                  <thead>
                    <tr>
                      <th class="text-center"><div class="title-price-investor">Stock Price (Real Time)</div></center></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td valign="top" class="text-center">26 May 2022 17:47:43
                        <br>
                        <div class="content-last-investor"></div>
                        <div class="last-title-price">Last</div>
                        <div class="value-last-investor">{{ env('INVESTOR_LAST') }}</div>
                      </td>
                    </tr>
                  </tbody>
                </table>

                <table  class="stock-change-investor">
                  <tbody>
                     <tr>
                        <td class="text-center" valign="top" style="padding-top: 20px;padding-left: 20px;padding-right: 20px;">
                          <div class="last-title-price">Change</div>
                          <div class="value-last-investor">{{ env('INVESTOR_CHANGE') }}</div>
                          <div class="stock-code-market">Market: LEAP Market
                            Sector: Industrial Products & Services
                            Stock Code: 03028</div>
                        </td>
                     </tr>
                     <tr>

                </tbody>
                </table>
              </div>

            </div>
          </div>
      </section> -->

      <!-- <section id="ace-investor-banner-mobile">
        <div class="row-personal">
          <div  class="col-md-12 col-sm-12 col-lg-9">
            <img class="img-responsive-investor" src="{{ getimage(env('INVESTOR_BANNER')) }}" alt="">
            <div class="container">
              <div class="carousel-caption text-start">
                <h1 class="h1-investor-banner">Half Yearly Results as at @php $created = explode(' ',$announcementnew->created_at); print $created[0] @endphp</h1>
                <a href="{{url('announcements/'.$announcementnew->slug)}}" class="btn btn-lg btn-read-now-banner-investor">Read Now</a>
              </div>
            </div>
          </div>

          <div class="col-md-12 col-sm-12 col-lg-3">
            <div class="investor-number">

              <table data-aos="fade-up" data-aos-delay="300" class="stock-price-investor">
                <thead>
                  <tr>
                    <th class="text-center"><div class="title-price-investor">Stock Price (Real Time)</div></center></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td valign="top" class="text-center">26 May 2022 17:47:43
                      <br>
                      <div class="content-last-investor"></div>
                      <div class="last-title-price">Last</div>
                      <div class="value-last-investor">0.350</div>
                    </td>
                  </tr>
                </tbody>
              </table>

              <table data-aos="fade-up" data-aos-delay="400" class="stock-change-investor">
                <tbody>
                   <tr>
                      <td class="text-center" valign="top" style="padding-top: 20px;padding-left: 20px;padding-right: 20px;">
                        <div class="last-title-price">Change</div>
                        <div class="value-last-investor">+0.020</div>
                        <div class="stock-code-market">Market: LEAP Market
                          Sector: Industrial Products & Services
                          Stock Code: 03028</div>
                      </td>
                   </tr>
                   <tr>

              </tbody>
              </table>
            </div>

          </div>
        </div>
      </section> -->

                <section id="ace-testimonials-desktop" class="gtp-patner" style="background-color: white">
                    <div class="content-ace">
                      <div class="wrap-content">
            <div class="ace-isi about">
              <div class="row">
            <div>
                <div class="col-md-12">
                  <div class="title-ace">
                    VISION
                    <span class="h-dash" style="font-weight: bold">—</span>
                  </div>
                </div>
                <div  class="col-md-12 col-sm-12">
                  <h1>Message from the CEO</h1>
                </div>
            </div>

                <div  class="col-md-12">
                    <div class="ceo-section">
                        <div class="content-msg-ceo">
                            <p>{!! $trimmed_text !!}</p>
                          <br>
                            <hr style="width: 334px;height: 3px;background: #006eb2;">

                            <h5>{{ $ceo->name }}</h5>
                            <p>{{ $ceo->position }}</p>
                            <br>
                            <br>
                        </div>
                        <div class="ceo-image">
                            <img  class="img-responsive img-ceo" src="{{ getimage($ceo->image) }}" alt="">
                        </div>
                    </div>
                </div>

            </div>
          </div>
        </div>
        </div>
      </section>

      <section id="ace-testimonials-mobile" class="ace-testimonials">
        <div class="content-ace about">
            <div class="wrap-content">
            <div class="ace-isi about">
              <div class="row">
            <div>
                <div class="col-md-12">
                  <div class="title-ace">
                    VISION
                    <span class="h-dash" style="font-weight: bold">—</span>
                  </div>
                </div>
                <div  class="col-md-12 col-sm-12">
                  <h1>Message from the CEO</h1>
                </div>
            </div>

                <div  class="col-md-12">
                  <div style="position:relative;margin-top:50px" id="myCarouseltesti" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div style="margin-left: 3%;
                    margin-right: -2%;">
                    <div class="carousel-item active">
                        <div class="row slider-testimonials">
                          <div class="col-md-8 col-sm-12">
                            <p>{!! $trimmed_text !!}</p>
                            <hr style="
                                width: 334px;
                                height: 3px;
                                background: #006eb2;
                              ">
                            <h5>{{$ceo->name}}</h5>
                            <p>{{$ceo->position}}</p>
                            <br>
                            <br>
                            <!-- <a href="{{ url('investor_relations/message_from_ceo') }}" class="btn gsf-button">Read More</a> -->
                          </div>
                          <div class="col-md-4 col-sm-12">
                            <div>
                              <img class="img-responsive img-ceo-mobile" src="{{getimage($ceo->image)}}" alt="">
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
        </div>
        </div>
      </section>
      <section class="gtp-patner" style="background-color: #F2F5F9;">
        <div class="content-ace">
          <div class="wrap-content">
            <div style="padding-top: 0px" class="ace-isi about">
              <div class="row">
                <div class="col-md-12">
                  <div data-aos="fade-up" class="title-ace aos-init aos-animate"> STRENGTHS <span class="h-dash" style="font-weight: bold">—</span>
                  </div>
                </div>
                <!-- <div class="col-md-6 col-sm-12">
                  <h1 data-aos="fade-up" class="aos-init aos-animate">Quality Commitment</h1>
                </div>
                <div style="padding-top:10px" data-aos="fade-up" class="col-md-6 aos-init aos-animate">
                  <p class="strength-font"> To assure our products quality, Feytech is strictly implements international quality management system.
                    Feytech is also learns from outstanding OEM customers, and integrate the management methods of
                    European, US, Japanese and Korean OEM customers into our quality management system.
                    Our Quality Policies are Fulfilling requirements from customers, standards, and systems; Excellent
                    services provide to customer; and Continuous Improvement on products, processes and services.</p>
                </div> -->
              </div>
              <div style="margin-top: 50px">
                <div class="row">
                  <div data-aos="fade-up" class="col-md-4 aos-init aos-animate">
                    <div class="discover">
                      <img style="width: 50px; height: 50px" src="/public/aceweb/assets/img/img_01.png" alt="">
                      <h6>PIONEERING ROLE IN </h6>
                      <h6> THE INDUSTRY</h6>
                    </div>
                  </div>
                  <div data-aos="fade-up" class="col-md-8 aos-init aos-animate">
                    <div class="fyt_list_investor">
                      <p class="strength-font">Over the years, the Group has established its reputation as an automotive cover manufacturer that can
                        also manufacture automotive seats. Gosford Malaysia has been recognised by Perodua Sales Sdn Bhd for
                        delivering its products promptly in 2018. Further, Gosford Singapore has also been awarded with the
                        SME Excellence Business Award Achievers 2022/2023 by Vision Media Group. These recognitions are
                        testament to the Group’s established industry reputation.</p>
                    </div>
                  </div>
                </div>
              </div>
              <div style="margin-top: 50px">
                <div class="row">
                  <div data-aos="fade-up" class="col-md-4 aos-init aos-animate">
                    <div class="discover">
                      <img style="width: 50px; height: 50px" src="/public/aceweb/assets/img/img_02.png" alt="">
                      <h6>INNOVATION &</h6>
                      <h6> FLEXIBILITY</h6>
                    </div>
                  </div>
                  <div data-aos="fade-up" class="col-md-8 aos-init aos-animate">
                    <div class="fyt_list_investor">
                      <p class="strength-font">We have conducted extensive laboratory testing to make certain that our products meet or exceed all
                        applicable Federal Motor Vehicle Safety Standards (FMVSS) Side Impact Airbag Deployment Test Series
                        have been conducted in a certified laboratory, to assure passenger
                        safety. Thanks to our experience and continuous research, we can provide our customers with leathers
                        tanned according to different recipes, thus continuously improving our environmental and resource
                        targets. Elevate your ride with our stylish seat covers and showcase your commitment to excellence.</p>
                    </div>
                  </div>
                </div>
              </div>
              <!-- <div style="margin-top: 50px">
                <div class="row">
                  <div data-aos="fade-up" class="col-md-4 aos-init aos-animate">
                    <div class="discover">
                      <img style="width: 50px; height: 50px" src="/public/aceweb/assets/img/img_03.png" alt="">
                      <h6>FINANCIAL </h6>
                      <h6>PERFORMANCE</h6>
                    </div>
                  </div>
                  <div data-aos="fade-up" class="col-md-8 aos-init aos-animate">
                    <div class="fyt_list_investor">
                      <p class="strength-font">The Group’s revenue increased by RM41.7 million or 49.0% from RM85.2 million in FYE 2021 to
                        RM126.9 million in FYE 2022. The Group’s cost of sales increased by RM26.3 million or 51.7% from
                        RM50.8 million in FYE 2021 to RM77.1 million in FYE 2022. The Group’s GP margin decreased from
                        40.4% in FYE 2021 to 39.3% in FYE 2022 mainly due to the commencement of manufacturing of
                        automotive seats in FYE 2022 which has a lower GP margin of 16.9% as compared to automotive covers
                        division. The Group’s PBT increased by RM11.3 million or 44.1% from RM25.7 million in FYE 2021 to
                        RM37.0 million in FYE 2022, which was mainly due to the increase in the Group’s GP for the FYE 2022.</p>
                    </div>
                  </div>
                </div>
              </div> -->
              <div style="margin-top: 50px">
                <div class="row">
                  <div data-aos="fade-up" class="col-md-4 aos-init aos-animate">
                    <div class="discover">
                      <img style="width: 50px; height: 50px" src="/public/aceweb/assets/img/img_04.png" alt="">
                      <h6>IATF</h6>
                      <h6>CERTIFICATION</h6>
                    </div>
                  </div>
                  <div data-aos="fade-up" class="col-md-8 aos-init aos-animate">
                    <div class="fyt_list_investor">
                      <p class="strength-font">Gosford has received an IATF 16949:2016 Certification in 2018. IATF 16949 specifies the requirements
                        of a quality management system for automotive production. Born from the need for a globally
                        harmonised quality management system requirements document, IATF 16949 was published in October
                        2016. Feytech has achieve an automotive standard certificate to ensure that we follow all the
                        automotive, safety and quality requirement.<br>
                        <b>2009 </b>- ISO 9001 : Quality Management<br>
                        <b>2010 </b>-ISO/TS 16949:2009 : Quality Management<br>
                        <b>2018</b> - IATF 16949:2016 : Quality Management</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>


      <section class="gtp-patner" style="background-color: #F6FDFF;">
        <div class="content-ace">
          <div class="wrap-content">
            <div style="padding-top: 0px" class="ace-isi about">
              <div class="row">
                <div class="col-md-12">
                  <div data-aos="fade-up" class="title-ace aos-init aos-animate"> FINANCIAL SNAPSHOTS <span class="h-dash" style="font-weight: bold">—</span>
                  </div>
                </div>
                <div class="col-md-6 col-sm-12">
                  <h1 data-aos="fade-up" class="aos-init aos-animate">2022 Key Performance Stats</h1>
                </div>
                <div style="padding-top:10px" data-aos="fade-up" class="col-md-6 aos-init aos-animate">
                  <p class="strength-font">The Group’s revenue increased by RM41.7 million or 49% from
                    RM85.2 million in FYE 2021 to RM126.9 million in FYE 2022. The
                    Group’s PBT increased by RM11.3 million or 44% from RM25.7
                    million in FYE 2021 to RM37.0 million in FYE 2022, which was
                    mainly due to the increase in the Group’s GP for the FYE 2022.</p>
                </div>
              </div>
              <div style="margin: 100px 0px;">
                <div class="row">
                    <div id="desktop-counter" class="col-md-12">
                        <div data-aos="fade-up" data-aos-delay="500" class="row aos-init aos-animate">
                          <div class="col-md-4 col-sm-12">
                            <div class="number-ace-center">
                              <h1>
                                <span class="decimal">126.9</span>
                              </h1>
                              <p>MILLION (myR) 2022 - Annual Revenue</p>
                            </div>
                          </div>
                          <div class="col-md-4 col-sm-12">
                            <div class="number-ace-center">
                              <h1>
                                <span class="decimal">41.16</span>
                              </h1>
                              <p>MILLION  (myR) 2022 - Adjusted EBITDA</p>
                            </div>
                          </div>
                          <div class="col-md-4 col-sm-12">
                            <div class="number-ace-center">
                              <h1><span class="decimal">27.7</span></h1>
                              <p>MILLION  (myR) 2022 - Net Profit</p>
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


      <!-- <section data-aos="fade-up" data-aos-delay="500" class="anouncements-gpt">
        <div class="content-ace">
          <div class="wrap-content">
            <div style="padding-top: 0px" class="ace-isi about">
              <div class="row">
                <div class="col-md-12">
                  <div class="title-ace">
                    LATEST
                    <span class="h-dash" style="font-weight: bold">—</span>
                  </div>
                </div>
                <div class="col-md-12 col-sm-12">
                  <h1>Company announcements</h1>
                </div>
                <div class="list-anouncements">
                  <div class="col-md-12">
                    @foreach($announcement as $i => $v)
                    <a href="{{ url('announcements/'.$v->slug) }}">
                    <div
                      style="margin: 20px"
                      class="item_direction row-personals"
                    >
                      @php
                      $datean = explode(' ',$v->created_at)
                      @endphp
                      <div class="row">

                      </div>

                      <div class="strength-font" style="text-align: justify;">
                        {{ $v->title }}
                      </div>
                    </div>
                    </a>
                    @endforeach

                  </div>
                </div>

                <center>
                  <a data-aos="fade-up" class="btn-ace-black">View All</a>
                </center>
              </div>
            </div>
          </div>
        </div>
      </section> -->
      <section class="gtp-download">
        <div class="content-ace">
          <div class="wrap-content">
            <div class="ace-isi about">
              <div class="row">

                <div data-aos="fade-up" class="col-md-12 col-sm-12">

                  <div class="row">
                    <div class="col-md-8 col-lg-8 col-sm-12">
                      <div class="title-ace">
                        DOWNLOAD
                        <span class="h-dash" style="font-weight: bold">—</span>
                      </div>
                      <h1>Investor Relations Information</h1>
                    </div>
                  </div>

                </div>
                <div class="row">
                  <div class="col-md-12 col-sm-12">
                    <div
                      style="position: sticky"
                      id="myCarousel"
                      class="carousel slide"
                      data-bs-ride="carousel"
                    >
                    <div class="carousel-indicators">
                        @php
                            $countac = count($download);
                            $banyak  = $countac/8;
                            $achievements = $download->toArray();
                            $no = -1;
                            for ($n=0; $n < $banyak; $n++) {
                                $no++;
                                @endphp
                                <button id="btn-slider" type="button" data-bs-target="#myCarousel" data-bs-slide-to="{{ $no }}" class="btn-slide @if($no == 1)active @endif" aria-label="Slide {{ $no }}" fdprocessedid="io38s9" aria-current="true"></button>
                                @php
                            }
                                @endphp



                         </div>

                    <div class="investor-download">
                      <div class="carousel-inner">
                        @php
                        $countac = count($download);
                        $banyak  = $countac/8;
                        $downloads = $download->toArray();
                        $no = -1;
                        for ($n=0; $n < $banyak; $n++) {
                            $no++;
                            @endphp

                <div class="carousel-item @if($n==0) active @else  @endif ">
                    @php
                    foreach (array_slice($downloads, $n) as $i => $v){
                        $last = $i-1;



                        if($i < 8){

                            @endphp


                            <a  href="{{ asset('public/download').'/'.$v['file'] }}" target="_blank" class="ace-button-blue"
                              ><i class="fa fa-download"></i> {{ $v['namefile'] }}</a
                            >
                            @php
                        }else{
                            $no=0;
                        }

                    }
                    @endphp


                        </div>
                        @php
                    }
                    @endphp
                    @foreach (array_slice($downloads, 0) as $i => $v)

                    @php

                    @endphp

                     @endforeach

                      </div>
                    </div>

                    <button class="acecarousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                      <span style="color:#1D5189;font-size: 250%;margin-left:20px;font-weight:bold;" aria-hidden="true"><i class="fa fa-angle-left"></i></span>
                      <span class="visually-hidden">Previous</span>
                      </button>

                      <button class="acecarousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                        <span style="color:#1D5189;font-size: 250%;margin-right:20px;font-weight:bold;" aria-hidden="true"><i class="fa fa-angle-right"></i></span>
                        <span class="visually-hidden">Next</span>
                        </button>



                    </div>

                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- <section data-aos="fade-up" class="ace-insight">
        <div class="content-ace">
          <div class="wrap-content">
            <div class="ace-isi about">
              <div class="row">
                <div class="col-md-12">
                  <div class="title-ace">
                    ADDITIONAL
                    <span class="h-dash" style="font-weight: bold">—</span>
                  </div>
                </div>
                <div class="col-md-12 col-sm-12">
                  <h1>Investor relations newsroom</h1>
                </div>
              </div>
                <div
                  data-aos="fade-up"
                  style="margin-top: 40px; text-decoration: none"
                  class="row"
                >
              <div class="col-md-4">
                    <a href="{{ url('investor_relations/message_from_ceo') }}">
                      <div>
                        <img
                          class="img-responsive-news rounded"
                          src="{{ static_asset('aceweb') }}/assets/img/annualgeneralmeet.png"
                          alt=""
                        />
                        <p class="p-title-news">Annual General Meeting 2023</p>
                      </div>
                    </a>
                  </div>
                  <div class="col-md-4">
                    <a href="{{ url('investor_relations/'.$irkey['slug']) }}">
                      <div>
                        <img
                          class="img-responsive-news rounded"
                          src="{{ static_asset('aceweb') }}/assets/img/r2.png"
                          alt=""
                        />
                        <p class="p-title-news">{{ $irkey->title }}</p>
                      </div>
                    </a>
                  </div>
                  <div class="col-md-4">
                    <a href="{{ url('investor_relations/'.$shareholder['slug']) }}">
                      <div>
                        <img
                          class="img-responsive-news rounded"
                          src="{{ static_asset('aceweb') }}/assets/img/r3.png"
                          alt=""
                        />
                        <p class="p-title-news">{{ $shareholder->title }}</p>
                      </div>
                    </a>
                  </div>
                  <div class="col-md-4">
                    <a href="detailinvestor.html">
                      <div>
                        <img
                          class="img-responsive-news rounded"
                          src="{{ static_asset('aceweb') }}/assets/img/r4.png"
                          alt=""
                        />
                        <p class="p-title-news">IR Events: Presentations</p>
                      </div>
                    </a>
                  </div>
                  <div class="col-md-4">
                    <a href="{{ url('investor_relations/All-Persentations') }}">
                      <div>
                        <img
                          class="img-responsive-news rounded"
                          src="{{ static_asset('aceweb') }}/assets/img/r5.png"
                          alt=""
                        />
                        <p class="p-title-news">IR Presentations</p>
                      </div>
                    </a>
                  </div>

                </div>

            </div>
          </div>
        </div>
      </section> -->
    </main>

@endsection
