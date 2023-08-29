@extends('backend.layouts.app')
@section('content')
    <div class="card">
        <form class="" id="sort_slider" action="" method="GET">
            <div class="card-header row gutters-5">
                <div class="col text-center text-md-left">
                    <h5 class="mb-md-0 h6">{{ translate('All Banner') }}</h5>
                </div>
                <div class="col-md-2">
                    @can('add_banner')
                        <div class="col text-right">
                            <a href="{{ route('banner.create') }}" class="btn btn-primary">
                                <span>{{ translate('Add Banner') }}</span>
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
                            <th data-breakpoints="md">{{ translate('Image Banner') }}</th>
                            <th data-breakpoints="lg">{{ translate('Page') }}</th>
                            <th data-breakpoints="lg">{{ translate('Url link') }}</th>
                            <th class="text-right">{{ translate('Options') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($banner as $i =>$v)
                            <tr>
                                <td>{{$i+1}}</td>
                                <td data-breakpoints="lg">
                                    @php
                                        $img = explode(',',$v->image);
                                    @endphp
                                    <div style="display: flex;flex-direction: row;gap:2px">
                                        @foreach($img as $image)

                                        <img style="width:100%;height:50px" src="{{getimage($image)}}" alt="">
                                    @endforeach
                                    </div>

                                </td>
                                <td data-breakpoints="lg">{{$v->name_page}}</td>
                                <td data-breakpoints="lg">{{$v->page_link}}</td>
                                <td> @can('edit_banner')
                                    <a class="btn btn-soft-primary btn-icon btn-circle btn-sm"
                                        href="{{ route('banner.edit', $v->id) }}" title="{{ translate('Edit') }}">
                                        <i class="las la-pen"></i>
                                    </a>
                                @endcan
                                @can('delete_banner')
                                    <a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete"
                                        data-href="{{ route('banner.destroy', $v->id) }}" title="{{ translate('Delete') }}">
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
