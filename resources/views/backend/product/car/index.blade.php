@extends('backend.layouts.app')

@section('content')

    <div class="row">
        <div class="@if (auth()->user()->can('add_brand')) col-lg-8 @else col-lg-12 @endif">
            <div class="card">
                <div class="card-header row gutters-5">
                    <div class="col text-center text-md-left">
                        <h5 class="mb-md-0 h6">{{ translate('Cars') }}</h5>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered dataTable no-footer">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th></th>
                                    <th>{{ translate('Name') }}</th>
                                    <th>{{ translate('Year of make') }}</th>
                                    <th>{{ translate('Make') }}</th>
                                    <th>{{ translate('Type') }}</th>
                                    <th class="text-center">{{ translate('Options') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $i => $v)
                                    <tr>
                                        <td>{{ $i + 1 }}</td>
                                        <td><img style="width:200;height:100px" src="{{ getimage($v->image) }}"
                                                alt="{{ $v->name }}"></td>
                                        <td>{{ $v->name }}</td>
                                        <td>{{ $v->year }}</td>
                                        <td>{{ make_car($v->make)->name }}</td>
                                        <td>{{ type_car($v->type)->type }}</td>
                                        <td class="text-center">
                                            @can('edit_car')
                                                <a class="btn btn-soft-primary btn-icon btn-circle btn-sm"
                                                    href="{{ route('cars.edit', ['id' => $v->id, 'lang' => env('DEFAULT_LANGUAGE')]) }}"
                                                    title="{{ translate('Edit') }}">
                                                    <i class="las la-edit"></i>
                                                </a>
                                            @endcan
                                            @can('delete_car')
                                                <a href="#"
                                                    class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete"
                                                    data-href="{{ route('cars.destroy', $v->id) }}"
                                                    title="{{ translate('Delete') }}">
                                                    <i class="las la-trash"></i>
                                                </a>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
        @can('add_brand')
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">{{ translate('Add New Car') }}</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('cars.store') }}" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <div class="input-group" data-toggle="aizuploader" data-type="image">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-soft-secondary font-weight-medium">
                                            {{ translate('Browse') }}</div>
                                    </div>
                                    <div class="form-control file-amount">{{ translate('Choose File') }}</div>
                                    <input type="hidden" name="image" value="" class="selected-files">
                                </div>
                                <div class="file-preview box md">
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="name">{{ translate('Name') }}</label>
                                <input type="text" placeholder="{{ translate('Name') }}" name="name" class="form-control"
                                    required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="name">{{ translate('Year') }}</label>
                                <select name="year" id="" class="form-control">
                                    <option value="">--Select Year--</option>
                                    @for ($i = 1994; $i <= date('Y'); $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="name">{{ translate('Make') }}</label>
                                <select name="make" id="" class="form-control">
                                    <option value="">--Make--</option>
                                    @foreach ($brand as $i => $v)
                                        <option value="{{ $v->id }}">{{ $v->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="name">{{ translate('Type') }}</label>
                                <select name="type" id="" class="form-control">
                                    <option value="">--type--</option>
                                    @foreach ($type as $i => $v)
                                        <option value="{{ $v->id }}">{{ $v->type }}</option>
                                    @endforeach
                                </select>
                            </div>

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
