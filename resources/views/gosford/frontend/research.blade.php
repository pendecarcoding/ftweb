@extends('acewebfront.layouts')
@section('meta')
    <meta property="og:image" content="{{ uploaded_asset(get_setting('site_icon')) }}" />
@endsection
@section('content')
    <main>
        @include('acewebfront.widget.allbaner')
        <section class="pt-5 pb-5" style="padding-top: 0rem !important;">
            <div style="display: flex;flex-direction: column;">
                @foreach ($data as $i => $v)
                    @if ($i % 2 == 0)
                    <!-- <div class="row m-b40">
                        <div class="col-lg-6 col-md-6 col-sm-12 section-head align-self-center">


                            <p class="m-b0">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use..</p>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 align-self-center">
                            <img src="images/car.png" alt="">
                        </div>
                    </div> -->
                        <div style="position: relative;">
                            <div class="row" style="padding-left: 0px;padding-right: 0px;--bs-gutter-x: 0;">
                                <div class="col-md-6 col-lg-6 col-sm-12 section-head align-self-center">
                                    <div class="padding-research">
                                        <h5 style="color: #E20000;">{{ $v->title }}</h5>
                                        <p style="text-align: justify;">{!! $v->content !!}</p>
                                    </div>


                                </div>
                                <div class="col-md-6 col-lg-6 col-sm-12 align-self-center" style="position: relative;overflow: hidden;">
                                    @if ($v->yt_link != null)
                                    <video style="width:100%;height: 100%" controls>
                                        <source style="width: 100%;" src="{{$v->yt_link}}" type="video/mp4">
                                    </video>
                                    @else<img class="img-research" style="width: 100%;" src="{{ getimage($v->img) }}"
                                            alt="">
                                    @endif
                                </div>
                            </div>
                        </div>
                    @else
                        <div style="position: relative;">
                            <div class="row" style="padding-left: 0px;padding-right: 0px;--bs-gutter-x: 0;">
                                <div class="col-md-6 col-lg-6 col-sm-12 align-self-center">
                                    @if ($v->yt_link != null)
                                    <video style="width:100%;height: 100%" controls>
                                        <source style="width: 100%;" src="{{$v->yt_link}}" type="video/mp4">
                                    </video>
                                    @else<img class="img-research" style="width: 100%;" src="{{ getimage($v->img) }}"
                                            alt="">
                                    @endif
                                </div>
                                <div class="col-md-6 col-lg-6 col-sm-12 section-head align-self-center">
                                    <div class="padding-research">
                                        <h5 style="color: #E20000;">{{ $v->title }}</h5>
                                        <p style="text-align: justify;">{!! $v->content !!}</p>
                                    </div>


                                </div>

                            </div>
                        </div>
                    @endif
                @endforeach




            </div>



        </section>


    </main>
    <script>
        // Wait for the iframe to load
        document.getElementById('youtube-iframe').onload = function() {
            // Access the iframe content window
            var iframe = document.getElementById('youtube-iframe');
            var iframeContent = iframe.contentWindow.document;

            // Apply styles to the iframe content
            var styles = `
            .ytp-impression-link {
              display: none !important;
            }
          `;
            var styleElement = iframeContent.createElement('style');
            styleElement.innerHTML = styles;
            iframeContent.head.appendChild(styleElement);
        };
    </script>
@endsection
