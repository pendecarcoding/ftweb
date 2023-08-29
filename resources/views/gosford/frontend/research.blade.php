@extends('acewebfront.layouts')
@section('meta')
    <meta property="og:image" content="{{ uploaded_asset(get_setting('site_icon')) }}" />
@endsection
@section('content')
    <main>
        <section class="ace-sliders banner-video" style="height: 536px;">
            <div style="top: 0;
            height: 600px;
        position: absolute;
        width: 100%;">
                <div class="banner-video-div"
                    style="width:100%;position: relative;overflow: hidden;display: flex;
            flex-direction: column;">

                    <video class="video-style-banner" controls>
                        <source style="width: 100%;" src="/public/go_system/video/howto.mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
            </div>
        </section>

        <section class="pt-5 pb-5" style="padding-top: 0rem !important;">
            <div style="display: flex;flex-direction: column;">
                @foreach ($data as $i => $v)
                    @if ($i % 2 == 0)
                        <div style="position: relative;">
                            <div class="row" style="padding-left: 0px;padding-right: 0px;--bs-gutter-x: 0;">
                                <div class="col-md-6 col-lg-6 col-sm-12">
                                    <div class="padding-research">
                                        <h5 style="color: #E20000;">{{ $v->title }}</h5>
                                        <p style="text-align: justify;">{!! $v->content !!}</p>
                                    </div>


                                </div>
                                <div class="col-md-6 col-lg-6 col-sm-12" style="position: relative;overflow: hidden;">
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
                                <div class="col-md-6 col-lg-6 col-sm-12" style="position: relative;overflow: hidden;">
                                    @if ($v->yt_link != null)
                                    <video style="width:100%;height: 100%" controls>
                                        <source style="width: 100%;" src="{{$v->yt_link}}" type="video/mp4">
                                    </video>
                                    @else<img class="img-research" style="width: 100%;" src="{{ getimage($v->img) }}"
                                            alt="">
                                    @endif
                                </div>
                                <div class="col-md-6 col-lg-6 col-sm-12">
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
