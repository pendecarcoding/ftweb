@extends('backend.layouts.app')

@section('content')


<div class="card">
    <form class="" id="sort_patners" action="" method="GET">
        <div class="card-header row gutters-5">
            <div class="col text-center text-md-left">
                <h5 class="mb-md-0 h6">{{ translate('Company') }}</h5>
            </div>

            <div class="col-md-2">
                @can('add_company')
                <div class="col text-right">
                    <a href="{{ route('company.create') }}" class="btn btn-circle btn-info">
                        <span>{{translate('Add Company')}}</span>
                    </a>
                </div>
            @endcan
            </div>
        </div>
        </form>
        <div class="card-body">
            <table class="table mb-0 aiz-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>{{translate('Image')}}</th>
                        <th data-breakpoints="lg">{{translate('Name')}}</th>
                        <th data-breakpoints="lg">{{translate('content')}}</th>
                        <th class="text-right">{{translate('Options')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $i => $v)
                    <tr>
                        <td>{{ $i+1 }}</td>
                        <td><img style="width:100%" src="{{getimage($v->foto)}}"></td>
                        <td>{{ $v->name }}</td>
                        <td>{!! $v->content !!}</td>
                        <td>
                            @can('edit_company')
                                <a class="btn btn-soft-primary btn-icon btn-circle btn-sm"  href="{{ route('company.edit',base64_encode($v->id))}}" title="{{ translate('Edit') }}">
                                    <i class="las la-pen"></i>
                                </a>
                            @endcan
                            @can('delete_company')
                                <a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href="{{route('company.destroy', base64_encode($v->id))}}" title="{{ translate('Delete') }}">
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

@endsection

@section('modal')
    @include('modals.delete_modal')
@endsection


@section('script')

    <script type="text/javascript">
        function change_status(el){
            var status = 0;
            if(el.checked){
                var status = 1;
            }
            $.post('{{ route('blog.change-status') }}', {_token:'{{ csrf_token() }}', id:el.value, status:status}, function(data){
                if(data == 1){
                    AIZ.plugins.notify('success', '{{ translate('Change blog status successfully') }}');
                }
                else{
                    AIZ.plugins.notify('danger', '{{ translate('Something went wrong') }}');
                }
            });
        }
    </script>

@endsection
