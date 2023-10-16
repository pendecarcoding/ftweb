@extends('backend.layouts.app')

@section('content')
    <div class="row">
        <div class="@if (auth()->user()->can('add_brand')) col-lg-8 @else col-lg-12 @endif">
            <div class="card">
                <div class="card-header row gutters-5">
                    <div class="col text-center text-md-left">
                        <h5 class="mb-md-0 h6">{{ translate('Vehicle Seat') }}</h5>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table aiz-table mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>{{ translate('Title') }}</th>
                                <th>{{ translate('short') }}</th>
                                <th class="text-right">{{ translate('Options') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $i => $v)
                                <tr>
                                    <td>{{ $i + 1 }}</td>
                                    <td>
                                        <img style="width:100px;height: 50px;object-fit: cover;"
                                            src="{{ getimage($v->img) }}" alt="">

                                    </td>
                                    <td>{{ $v->title }}</td>
                                    <td>{{ $v->shortby }}</td>
                                    <td class="text-right">
                                        @can('edit_automotiveseats')
                                            <a class="btn btn-soft-primary btn-icon btn-circle btn-sm"
                                                href="{{ route('automotiveseats.edit', base64_encode($v->id)) }}"
                                                title="{{ translate('Edit') }}">
                                                <i class="las la-edit"></i>
                                            </a>
                                        @endcan
                                        @can('delete_automotiveseats')
                                            <a href="#"
                                                class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete"
                                                data-href="{{ route('automotiveseats.destroy', $v->id) }}"
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
        @can('edit_automotiveseats')
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">{{ translate('Add New Image Automotive Seats') }}</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('automotiveseats.update',$edit->id) }}" method="POST">
                            @csrf
                            <input name="_method" type="hidden" value="PATCH">
                            <div class="form-group mb-3">
                                <label for="name">{{ translate('Picture') }}
                                    <div class="input-group" data-toggle="aizuploader" data-type="image">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text bg-soft-secondary font-weight-medium">
                                                {{ translate('Browse') }}</div>
                                        </div>
                                        <div class="form-control file-amount">{{ translate('Choose File') }}</div>
                                        <input type="hidden" value="{{$edit->img}}" name="image" class="selected-files">
                                    </div>
                                    <div class="file-preview box sm">
                                    </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="name">{{ translate('Title') }}</label>
                                <input type="text" placeholder="{{ translate('Name') }}" value="{{$edit->title}}" name="title" class="form-control"
                                    required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="name">{{ translate('Shortby') }}</label>
                                <input type="number" placeholder="{{ translate('Shortby') }}" value="{{$edit->shortby}}" name="shortby"
                                    class="form-control" required>
                            </div>

                            <div class="form-group mb-3 text-right">
                                <button type="submit" class="btn btn-primary">{{ translate('Save') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endcan
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
