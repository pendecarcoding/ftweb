@extends('acewebfront.layouts')
@section('meta')
    <meta property="og:image" content="{{ getimage($data->image) }}" />
@endsection
@section('content')
@section('title', $data->title)
<main>
    <section class="ace-investor">
        <div data-aos="fade-up" class="aos-init aos-animate">
            <div class="col-md-12">
                <div class="banner-static">
                    <img class="img-responsive-banner" src="/public/aceweb/assets/img/ceo-banner.png" alt="">
                </div>
            </div>
        </div>
    </section>
    <section style="margin-top: 2vh;" class="gtp-anouncements">
        <div class="content-ace">
            <div class="ace-isi about">
                <div class="wrap-content">
                    <div style="padding-top: 0px" class="ace-isi">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <div class="title-ace">
                                    ABOUT &gt; COMPANIES
                                      <span class="h-dash" style="font-weight: bold">—</span>
                                    </div>
                                <h1>{{ $data->title }}</h1>


                                <div class="dlab-post-text isiku">
                                    <div style="text-align: justify">
                                        <!-- <div class="sharethis-inline-share-buttons m-b10 st-justified st-has-labels st-inline-share-buttons st-animated"
                                            id="st-1">
                                            <div class="st-total st-hidden">
                                                <span class="st-label"></span>
                                                <span class="st-shares"> Shares </span>
                                            </div>
                                            <div class="st-btn st-first" data-network="facebook"
                                                style="display: inline-block">
                                                <img alt="facebook sharing button"
                                                    src="https://platform-cdn.sharethis.com/img/facebook.svg" />
                                                <span class="st-label">Share</span>
                                            </div>
                                            <div class="st-btn" data-network="twitter" style="display: inline-block">
                                                <img alt="twitter sharing button"
                                                    src="https://platform-cdn.sharethis.com/img/twitter.svg" />
                                                <span class="st-label">Tweet</span>
                                            </div>
                                            <div class="st-btn" data-network="whatsapp" style="display: inline-block">
                                                <img alt="whatsapp sharing button"
                                                    src="https://platform-cdn.sharethis.com/img/whatsapp.svg" />
                                                <span class="st-label">Share</span>
                                            </div>
                                            <div class="st-btn" data-network="telegram" style="display: inline-block">
                                                <img alt="telegram sharing button"
                                                    src="https://platform-cdn.sharethis.com/img/telegram.svg" />
                                                <span class="st-label">Share</span>
                                            </div>
                                            <div class="st-btn st-last st-remove-label" data-network="googlebookmarks"
                                                style="display: inline-block">
                                                <img alt="googlebookmarks sharing button"
                                                    src="https://platform-cdn.sharethis.com/img/googlebookmarks.svg" />
                                                <span class="st-label">Mark</span>
                                            </div>
                                        </div> -->
                                        {!! $data->content !!}
                                    </div>
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
