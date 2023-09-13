@extends('backend.layouts.app')
@section('content')
    <br>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header row gutters-5">
                <div class="col text-center text-md-left">
                    <h5 class="mb-md-0 h6">{{ translate('Piping Design') }}</h5>
                </div>
            </div>
            <form action="{{ route('pipingsys.update', $data->id) }}" method="post">@csrf
                <input name="_method" type="hidden" value="PATCH">
                <div class="card-body">
                    <div style="display: flex;gap:15px;flex-direction: row;">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Name Product</label>
                                <input type="text" class="form-control" value="{{ $data->name_piping }}" name="name"
                                    required placeholder="Example : A012-Nappa Leather">
                                <p>it's like name of product for Piping Design</p>
                            </div>
                            <div class="form-group">
                                <label for="">Colors</label>
                                <select name="color1[]" class="select2 form-control aiz-selectpicker" data-toggle="select2"
                                    data-placeholder="Choose ..."data-live-search="true" multiple>
                                    <option value="">--Select Color--</option>
                                    @foreach ($color as $i => $vc)
                                        <option value="{{ $vc->code }}"
                                            @if (in_array($vc->code, explode(',', $data->colors))) selected @endif>{{ $vc->name }}</option>
                                    @endforeach
                                </select>
                                <p>choose any color for the upper consumer color choice</p>
                            </div>

                        </div>
                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="">Image Product</label>
                                <div class="input-group" data-toggle="aizuploader" data-type="image">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-soft-secondary font-weight-medium">
                                            {{ translate('Browse') }}
                                        </div>
                                    </div>
                                    <div class="form-control file-amount">{{ translate('Choose File') }}</div>
                                    <input type="hidden" name="img" value="{{ $data->img }}" class="selected-files">
                                </div>
                                <div class="file-preview box sm">
                                </div>
                            </div>

                            <hr>
                            <div class="form-group">
                                <label for="">Basic Color image</label>
                                <p>For maximum results, use a white base color</p>
                                <div class="input-group" data-toggle="aizuploader" data-type="image" data-multiple="true">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse')}}</div>
                                    </div>
                                    <div class="form-control file-amount">{{ translate('Choose File') }}</div>
                                    <input type="hidden" name="base_img" class="selected-files" value="{{$data->base_img}}">
                                </div>
                                <div class="file-preview box sm">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="">dynamic color image</label>
                                <p>Dynamic color images must be images that have been edited for the object whose color will
                                    be changed in PNG format</p>
                                    <div class="input-group" data-toggle="aizuploader" data-type="image" data-multiple="true">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse')}}</div>
                                        </div>
                                        <div class="form-control file-amount">{{ translate('Choose File') }}</div>
                                        <input type="hidden" name="color_img1" class="selected-files" value="{{$data->color_img}}">
                                    </div>
                                <div class="file-preview box sm">
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="">Price</label>
                                <input type="number" value="{{ $data->price }}" class="form-control" name="price">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>

    </div>
@endsection
