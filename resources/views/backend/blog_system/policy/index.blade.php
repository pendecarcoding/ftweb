@extends('backend.layouts.app')
@section('content')
    <div class="card">
        <form class="" id="sort_slider" action="" method="GET">
            <div class="card-header row gutters-5">
                <div class="col text-center text-md-left">
                    <h5 class="mb-md-0 h6">{{ translate('All Policy') }}</h5>
                </div>
                <div class="col-md-2">
                    @can('add_policy')
                        <div class="col text-right">
                            <a href="{{ route('data-policy.create') }}" class="btn btn-primary">
                                <span>{{ translate('Add Policy') }}</span>
                            </a>
                        </div>
                    @endcan
                </div>
            </div>
        </form>
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table   dataTable no-footer">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th data-breakpoints="md">{{ translate('Name Policy') }}</th>
                            <th data-breakpoints="lg">{{ translate('Icon') }}</th>
                            <th data-breakpoints="lg">{{ translate('PDF') }}</th>
                            <th class="text-right">{{ translate('Options') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($policy as $i =>$v)
                            <tr>
                                <td>{{$i+1}}</td>
                                <td data-breakpoints="lg">
                                     {{$v->name}}
                                </td>
                                <td data-breakpoints="lg"><img style="width:100%;height: 50px;" src="{{getimage($v->icon)}}"></td>
                                <td data-breakpoints="lg">{{getpdf($v->pdf)}}</td>
                                <td> @can('edit_policy')
                                    <a class="btn btn-soft-primary btn-icon btn-circle btn-sm"
                                        href="{{ route('data-policy.edit', $v->id) }}" title="{{ translate('Edit') }}">
                                        <i class="las la-pen"></i>
                                    </a>
                                @endcan
                                @can('delete_policy')
                                    <a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete"
                                        data-href="{{ route('data-policy.destroy', $v->id) }}" title="{{ translate('Delete') }}">
                                        <i class="las la-trash"></i>
                                    </a>
                                @endcan
                            </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="aiz-pagination">

            </div>
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
