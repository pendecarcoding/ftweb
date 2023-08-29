 @extends('acewebfront.layouts')
 @section('meta')
     <meta property="og:image" content="{{ uploaded_asset(get_setting('site_icon')) }}" />
 @endsection
 @section('content')
     <main>
         @include('acewebfront.widget.allbaner')
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


                         @foreach ($devision as $i => $v)
                             @if ($v->short == '1')
                                 @foreach (getContactByDevision($v->id) as $ic => $vc)
                                     <div class="row">
                                         <div data-aos="fade-up" class="col-md-12">
                                             <div class="contact-wrap">
                                                 <h2 class="contact_h2">{{ $v->name }}</h2>
                                             </div>
                                         </div>
                                         <div data-aos="fade-up" class="col-md-6">
                                             <div class="contact-wrap">

                                                 <img class="img-responsive" src="{{ getimage($vc->img) }}"
                                                     alt="{{ $vc->title }}" />
                                             </div>
                                         </div>
                                         <div data-aos="fade-up" class="col-md-6">
                                             <div class="contact-wrap">
                                                 <div class="list-contact">
                                                     <h5 class="title-corporate">{{ $vc->title }}</h5>
                                                     <br>
                                                     {!! $vc->content !!}
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                 @endforeach
                             @else
                                 <div class="row">
                                     <div data-aos="fade-up" class="col-md-12">
                                         <div class="contact-wrap">
                                             <h2 class="contact_h2">{{ $v->name }}</h2>
                                         </div>
                                     </div>
                                     @foreach (getContactByDevision($v->id) as $ic => $vc)
                                         <div data-aos="fade-up" class="col-md-6">
                                             <div class="contact-wrap">
                                                 <div class="img-wrap-contact">
                                                     <img style="height: 100%;" class="img-responsive"
                                                         src="{{ getimage($vc->img) }}" alt="{{ $vc->title }}" />
                                                 </div>
                                                 <div class="list-contact">
                                                     <h5 class="title-corporate">{{ $vc->title }}</h5>
                                                     <br>
                                                     {!! $vc->content !!}
                                                 </div>
                                             </div>
                                         </div>
                                     @endforeach
                                 </div>
                             @endif
                         @endforeach
                     </div>
                 </div>
             </div>
         </section>
     </main>
 @endsection
