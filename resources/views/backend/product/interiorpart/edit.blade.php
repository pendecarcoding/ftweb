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
                                <th>{{ translate('Name') }}</th>
                                <th>{{ translate('Price') }}</th>
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
                                    <td>{{ $v->name_interior }}</td>
                                    <td>RM{{ $v->price }}</td>
                                    <td class="text-right">
                                        @can('edit_vehicleseat')
                                            <a class="btn btn-soft-primary btn-icon btn-circle btn-sm"
                                                href="{{ route('interiorpart.edit', base64_encode($v->id_interior)) }}"
                                                title="{{ translate('Edit') }}">
                                                <i class="las la-edit"></i>
                                            </a>
                                        @endcan
                                        @can('delete_vehicleseat')
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
                        <h5 class="mb-0 h6">{{ translate('Update Vehicle Seat') }}</h5>
                        <a href="{{ url('admin/interiorpart') }}" class="btn btn-danger">x</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('interiorpart.update', $edit->id_interior) }}" method="POST">
                            <input name="_method" type="hidden" value="PATCH">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="name">{{ translate('Picture') }}
                                    <div class="input-group" data-toggle="aizuploader" data-type="image">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text bg-soft-secondary font-weight-medium">
                                                {{ translate('Browse') }}</div>
                                        </div>
                                        <div class="form-control file-amount">{{ translate('Choose File') }}</div>
                                        <input value="{{ $edit->img }}" type="hidden" name="image"
                                            class="selected-files">
                                    </div>
                                    <div class="file-preview box sm">
                                    </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="name">{{ translate('Name') }}</label>
                                <input type="text" value="{{ $edit->name_interior }}" placeholder="{{ translate('Name') }}"
                                    name="name" class="form-control" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="name">{{ translate('Price') }}</label>
                                <input type="number" value="{{ $edit->price }}" placeholder="{{ translate('Price') }}"
                                    name="price" class="form-control" required>
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
                                            <input value="{{ $edit->img }}" type="hidden" name="img" class="selected-files">
                                        </div>
                                        <div class="file-preview box sm">
                                        </div>
                                    </div> -->
                            <!-- <div class="form-group mb-3">
                                        <label for="name">{{ translate('Price') }}</label>
                                        <input value="{{ $edit->price }}" class="form-control" id="overrides" oninput="validateoverride(this)" type="number"
                                            id="doubleInput" name="price" step="0.01" min="0" />
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="name">{{ translate('Parent Type') }}</label>
                                        <select class="form-control" name="parent" id="">
                                            <option value="">none</option>
                                            @foreach ($data as $i => $v)
        <option value="{{ $v->id }}" @if ($v->id == $edit->parentid) selected @endif>{{ $v->name_leather }}</option>
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
