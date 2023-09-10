@extends('backend.layouts.app')
@section('content')
    <form action="{{ route('custom-pages.update',$page->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input name="_method" type="hidden" value="PATCH">
        <div class="row">
            <div class="col-md-8">
                <div class="form-group row">
                    <div class="col-sm-12">
                        <input type="text" value="{{$page->title}}" class="form-control" placeholder="{{ translate('Add Title') }}" name="title"
                            required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <textarea id="editor" name="content">{!! $page->content !!}</textarea>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h6>Publish</h6>
                    </div>
                    <div class="card-fotter">
                        <div style="display: flex;">
                            <button type="submit" name="publish" value="Y" class="btn btn-primary btn-sm">Save And
                                Publish</button>
                            <button type="submit" name="publish" value="N" class="btn btn-primary btn-sm">Save
                                Draft</button>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h6>Page Atributes</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="name">{{ translate('Template') }} <span class="text-danger">*</span></label>
                            <div class="col-sm-12">
                                <select name="template" id="" class="form-control" required>
                                    <option value="single_sidebar" @if($page->type=='single_sidebar') selected @endif>Single Sidebar</option>
                                    <option value="custom" @if($page->type=='custom') selected @endif>Custom Template</option>
                                </select>
                            </div>
                        </div>
                        @php

                        $slug = explode('/',$page->slug);

                        @endphp
                        <div class="form-group row">
                            <label for="name">{{ translate('Link') }} <span class="text-danger">*</span></label>
                            <div class="col-sm-12">
                                <div class="input-group d-block d-md-flex">
                                    <div class="input-group-prepend "><span
                                            class="input-group-text flex-grow-1">{{ route('home') }}</span></div>
                                    <input type="text" class="form-control w-100 w-md-auto" value="{{$slug[1]}}"
                                        placeholder="{{ translate('Slug') }}" name="slug" required>
                                </div>
                                <small
                                    class="form-text text-muted">{{ translate('Use character, number, hypen only') }}</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h6>Image</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="input-group" data-toggle="aizuploader" data-type="image">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-soft-secondary font-weight-medium">
                                        {{ translate('Browse') }}
                                    </div>
                                </div>
                                <div class="form-control file-amount">{{ translate('Choose File') }}</div>
                                <input type="hidden" name="image" value="{{$page->image}}" class="selected-files">
                            </div>
                            <div class="file-preview box sm">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
