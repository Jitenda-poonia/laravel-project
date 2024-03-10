@extends('layouts.admin')
@push('title')
    <title>Role Create</title>
@endpush

@section('content')
    <h1>Add Role</h1>
    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                    Role
                </div>
                <div class="panel-body">
                    <form role="form" action="{{ route('role.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Enter Role Name</label>
                            <input class="form-control" type="text" name="name" value="{{ old('name') }}">
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
                                    <input type="checkbox" name="permissions[]"
                                        value="{{ $permission->name }}">{{ $permission->name }}
                                </div>
                            @endforeach
                            <p class="help-block" style="color:red;">
                                @error('permission')
                                    {{ $message }}
                                @enderror
                            </p>
                        </div>
                        <button type="submit" class="btn btn-info">Submit </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $("#select_all").click(function() {
                $('.checkbox input[type="checkbox"]').prop("checked", true);
                $("#remove_all").prop("checked", false);
            });
            $("#remove_all").click(function() {
                $('.checkbox input[type="checkbox"]').prop("checked", false);
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
