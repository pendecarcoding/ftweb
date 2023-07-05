@extends('acewebfront.layouts')
@section('content')
<main>
  <section class="bg-banner">
    <img
                    title="about-banner"
                    class="img-responsive"
                    src="{{ static_asset('aceweb') }}/assets/img/about_director.png"
                    alt=""
                />
  </section>
      <section class="gtp-anouncements">
        <div class="content-ace">
          <div class="wrap-content">
            <div style="padding-top: 0px" class="ace-isi about">
              <div class="row">
                <div data-aos="fade-up" class="col-md-12">
                    <div class="title-ace">
                        ABOUT > BOARD OF DIRECTORS
                      <span class="h-dash" style="font-weight: bold">—</span>
                    </div>
                    <div data-aos="fade-up" class="col-md-12 col-sm-12 aos-init aos-animate">
                        <h1>Meet our board of directors
                        </h1>
                      </div>
                  </div>
              </div>
              @foreach($data as $i => $v)
              <div data-aos="fade-up" data-aos-delay="{{$i+1}}00" class="row directors_list">
                <div class="col-md-6">
                    <img class="img-responsive" src="{{getimage($v->foto)}}" alt="">
                </div>
                <div class="col-md-6">
                    <div>
                        <h2 class="position-name">{{$v->name}}</h2>
                        <div class="position-about">{{$v->position}}</div>
                        {!!$v->content!!}
                    </div>
                </div>
              </div>
              @endforeach


            </div>
          </div>
        </div>
      </section>

    </main>
@endsection
