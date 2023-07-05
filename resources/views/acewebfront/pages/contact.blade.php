 @extends('acewebfront.layouts')
 @section('meta')
     <meta property="og:image" content="{{ uploaded_asset(get_setting('site_icon')) }}" />
 @endsection
 @section('content')
     <main>
         <section class="ace-investor">
             <div data-aos="fade-up">
                 <div class="col-md-12">
                     <div class="banner-static">
                         <img class="img-responsive-banner" src="/public/aceweb/assets/img/contact-banner.png"
                             alt="ACE-BANNER-CONTACT" />
                     </div>
                 </div>
             </div>
         </section>

         <section class="gtp-anouncements">
             <div class="content-ace">
                 <div class="wrap-content">
                     <div style="padding-top: 0px" class="ace-isi about">
                         <div class="col-md-12">
                             <div data-aos="fade-up" class="title-ace">
                                 STAY CONNECTED
                                 <span class="h-dash" style="font-weight: bold">—</span>
                             </div>
                         </div>
                         <div data-aos="fade-up" class="col-md-12 col-sm-12">
                             <h1>We’d love to hear from you</h1>
                         </div>


                         <div style="margin-top: 50px" class="row">
                            <div data-aos="fade-up" class="col-md-12">
                                <div class="contact-wrap">
                                 <h2 class="contact_h2">HEAD OFFICE</h2>
                                </div>
                            </div>
                             <div data-aos="fade-up" class="col-md-6">
                                 <div class="contact-wrap">

                                     <img class="img-responsive" src="{{ asset('public/aceweb') }}/assets/img/fytech_holding.png"
                                         alt="" />
                                 </div>
                             </div>
                             <div data-aos="fade-up" class="col-md-6">
                                 <div class="contact-wrap">
                                     <div class="list-contact">
                                         <h5 class="title-corporate">FEYTECH HOLDINGS BERHAD</h5>
                                         <br>
                                         <p style="font-weight: bold">Address</p>

                                         <p>
                                             No. 19-1, Jalan USJ 10/1D, 47620 Subang Jaya, Selangor,
                                             Malaysia
                                         </p>
                                         <br>
                                         <p style="font-weight: bold">Tel</p>

                                         <p>+603 – 8081 7198</p>
                                         <br>
                                         <p style="font-weight: bold">Email</p>

                                         <p>enquiry@ace2u.com</p>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="row">
                            <div data-aos="fade-up" class="col-md-12">
                                <div class="contact-wrap">
                                 <h2 class="contact_h2">Manufacturing Division</h2>
                                </div>
                            </div>
                             <div data-aos="fade-up" class="col-md-6">
                                 <div class="contact-wrap">
                                     <img class="img-responsive"
                                         src="{{ asset('public/aceweb') }}/assets/img/gosford_factory.png" alt="" />
                                     <div class="list-contact">
                                         <h5 class="title-corporate">GOSFORD LEATHER INDUSTRIES SDN BHD
                                            (GOSFORD FACTORY, JOHOR)</h5>
                                         <br>
                                         <p style="font-weight: bold">Address</p>

                                         <p>
                                             No. 19-1, Jalan USJ 10/1D, 47620 Subang Jaya, Selangor,
                                             Malaysia
                                         </p>
                                         <br>
                                         <p style="font-weight: bold">Tel</p>

                                         <p>+603 – 8081 7198</p>
                                         <br>
                                         <p style="font-weight: bold">Email</p>

                                         <p>enquiry@ace2u.com</p>
                                     </div>
                                 </div>
                             </div>
                             <div data-aos="fade-up" class="col-md-6">
                                 <div class="contact-wrap">
                                     <img class="img-responsive" src="{{ asset('public/aceweb') }}/assets/img/gosford.png"
                                         alt="" />
                                     <div class="list-contact">
                                         <h5 class="title-corporate">GOSFORD LEATHER INDUSTRIES SDN BHD
                                            (GOSFORD FACTORY, SELANGOR)</h5>
                                         <br>
                                         <p style="font-weight: bold">Address</p>

                                         <p>
                                             No. 19, Jalan 2/131A, Project Jaya Industrial Estate,
                                             Batu 6, Jalan Klang Lama, 58200 Kuala Lumpur
                                         </p>
                                         <br>
                                         <p style="font-weight: bold">Tel</p>

                                         <p>+603 – 7772 0164</p>
                                     </div>
                                 </div>
                             </div>
                         </div>

                         <div class="row">
                             <div data-aos="fade-up" class="col-md-6">
                                 <div class="contact-wrap">
                                     <img class="img-responsive"
                                         src="{{ asset('public/aceweb') }}/assets/img/fytechsdhbhd.png" alt="" />
                                     <div class="list-contact">
                                         <h5 class="title-corporate">FEYTECH SDN BHD</h5>
                                         <br>
                                         <p style="font-weight: bold">Address</p>

                                         <p>
                                             No. 11A-2, Jalan USJ 10/1D, 47620 Subang Jaya, Selangor
                                             Malaysia
                                         </p>
                                         <br>
                                         <p style="font-weight: bold">Tel</p>

                                         <p>+603 – 8081 7205</p>
                                     </div>
                                 </div>
                             </div>

                         </div>
                         <div class="row">
                            <div data-aos="fade-up" class="col-md-12">
                                <div class="contact-wrap">
                                 <h2 class="contact_h2">Marketing Division</h2>
                                </div>
                            </div>
                            <div data-aos="fade-up" class="col-md-6">
                                <div class="contact-wrap">
                                    <img class="img-responsive"
                                        src="{{ asset('public/aceweb') }}/assets/img/trimex.png" alt="" />
                                    <div class="list-contact">
                                        <h5 class="title-corporate">TRIMEX DISTRIBUTION (M) SDN BHD</h5>
                                        <br>
                                        <p style="font-weight: bold">Address</p>

                                        <p>
                                            No. 11A-2, Jalan USJ 10/1D, 47620 Subang Jaya, Selangor
                                            Malaysia
                                        </p>
                                        <br>
                                        <p style="font-weight: bold">Tel</p>

                                        <p>+603 – 8081 7205</p>
                                    </div>
                                </div>
                            </div>
                            <div data-aos="fade-up" class="col-md-6">
                                <div class="contact-wrap">
                                    <img class="img-responsive"
                                        src="{{ asset('public/aceweb') }}/assets/img/gosford_leather.png" alt="" />
                                    <div class="list-contact">
                                        <h5 class="title-corporate">GOSFORD LEATHER TRIM (S) PTE LTD</h5>
                                        <br>
                                        <p style="font-weight: bold">Address</p>

                                        <p>
                                            No. 11A-2, Jalan USJ 10/1D, 47620 Subang Jaya, Selangor
                                            Malaysia
                                        </p>
                                        <br>
                                        <p style="font-weight: bold">Tel</p>

                                        <p>+603 – 8081 7205</p>
                                    </div>
                                </div>
                            </div>
                            <div data-aos="fade-up" class="col-md-6">
                                <div class="contact-wrap">
                                    <img class="img-responsive"
                                        src="{{ asset('public/aceweb') }}/assets/img/trimex_.png" alt="" />
                                    <div class="list-contact">
                                        <h5 class="title-corporate">TRIMEX AUTOMATIVE (AUS) PTY LTD</h5>
                                        <br>
                                        <p style="font-weight: bold">Address</p>

                                        <p>
                                            No. 11A-2, Jalan USJ 10/1D, 47620 Subang Jaya, Selangor
                                            Malaysia
                                        </p>
                                        <br>
                                        <p style="font-weight: bold">Tel</p>

                                        <p>+603 – 8081 7205</p>
                                    </div>
                                </div>
                            </div>
                         </div>
                     </div>
                 </div>
             </div>
         </section>
     </main>
 @endsection
