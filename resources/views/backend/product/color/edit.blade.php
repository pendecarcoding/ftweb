@extends('backend.layouts.app')

@section('content')

<div class="aiz-titlebar text-left mt-2 mb-3">
    <h5 class="mb-0 h6">{{translate('Color Information')}}</h5>
</div>

<div class="col-lg-8 mx-auto">
    <div class="card">
        <div class="card-body p-0">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form class="p-4" action="{{ route('colors.update', $color->id) }}" method="POST">
                <input name="_method" type="hidden" value="POST">
                @csrf
                <div class="form-group mb-3">
                    <label  for="name">{{ translate('Picture') }}
                        <small>({{ translate('120x80') }})</small></label>
                    <div class="input-group" data-toggle="aizuploader" data-type="image">
                        <div class="input-group-prepend">
                            <div class="input-group-text bg-soft-secondary font-weight-medium">
                                {{ translate('Browse') }}</div>
                        </div>
                        <div class="form-control file-amount">{{ translate('Choose File') }}</div>
                        <input type="hidden" name="image" value="{{ $color->image }}" class="selected-files">
                    </div>
                    <div class="file-preview box sm">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-from-label" for="name">
                        {{ translate('Name')}}
                    </label>
                    <div class="col-sm-9">
                        <input type="text" placeholder="{{ translate('Name')}}" id="name" name="name" class="form-control" required value="{{ $color->name }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-from-label" for="code">
                        {{ translate('Color Code')}}
                    </label>
                    <div class="col-sm-9">
                        <input type="text" placeholder="{{ translate('Color Code')}}" id="code" name="code" class="form-control" required value="{{ $color->code }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-from-label" for="code">
                        {{ translate('Hex Color')}}
                    </label>
                    <div class="col-sm-9">
                        <input style="width:100px;height:100px" type="color" placeholder="{{ translate('Hex Color')}}" id="code" name="hex_color" class="form-control" required value="{{ $color->hex_color }}">
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label for="name">{{ translate('Extra Price') }}</label>
                    <input type="number" value="{{$color->extraprice}}" placeholder="{{ translate('Extra Price') }}" id="extraprice" name="extraprice"
                        class="form-control" value="{{ old('extraprice') }}" required>
                </div>
                <div class="form-group mb-0 text-right">
                    <button type="submit" class="btn btn-primary">{{translate('Save')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
