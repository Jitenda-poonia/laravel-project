@extends('layouts.admin')
@push('title')
    <title>slider edit</title>
@endpush
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-head-line">Edit Slider</h1>
            <h1 class="page-subhead-line">
                <a href="{{ route('dashboard') }}">Dashboard</a> >>
                @can('slider_create')
                    <a href="{{ route('slider.create') }}">Add Slider</a> >>
                @endCan
                @can('slider_index')
                    <a href="{{ route('slider.index') }}">Slider list</a> >>Edit Slider
                @endCan

            </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="panel panel-info">

                <div class="panel-body">
                    <form role="form" action="{{ route('slider.update', $slider->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Title</label>
                            <p class="help-block" style="color:red;">
                                @error('title')
                                    {{ $message }}
                                @enderror
                            </p>
                            <input class="form-control" type="text" name="title" value="{{ $slider->title }}">

                        </div>
                        <div class="form-group">
                            <label>Ordering</label>
                            <p class="help-block" style="color:red;">
                                @error('ordering')
                                    {{ $message }}
                                @enderror
                            </p>
                            <input class="form-control" type="number" name="ordering" value="{{ $slider->ordering }}">

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
                                <option value="1"{{ $slider->status == 1 ? 'selected' : '' }}>Enable</option>
                                <option value="2"{{ $slider->status == 2 ? 'selected' : '' }}>Disable</option>

                            </select>

                        </div>
                        <div class="form-group">
                            <label class="control-label col-lg-4">Image Upload</label>
                            <p class="help-block" style="color:red;">

                            <div class="">
                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                    <div class="fileupload-preview thumbnail" style="width: 120px; height: 150px;">
                                        <img src="{{ $slider->getFirstMediaUrl('image') }}" alt="">
                                    </div>
                                    <div>
                                        <span class="btn btn-file btn-success"><span class="fileupload-new">Select
                                                image</span>
                                            <span class="fileupload-exists">Change</span>
                                            <input type="file" name="image"
                                                value='{{ $slider->getFirstMediaUrl('image') }}'>
                                        </span>
                                        {{-- <a href="" class="btn btn-danger" data-dismiss="fileupload">Remove</a> --}}
                                        <input type="checkbox" name="remove" id="">Remove

                                    </div>
                                </div>
                            </div>
                            <p class="help-block" style="color:red;">
                                @error('image')
                                    {{ $message }}
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
