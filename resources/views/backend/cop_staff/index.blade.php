@extends('backend.layouts.app')

@section('content')

<div class="aiz-titlebar text-left mt-2 mb-3">
	<div class="row align-items-center">
		<!-- <div class="col-md-6">
			<h1 class="h3">{{translate('All Staffs')}}</h1>
		</div> -->
        <!-- @can('add_staff')
            <div class="col-md-6 text-md-right">
                <a href="{{ route('staffs.create') }}" class="btn btn-circle btn-info">
                    <span>{{translate('Add New Staffs')}}</span>
                </a>
            </div>
        @endcan -->
	</div>
</div>

<div class="card">
    <div class="card-header">
        <h5 class="mb-0 h6">{{translate('Log Staffs')}}</h5>
    </div>
    <div class="card-body">
        <table id="example" class="table table-striped table-bordered dataTable no-footer">
            <thead>
                <tr>
                    <th data-breakpoints="lg" width="10%">#</th>
                    <th>{{translate('Name')}}</th>
                    <th>{{translate('Staff ID')}}</th>
                    <th data-breakpoints="lg">{{translate('Position')}}</th>
                    <th data-breakpoints="lg">{{translate('Start Time')}}</th>
                    <th data-breakpoints="lg">{{translate('End Time')}}</th>
                    <th data-breakpoints="lg">{{translate('Duration')}}</th>
                    <th data-breakpoints="lg">{{translate('Status')}}</th>
                    <!-- <th width="10%">{{translate('Options')}}</th> -->
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $i =>$v)
                <tr>
                    <td>{{$i+1}}</td>
                    <td>{{$v->name}}</td>
                    <td>{{$v->stuff_id}}</td>
                    <td>{{$v->position}}</td>
                    <td>{{$v->time}}</td>
                    <td>{{$v->endtime}}</td>
                    <td>{{duration($v->endtime,$v->time)}}</td>
                    <td>{{$v->status}}</td>

                </tr>
                @endforeach

            </tbody>
        </table>
        <div class="aiz-pagination">
            <!-- $staffs->appends(request()->input())->links()  -->
        </div>
    </div>
</div>

@endsection

@section('modal')
    @include('modals.delete_modal')
@endsection
