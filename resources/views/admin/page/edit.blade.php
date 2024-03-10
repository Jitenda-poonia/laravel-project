@extends('layouts.admin')
@push('title')
    <title>edit page</title>
@endpush
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-head-line">Edit Page</h1>
            <h1 class="page-subhead-line">
                <a href="{{ route('dashboard') }}">Dashboard</a> >>
                @can('page_create')
                    <a href="{{ route('page.create') }}">Add Page</a> >>
                @endCan
                @can('page_index')
                    <a href="{{ route('page.index') }}">page list</a> >>Edit page
                @endCan

            </h1>

        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-sm-6 col-xs-12">
            <div class="panel panel-info">
                <div class="panel-body">


                    <form action="{{ route('page.update', $page->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Parent Page</label>
                            <select name="parent_id" class="form-control">
                                <option value="" selected disabled>Select</option>
                                @foreach ($pages as $_page)
                                    <option value="{{ $_page->id }}" {{ $_page->title == $page->title ? 'selected' : '' }}>
                                        {{ $_page->title }}</option>
                                @endforeach

                            </select>

                        </div>
                        <div class="form-group">
                            <label>Enter Title</label>
                            <input class="form-control" name="title" type="text" value="{{ $page->title }}">
                            <p class="help-block" style="color:red;">
                                @error('title')
                                    {{ $message }}
                                @enderror
                            </p>
                        </div>
                        <div class="form-group">
                            <label>Enter Heading</label>
                            <input class="form-control" name="heading" type="text" value="{{ $page->heading }}">
                            <p class="help-block" style="color:red;">
                                @error('heading')
                                    {{ $message }}
                                @enderror
                            </p>
                        </div>
                        <div class="form-group">
                            <label>Enter Ordering</label>
                            <input class="form-control" name="ordering" type="number" value="{{ $page->ordering }}">
                            <p class="help-block" style="color:red;">
                                @error('ordering')
                                    {{ $message }}
                                @enderror
                            </p>
                        </div>


                        <div class="form-group">
                            <label>Status</label>
                            <select name="status" class="form-control">
                                <option value="" selected disabled>Select</option>
                                <option value="1" {{ $page->status == 1 ? 'selected' : '' }}>Enable</option>
                                <option value="2" {{ $page->status == 2 ? 'selected' : '' }}>Disable</option>
                            </select>
                            <p class="help-block" style="color:red;">
                                @error('status')
                                    {{ $message }}
                                @enderror
                            </p>
                        </div>
                        <div class="form-group">
                            <label>Enter url key </label>
                            <input class="form-control" name="url_key" type="text" value="{{ $page->url_key }}">
                            <p class="help-block" style="color:red;">
                                @error('url_key')
                                    {{ $message }}
                                @enderror
                            </p>
                        </div>
                        <div class="form-group">
                            <label>Enter description </label>
                            <textarea name="description" id="editor" cols="30" rows="10">{{ $page->description }}</textarea>
                            <p class="help-block" style="color:red;">
                                @error('description')
                                    {{ $message }}
                                @enderror
                            </p>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-body">

                                        <div class="form-group">
                                            <label class="control-label col-lg-4"><strong>Banner Image</strong></label>
                                            <div class="">
                                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                                    <span class="fileupload-preview"></span>
                                                    <a href="#" class="close fileupload-exists"
                                                        data-dismiss="fileupload" style="float: none">×</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-lg-4"></label>
                                            <div class="">
                                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                                    <div class="fileupload-preview thumbnail"
                                                        style="width: 200px; height: 150px;">
                                                        <img src="{{ $page->getFirstMediaUrl('image') }}" alt="">
                                                    </div>
                                                    <div>
                                                        <span class="btn btn-file btn-success">
                                                            <span class="fileupload-new">Select image</span>
                                                            <span class="fileupload-exists">Change</span>
                                                            <input type="file" name="image"
                                                                value="{{ $page->getFirstMediaUrl('image') }}">
                                                        </span>
                                                        <a href="#" class="btn btn-danger"
                                                            data-dismiss="fileupload">Remove</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                            <p class="help-block" style="color:red;">
                                @error('image')
                                    {{ $message }}
                                @enderror
                            </p>
                        </div>


                        <button class="btn btn-info">Save </button>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
