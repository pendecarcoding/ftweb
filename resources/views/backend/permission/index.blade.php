@extends('backend.layouts.app')
@section('content')
    <div class="card">
        <form class="" id="sort_patners" action="" method="GET">
            <div class="card-header row gutters-5">
                <div class="col text-center text-md-left">
                    <h5 class="mb-md-0 h6">{{ translate('All Permission ') }}</h5>
                </div>

                @can('add_permission')
                <div class="col text-right">
                    <a href="{{ route('permission.create') }}" class="btn btn-circle btn-info">
                        <span>{{ translate('Add New Permission') }}</span>
                    </a>
                </div>
                @endcan
            </div>
        </form>
        <div class="card-body">
            <table id="example" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th data-breakpoints="lg">{{ translate('name') }}</th>
                        <th data-breakpoints="lg">{{ translate('section') }}</th>
                        <th class="text-center">{{ translate('Options') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $i => $v)
                        <tr>
                            <td>{{$i+1}}</td>
                            <td>{{$v->name}}</td>
                            <td>{{$v->section}}</td>
                            <td class="text-center">
                                @can('edit_permission')
                                <a class="btn btn-soft-primary btn-icon btn-circle btn-sm"  href="{{ route('permission.edit',base64_encode($v->id))}}" title="{{ translate('Edit') }}">
                                    <i class="las la-pen"></i>
                                </a>
                                @endcan
                                @can('delete_permission')
                                    <a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href="{{route('permission.destroy', base64_encode($v->id))}}" title="{{ translate('Delete') }}">
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
@endsection

@section('modal')
    @include('modals.delete_modal')
@endsection


@section('script')
    <script type="text/javascript">
        function change_status(el) {
            var status = 0;
            if (el.checked) {
                var status = 1;
            }
            $.post('{{ route('blog.change-status') }}', {
                _token: '{{ csrf_token() }}',
                id: el.value,
                status: status
            }, function(data) {
                if (data == 1) {
                    AIZ.plugins.notify('success', '{{ translate('Change blog status successfully') }}');
                } else {
                    AIZ.plugins.notify('danger', '{{ translate('Something went wrong') }}');
                }
            });
        }
    </script>
@endsection
