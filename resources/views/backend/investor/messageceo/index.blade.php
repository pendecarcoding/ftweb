@extends('backend.layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 mx-auto">
            <div class="card">
                <div class="card-header">

                    <h5 class="mb-0 h6">{{ translate('Message From CEO') }}</h5>

                </div>
                <div class="card-body">
                    <form id="add_form" class="form-horizontal"
                        action="{{ route('messagefromceo.update', base64_encode($data->id)) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">
                                {{ translate('Title') }}
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-md-9">
                                <input type="text" placeholder="{{ translate('Title Announcements') }}"
                                    value="{{ $data->title }}" id="title" name="title" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">
                                {{ translate('Name') }}
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-md-9">
                                <input type="text" placeholder="{{ translate('Name CEO') }}" value="{{ $data->name }}"
                                    id="title" name="name" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">
                                {{ translate('Position') }}
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-md-9">
                                <input type="text" placeholder="{{ translate('Position') }}"
                                    value="{{ $data->position }}" id="title" name="position" class="form-control"
                                    required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="signinSrEmail">
                                {{ translate('Photo CEO') }}

                            </label>
                            <div class="col-md-9">
                                <div class="input-group" data-toggle="aizuploader" data-type="image">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-soft-secondary font-weight-medium">
                                            {{ translate('Browse') }}
                                        </div>
                                    </div>
                                    <div class="form-control file-amount">{{ translate('Choose File') }}</div>
                                    <input type="hidden" name="banner" class="selected-files"
                                        value="{{ $data->image }}">
                                </div>
                                <div class="file-preview box sm">
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">
                                {{ translate('Content') }}
                            </label>
                            <div class="col-md-9">
                                <textarea id="editor" name="content">{{ $data->content }}</textarea>
                            </div>
                        </div>




                        <div class="form-group mb-0 text-right">
                            <button type="submit" class="btn btn-primary">
                                {{ translate('Save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function makeSlug(val) {
            let str = val;
            let output = str.replace(/\s+/g, '-').toLowerCase();
            $('#slug').val(output);
        }
    </script>
@endsection
