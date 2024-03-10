@extends('layouts.admin')
@push('title')
    <title>blog list</title>
@endpush
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-head-line">Blog List</h1>
            <h1 class="page-subhead-line">
                <a href="{{ route('dashboard') }}">Dashboard</a>>>
                @can('blog_create')
                    <a href="{{ route('blog.create') }}">Add blog</a>>>Blog list
                @endcan
            </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="table-responsive">
                        @if (session()->has('success'))
                            <div class="alert alert-success" id="msg">
                                {{ session()->get('success') }}
                            </div>
                        @endif
                        <table class="table table-striped table-bordered table-hover display" id="myTable">
                            <thead>
                                <tr>
                                    <th>Sr.No</th>
                                    <th>Title</th>
                                    <th>Heading</th>
                                    <th>Ordering</th>
                                    <th>satuts</th>
                                    <th>Image</th>
                                    <th>Identifier</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($blogs as $key => $blog)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $blog->title }}</td>
                                        <td>{{ $blog->heading }}</td>
                                        <td>{{ $blog->ordering }}</td>
                                        <td>{{ $blog->status == 1 ? 'enable' : 'disable' }}</td>
                                        <td>
                                            <img src="{{ $blog->getFirstMediaUrl('image', 'thumb') }}" / width="120px">
                                        </td>
                                        <td>{{ $blog->identifier }}</td>

                                        <td>
                                            @can('blog_edit')
                                                <a href="{{ route('blog.edit', $blog->id) }}" class="btn btn-primary"><i
                                                        class="glyphicon glyphicon-edit"></i>Edit</a>
                                            @endcan
                                            @can('blog_delete')
                                                <form action="{{ route('blog.destroy', $blog->id) }}" method="POST">
                                                    <button class="btn btn-danger"><i
                                                            class="glyphicon glyphicon-trash"></i>Delete</button>
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            @endcan

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
