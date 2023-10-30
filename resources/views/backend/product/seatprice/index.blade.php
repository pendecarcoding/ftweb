@extends('backend.layouts.app')

@section('content')
    <div class="row">
        <div class="@if (auth()->user()->can('add_brand')) col-lg-8 @else col-lg-12 @endif">
            <div class="card">
                <div class="card-header row gutters-5">
                    <div class="col text-center text-md-left">
                        <h5 class="mb-md-0 h6">{{ translate('Seat Price') }}</h5>
                    </div>
                </div>
                <div class="card-body">
                    <table id="example" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ translate('Type Leather') }}</th>
                                <th>{{ translate('Product') }}</th>
                                <th>{{ translate('Type') }}</th>
                                <th>{{ translate('Price') }}</th>
                                <th>{{ translate('Options') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $i => $v)
                                <tr>
                                    <td>{{ $i + 1 }}</td>
                                    <td>{{ gettypeleather($v->leather_type)->leather }}</td>
                                    <td>{{ getaplicationleather($v->application)->name_leather }}</d>
                                    <td>{{ getvehicle($v->vehicle_type)->size }}</td>
                                    <td>RM {{ $v->price }}</td>
                                    <td class="text-right">
                                        @can('edit_seatprice')
                                            <a class="btn btn-soft-primary btn-icon btn-circle btn-sm"
                                                href="{{ route('seatprice.edit', base64_encode($v->id)) }}"
                                                title="{{ translate('Edit') }}">
                                                <i class="las la-edit"></i>
                                            </a>
                                        @endcan
                                        @can('delete_seatprice')
                                            <a href="#"
                                                class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete"
                                                data-href="{{ route('seatprice.destroy', base64_encode($v->id)) }}"
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
        @can('add_seatprice')
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">{{ translate('Add New Leather') }}</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('seatprice.store') }}" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="name">{{ translate('Type Leather') }}</label>
                                <select name="typeleather" id="" class="form-control" required>
                                    @foreach ($typeleather as $i => $v)
                                        <option value="{{ $v->id }}">{{ $v->leather }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label for="name">{{ translate('Vehicle Type') }}</label>
                                <select name="vehicle" id="" class="form-control" required>
                                    @foreach ($size as $i => $v)
                                        <option value="{{ $v->id }}">{{ $v->size }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label for="name">{{ translate('Application') }}</label>
                                <select name="application" id="" class="form-control" required>
                                    @foreach ($leather as $i => $v)
                                        <option value="{{ $v->id }}">{{ $v->name_leather }}</option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="form-group mb-3">
                                <label for="name">{{ translate('Price') }}</label>
                                <input required class="form-control" id="overrides" oninput="validateoverride(this)"
                                    type="number" id="doubleInput" name="price" step="0.01" min="0" />
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
