@extends('acewebfront.layouts')
@section('meta')
    <meta property="og:image" content="{{ getimage($data->banner) }}" />
@endsection
@section('content')
@section('title', $data->title)
<main>
    @include('acewebfront.widget.allbaner')
    @php
     $img = explode(',',$data->photos);
    @endphp
    <section style="margin-top: 2vh;" class="gtp-anouncements">
        <div class="content-ace">
            <div class="wrap-content">
                <div style="padding-top: 0px" class="ace-isi">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-lg-12">
                            <div data-aos="fade-up" class="title-ace">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="{{ url('/') }}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active">
                                        <a href="{{ url('newsroom') }}">news</a>
                                    </li>
                                    <li class="breadcrumb-item active">
                                        {{ $data->title }}
                                    </li>
                                </ol>
                            </div>
                            <h1>{{ $data->title }}</h1>
                            <hr class="gold" />
                            <div id="inline-gallery-container" class="inline-gallery-container"></div>
                            <!-- <div class="dlab-post-media" id="animated-thumbnails-gallery">

                                <a href="#" data-lg-size="1600-1067" class="gallery-item" data-src="{{ getimage($data->banner) }}">
                                    <img title="{{ $data->title }}"
                                        style="width:100%;height: 400px;" class="img-responsive" src="{{ getimage($data->banner) }}"
                                        alt="" />
                                </a>
                                        <div style="display: flex;flex-direction: row;width: 100%;position: relative;">
                                            @foreach($img as $images)
                                            <a href="#" data-lg-size="1600-1067" class="gallery-item" data-src="{{ getimage($data->banner) }}">
                                            <img title="{{ $data->title }}"
                                                style="width:100%;height:150px;object-fit: cover;"  src="{{ getimage($images) }}"
                                                alt="" /></a>
                                            @endforeach
                                        </div>
                                <div class="caption p-a10">
                                    <small>{{ $data->title }}</small>
                                </div>
                            </div> -->




                            <div class="dlab-post-text isiku" style="margin-top: 10px;">
                                <div style="text-align: justify">
                                    <div class="sharethis-inline-share-buttons m-b10 st-justified st-has-labels st-inline-share-buttons st-animated"
                                        id="st-1">
                                        <div class="st-total st-hidden">
                                            <span class="st-label"></span>
                                            <span class="st-shares"> Shares </span>
                                        </div>
                                        <div onClick="parent.open('https://www.facebook.com/sharer.php?u={{ url('newsroom/' . $data->slug) }}')"
                                            class="st-btn st-first" data-network="facebook"
                                            style="display: inline-block">
                                            <img alt="facebook sharing button"
                                                src="https://platform-cdn.sharethis.com/img/facebook.svg" />
                                            <span class="st-label">Share</span>
                                        </div>
                                        <div onClick="parent.open('https://twitter.com/intent/tweet?url={{ url('newsroom/' . $data->slug) }}')"
                                            class="st-btn" data-network="twitter" style="display: inline-block">
                                            <img alt="twitter sharing button"
                                                src="https://platform-cdn.sharethis.com/img/twitter.svg" />
                                            <span class="st-label">Tweet</span>
                                        </div>
                                        <div onClick="parent.open('https://wa.me/?text={{ url('newsroom/' . $data->slug) }}')"
                                            class="st-btn" data-network="whatsapp" style="display: inline-block">
                                            <img alt="whatsapp sharing button"
                                                src="https://platform-cdn.sharethis.com/img/whatsapp.svg" />
                                            <span class="st-label">Share</span>
                                        </div>
                                        <div onClick="parent.open('https://telegram.me/share/url?url={{ url('newsroom/' . $data->slug) }}&text={{ $data->title }}')"
                                            class="st-btn" data-network="telegram" style="display: inline-block">
                                            <img alt="telegram sharing button"
                                                src="https://platform-cdn.sharethis.com/img/telegram.svg" />
                                            <span class="st-label">Share</span>
                                        </div>
                                        <div onClick="parent.open('https://plus.google.com/share?url={{ url('newsroom/' . $data->slug) }}&text={{ $data->title }}')"
                                            class="st-btn st-last st-remove-label" data-network="googlebookmarks"
                                            style="display: inline-block">
                                            <img alt="googlebookmarks sharing button"
                                                src="https://platform-cdn.sharethis.com/img/googlebookmarks.svg" />
                                            <span class="st-label">Mark</span>
                                        </div>
                                    </div>
                                    {!! $data->description !!}


                                </div>

                            </div>

                        </div>
                        <div class="col-md-4 col-sm-12 col-lg-4">
                            <!-- @include('acewebfront.widget.right') -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<script>
    const lgContainer = document.getElementById('inline-gallery-container');
    const inlineGallery = lightGallery(lgContainer, {
    container: lgContainer,
    dynamic: true,
    // Turn off hash plugin in case if you are using it
    // as we don't want to change the url on slide change
    hash: false,
    // Do not allow users to close the gallery
    closable: false,
    // Add maximize icon to enlarge the gallery
    showMaximizeIcon: true,
    // Append caption inside the slide item
    // to apply some animation for the captions (Optional)
    appendSubHtmlTo: '.lg-item',
    // Delay slide transition to complete captions animations
    // before navigating to different slides (Optional)
    // You can find caption animation demo on the captions demo page
    slideDelay: 400,
    plugins: [lgVideo, lgThumbnail],
    dynamicEl: [
        {
            src: '{{getimage($data->banner)}}',
            thumb: '{{getimage($data->banner)}}',
            subHtml: `<div class="lightGallery-captions">
                <h4>{{ $data->title }}</h4>
            </div>`,
        },
        @foreach($img as $images)
        {
            src: '{{getimage($images)}}',
            thumb: '{{getimage($images)}}',
            subHtml: `<div class="lightGallery-captions">
                <h4>{{ $data->title }}</h4>

            </div>`,
        },
       @endforeach
    ],
});

// Since we are using dynamic mode, we need to programmatically open lightGallery
inlineGallery.openGallery();
</script>

@endsection
