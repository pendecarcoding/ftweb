@extends('backend.layouts.app')

@section('content')
    <div class="row">
        <div class="@if (auth()->user()->can('add_brand')) col-lg-12 @else col-lg-12 @endif">
            <form action="{{route('specialprice.store')}}" method="post">{{csrf_field()}}
                <div class="card">
                    <div class="card-header row gutters-5">
                        <div class="col text-center text-md-left">
                            <h5 class="mb-md-0 h6">{{ translate('Special Price') }}</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="example" class="table table-striped table-bordered">
                            <thead>
                                <tr style="text-align: center;background-color: rgb(98 88 81);color:white;" >
                                    <th rowspan="2">No</th>
                                    <th rowspan="2" valign="center">Type Row</th>
                                    <th colspan="2" style="text-align: center;">Pattern</th>
                                    <th colspan="2" style="text-align: center;">Color</th>
                                </tr>
                                <tr>
                                    <td style="text-align: center;background-color: rgb(92, 92, 142);color:white;">Catania Price</td>
                                    <td style="text-align: center;background-color: rgb(92, 92, 142);color:white;">Nappa Price</td>
                                    <td style="text-align: center;background-color: rgb(231, 64, 64);color:white;">Catania Price</td>
                                    <td style="text-align: center;background-color: rgb(231, 64, 64);color:white;">Nappa Price</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $index => $v)
                                @php
                                 $dataprice = (object) getSpecialPrice($v->id);
                                 @endphp
                                <tr>
                                    <td>{{$index+1}}</td>
                                    <td>{{$v->size}}</td>
                                    <td>
                                        <input type="hidden" name="row[]" value="{{$v->id}}">
                                        <input type="hidden" name="id_special[]" value="{{$dataprice->id_special}}">
                                        <input type="text" name="price_catania_pattern[]" value="{{$dataprice->price_catania_pattern}}" class="form-contorl">
                                    </td>
                                    <td>
                                        <input type="text"  name="price_nappa_pattern[]" value="{{$dataprice->price_nappa_pattern}}" class="form-contorl">
                                    </td>
                                    <td>
                                        <input type="text"  name="price_catania_color[]" value="{{$dataprice->price_catania_color}}" class="form-contorl">
                                    </td>
                                    <td>
                                        <input type="text"  name="price_nappa_color[]" value="{{$dataprice->price_nappa_color}}" class="form-contorl">
                                    </td>



                                </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                    <div class="card-footer">
                        <button type="submit" style="float:right" class="btn btn-primary">Update</button>
                    </div>

                </div>
            </form>

        </div>
    </div>
@endsection

@section('modal')
    @include('modals.delete_modal')
@endsection

@section('script')
    <script type="text/javascript">
        function sort_brands(el) {
            $('#sort_brands').submit();
        }
    </script>
@endsection
