@extends('backend.layouts.app')
@section('content')
    <div class="card">
        <form class="" id="sort_downloads" action="" method="GET">
            <div class="card-header row gutters-5">
                <div class="col text-center text-md-left">
                    @can('add_contact')<a href="{{ route('contact.create') }}" style="float:right;color:white" class="btn btn-primary btn-sm">Add
                        Content</a>@endcan
                    <h5 class="mb-md-0 h6">{{ translate('Contact') }}</h5>
                </div>
            </div>
        </form>
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Name Company</th>
                            <th>content</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $i => $v)
                            <tr>
                                <td>{{ $i + 1 }}</td>
                                <td><img style="width:100%" src="{{ getimage($v->img) }}"></td>
                                <td>{{ $v->title }}</td>
                                <td>{!! $v->content !!}</td>
                                <td>
                                    @can('edit_contact')
                                        <a class="btn btn-soft-primary btn-icon btn-circle btn-sm"
                                            href="{{ route('contact.edit', base64_encode($v->id)) }}"
                                            title="{{ translate('Edit') }}">
                                            <i class="las la-pen"></i>
                                        </a>
                                    @endcan
                                    @can('delete_contact')
                                        <a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete"
                                            data-href="{{ route('contact.destroy', base64_encode($v->id)) }}"
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
@endsection
@section('modal')
    @include('modals.delete_modal')
@endsection
