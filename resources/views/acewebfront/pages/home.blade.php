@extends('acewebfront.layouts')
@section('meta')
<meta property="og:image" content="{{ uploaded_asset(get_setting('site_icon')) }}" />
@endsection
@section('content')
<!--CONTENT-->

 <main>

      <section  class="ace-sliders">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-indicators">
            @php
            $noslide = 0;
            @endphp
            @foreach($slider as $is => $v)
              @if(count($slider) > 1)
              <button
                id="btn-slider"
                type="button"
                data-bs-target="#carouselExampleIndicators"
                data-bs-slide-to="{{ $is }}"
                class="btn-slide @if($is== 0) active @endif"
                @if($is== 0) aria-current="true" @endif
                aria-label="Slide {{ $is }}"
              ></button>
              @endif
            @endforeach
          </div>
          <div class="carousel-inner">
            @foreach($slider as $is => $v)
            <div class="carousel-item @if($is== 0) active @endif">
              <img class="slider-banner" src="{{ asset('public/'.$v->file_name) }}" />
              <div class="col-md-6">
              <div class="container">

                <div data-aos="fade-up" class="carousel-caption text-start">
                  <h1>
                    {{ $v->caption }}
                  </h1>
                  <p class="ace-banner-p" >{{ $v->sub_caption }}</p>
                </div>
              </div>
            </div>
            <div class="col-md-6">
          </div>
            </div>
            @endforeach

        </div>
        </div>
      </section>
      <section class="about-ace">
        <div class="content-ace">
          <div class="wrap-content">
            <div class="ace-isi about">
              <div class="row">
                <div class="col-md-12">
                  <div data-aos="fade-up" data-aos-delay="100" class="title-ace">
                    GET TO KNOW US
                    <span class="h-dash" style="font-weight: bold">—</span>
                  </div>
                </div>
                <div data-aos="fade-up" data-aos-delay="200" class="col-md-6 col-sm-12">
                  <h1>Leading the way in innovative mobility solutions
                  </h1>
                </div>
                <div class="col-md-6 col-sm-12">
                  <div class="content-about">
                    <img class="img-ace-about"
                    data-aos="fade-up" data-aos-delay="300"

                      src="{{ getimage(env('ABOUT_IMG')) }}"
                    />
                    <p style="padding-top: 5%;" class="p-about-font" data-aos="fade-up" data-aos-delay="400">
                      {{ env('ABOUT_DESCRIPTION') }}
                    </p>
                  </div>
                </div>
                <div id="desktop-counter"class="col-md-12">
                  <div data-aos="fade-up" data-aos-delay="500" class="row">
                    <div class="col-md-3 col-sm-3">
                      <div class="number-ace-center">
                        <h1>
                          <span class="number">{{ env('ABOUT_COUNT_EMPLOYE') }}</span>
                          <span class="plus">+</span>
                        </h1>
                        <p>EMPLOYEES</p>
                      </div>
                    </div>
                    <div class="col-md-3 col-sm-3">
                      <div class="number-ace-center">
                        <h1>
                          <span class="number">{{ env('ABOUT_COUNT_CLIENTS') }}</span
                          ><span class="plus">+</span>
                        </h1>
                        <p>CORPORATE CLIENTS</p>
                      </div>
                    </div>
                    <div class="col-md-3 col-sm-3">
                      <div class="number-ace-center">
                        <h1><span class="number">{{ env('ABOUT_COUNT_PDI_PROJECT') }}</span><span class="plus">+</span></h1>
                        <p>PDI PROJECTS</p>
                      </div>
                    </div>
                    <div class="col-md-3 col-sm-3">
                      <div class="number-ace-center">
                        <h1><span class="number">{{ env('ABOUT_COUNT_OEM_PROJECT') }}</span><span class="plus">+</span></h1>
                        <p>OEM PROJECTS</p>
                      </div>
                    </div>

                  </div>
                </div>
                <div id="mobile-counter">
                  <div class="row-mobile-counter">

                    <div data-aos="fade-up" data-aos-delay="100" class="card" style="background-color: #fa0e0e;color:white">
                      <h1 class="number-mobile">
                        <span class="number">{{ env('ABOUT_COUNT_EMPLOYE') }}</span>
                        <span class="plus">+</span>
                      </h1>
                      <span>EMPLOYEES</span>
                    </div>
                    <div data-aos="fade-up" data-aos-delay="200" class="card" style="background-color: #f2db0e;color:white">
                      <h1 class="number-mobile">
                        <span class="number">{{ env('ABOUT_COUNT_CLIENTS') }}</span
                            ><span class="plus">+</span>
                      </h1>
                      <span>CORPORATE CLIENTS</span>
                    </div>

                  </div>
                  <div class="row-mobile-counter">

                    <div data-aos="fade-up" data-aos-delay="300" class="card" style="background-color: #5b9300;color:white">
                      <h1 class="decimal-mobile">
                        <span class="number">{{ env('ABOUT_COUNT_PDI_PROJECT') }}</span>
                        <span class="plus">+</span>
                    </h1>
                      <span>PDI PROJECTS</span>
                    </div>
                    <div data-aos="fade-up" data-aos-delay="400" class="card" style="background-color: #4e96a7;color:white" >
                      <h1 class="decimal-mobile">
                        <span class="number">{{ env('ABOUT_COUNT_OEM_PROJECT') }}</span>
                      </h1>
                      <span>OEM PROJECTS</span>
                    </div>

                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="company-ace" style="background-color: #ffffff;">
      </section>
      <!-- <section class="company-ace">
        <div class="content-ace">
          <div class="wrap-content">
            <div class="ace-isi about">
              <div data-aos="fade-up" data-aos-delay="100" class="col-md-12">
                <div class="title-ace">
                  OUR WELL-ESTABLISHED EMPIRE
                  <span class="h-dash" style="font-weight: bold">—</span>
                </div>
              </div>

              <div
                data-aos="fade-up"
                data-aos-delay="200"
                class="col-md-12 col-sm-12"
              >
                <h1>Company structure</h1>
              </div>
              <div class="row" id="row-desktop-structure">
                <div  data-aos="fade-up"
                data-aos-delay="300" class="col-md-4">
                  <img
                      class="img-responsive circle-img-ace"
                      src="{{ static_asset('aceweb') }}/assets/img/circle-main.png"
                      alt=""
                    />

                </div>
                <div class="col-md-8">
                    <div class="circle-row">
                        <div  data-aos="zoom-in-down"
                        data-aos-delay="700" class="card-circle">
                            <img  src="{{ static_asset('aceweb') }}/assets/img/circle1.png" alt="" />
                        </div>
                        <div class="card-circle" data-aos="zoom-in-down"
                        data-aos-delay="800">
                            <img  src="{{ static_asset('aceweb') }}/assets/img/circle-g2.png" alt="" />
                        </div>
                        <div   class="card-circle" data-aos="zoom-in-down"
                        data-aos-delay="900">
                            <img  src="{{ static_asset('aceweb') }}/assets/img/trimex.svg" alt="" />
                        </div>
                        <div class="card-circle" data-aos="zoom-in-down"
                        data-aos-delay="1000">
                            <img  src="{{ static_asset('aceweb') }}/assets/img/circle4.png" alt="" />
                        </div>
                        <div class="card-circle" data-aos="zoom-in-down"
                        data-aos-delay="1100">
                            <img  src="{{ static_asset('aceweb') }}/assets/img/circle5.png" alt="" />
                        </div>

                  </div>

                  <div data-aos="zoom-in-down" class="line-structure"> <img id="line-sturcture"   class="img-responsive" src="/public/aceweb/assets/img/line.png" alt=""></div>

                </div>

                </div>



              <!-- <div id="structur-ipad" class="row img-strc">
                <img style="width:100%" src="{{ static_asset('aceweb') }}/assets/img/structure.png" alt="">
              </div> -->
