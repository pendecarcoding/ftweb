@extends('backend.layouts.app')
@section('content')
    <br>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header row gutters-5">
                <div class="col text-center text-md-left">
                    <h5 class="mb-md-0 h6">{{ translate('Pattern Design') }}</h5>
                </div>
                <div class="col text-center text-md-right">
                    <a href="{{ route('patterndesignsys.create') }}" class="btn btn-primary btn-sm" style="color:white">Add
                        Item</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Published</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $i => $v)
                                <tr>
                                    <td>{{ $i + 1 }}</td>
                                    <td><img src="{{ getimage($v->img) }}"
                                            style="width:100%;height:100px;object-fit: cover;"></td>
                                    <td>{{ $v->name_pattern }}</td>
                                    <td>RM {{ $v->price }}</td>
                                    <td> <label class="aiz-switch aiz-switch-success mb-0">
                                            <input onchange="update_published(this)" value="{{ $v->id }}"
                                                type="checkbox" <?php if ($v->published == 'Y') {
                                                    echo 'checked';
                                                } ?>>
                                            <span class="slider round"></span>
                                        </label></td>
                                    <td>
                                        @can('edit_patterndesign')
                                            <a class="btn btn-soft-primary btn-icon btn-circle btn-sm"
                                                href="{{ route('patterndesignsys.edit', base64_encode($v->id)) }}"
                                                title="{{ translate('Edit') }}">
                                                <i class="las la-pen"></i>
                                            </a>
                                        @endcan
                                        @can('delete_patterndesign')
                                            <a href="#"
                                                class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete"
                                                data-href="{{ route('patterndesignsys.destroy', base64_encode($v->id)) }}"
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
@endsection
@section('modal')
    @include('modals.delete_modal')
@endsection
@section('script')
    <script type="text/javascript">
        function makeSlug(val) {
            let str = val;
            let output = str.replace(/\s+/g, '-').toLowerCase();
            $('#slug').val(output);
        }

        function update_published(el) {
            if (el.checked) {
                var status = 'Y';
            } else {
                var status = 'N';
            }
            $.post('{{ route('patterndesignsys.published') }}', {
                _token: '{{ csrf_token() }}',
                id: el.value,
                status: status
            }, function(data) {
                if (data == 1) {
                    AIZ.plugins.notify('success', '{{ translate('Product updated Successfully') }}');
                } else {
                    AIZ.plugins.notify('danger', '{{ translate('Something went wrong') }}');
                }
            });
        }
    </script>
@endsection
