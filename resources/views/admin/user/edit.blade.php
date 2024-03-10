@extends('layouts.admin')
@push('title')
    <title>user edit</title>
@endpush

@section('content')
<div class="row">
    <div class="col-md-6">
        <h1>Edit user</h1>
        <h1 class="page-subhead-line">
            <a href="{{ route('dashboard') }}">Dashboard</a> >>
            @can('user_create')
                <a href="{{ route('user.create') }}">Add user</a> >>
            @endcan
            @can('user_index')
                <a href="{{ route('user.index') }}">User list</a> >>user Edit
            @endcan
        </h1>
    </div>
</div>
    
    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                  Update User 
                </div>
                <div class="panel-body">
                    <form role="form" action="{{ route('user.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Enter Name</label>
                            <input class="form-control" type="text" name="name" value="{{ $user->name }}">
                            <p class="help-block" style="color:red;">
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </p>
                        </div>
                        <div class="form-group">
                            <label>Enter Email</label>
                            <input class="form-control" type="email" name="email" value="{{ $user->email }}">
                            <p class="help-block" style="color:red;">
                                @error('email')
                                    {{ $message }}
                                @enderror
                            </p>
                        </div>

                        <div class="form-group">
                            <label>Enter Password</label>
                            <input class="form-control" type="password" name="password">
                            <p class="help-block" style="color:red;">
                                @error('password')
                                    {{ $message }}
                                @enderror
                            </p>
                        </div>
                        <div class="form-group">
                            <label>Re Enter Password </label>
                            <input class="form-control" type="password" name="confirm_password">
                            <p class="help-block" style="color:red;">
                                @error('confirm_password')
                                    {{ $message }}
                                @enderror
                            </p>
                        </div>
                        <div class="form-group">
                            <label>Roles </label>
                            @foreach ($roles as $role)
                                <div class="checkbox">
                                    <label></label>
                                    <input type="checkbox" name ="roles[]" value="{{ $role->name }}"
                                        {{ in_array($role->name, $roleName) ? 'checked' : '' }}>{{ $role->name }}
                                </div>
                            @endforeach
                            <p class="help-block" style="color:red;">
                                @error('role')
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
