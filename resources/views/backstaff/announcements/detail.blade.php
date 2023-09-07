@extends('acewebfront.layouts')
@section('content')
    <main>
        @include('acewebfront.widget.allbaner')
        <section class="gtp-ann" style="height: 100vh;position: relative;">
            <div class="container-fluid">
                <div class="row">
                    @include('backstaff.sidebar')


                    <br>




                    <div class="col-sm-9">


                        <div class="well" style="margin-top:50px">
                            @if (!empty($data->image))
                                <img style="width:100%;height: 300px;object-fit: cover;" src="{{ getimage($data->image) }}">
                            @endif
                            <br>
                            <div class="title-announcement">
                                {{ $data->title }}
                            </div>
                            <div class="date-announcement">
                                {{ $data->created_at }}
                            </div>
                            <div class="content-announcement">
                                {!! $data->description !!}
                            </div>
                            <div class="fotter-announcement">
                                <a style="background-color: #264e77;border-color: #264e77;"
                                    href="{{ route('staff.back.announcement', base64_encode($data->created_at)) }}"
                                    class="btn btn-primary"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                                <a style="background-color: #264e77;border-color: #264e77;"
                                    href="{{ route('staff.next.announcement', base64_encode($data->created_at)) }}"
                                    class="btn btn-primary"><i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                            </div>


                        </div>







                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
