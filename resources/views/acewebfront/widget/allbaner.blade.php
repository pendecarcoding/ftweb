@if (count(getallbanner()) > 1)
<section class="section-slider">
    <div style="top: 0;
    position: absolute;
    width: 100%;">
        <div class="section-slider" style="width:100%;position: relative;overflow: hidden;display: flex;
        flex-direction: column;">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    @php
                        $noslide = 0;
                    @endphp
                    @foreach (getallbanner() as $is => $v)
                        @if (count(getallbanner()) > 1)
                            <button id="btn-slider" type="button" data-bs-target="#carouselExampleIndicators"
                                data-bs-slide-to="{{ $is }}"
                                class="btn-slide @if ($is == 0) active @endif"
                                @if ($is == 0) aria-current="true" @endif
                                aria-label="Slide {{ $is }}"></button>
                        @endif
                    @endforeach
                </div>
                <div class="carousel-inner">
                    @foreach (getallbanner() as $is => $v)
                        <div class="carousel-item @if ($is == 0) active @endif">
                            <img class="section-slider" style="width: 100%;object-fit: cover;"
                                src="{{ getimage($v) }}" />
                            <div class="col-md-6">
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>
@else

<section class="no-banner">

</section>

@endif
