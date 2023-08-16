@extends('acewebfront.layouts')
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
            <div class="mdl-card mdl-shadow--2dp">
                <div class="mdl-card__title">
                    <i class="material-icons mdl-list__item-icon">receipt</i> &nbsp;<h1 class="mdl-card__title-text">List Order</h1>

                </div>
                <div class="mdl-card__supporting-text no-padding">
                    <table style="    width: 100%;" class="mdl-data-table mdl-js-data-table">
                        <thead>
                            <tr>
                                <th class="mdl-data-table__cell--non-numeric">#</th>
                                <th class="mdl-data-table__cell--non-numeric">Time Order</th>
                                <th class="mdl-data-table__cell--non-numeric">Code Order</th>
                                <th class="mdl-data-table__cell--non-numeric">Product</th>
                                <th class="mdl-data-table__cell--non-numeric">Amount</th>
                                <th class="mdl-data-table__cell--non-numeric">Payment Status</th>
                                <th class="mdl-data-table__cell--non-numeric">Status Order</th>
                                <!-- <th class="mdl-data-table__cell--non-numeric">action</th> -->
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($data as $i => $v)
                            <tr>
                                <td class="mdl-data-table__cell--non-numeric">{{$i+1}}</td>
                                <td class="mdl-data-table__cell--non-numeric">{{$v->created_at}}</td>
                                <td class="mdl-data-table__cell--non-numeric">{{$v->order_code}}</td>
                                <td class="mdl-data-table__cell--non-numeric">
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
                                <td class="mdl-data-table__cell--non-numeric">{{single_price($v->total)}}</td>
                                <td class="mdl-data-table__cell--non-numeric">@if($v->payment_status=='paid')<span class="label label--mini color--green">Pending</span>@endif</td>
                                <td class="mdl-data-table__cell--non-numeric">{{$v->order_status}}</td>
                                <!-- <td class="mdl-data-table__cell--non-numeric">
                                    <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-teal"><i class="material-icons">visibility</i></button></td> -->
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
