@extends('acewebfront.layouts')
@section('meta')
    <meta property="og:image" content="{{ uploaded_asset(get_setting('site_icon')) }}" />
@endsection
@section('content')
    <main>
        <section class="ace-investor">

            <div class="col-md-12">
                <div class="banner-static">
                    <img class="img-responsive-banner" src="/public/aceweb/assets/img/contact-banner.png"
                        alt="ACE-BANNER-PRODUCT" />
                </div>
            </div>
        </section>

        <section class="gtp-anouncements" style="background-color: rgb(247, 246, 246);">
            <div class="content-ace">
                <div class="wrap-content">

                    <div style="padding-top: 0px" class="ace-isi">
                        @include('gosford.layouts.alert')
                        <div class="main-body">
                            <div class="row gutters-sm">
                                @include('gosford.frontend.panel-profil')

                                <div id="listorder" class="col-md-8">
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <div class="table-responsive">


                                            <table id="example" class="display  nowrap table table-striped" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Time Order</th>
                                                        <th>Code Order</th>
                                                        <th>Product</th>
                                                        <th>Amount</th>
                                                        <th>Payment Status</th>
                                                        <th>Status Order</th>
                                                        <!-- <th>action</th> -->
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($data as $i => $v)
                                                    <tr>
                                                        <td>{{$i+1}}</td>
                                                        <td>{{$v->created_at}}</td>
                                                        <td>{{$v->order_code}}</td>
                                                        <td>
                                                            <div class="order-table-view">
                                                                <img class="img-myorder" src="{{getimage($v->thumbnail_img)}}" alt="">
                                                                <div class="order-column" style="margin-left:20px;margin-top:20px">
                                                                    <p>Make : {{make_car($v->brand_id)->name}}</p>
                                                                    <p>Model : {{car_typebyCarId($v->car_id)->type}}</p>
                                                                    <p>Year : 2017</p>
                                                                    <p>Material : {{$v->material}}</p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>{{single_price($v->total)}}</td>
                                                        <!-- <td>@if($v->payment_status=='paid'){{$v->payment_status}}@endif</td> -->
                                                        <td>UNPAID</td>
                                                        <td>{{$v->order_status}}</td>
                                                        <!-- <td>
                                                            <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-teal"><i class="material-icons">visibility</i></button></td> -->
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Time Order</th>
                                                        <th>Code Order</th>
                                                        <th>Product</th>
                                                        <th>Amount</th>
                                                        <th>Payment Status</th>
                                                        <th>Status Order</th>
                                                        <!-- <th>action</th> -->
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                        </div>
                                    </div>





                                </div>
                            </div>

                        </div>
                    </div>


    </main>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src=" https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script>
        new DataTable('#example');

        function editprofil() {
            const beforeedit = document.getElementById('beforeedit');
            const formeditProfil = document.getElementById('formeditProfil');
            const toggleProfil = document.getElementById('toggleProfil');
            // Hide the element by setting display to 'none'
            const currentDisplay = beforeedit.style.display;
            if (currentDisplay === 'none') {
                beforeedit.style.display = 'block';
                formeditProfil.style.display = 'none';
                toggleProfil.innerText = 'Edit Profil';
            } else {
                beforeedit.style.display = 'none';
                formeditProfil.style.display = 'block';
                toggleProfil.innerText = 'Cancel';
            }
        }
    </script>
@endsection
