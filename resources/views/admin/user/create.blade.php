@extends('layouts.admin')
@push('title')
    <title>user create</title>
@endpush
{{-- @section('style')
<style>
    h1{
        background-color: rgb(168, 150, 13)
    }
</style>
@endsection --}}
@section('content')
    <span style="color: green">{{ session()->get('success') }}</span>
    <h1>Add user</h1>
    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                    User FORM
                </div>
                <div class="panel-body">
                    <form role="form" action="{{ route('user.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Enter Name</label>
                            <input class="form-control" type="text" name="name" value="{{ old('name') }}">
                            <p class="help-block" style="color:red;">
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </p>
                        </div>
                        <div class="form-group">
                            <label>Enter Email</label>
                            <input class="form-control" type="text" name="email" value="{{ old('email') }}">
                            <p class="help-block" style="color:red;">
                                @error('email')
                                    {{ $message }}
                                @enderror
                            </p>
                        </div>

                        <div class="form-group">
                            <label>Enter Password</label>
                            <input class="form-control" type="password" name="password" value="{{ old('password') }}">
                            <p class="help-block" style="color:red;">
                                @error('password')
                                    {{ $message }}
                                @enderror
                            </p>
                        </div>
                        <div class="form-group">
                            <label>Re enter Password </label>
                            <input class="form-control" type="password" name ="confirm_password"
                                value="{{ old('password') }}">
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
                                    <input type="checkbox" name ="roles[]" value="{{ $role->name }}">{{ $role->name }}
                                </div>
                            @endforeach
                            <p class="help-block" style="color:red;">
                                @error('roles')
                                    {{ $message }}
                                @enderror
                            </p>
                        </div>
                        <button type="submit" class="btn btn-info">Submit </button>

                    </form>
                </div>
            </div>
        </div>
    @endsection
