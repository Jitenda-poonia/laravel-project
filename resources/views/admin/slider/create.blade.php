@extends('layouts.admin')
@push('title')
    <title>slider create</title>
@endpush
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-head-line">Add Slider</h1>
            <h1 class="page-subhead-line">
                <a href="{{ route('dashboard') }}">Dashboard</a>>>Add Slider
            </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="panel panel-info">

                <div class="panel-body">
                    <form role="form" action="{{ route('slider.store') }}" method="post" enctype='multipart/form-data'>
                        @csrf
                        <div class="form-group">
                            <label>Title</label>
                            <p class="help-block" style="color:red;">
                                @error('title')
                                    {{ $message }}
                                @enderror
                            </p>
                            <input class="form-control" type="text" name="title" value="{{ old('title') }}">

                        </div>
                        <div class="form-group">
                            <label>Ordering</label>
                            <p class="help-block" style="color:red;">
                                @error('ordering')
                                    {{ $message }}
                                @enderror
                            </p>
                            <input class="form-control" type="number" name="ordering" value="{{ old('ordering') }}">

                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <p class="help-block" style="color:red;">
                                @error('status')
                                    {{ $message }}
                                @enderror
                            </p>
                            <select class="form-control" name="status">
                                <option value="" selected disabled>Select</option>
                                <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Enable</option>
                                <option value="2" {{ old('status') == 2 ? 'selected' : '' }}>Disable</option>

                            </select>

                        </div>
                        <div class="form-group">
                            <label class="control-label col-lg-4">Image Upload</label>
                            <p class="help-block" style="color:red;">
                                @error('image')
                                    {{ $message }}
                                @enderror
                            </p>
                            <div class="">
                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                    <div class="fileupload-preview thumbnail" style="width: 120px; height: 150px;"></div>
                                    <div>
                                        <span class="btn btn-file btn-success"><span class="fileupload-new">Select
                                                image</span>
                                            <span class="fileupload-exists">Change</span>
                                            <input type="file" name="image" value='{{ old('image') }}'>
                                        </span>
                                        <a href="#" class="btn btn-danger fileupload-exists"
                                            data-dismiss="fileupload">Remove</a>
                                    </div>
                                </div>
                            </div>
                            <p class="help-block" style="color:red;">
                                @error('image')
                                @enderror
                            </p>
                        </div>

                        <button type="submit" class="btn btn-info">Save</button>

                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
