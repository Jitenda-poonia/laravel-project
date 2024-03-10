@extends('layouts.admin')
@push('title')
    <title>role list</title>
@endpush
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-head-line">Role List</h1>
            <h1 class="page-subhead-line">
                <a href="{{ route('dashboard') }}">Dashboard</a>>>
                @can('role')
                    <a href="{{ route('role.create') }}">Add role</a>>>Role list
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
                        {{-- message end --}}
                        <table class="table table-striped table-bordered table-hover display" id="myTable">
                            <thead>
                                <tr>
                                    <th>Sr.No</th>
                                    <th>Name</th>
                                    <th>Permission</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($roles as $role)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $role->name }}</td>


                                        <td>{{ implode(' , ' ,  $role->permissions->pluck('name')->toArray()) }}</td>

                                        <td>
                                            @can('role')
                                                <a href="{{ route('role.edit', $role->id) }}" class="btn btn-primary"><i
                                                        class="glyphicon glyphicon-edit"></i>Edit</a>
                                            @endcan
                                            @can('role')
                                                <form action="{{ route('role.destroy', $role->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger"><i
                                                            class="glyphicon glyphicon-trash"></i>Delete</button>
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
