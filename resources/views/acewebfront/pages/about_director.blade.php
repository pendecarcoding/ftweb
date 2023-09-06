@extends('acewebfront.layouts')
@section('content')

    <main>
        @include('acewebfront.widget.allbaner')
        <section class="gtp-anouncements">
            <div class="content-ace">
                <div class="wrap-content">
                    <div style="padding-top: 0px" class="ace-isi about">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="title-ace">
                                    ABOUT > BOARD OF DIRECTORS
                                    <span class="h-dash" style="font-weight: bold">—</span>
                                </div>
                                <div class="col-md-12 col-sm-12 aos-init aos-animate">
                                    <h1>Meet our board of directors
                                    </h1>
                                </div>
                            </div>
                        </div>
                        <!-- @foreach ($data as $i => $v)
    <div data-aos="fade-up" data-aos-delay="{{ $i + 1 }}00" class="row directors_list">
                        <div class="col-md-6">
                            <img class="img-responsive" src="{{ getimage($v->foto) }}" alt="">
                        </div>
                        <div class="col-md-6">
                            <div>
                                <h2 class="position-name">{{ $v->name }}</h2>
                                <div class="position-about">{{ $v->position }}</div>
                                {!! $v->content !!}
                            </div>
                        </div>
                      </div>
    @endforeach -->

                        <div class="container mt-5 mb-5" style="flex-direction: column;
                        display: flex;
                        align-items: center;">
                            @foreach($data as $i => $v)
                            @if($v->part=='BOD' && $v->head=='Y')
                                <div data-bs-toggle="modal" data-bs-target="#readboard{{ $v->id }}"
                                    data-aos="fade-up" data-aos-delay="{{ $i + 1 }}00"
                                    class="col-md-4 aos-init aos-animate">
                                    <div style="height: 400px;position: relative;overflow: hidden;"
                                        class="card text-center board-director">
                                        <div
                                            style="position: relative;height: 280px;border-radius: 9px;overflow: hidden;">
                                            <img src="{{ getimage($v->foto) }}" width="100%">
                                        </div>
                                        <br>
                                        <h5 class="mb-0">{{ $v->name }}</h5> <small>{{ $v->position }}</small>
                                    </div>
                                </div>
                                <div class="modal fade" id="readboard{{ $v->id }}">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="btn-close"
                                                    data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">

                                                <div id="k2Container" class="itemView team-popup">
                                                    <div class="row">
                                                        <div class="col-xs-12 col-sm-4">
                                                            <!-- Item Image -->
                                                            <div class="itemImageBlock">
                                                                <span class="itemImage">
                                                                    <img style="height: 300px;width: 100%;margin-bottom: 20px;"
                                                                        src="{{ getimage($v->foto) }}"
                                                                        class="img-responsive">
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-8">
                                                            <!-- Item text -->
                                                            <div class="itemFullText"
                                                                style="height:300px;overflow-y:scroll;position:relative;padding: 0px 10px;">
                                                                <h2>{{ $v->name }}</h2>
                                                                <p>{{ $v->position }}</p>
                                                                {!! $v->content !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal-footer" style="background-color: brown;">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                        </div>

                        <div class="container mt-5 mb-5">
                            <div class="row g-2">

                                @foreach ($data as $i => $v)
                                @php
                                    $part = explode(',',$v->part);
                                @endphp
                                 @if(in_array('BOD',$part) && $v->head=='N')
                                        <div data-bs-toggle="modal" data-bs-target="#readboard{{ $v->id }}"
                                            data-aos="fade-up" data-aos-delay="{{ $i + 1 }}00"
                                            class="col-md-4 aos-init aos-animate">
                                            <div style="height: 400px;position: relative;overflow: hidden;"
                                                class="card text-center board-director">
                                                <div
                                                    style="position: relative;height: 280px;border-radius: 9px;overflow: hidden;">
                                                    <img src="{{ getimage($v->foto) }}" width="100%">
                                                </div>
                                                <br>
                                                <h5 class="mb-0">{{ $v->name }}</h5> <small>{{ $v->position }}</small>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="readboard{{ $v->id }}">
                                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="btn-close"
                                                            data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <div id="k2Container" class="itemView team-popup">
                                                            <div class="row">
                                                                <div class="col-xs-12 col-sm-4">
                                                                    <!-- Item Image -->
                                                                    <div class="itemImageBlock">
                                                                        <span class="itemImage">
                                                                            <img style="height: 300px;width: 100%;margin-bottom: 20px;"
                                                                                src="{{ getimage($v->foto) }}"
                                                                                class="img-responsive">
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xs-12 col-sm-8">
                                                                    <!-- Item text -->
                                                                    <div class="itemFullText"
                                                                        style="height:300px;overflow-y:scroll;position:relative;padding: 0px 10px;">
                                                                        <h2>{{ $v->name }}</h2>
                                                                        <p>{{ $v->position }}</p>
                                                                        {!! $v->content !!}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="modal-footer" style="background-color: brown;">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <h1>Key Senior Management
                        </h1>

                        <div class="container mt-5 mb-5" style="flex-direction: column;
                        display: flex;
                        align-items: center;">
                            @foreach($data as $i => $v)
                            @php
                            $part = explode(',',$v->part);
                             @endphp
                            @if(in_array('KEY',$part) && $v->head=='Y')
                                <div data-bs-toggle="modal" data-bs-target="#readboard{{ $v->id }}"
                                    data-aos="fade-up" data-aos-delay="{{ $i + 1 }}00"
                                    class="col-md-4 aos-init aos-animate">
                                    <div style="height: 400px;position: relative;overflow: hidden;"
                                        class="card text-center board-director">
                                        <div
                                            style="position: relative;height: 280px;border-radius: 9px;overflow: hidden;">
                                            <img src="{{ getimage($v->foto) }}" width="100%">
                                        </div>
                                        <br>
                                        <h5 class="mb-0">{{ $v->name }}</h5> <small>{{ $v->position }}</small>
                                    </div>
                                </div>
                                <div class="modal fade" id="readboard{{ $v->id }}">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="btn-close"
                                                    data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">

                                                <div id="k2Container" class="itemView team-popup">
                                                    <div class="row">
                                                        <div class="col-xs-12 col-sm-4">
                                                            <!-- Item Image -->
                                                            <div class="itemImageBlock">
                                                                <span class="itemImage">
                                                                    <img style="height: 300px;width: 100%;margin-bottom: 20px;"
                                                                        src="{{ getimage($v->foto) }}"
                                                                        class="img-responsive">
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-8">
                                                            <!-- Item text -->
                                                            <div class="itemFullText"
                                                                style="height:300px;overflow-y:scroll;position:relative;padding: 0px 10px;">
                                                                <h2>{{ $v->name }}</h2>
                                                                <p>{{ $v->position }}</p>
                                                                {!! $v->content !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal-footer" style="background-color: brown;">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                        </div>




                        <div class="container mt-5 mb-5">
                            <div class="row g-2">
                                @foreach($data as $i => $v)
                                @php
                                $part = explode(',',$v->part);
                                 @endphp
                                @if(in_array('KEY',$part) && $v->head=='N')
                                        <div data-bs-toggle="modal" data-bs-target="#readboard{{ $v->id }}"
                                            data-aos="fade-up" data-aos-delay="{{ $i + 1 }}00"
                                            class="col-md-4 aos-init aos-animate">
                                            <div style="height: 400px;position: relative;overflow: hidden;"
                                                class="card text-center board-director">
                                                <div
                                                    style="position: relative;height: 280px;border-radius: 9px;overflow: hidden;">
                                                    <img src="{{ getimage($v->foto) }}" width="100%">
                                                </div>
                                                <br>
                                                <h5 class="mb-0">{{ $v->name }}</h5> <small>{{ $v->position }}</small>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="readboard{{ $v->id }}">
                                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="btn-close"
                                                            data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <div id="k2Container" class="itemView team-popup">
                                                            <div class="row">
                                                                <div class="col-xs-12 col-sm-4">
                                                                    <!-- Item Image -->
                                                                    <div class="itemImageBlock">
                                                                        <span class="itemImage">
                                                                            <img style="height: 300px;width: 100%;margin-bottom: 20px;"
                                                                                src="{{ getimage($v->foto) }}"
                                                                                class="img-responsive">
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xs-12 col-sm-8">
                                                                    <!-- Item text -->
                                                                    <div class="itemFullText"
                                                                        style="height:300px;overflow-y:scroll;position:relative;padding: 0px 10px;">
                                                                        <h2>{{ $v->name }}</h2>
                                                                        <p>{{ $v->position }}</p>
                                                                        {!! $v->content !!}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="modal-footer" style="background-color: brown;">

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
            </div>
        </section>

    </main>
@endsection
