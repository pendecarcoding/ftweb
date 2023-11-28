@extends('backend.layouts.app')

@section('content')
    <div class="row">
        <div class="@if (auth()->user()->can('add_brand')) col-lg-8 @else col-lg-12 @endif">
            <div class="card">
                <div class="card-header row gutters-5">
                    <div class="col text-center text-md-left">
                        <h5 class="mb-md-0 h6">{{ translate('Interior Part') }}</h5>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table aiz-table mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>{{ translate('Name') }}</th>
                                <th>{{ translate('Catania Price') }}</th>
                                <th>{{ translate('Nappa Price') }}</th>
                                <th>{{ translate('Show On') }}</th>
                                <th class="text-right">{{ translate('Options') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $i => $v)
                            <tr>
                                <td>{{$i+1}}</td>
                                <td>
                                  <img style="width:100px;height: 50px;object-fit: cover;" src="{{getimage($v->img)}}" alt="">

                                </td>
                                <td>{{$v->name_interior}}</td>
                                <td>RM{{$v->catania_price}}</td>
                                <td>RM{{$v->nappa_price}}</td>
                                <td>
                                    @php
                                        getDataLeather($v->showon);
                                    @endphp
                                </td>
                                <td class="text-right">
                                    @can('edit_interiorpart')
                                        <a class="btn btn-soft-primary btn-icon btn-circle btn-sm"
                                            href="{{ route('interiorpart.edit',base64_encode($v->id_interior)) }}"
                                            title="{{ translate('Edit') }}">
                                            <i class="las la-edit"></i>
                                        </a>
                                    @endcan
                                    @can('delete_interiorpart')
                                        <a href="#"
                                            class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete"
                                            data-href="{{ route('interiorpart.destroy', $v->id_interior) }}"
                                            title="{{ translate('Delete') }}">
                                            <i class="las la-trash"></i>
                                        </a>
                                    @endcan
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="aiz-pagination">

                    </div>
                </div>
            </div>
        </div>
        @can('add_interiorpart')
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">{{ translate('Add New Interior Part') }}</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('interiorpart.store') }}" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="name">{{ translate('Picture') }}
                                <div class="input-group" data-toggle="aizuploader" data-type="image">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-soft-secondary font-weight-medium">
                                            {{ translate('Browse') }}</div>
                                    </div>
                                    <div class="form-control file-amount">{{ translate('Choose File') }}</div>
                                    <input type="hidden" name="image" class="selected-files">
                                </div>
                                <div class="file-preview box sm">
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="name">{{ translate('Name') }}</label>
                                <input type="text" placeholder="{{ translate('Name') }}" name="name" class="form-control"
                                    required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="name">{{ translate('Catania Price') }}</label>
                                <input type="number" placeholder="{{ translate('Catania Price') }}" name="catania_price" class="form-control"
                                    required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="name">{{ translate('Nappa Price') }}</label>
                                <input type="number" placeholder="{{ translate('Nappa Price') }}" name="nappa_price" class="form-control"
                                    required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Show On</label>
                                <select required name="showon[]" class="select2 form-control aiz-selectpicker"  data-toggle="select2" data-placeholder="Choose ..."data-live-search="true" multiple>
                                    @foreach($leather as $i => $vleather)
                                     <option value="{{$vleather->id}}">{{$vleather->leather}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- <div class="form-group mb-3">
                                <label for="name">{{ translate('Image') }}
                                    <small>({{ translate('141x64') }})</small></label>
                                <div class="input-group" data-toggle="aizuploader" data-type="image">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-soft-secondary font-weight-medium">
                                            {{ translate('Browse') }}</div>
                                    </div>
                                    <div class="form-control file-amount">{{ translate('Choose File') }}</div>
                                    <input type="hidden" name="img" class="selected-files">
                                </div>
                                <div class="file-preview box sm">
                                </div>
                            </div> -->
                            <!-- <div class="form-group mb-3">
                                <label for="name">{{ translate('Price') }}</label>
                                <input class="form-control" id="overrides" oninput="validateoverride(this)" type="number" id="doubleInput" name="price" step="0.01" min="0" />
                            </div>
                            <div class="form-group mb-3">
                                <label for="name">{{ translate('Parent Type') }}</label>
                                <select class="form-control" name="parent" id="">
                                    <option value="">none</option>
                                    @foreach($data as $i =>$v)
                                      <option value="{{$v->id}}">{{$v->name_leather}}</option>
                                    @endforeach
                                </select>
                            </div> -->
                            <div class="form-group mb-3 text-right">
                                <button type="submit" class="btn btn-primary">{{ translate('Save') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endcan
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
