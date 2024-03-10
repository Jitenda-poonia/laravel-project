@extends('layouts.admin')
@push('title')
    <title>edit permission </title>
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-head-line">Edit Permission </h1>
            <h1 class="page-subhead-line">
                <a href="{{ route('dashboard') }}">Dashboard</a> >>
                @can('permission')
                    <a href="{{ route('permission.create') }}">Add permission</a> >>
                    <a href="{{ route('permission.index') }}">Permission list</a> >>Edit permission
                @endCan
            </h1>

        </div>
    </div>
    
    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                    Edit Permission 
                </div>
                <div class="panel-body">
                    <form role="form" action="{{ route('permission.update', $permission->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label> permission Name</label>
                            <input class="form-control" type="text" name="name" value="{{ $permission->name }}">
                            <p class="help-block" style="color:red;">
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </p>
                        </div>



                        <button type="submit" class="btn btn-info">Update</button>

                    </form>
                </div>
            </div>
        </div>
    @endsection
