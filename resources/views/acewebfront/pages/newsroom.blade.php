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
                                NEWS & EVENTS
                                <span class="h-dash" style="font-weight: bold">—</span>
                            </div>
                        </div>
                        <div data-aos="fade-up" class="col-md-12 col-sm-12">
                            <h1>Stay updated with our journey</h1>
                        </div>

                        <div style="margin-top: 50px" class="row-personals">
                            <div class="col-md-9">

                            </div>
                            <div class="col-md-3">
                                <div class="row-personals">
                                    <div style="margin: auto">Sort by:</div>
                                    <div style="margin-left: 20px">
                                        <select class="form-control" id="category"
                                            onchange="window.location = jQuery('#category option:selected').val();">
                                            <option value="">--SELECT CATEGORY--</option>
                                            <option value="{{ url('newsroom?category=ALL') }}"
                                                @if (isset($_GET['category'])) @if ($_GET['category'] == 'ALL') selected @endif
                                                @endif>ALL NEWS</option>
                                            <option value="{{ url('newsroom?category=CORPORATE') }}"
                                                @if (isset($_GET['category'])) @if ($_GET['category'] == 'CORPORATE') selected @endif
                                                @endif>CORPORATE</option>
                                            <option value="{{ url('newsroom?category=PERSONAL') }}"
                                                @if (isset($_GET['category'])) @if ($_GET['category'] == 'PERSONAL') selected @endif
                                                @endif>PERSONAL</option>
                                            <!-- <option value="{{ url('newsroom?category=AIAB') }}" @if (isset($_GET['category'])) @if ($_GET['category'] == 'AIAB') selected @endif @endif>AIAB</option> -->
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div data-aos="fade-up" style="margin-top: 40px" class="row aos-init aos-animate">
                            <!-- @foreach ($data as $i => $v)
                                <div class="col-md-4">
                                    <a href="{{ url('newsroom/' . $v->slug) }}">
                                        <img class="img-responsive-news rounded" src="{{ getimage($v->banner) }}"
                                            alt="" />
                                        <p style="margin-top:18px;margin-bottom: 18px;">{{ $v->title }}</p>
                                    </a>
                                </div>
                            @endforeach -->

                            @foreach ($data as $i => $v)


                            <div class="col-md-4 aos-init aos-animate" style="position: relative;">
                                <div style="height: 400px;position: relative;
overflow: hidden;" class="card text-center board-director">
                                    <div style="    position: relative;
    height: 280px;
    border-radius: 9px;
    overflow: hidden;">
                                        <img src="{{getimage($v->banner)}}" width="100%">
                                    </div>
                                    <br>
                                    <a href="{{ url('newsroom/' . $v->slug) }}"><p style="margin-top:5px;margin-bottom: 18px;">{{ $v->title }}</p> </a>
                                </div>
                                @if($v->photos != null)
                                <div class="video-play-icon">
                                    <a @if($v->photos != null) id="dynamic-gallery-demo{{$v->id}}" @endif href="#" class="video bg-danger"><i class="fa fa-camera"></i></a>
                                </div>
                                @endif
                            </div>



                            @if($v->photos != null)
                            <script>
                                const $dynamicGallery{{$v->id}} = document.getElementById("dynamic-gallery-demo{{$v->id}}");

$dynamicGallery{{$v->id}}.addEventListener("lgInit", (event) => {
  const pluginInstance = event.detail.instance;
  setVimeoThumbnails(pluginInstance);
});

dynamicGallery = window.lightGallery($dynamicGallery{{$v->id}}, {
  dynamic: true,
  plugins: [lgZoom, lgVideo, lgThumbnail],
  dynamicEl: [
    @foreach(explode(',',$v->photos) as $img)
    {
      src:
        "{{getimage($img)}}",
      responsive:
        "{{getimage($img)}}",
      thumb:
        "{{getimage($img)}}",
      subHtml: `<div class="lightGallery-captions">
                <h4>{{ $v->title }}</h4>

            </div>`
    },
@endforeach

  ]
});

// Fetch vimeo thumbnails and update gallery
async function setVimeoThumbnails(dynamicGallery) {
  for (let i = 0; i < dynamicGallery.galleryItems.length; i++) {
    const item = dynamicGallery.galleryItems[i];
    const slideVideoInfo = item.__slideVideoInfo || {};
    if (slideVideoInfo.vimeo) {
      const response = await fetch(
        'https://vimeo.com/api/oembed.json?url=' +
        encodeURIComponent(item.src),
      );
      const vimeoInfo = await response.json();
      dynamicGallery.$container
        .find('.lg-thumb-item')
        .eq(i)
        .find('img')
        .attr('src', vimeoInfo.thumbnail_url);
    }
  }
}

// Open gallery
$dynamicGallery{{$v->id}}.addEventListener("click", () => {
  dynamicGallery.openGallery(0);
});

                            </script>
                            @endif

                            @endforeach

                        </div>
                        <div style="margin-top: 20px;" class="row">
                            <div class="container">
                                <div class="col-md-12">

                                    <div class="d-flex justify-content-center">
                                        {!! $data->links() !!}
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
