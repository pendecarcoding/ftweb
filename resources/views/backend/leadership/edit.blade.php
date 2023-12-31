@extends('backend.layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6">{{ translate('Leadership') }}</h5>
                </div>
                <div class="card-body">
                    <form id="add_form" class="form-horizontal"
                        action="{{ route('leadership.update', base64_encode($data->id)) }}" method="POST">
                        @csrf
                        <input name="_method" type="hidden" value="PATCH">
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">
                                {{ translate('Name') }}
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-md-9">
                                <input value="{{ $data->name }}" type="text" placeholder="{{ translate('Name') }}"
                                    id="name" name="name" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">
                                {{ translate('Position') }}
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-md-9">
                                <input value="{{ $data->position }}" type="text"
                                    placeholder="{{ translate('Position') }}" id="position" name="position"
                                    class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">
                                {{ translate('Content') }}
                            </label>
                            <div class="col-md-9">
                                <textarea id="editor" name="content">{!! $data->content !!}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="signinSrEmail">
                                {{ translate('Foto') }}
                            </label>
                            <div class="col-md-9">
                                <div class="input-group" data-toggle="aizuploader" data-type="image">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-soft-secondary font-weight-medium">
                                            {{ translate('Browse') }}
                                        </div>
                                    </div>
                                    <div class="form-control file-amount">{{ translate('Choose File') }}</div>
                                    <input type="hidden" value="{{ $data->foto }}" name="foto"
                                        class="selected-files">
                                </div>
                                <div class="file-preview box sm">
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">
                                {{ translate('top') }}
                            </label>
                            <div class="col-md-9" style="display: flex;gap:10px">
                                <input @if($data->head=='Y') checked @endif style="width:15px;height:30px" type="radio" name="top" value="Y"> <span style="font-size: 20px;">Y</span>
                                <input @if($data->head=='N') checked @endif style="width:15px;height:30px" type="radio" name="top" value="N"> <span style="font-size: 20px;">N</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">
                                {{ translate('Short By') }}
                            </label>
                            <div class="col-md-9">
                                <input type="text" name="short" class="form-control" value="{{$data->short}}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">
                                {{ translate('Part') }}
                            </label>
                            <div class="col-md-9">
                                @php
                                    $part = explode(',',$data->part);
                                @endphp
                                <select name="part[]"  class="select2 form-control aiz-selectpicker"  data-toggle="select2" data-placeholder="Choose ..."  multiple>
                                    <option value="">--Select section--</option>
                                    <option value="BOD" @if(in_array('BOD', $part)) selected @endif>BOD</option>
                                    <option value="KEY" @if(in_array('KEY', $part)) selected @endif>KEY</option>
                                </select>
                                </select>
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
