@extends('layouts.admin')
@push('title')
    <title>edit blog</title>
@endpush
@section('content')
<div class="row">
    <div class="col-md-12">
        <h1 class="page-head-line">Edit Blog</h1>
        <h1 class="page-subhead-line">
            <a href="{{ route('dashboard') }}">Dashboard</a> >>
            @can('blog_create')
                <a href="{{ route('blog.create') }}">Add Blog</a> >>
            @endCan
            @can('blog_index')
                <a href="{{ route('blog.index') }}">Blog list</a> >>Edit Blog
            @endCan

        </h1>

    </div>
</div>

    <div class="row">
        <div class="col-md-12 col-sm-6 col-xs-12">
            <div class="panel panel-info">
                <div class="panel-body">
                   

                    <form action="{{route('blog.update',$blog->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Enter Title</label>
                            <input class="form-control" name="title" type="text" value="{{$blog->title}}">
                            <p class="help-block" style="color:red;">
                                @error('title')
                                    {{$message}}
                                @enderror
                            </p>
                        </div>
                        <div class="form-group">
                            <label>Enter Heading</label>
                            <input class="form-control" name="heading" type="text" value="{{$blog->heading}}">
                            <p class="help-block" style="color:red;">
                                @error('heading')
                                    {{$message}}
                                @enderror
                            </p>
                        </div>
                        <div class="form-group">
                            <label>Enter Ordering</label>
                            <input class="form-control" name="ordering" type="number" value="{{$blog->ordering}}">
                            <p class="help-block" style="color:red;">
                                @error('odering')
                                    {{$message}}
                                @enderror
                            </p>
                        </div>


                        <div class="form-group">
                            <label>Status</label>
                            <select name="status" class="form-control">
                                <option value="" selected disabled>Select</option>
                                <option value="1" {{($blog->status==1)?'selected':''}}>Enable</option>
                                <option value="2" {{($blog->status==2)?'selected':''}}>Disable</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Identifier</label>
                            <input class="form-control" name="identifier" type="text" value="{{$blog->identifier}}">
                            <p class="help-block" style="color:red;">
                                @error('identifier')
                                    {{$message}}
                                @enderror
                            </p>
                        </div>
                        <div class="form-group">
                            <label>Enter description </label>
                            <textarea name="description" id="editor" cols="30" rows="10">{{$blog->description}}</textarea>
                            <p class="help-block" style="color:red;">
                                @error('description')
                                    {{$message}}
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
                                                    <img src="{{$blog->getFirstMediaUrl('image')}}" alt="">
                                                    
                                                    </div>
                                                    <div>
                                                        <span class="btn btn-file btn-success">
                                                            <span class="fileupload-new">Select image</span>
                                                            <span class="fileupload-exists">Change</span>
                                                            <input name="image" type="file" value="{{$blog->getFirstMediaUrl('image')}}">
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
                                    {{$message}}
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

