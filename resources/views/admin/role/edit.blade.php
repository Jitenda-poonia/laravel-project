@extends('layouts.admin')
@push('title')
    <title>edit role</title>
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-head-line">Edit Role</h1>
            <h1 class="page-subhead-line">
                <a href="{{ route('dashboard') }}">Dashboard</a> >>
                @can('role')
                    <a href="{{ route('role.create') }}">Add Role</a> >>
                    <a href="{{ route('role.index') }}">Role list</a> >>Edit Role
                @endCan
            </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                    Edit Role 
                </div>
                <div class="panel-body">
                    <form role="form" action="{{ route('role.update', $role->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Role Name </label>
                            <input class="form-control" type="text" name="name" value="{{ $role->name }}">
                            <p class="help-block" style="color:red;">
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </p>
                        </div>
                        <div class="form-group">
                            <label>Permissions : -</label>
                            <div>
                                <label for="search">Search :</label>
                                <input type="search" name="search" id="search">
                            </div>
                            <label style="float: right">
                                <input type="radio" id="select_all">Select All
                                <input type="radio" id="remove_all">Remove All
                            </label>

                            @foreach ($permissions as $permission)
                                <div class="checkbox permission-item">
                                    <label></label>
                                    <input type="checkbox" name="permissions[]" value="{{ $permission->name }}"
                                        {{ in_array($permission->name, $perName) ? 'checked' : '' }}>{{ $permission->name }}
                                </div>
                            @endforeach
                            <p class="help-block" style="color:red;">
                                @error('permission')
                                    {{ $message }}
                                @enderror
                            </p>
                        </div>
                        <button type="submit" class="btn btn-info">Update</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#select_all').click(function() {
                $(".checkbox input[type = 'checkbox']").prop('checked', true);
                $("#remove_all").prop("checked", false);
            });
            $('#remove_all').click(function() {
                $(".checkbox input[type = 'checkbox']").prop('checked', false);
                $("#select_all").prop("checked", false);
            });
            $("#search").on("input", function() {
                var searchValue = $(this).val().toLowerCase();

                $(".permission-item").each(function() {
                    var permissionName = $(this).text().toLowerCase();

                    if (permissionName.includes(searchValue)) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            });
        });
    </script>
@endsection
