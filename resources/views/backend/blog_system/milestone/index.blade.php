@extends('backend.layouts.app')
@section('content')
    <div class="card">
        <form class="" id="sort_slider" action="" method="GET">
            <div class="card-header row gutters-5">
                <div class="col text-center text-md-left">
                    <h5 class="mb-md-0 h6">{{ translate('All Milestone') }}</h5>
                </div>
                <div class="col-md-2">
                    @can('add_policy')
                        <div class="col text-right">
                            <a href="{{ route('milestone.create') }}" class="btn btn-primary">
                                <span>{{ translate('Add Milestone') }}</span>
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
                            <th width="50px">#</th>
                            <th width="150px">{{ translate('Image') }}</th>
                            <th width="50px">{{ translate('Year') }}</th>
                            <th>{{ translate('Content') }}</th>
                            <th class="text-right">{{ translate('Options') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($policy as $i =>$v)
                            <tr>
                                <td>{{$i+1}}</td>
                                <td><img style="height: 200px;object-fit: contain;" src="{{getimage($v->img)}}"></td>
                                <td>
                                     {{$v->year}}
                                </td>
                                <td>{!! $v->content !!}</td>
                                <td class="text-right">
                                @can('edit_milestone')
                                    <a class="btn btn-soft-primary btn-icon btn-circle btn-sm"
                                        href="{{ route('milestone.edit', base64_encode($v->id)) }}" title="{{ translate('Edit') }}">
                                        <i class="las la-pen"></i>
                                    </a>
                                @endcan
                                @can('delete_milestone')
                                    <a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete"
                                        data-href="{{ route('milestone.destroy', base64_encode($v->id)) }}" title="{{ translate('Delete') }}">
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
