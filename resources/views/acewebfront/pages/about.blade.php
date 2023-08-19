@extends('acewebfront.layouts')
@section('content')
<main>
  <section class="bg-banner">
    <img
                    title="about-banner"
                    style="width: 100%;"
                    class="img-responsive"
                    src="{{ static_asset('aceweb') }}/assets/img/banner_about.png"
                    alt=""
                />
  </section>
      <section class="gtp-anouncements about-company">
        <div class="content-ace">
          <div class="wrap-content">
            <div style="padding-top: 0px" class="ace-isi about">
              <div class="row">
                <div data-aos="fade-up" class="col-md-12">
                    <div class="title-ace">
                    ABOUT > COMPANIES
                      <span class="h-dash" style="font-weight: bold">—</span>
                    </div>
                    <div data-aos="fade-up" data-aos-delay="200" class="col-md-12 col-sm-12 aos-init aos-animate">
                        <h1>Our well-established empire
                        </h1>
                      </div>
                  </div>
              </div>

              <div style="margin:30px 0px;">
                @foreach($data as $i =>$v)
                <div data-aos="fade-up" class="row about-company" style=" @if($i == 0) background-color: rgba(242, 245, 249, 1); @endif">
                    <div class="col-md-6">
                    <div style="position: relative;"> <img style="width: 100%;" class="img-responsive" src="{{getimage($v->foto)}}" alt="">
                        @if($v->yt_link != null)
                        <div class="video-play-icon">
                          <a  data-bs-toggle="modal" data-bs-target="#ytvd{{$v->id}}" href="#" class="video bg-danger"><i class="fa fa-youtube-play"></i></a>
                        </div>

                        @endif
                    </div>

                    </div>
                    <div class="col-md-6 content_company">
                        <div style="">
                            <h2 class="company_h2">{{$v->name}}</h2>
                            <p style="text-align: justify;font-size: 16px;">{!! $v->content !!}</p>
                        </div>
                        <!-- <a style="margin:50px 0px;" class="btn gsf-button">Learn More</a> -->
                    </div>
                  </div>
                  @if($v->yt_link != null)
                  <div class="modal fade" id="ytvd{{$v->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div  class="modal-header">

                          <button  type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div style="position: relative;overflow: hidden;">
                                {!! $v->yt_link !!}
                            </div>

                        </div>
                        <div style="background-color: brown;" class="modal-footer">

                        </div>
                      </div>
                    </div>
                  </div>
                  @endif

                  @endforeach

              </div>


            </div>
          </div>
        </div>
      </section>

    </main>
@endsection
