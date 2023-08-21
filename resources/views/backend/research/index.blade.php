@extends('backend.layouts.app')

@section('content')
    <div class="card">
        <form class="" id="sort_downloads" action="" method="GET">
            <div class="card-header row gutters-5">
                <div class="col text-center text-md-left">
                    <a href="{{route('research.create')}}" style="float:right;color:white" class="btn btn-primary btn-sm">Add Content</a>
                    <h5 class="mb-md-0 h6">{{ translate('Research & Development') }}</h5>
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
                            <th>Title Content</th>
                            <th>content</th>
                            <th>Video</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $i => $v)
                        <tr>
                            <td>{{ $i+1 }}</td>
                            <td><img style="width:100%" src="{{getimage($v->img)}}"></td>
                            <td>{{ $v->title }}</td>
                            <td>{!! $v->content !!}</td>
                            <td>

                            <a data-toggle="modal" data-target="#myModal{{$v->id}}"  style="color:white;font-weight:bold" class="btn btn-danger btn-sm @if($v->yt_link != null)  @else disabled @endif"><i class="las la-play"></i></a>
                            </td>
                            <td>
                                @can('edit_research')
                                    <a class="btn btn-soft-primary btn-icon btn-circle btn-sm"  href="{{ route('research.edit',base64_encode($v->id))}}" title="{{ translate('Edit') }}">
                                        <i class="las la-pen"></i>
                                    </a>
                                @endcan
                                @can('delete_research')
                                    <a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href="{{route('research.destroy', base64_encode($v->id))}}" title="{{ translate('Delete') }}">
                                        <i class="las la-trash"></i>
                                    </a>
                                @endcan
                            </td>
                        </tr>

                        <div id="myModal{{$v->id}}" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                              <!-- Modal content-->
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title">{{ $v->title }}</h4>

                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    {!! $v->yt_link !!}
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                              </div>

                            </div>
                          </div>
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
