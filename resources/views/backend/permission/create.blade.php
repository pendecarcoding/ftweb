@extends('backend.layouts.app')
@section('content')
    <div class="card">
            <div class="card-header row gutters-5">
                <div class="col text-center text-md-left">
                    <h5 class="mb-md-0 h6">{{ translate('Permission') }}</h5>
                </div>

                    <div class="col text-right">
                        <a href="{{ route('permission.index') }}" class="btn btn-danger btn-sm">
                            <span><i class="las la-times"></i></span>
                        </a>
                    </div>
            </div>

        <form id="add_form" class="form-horizontal" action="{{ route('permission.store') }}" method="POST">@csrf
        <div class="card-body">
            <div class="container">
                <div class="form-group row">
                        <label class="col-md-3 col-form-label">
                            {{translate('Name Permission')}}
                            <span class="text-danger">*</span>
                        </label>
                        <div class="col-md-9">
                            <input type="text" placeholder="{{translate('Name Permission')}}" name="name_permission" class="form-control" required>
                        </div>
                </div>
                <div class="form-group row">
                        <label class="col-md-3 col-form-label">
                            {{translate('Section')}}
                            <span class="text-danger">*</span>
                        </label>
                        <div class="col-md-9">
                            <input type="text" placeholder="{{translate('Section')}}" name="section" class="form-control" required>
                        </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
                <div class="row">
                    <button class="btn btn-sm btn-warning" type="reset">{{translate('Reset')}}</button>
                    <button class="btn btn-sm btn-primary" type="submit">{{translate('Save')}}</button>
                </div>
        </div>
        </form>

    </div>
@endsection
