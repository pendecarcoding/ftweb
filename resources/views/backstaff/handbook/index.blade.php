@extends('acewebfront.layouts')
@section('content')
    <style>
        .ndfHFb-c4YZDc-i5oIFb.ndfHFb-c4YZDc-e1YmVc .ndfHFb-c4YZDc-Wrql6b {
            display: none;
            background: rgba(0, 0, 0, .75);
            height: 40px;
            top: 12px;
            left: auto;
            padding: 0
        }
    </style>
    <main>

        @include('acewebfront.widget.allbaner')
        <section class="gtp-ann">
            <div class="container-fluid">
                <div class="row">
                    @include('backstaff.sidebar')


                    <br>




                    <div class="col-sm-9" style="padding: 36px;">
                        <div class="well" style="margin-top:50px;height: 100vh;">
                            <h2 style="font-weight: bold;color:#1D5189">Employee handbook Download</h2>
                            <br>

                            @foreach ($data as $i => $v)
                                <a style="text-decoration: none;color: black;"
                                    href="{{ route('staff.detailhandbook', base64_encode($v->file)) }}">
                                    <div class="list-content">
                                        <p><span><img src="{{ static_asset('aceweb') }}/assets/img/pdficon.png"></span>
                                            &nbsp;
                                            {{ $v->name }} Effective {{ convertdate($v->effective) }}</p>


                                    </div>
                                </a>
                            @endforeach


                        </div>







                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
