@extends('acewebfront.layouts')
@section('content')

    @include('acewebfront.widget.allbaner')
      <section class="gtp-anouncements about-company">
        <div class="content-ace">
          <div class="wrap-content">
            <div style="padding-top: 0px" class="ace-isi about">
              <div class="row">
                <div data-aos="fade-up" class="col-md-12">
                    <div class="title-ace">
                        FEYTECH HOLDINGS BERHAD - ABOUT -> COMPANIES
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
                <div data-aos="fade-up" class="row about-company">
                    <div class="col-md-6">
                    <div style="position: relative;"> <img style="width: 100%;height: 350px;" class="img-responsive" src="{{getimage($v->foto)}}" alt="">
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
                            <div id="readmore">
                            <div class="readmore-container">
                                <span class="readmore__content">
                                    {!! $v->content !!}
                                </span>
                                <button style="margin-top: 5px;" class="btn btn-primary readmore__toggle" role="switch" aria-checked="true">
                                    Show more
                                </button>
                            </div>
                        </div>
                        <!-- <a style="margin:50px 0px;" class="btn gsf-button">Learn More</a> -->
                    </div>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        class ReadMore {
            constructor(container) {
                this.container = container;
                this.content = container.querySelector('.readmore__content');
                this.buttonToggle = container.querySelector('.readmore__toggle');
                this.stateContent = this.content.innerHTML;
                this.addEventListeners();
                this.initializeContent();
            }

            addEventListeners() {
                this.buttonToggle.addEventListener('click', this.onClick.bind(this));
            }

            initializeContent() {
                if (this.stateContent.length > 500) {
                    this.content.innerHTML = `${this.stateContent.substring(0, 500)}...`;
                    this.buttonToggle.style.display = 'block';
                } else {
                    this.buttonToggle.style.display = 'none';
                }
            }

            onClick(event) {
                const targetEvent = event.currentTarget;

                if (targetEvent.getAttribute('aria-checked') === 'true') {
                    targetEvent.setAttribute('aria-checked', 'false');
                    this.content.innerHTML = this.stateContent;
                    this.buttonToggle.innerHTML = 'Show less';
                } else {
                    targetEvent.setAttribute('aria-checked', 'true');
                    this.content.innerHTML = `${this.stateContent.substring(0, 500)}...`;
                    this.buttonToggle.innerHTML = 'Show more';
                }
            }
        }

        document.addEventListener('DOMContentLoaded', () => {
            const readMoreContainers = document.querySelectorAll('.readmore-container');
            readMoreContainers.forEach((container) => {
                new ReadMore(container);
            });
        });
    </script>
@endsection