<!--
              <div  class="row img-structure-mobile">
                <div class="col-sm-12">
                  <center>
                    <div data-aos="fade-up"
                    data-aos-delay="400" class="col-sm-12" style="padding: 5px 0px;">
                    <center>
                        <img  src="{{ static_asset('aceweb') }}/assets/img/circle1.png" alt="" />
                    </center>
                    </div>
                  </center>
                  <center>
                    <div data-aos="fade-up"
                    data-aos-delay="500" class="col-sm-12" style="padding: 5px 0px;">
                    <center>
                        <img  src="{{ static_asset('aceweb') }}/assets/img/circle-g2.png" alt="" />
                    </center>
                    </div>
                  </center>

                  <center>
                    <div data-aos="fade-up"
                    data-aos-delay="600" class="col-sm-12" style="padding: 5px 0px;">
                    <center>
                        <img  src="{{ static_asset('aceweb') }}/assets/img/trimex.svg" alt="" />
                    </center>
                    </div>
                  </center>

                  <center>
                    <div data-aos="fade-up"
                    data-aos-delay="700" class="col-sm-12" style="padding: 5px 0px;">
                    <center>
                        <img  src="{{ static_asset('aceweb') }}/assets/img/circle4.png" alt="" />
                    </center>
                    </div>
                  </center>
                  <center>
                    <div data-aos="fade-up"
                    data-aos-delay="800" class="col-sm-12" style="padding: 5px 0px;">
                    <center>
                        <img  src="{{ static_asset('aceweb') }}/assets/img/circle5.png" alt="" />
                    </center>
                    </div>
                  </center>

                </div>
              </div>




              </div>
              <div data-aos="fade-up"
              data-aos-delay="900" class="col-md-12">
                <center><a href="{{url('about')}}" class="btn ace-button" style="padding: 10px 20px;color:rgba(41, 49, 136, 1);border-color: rgba(41, 49, 136, 1);">About Us</a></center>
              </div>
            </div>
          </div>
        </div>
      </section> -->
      <section id="nonmansory" class="about-provider">
        <div class="content-ace">
          <div class="wrap-content">
            <div class="ace-isi about">
              <div class="row">
                <div class="col-md-12">
                  <div
                    data-aos="fade-up"
                    data-aos-delay="100"
                    class="title-ace"
                  >
                  LEADERSHIP
                    <span class="h-dash" style="font-weight: bold">—</span>
                  </div>
                </div>
                <div data-aos="fade-up" data-aos-delay="200" class="col-md-6 col-sm-12">
                  <h1>Board of directors</h1>
                </div>
                <div class="col-md-6 col-sm-12">
                  <div
                    data-aos="fade-up"
                    data-aos-delay="300"
                    class="content-about"
                  >
                    <p style="text-align: justify;" class="p-about-font">
                        We are the Malaysia’s number one manufacturer and installer of automotive leather and has been trusted by the automotive industry for over 20 years and are the official leather provider & fitter OEM, PDI, REM Market. We pride ourselves in our extensive high quality products produced through our outstanding teamwork, creative passion, detailed hand craftsmanship and build pride into every product and appreciate our customers.
                    </p>
                  </div>
                </div>
              </div>
              <div class="row" style="padding: 50px 0px;">
                @foreach($leadership as $i => $v)
                <div style="padding: 5px;" data-aos="fade-up" data-aos-delay="{{$i+1}}00"  class="col-md-3">
                    <img style="border-radius: 10px;" class="img-director img-responsive" src="{{getimage($v->foto)}}" alt="">
                    <div class="caption_leadership">
                        <div class="leadership_name">{{$v->name}}</div>
                        <div class="leadership_position">{{$v->position}}</div>
                    </div>

                </div>
                @endforeach
              </div>
              <div data-aos="fade-up"  class="row">
                <div  class="col-md-12">
                    <center><a href="{{url('about_director')}}" class="btn ace-button" style="padding: 10px 20px;color:rgba(41, 49, 136, 1);border-color: rgba(41, 49, 136, 1);">About Us</a></center>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section id="nonmansory2" class="gtp-solution">
        <div class="content-ace">
          <div class="wrap-content">
            <div class="ace-isi about">
              <div class="col-md-12">
                <div data-aos="fade-up" data-aos-delay="100" class="title-ace">
                    ONE PLATFORM, LIMITLESS POSSIBILITIES
                  <span class="h-dash" style="font-weight: bold">—</span>
                </div>
              </div>
              <div class="row">
                <div data-aos="fade-up" data-aos-delay="200" class="col-md-6 col-sm-6">
                  <h1>GSAP System
                    The All-in-One Platform</h1>
                </div>
                <div data-aos="fade-up" data-aos-delay="300" class="col-md-6 col-sm-6">
                    <p class="img-director" style="color:white;text-align: justify;">Our seat covers are made of top-notch materials, and our leather is
                        imported from Southern America and Europe for the best leather quality.
                        Leather type such as Catania Leather, Barracuda Leather and Nappa
                        Leather. In addition to the tanneries' own specifications and inspection, we
                        also conduct internal laboratory test when the leather reaches our facility.
                        Stringent checks are conducted during all phases to make sure our customer
                        receive the best quality from us. For ordering please enter our ordering system GSAP</p>

                </div>
              </div>
              <div class="sticky-content">
                <div id="gpt0"></div>
                <div class="row" id="content_scroll">
                  <div class="col-md-6 col-sm-6"></div>
                  <div  class="col-md-6 col-sm-6 text-content-gtp">
                    <div class="vl" style="color: rgba(0, 153, 255, 1)">
                      <table>
                        <th valign="top">
                          <div class="progress-container-personal">
                            <div class="progress-bar" id="progressBar"></div>
                          </div>
                        </th>
                        <th  valign="top" style="padding-left: 10px;">
                          <div id="to-progress">1/5</div>

                          <div id="title-progress">
                            Supports both B2B &amp; B2C integration
                          </div>

                          <div class="img-director" id="content-progress" style="color: white;">
                            Our potential partners can create their own product
                            branding and launch their own digital gold program
                            with the help of our ready-made templates and API.
                          </div>
                        </th>
                      </table>
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <center>
                     <div  id="myDIV" class="img-wrap-gpt">
                     <!----<div class="alert">-->
                        <!--<figure class="swing">-->
                          <img id="imggpt1" />

                        <!--</figure>-->
                       <div></div>
                      <!--</div>-->

                   </div>
                 </center>
                 <div class="gtp-po-button">
                  <center>
                      <a style="padding: 10px;" href="#" class="ace-button">Find Out More</a>
                    </center>
                  </div>
                 </div>
              </div>
              <div id="gtp">
                <div id="gpt1"></div>
                <div id="gpt2"></div>
                <div id="gpt3"></div>
                <div id="gpt4"></div>
                <div id="gpt5"></div>
                <div id="gpt6"></div>

              </div>






            </div>
          </div>
        </div>
      </section>
      <section data-aos="fade-up" id="gtp-patner-focused" class="gtp-patner" style="padding: 0px 0px;">
        <div class="content-ace" >
          <div class="wrap-content">
            <div style="padding-top: 0px" class="about">
              <div class="row">
                <div class="col-md-12" style="padding-top: 60px">
                  <div data-aos="fade-up" data-aos-delay="100" class="title-ace">
                    HONORABLE PARTNERS
                    <span class="h-dash" style="font-weight: bold">—</span>
                  </div>
                </div>
                <div data-aos="fade-up" data-aos-delay="500" class="col-md-6 col-sm-6">
                  <h1>A trusted partner for over 22 businesses</h1>
                </div>
                <div id="mansory" class="col-md-6 col-sm-6 sticky-mansory">
                    <!--mansory-->
                    <div class="second sec">
                        <div class="sliders-cont">
                        <div id="slider" class="col1">
                            <ul>
                              <li class="selfie-img"></li>
                              <li class="selfie-img"></li>
                              <li class="selfie-img"></li>
                              <li class="selfie-img"></li>
                            </ul>
                            </div>
                        <div id="slider" class="col2">
                            <ul>
                              <li class="selfie-img"></li>
                              <li class="selfie-img"></li>
                              <li class="selfie-img"></li>
                              <li class="selfie-img"></li>
                            </ul>
                            </div>

                        </div>
                      </div>

                    <!--END MANSORY-->
                  </div>

          </div>
        </div>
      </section>

      <section class="ace-achievements">
        <div class="content-ace">

            <div style="padding-top: 0px" class="ace-isi about">
            <div class="wrap-content">
                <div class="ace-isi-achievements">
              <div class="row">
                <div class="col-md-12">
                  <div
                    data-aos="fade-up"
                    class="title-ace aos-init aos-animate"
                  >
                  Company History
                    <span class="h-dash" style="font-weight: bold">—</span>
                  </div>
                </div>
                <div
                  data-aos="fade-up"
                  class="col-md-12 col-sm-12 aos-init aos-animate"
                >
                  <h1>Companies History and Background</h1>
                </div>
                <div data-aos="fade-up" class="col-md-12 col-sm-12" style="height: 60vh;position: relative;overflow: auto;">
                  <p class="p-about-font" style="text-align: justify;color:white">
                    We started with Gosford Malaysia manufactured and sold automotive covers to the REM market segment, where
