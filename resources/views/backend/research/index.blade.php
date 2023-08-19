@extends('backend.layouts.app')

@section('content')
    <div class="card">
        <form class="" id="sort_downloads" action="" method="GET">
            <div class="card-header row gutters-5">
                <div class="col text-center text-md-left">
                    <a style="float:right;color:white" class="btn btn-primary btn-sm">Edit Content</a>

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
                    <tbody>
                </table>
            </div>


        </div>
    </div>
@endsection
