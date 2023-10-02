@extends('backend.layouts.app')

@section('content')

    <div class="card">
        <div class="card-header">
            <h1 class="h2 fs-16 mb-0">{{ translate('Order Details') }} : {{$data->invoice}}</h1>
            <a href="{{ url()->previous() }}" class="btn btn-danger btn-sm" style="color:white;"><i class="las la-times"></i></a>
        </div>
        <div class="card-body">

            <div class="p-a30 bg-white m-b40" style="padding: 65px;">
                <div class="section-content">

                    <div class="m-b10">
                        <h5 class="text-uppercase">Automotive Seat Cover</h5>
                        <li>{{getvehicle($data->type_car)->size}}</li>
                        <li>{{gettypeleather($data->id_leather)->leather}}</li>
                        <li>{{getaplicationleather($data->id_coverage)->name_leather}}</li>

                        <div style="float:right">RM{{$data->priceseat}}</div>
                        <div class="dlab-divider bg-gray-dark text-gray-dark"></div>
                    </div>
                    <br>
                    <div class="m-b10">
                        <h5 class="text-uppercase">Selection</h5>
                        @foreach($color as $vcolor)
                         <div style="display: flex;justify-content: space-between;">
                            <li>@if(count($color) > 1) Two Tone Color :    @else  Single Color :  @endif    {{$vcolor['color']}}</li>
                            <div style="float:right">RM{{$vcolor['price']}}</div>
                         </div>

                        @endforeach
                        @foreach($design as $vdesign)
                        <div style="display: flex;justify-content: space-between;">
                         <li>Pattern : {{$vdesign['name']}}</li>
                         <div style="float:right">RM{{$vdesign['price']}}</div>
                        </div>
                        @endforeach
                        @if(count($interior) > 0)
                        <hr>
                        <li>Interior Part :</li>
                        @foreach($interior as $vinterior)
                        <div style="display: flex;justify-content: space-between;">
                         <li>{{$vinterior['name_interior']}}</li>
                         <div style="float:right">RM{{$vinterior['price']}}</div>
                        </div>
                        @endforeach
                        @endif

                        <div class="dlab-divider bg-gray-dark text-gray-dark"></div>
                    </div>
                    <div class="m-b10">
                        <div style="display: flex;justify-content: space-between;">
                            <p class="text-capitalize" style="font-size:x-small;"></p>
                            <div>Total : <span style="color:brown">RM {{$data->totalprice}}</span></div>
                        </div>
                    </div>
                    <br><br><br>
                    <div class="m-b10">
                        <h5 class="text-uppercase">Contact Details</h5>
                        <li>Name : {{$data->name}}</li>
                        <li>Email : {{$data->email}}</li>
                        <li>Contact Number : {{$data->contact_number}}</li>
                        <div class="dlab-divider bg-gray-dark text-gray-dark"></div>
                    </div>
                    <br>
                    <div class="m-b10">
                        <h5 class="text-uppercase">Payment & Delivery Status</h5>
                        <li>Payment Status : {{$data->payment_status}}</li>
                        <li>Delivery Status : {{$data->delivery_status}}</li>
                    </div>



                </div>
            </div>


        </div>
        <div class="card-footer">
            <div style="display: flex;">
                <a data-toggle="modal" data-target="#updatepayment" href="#" class="btn btn-primary"><i class="las la-money-bill"></i> Update Payment Status</a>
                <a href="mailto:{{$data->email}}" target="_blank" class="btn btn-danger" style="color:white"><i class="las la-paper-plane"></i> Reply Use Email</a>
                <a href="https://wa.me/{{ $data->contact_number }}?text='HI'"  class="btn btn-success"> <i class="lab la-whatsapp"></i> Call Use Whatsapp</a>
            </div>

        </div>
    </div>

    <div id="updatepayment" class="modal fade" role="dialog">
        <form action="{{route('orders.update_payment_status')}}" method="post">@csrf
            <input type="hidden" name="order_id" value="{{$data->id}}" required>
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Update Payment Status</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body">

                    <select name="status" class="form-control">
                      <option value="">--Select Status Payment--</option>
                      <option value="paid" @if($data->payment_status=='paid') selected @endif>PAID</option>
                      <option value="unpaid" @if($data->payment_status=='unpaid') selected @endif>UNPAID</option>
                    </select>
                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                  </div>
                </div>

              </div>

        </form>

      </div>
@endsection

@section('script')

@endsection