automotive covers are replaced and/or repaired for used automotive vehicles for car owners, used car dealers,
importers, automotive dealers, car accessory retailers and automotive cover installers. It operated out of a
manufacturing facility located at Jalan Tun Abdul Razak, Johor Bahru, Johor, Malaysia which had an annual
manufacturing capacity of approximately 11,500 meters of automotive cover material. Its manufacturing facility
then had 11 sewing machines and its material cutting process was carried out manually.
In 2003, Gosford Malaysia began to secure orders for automotive covers from the REM market segment in
international markets such as the United Kingdom and New Zealand. In 2004, Gosford Malaysia set up another sales
and installation hub in Kuala Lumpur to cater for its customers in Kuala Lumpur and Selangor.
Gosford Malaysia began to secure orders for automotive covers from the REM market segment customers in
Australia in 2006. Meanwhile, sales from customers in Malaysia continued to grow and its revenues grew from
RM1.4 million in the FYE 2003 to RM9.0 million in the FYE 2006. In order to facilitate further expansion of its
operations, Gosford Malaysia relocated its manufacturing facility from Jalan Tun Abdul Razak, Johor Bahru, Johor
to the Masai Plant in 2006 and acquired 29 new sewing machines. Accordingly, its annual manufacturing capacity
increased to approximately 41,800 meters of automotive cover material.
Recognising the potential to sell its automotive covers to the REM market segment in Singapore, I set up Gosford
Singapore in 2007 to market and sell automotive covers to the REM market segment in Singapore. Gosford
Singapore set up a sales and installation hub in Singapore in the same year, which allowed Gosford Singapore to
market, sell and install automotive covers manufactured by Gosford Malaysia at the Masai Plant for customers based
in Singapore.
<br>
<br>
Meanwhile, the late Go Yoong Fei also set up Trimex Australia in 2008, to facilitate the marketing and sale of
automotive covers to the REM market segment in Australia.
Gosford Malaysia began to automate the cutting process when it acquired its first automated cutting machinery in
2007. Gosford Malaysia later acquired another automated cutting machinery in the following year. The automated
cutting machineries enabled it to enhance its operational efficiency and with the automatic nesting software
integrated with the machineries, Gosford Malaysia was able to optimise the utilisation of its materials. By then, its
manufacturing facility had increased to 58 sewing machines. With the acquisition of the new automated cutting
machineries, the annual manufacturing capacity of its manufacturing facility increased from approximately 41,800
meters to approximately 263,100 meters of automotive cover material.
<br>
<br>
In 2009, the late Go Yoong Fei and Ng Yew Chung, who is a relative of the late Go Yoong Fei, set up Trimex
Malaysia to grow sales of automotive covers from customers in Kuala Lumpur and Selangor.
Subsequently, the sales and installation hub in Kuala Lumpur was relocated to PJ Hub in 2010.
Gosford Malaysia secured its first order from the OEM market segment, when it first began to manufacture and
supply automotive covers to APM, a Tier 1 automotive seat and/or interior part manufacturer in 2012. The order
entailed manufacturing automotive covers for Mazda 3 car models. Gosford Malaysia’s first order from the OEM
market segment paved the way for Gosford Malaysia to fulfil other orders from the OEM market segment. Gosford
Malaysia subsequently manufactured and supplied automotive covers for Proton Perdana R 2.0 car models in 2015.
In 2015, Gosford Malaysia secured its first order from the PDI market segment when it secured an order from
Perodua Sales Sdn Bhd, an automotive distributor. Later in the year, Trimex Malaysia secured an order from the PDI
market segment from Ilusi Mantap Sdn Bhd, a car accessory retailer. The orders from the PDI market segment
entails replacing and restyling automotive covers for automotive vehicles prior to the automotive vehicles being
registered, and the customers of this segment include automotive distributors and car accessory retailers.
<br>
<br>
In 2018, the late Go Yoong Fei transferred all his shares in Trimex Australia to his spouse, Tan Sun Sun. In 2019, I
was appointed by the late Go Yoong Fei acting Chief Executive Officer after being identified as the successor to the
late Go Yoong Fei.
Despite the above changes, the Group’s business continued to grow. Gosford Malaysia acquired additional new
automated cutting machineries and sewing machines and by 2020, it had 8 automated cutting machineries and 150
sewing machines, which expanded its annual manufacturing capacity from approximately 263,100 meters to 1.1
million meters of automotive cover material. Gosford Malaysia relocated to the Tampoi Plant in 2020 upon the
expiry of the tenancy for the Masai Plant and to cater for its business expansion.
In 2021, the Group expanded downstream and ventured into the manufacturing of automotive seats and Feytech SB
was incorporated to facilitate this expansion. Feytech SB secured its first contract from Kia Malaysia to manufacture
automotive seats for the Kia Carnival car models in the same year. Following the contract, the Group set up Kulim
Plant 1 in line with the manufacturing requirements for the said project. Feytech SB later secured another
automotive seat contract from Mazda Malaysia for the manufacturing of automotive seats for the Mazda CX-30 car
model in 2022.
<br>
<br>
In order to facilitate the Proposed Listing, the Company was established in 2023 with the intention to acquire
Gosford Malaysia, Trimex Malaysia, Gosford Singapore, Trimex Australia and Feytech SB.
Over the years, the Group has established its reputation as an automotive cover manufacturer that can also
manufacture automotive seats. Gosford Malaysia has been recognised by Perodua Sales Sdn Bhd for delivering its
products promptly in 2018. Further, Gosford Singapore has also been awarded with the SME Excellence Business
Award Achievers 2022/2023 by Vision Media Group. These recognitions are testament to the Group’s established
industry reputation.
                  </p>

                  <!--END MANSORY-->
                </div>
              </div>
                </div>
            </div>
            <!-- <div class="wrap-content-img-achievement">
             <div class="ace-isi-achievements-img">
                <div class="row">
                    <div style="position: relative;" id="carouselachivements" class="carousel slide pointer-event" data-bs-ride="carousel">


                      <div class="carousel-inner">

                            @php
                                $countac = count($achievement);
                                $banyak  = $countac/4;
                                $achievements = $achievement->toArray();
                                $no = 0;
                                for ($n=0; $n < $banyak; $n++) {
                                    $no++;
                                    @endphp

                        <div class="carousel-item @if($no=1) active @endif">
                          <div class="row">
                                    @php
                                    foreach (array_slice($achievements, $n) as $i => $v){
                                        $last = $i-1;

                                        $description = strip_tags($v['description']);

                                        if($i < 4){

                                            @endphp

                                            <div data-aos="fade-up" data-aos-delay="{{ $i+1 }}00" class="col-md-3">
                                                <a href="{{ url('newsroom/'.$v['slug']) }}">
                                                    <div class="hover hover-1 text-white rounded"><img src="{{ asset('public/'.$v['file_name']) }}" alt="">
                                                        <div class="hover-overlay"></div>
                                                        <div class="hover-1-content px-3 py-1">
                                                            <h3 class="hover-1-title font-weight-bold mb-0 py-3"> <span class="font-weight-light">{{ $v['title'] }}</span></h3>
                                                            <p style="font-size:16px" class="hover-1-description font-weight-light mb-0">{{substr($description, 0, 70) . '...' }}<span><br><button onclick="window.location.href='{{url('news'.$v['slug'])}}';" class="btn-readnow-white">Read More</button></span></p>

                                                        </div>
                                                    </div>
                                                </a>
                                                </div>

                                            @php
                                        }else{
                                            $no=0;
                                        }

                                    }
                                    @endphp
                            </div>
                            <div class="achievements-arrow">
                            <button class="acecarousel-control-prev-ach" type="button" data-bs-target="#carouselachivements" data-bs-slide="prev">
                                        <span class="left-arrow-achievements" aria-hidden="true"><i class="fa fa-angle-left"></i></span>
                                        <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="acecarousel-control-next-ach" type="button" data-bs-target="#carouselachivements" data-bs-slide="next">
                                        <span class="right-arrow-achievements"><i class="fa fa-angle-right"></i></span>
                                        <span class="visually-hidden">Next</span>
                                        </button>
                            </div>
                        </div>
                                    @php
                                }
                                @endphp
                                @foreach (array_slice($achievements, 0) as $i => $v)

                                @php

                                @endphp

                                 @endforeach

                     </div>

            </div>
          </div>

          <div class="carousel-indicators">
            @php
                $countac = count($achievement);
                $banyak  = $countac/4;
                $achievements = $achievement->toArray();
                $no = -1;
                for ($n=0; $n < $banyak; $n++) {
                    $no++;
                    @endphp
                    <button id="btn-slider" type="button" data-bs-target="#carouselachivements" data-bs-slide-to="{{ $no }}" class="btn-slide @if($no == 1)active @endif" aria-label="Slide {{ $no }}" fdprocessedid="io38s9" aria-current="true"></button>
                    @php
                }
                    @endphp



             </div> -->




          </div>
          </div>
          <!-- <div class="row">
            <div class="read-now-ach">
            <center>
                <a style="padding: 10px;" href="{{ url('newsroom') }}" class="ace-button">Read More</a>
              </center>
            </div>
          </div> -->

            </div>
          </div>

      </section>
      <section id="ace-testimonials-mobile" class="ace-testimonials-mobile">
        <div class="content-ace about">
          <div class="wrap-content">
            <div class="ace-isi about">
               <div class="row">
            <div>
                <div data-aos="fade-up" class="col-md-12">
                  <div class="title-ace">
                    TESTIMONIALS
                    <span class="h-dash" style="font-weight: bold">—</span>
                  </div>
                </div>
                <div data-aos="fade-up" class="col-md-12 col-sm-12">
                  <h1>Why our partners love us</h1>
                </div>
            </div>

                <div data-aos="fade-up" class="col-md-12">
                  <div

                    style="position:relative;"
                    id="#myCarouseltesti"
                    class="carousel slide"
                    data-bs-ride="carousel"
                  >
                <div class="carousel-inner">
                    <div>
                    @foreach($testimonial as $i => $v)
                      <div class="carousel-item @if($i==0) active @endif">
                        <div class="row slider-testimonials">
                        @if($v->video != null)
                        <div class="col-md-7 col-sm-12">
                            <p style="margin-top:20px">
                              {!! $v->content !!}
                            </p>
                            <hr
                              style="
                                width: 84px;
                                height: 3px;
                                background: #079cff;
                              "
                            />
                            <h5>{{ $v->person }}</h5>
                            <p>{{ $v->position }}</p>
                          </div>
                          <div class="col-md-5 col-sm-12">
                            <div class="card">
                                {!! $v->video !!}
                            </div>
                          </div>



                        @else
                        <div class="col-md-7 col-sm-12">
                            <p style="margin-top:20px">
                              {!! $v->content !!}
                            </p>
                            <hr
                              style="
                                width: 84px;
                                height: 3px;
                                background: #079cff;
                              "
                            />
                            <h5>{{ $v->person }}</h5>
                            <p>{{ $v->position }}</p>
                          </div>
                          <div class="col-md-5 col-sm-12">
                            <div class="card">
                              <img
                                style="float:right;width:100%"
                                class="img-responsive"
                                src="{{ getimage($v->image) }}"
                                alt=""
                              />
                            </div>
                          </div>
                        @endif
                        </div>
                      </div>
                    @endforeach
                    </div>



                </div>

                    <!-- <button class="acecarousel-control-prev" type="button" data-bs-target="#myCarouseltesti" data-bs-slide="prev">
                        <span style="color:#1D5189;font-size: 250%;margin-left:20px;font-weight:bold;" aria-hidden="true"><i class="fa fa-angle-left"></i></span>
                        <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="acecarousel-control-next" type="button" data-bs-target="#myCarouseltesti" data-bs-slide="next">
                        <span style="color:#1D5189;font-size: 250%;margin-right:20px;font-weight:bold;" aria-hidden="true"><i class="fa fa-angle-right"></i></span>
                        <span class="visually-hidden">Next</span>
                        </button>-->

                  </div>
                </div>

            </div>
            </div>
          </div>
        </div>
      </section>
      <section  id="ace-testimonials-desktop" class="ace-testimonials">
        <div class="content-ace about">
            <div class="wrap-content">
            <div class="ace-isi about">
              <div class="row">
            <div>
                <div data-aos="fade-up" class="col-md-12">
                  <div class="title-ace">
                    TESTIMONIALS
                    <span class="h-dash" style="font-weight: bold">—</span>
                  </div>
                </div>
                <div data-aos="fade-up" class="col-md-12 col-sm-12">
                  <h1>Why our partners love us</h1>
                </div>
            </div>

                <div data-aos="fade-up" class="col-md-12">
                  <div

                    style="position:relative;margin-top:50px"
                    id="myCarouseltesti"
                    class="carousel slide"
                    data-bs-ride="carousel"
                  >
                <div class="carousel-inner">
                    <div style="margin-left:10%;margin-right:10%">
                    @foreach($testimonial as $i => $v)
                      <div class="carousel-item @if($i==0) active @endif">
                        @if($v->video != null)
                        <div class="row slider-testimonials">
                        <div class="col-md-7 col-sm-12">
                            <p style="margin-top:20px" style="font-family: 'Poppins';">
                              {!! $v->content !!}
                            </p>
                            <hr
                              style="
                                width: 84px;
                                height: 3px;
                                background: #006eb2;
                              "
                            />
                            <h5>{{ $v->person }}</h5>
                            <p>{{ $v->position }}</p>
                          </div>
                          <div class="col-md-5 col-sm-12">
                            <div class="card">
                                {!! $v->video !!}
                            </div>
                          </div>
                        </div>
                        @else
                        <div class="row slider-testimonials">
                          <div class="col-md-7 col-sm-7">
                            <p>
                              {!! $v->content !!}
                            </p>
                            <hr
                              style="
                                width: 334px;
                                height: 3px;
                                background: #006eb2;
                              "
                            />
                            <h5>{{ $v->person }}</h5>
                            <p>{{ $v->position }}</p>
                          </div>
                          <div class="col-md-5 col-sm-5">
                            <div class="card">
                              <img
                                style="float:right;width:100%"
                                class="img-responsive"
                                src="{{ getimage($v->image) }}"
                                alt=""
                              />
                            </div>
                          </div>
                        </div>
                        @endif
                      </div>
                    @endforeach
                    </div>



                </div>
                @if(count($testimonial) > 1)

                     <button class="acecarousel-control-prev" type="button" data-bs-target="#myCarouseltesti" data-bs-slide="prev">
                        <span style="color:#1D5189;font-size: 250%;margin-left:20px;font-weight:bold;" aria-hidden="true"><i class="fa fa-angle-left"></i></span>
                        <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="acecarousel-control-next" type="button" data-bs-target="#myCarouseltesti" data-bs-slide="next">
                        <span style="color:#1D5189;font-size: 250%;margin-right:20px;font-weight:bold;" aria-hidden="true"><i class="fa fa-angle-right"></i></span>
                        <span class="visually-hidden">Next</span>
                        </button>
                @endif
                  </div>
                </div>

            </div>
          </div>
        </div>
        </div>
      </section>
      <section class="ace-conected">

        <div class="content-ace">
            <div id="loading">
                <img src="{{ static_asset('aceweb') }}/assets/img/loading-gif.gif" alt="Loading">
            </div>
          <div class="wrap-content">
            <div class="ace-isi about">
              <div class="row">
                <div data-aos="fade-up" class="col-md-12">
                  <div class="title-ace">
                    STAY CONNECTED
                    <span class="h-dash" style="font-weight: bold">—</span>
                  </div>
                </div>
                <div data-aos="fade-up" class="col-md-6 col-sm-12">
                  <h1>Partner with us and let's get started!</h1>
                  <p class="p-about-font">
                    We take pride in helping our partners to achieve their goals by offering support and guidance. Be our partner today to gain a life-changing experience.
                  </p>
                  <div id="alertpatner" class="alert alert-warning alert-dismissible fade show" role="alert">

                      <strong>Thanks for your Request</strong> next  you can see the reply via email


                  </div>
                </div>
                <div data-aos="fade-up" class="col-md-6 col-sm-12">
                  <div class="content-about">
                    <form id="requestpatnerform">
                        {{csrf_field()}}
                      <div class="form-group">
                        <input
                          type="text"
                          name="name"
                          class="form-control"
                          required
                          placeholder="Name *"
                        />
                      </div>
                      <div class="form-group">
                        <input
                          type="text"
                          name="numbercontact"
                          class="form-control"
                          placeholder="Contact Number *"
                          required
                        />
                      </div>
                      <div class="form-group">
                        <input
                          type="text"
                          name="email"
                          class="form-control"
                          placeholder="Email Address *"
                          required
                        />
                      </div>
                      <div class="form-group">
                        <input
                          type="text"
                          name="subject"
                          class="form-control"
                          placeholder="Subject *"
                          required
                        />
                      </div>
                      <div class="form-group">
                        <textarea
                          style="height: 20vh"
                          type="text"
                          name="message"
                          class="form-control"
                          required
                        >
Message *</textarea
                        >
                      </div>
                      <div class="form-group">
                        <button type="submit" class="ace-button-black">Get Started</a>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
    <!--END CONTENT-->





@endsection
