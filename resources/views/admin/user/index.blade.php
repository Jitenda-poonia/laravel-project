@extends('layouts.admin')
@push('title')
    <title>user list</title>
@endpush
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-head-line">User List</h1>
            <h1 class="page-subhead-line">
                <a href="{{ route('dashboard') }}">Dashboard</a> >>
                @can('user_create')
                    <a href="{{ route('user.create') }}">Add user</a> >>user list
                @endcan
            </h1>
        </div>
    </div>

    <div class="row">

        <div class="col-md-12">

            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="table-responsive">
                        {{-- message show --}}
                        @if (session()->has('success'))
                            {{-- //message unset --}}
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
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($users as $key => $user)
                                    <tr>
                                        <td>{{ ++$key.'.' }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ implode(',', $user->Roles->pluck('name')->toArray()) }}<br></td>
                                        <td>
                                            @can('user_edit')
                                                <a href="{{ route('user.edit', $user->id) }}" class="btn btn-primary"><i
                                                        class="glyphicon glyphicon-edit"></i>Edit</a>
                                            @endcan
                                            @can('user_delete')
                                                <form action="{{ route('user.destroy', $user->id) }}" method="POST">
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
                        <div>Total User : {{ $users->total() }}</div>
                        {{ $users->links() }}
                        {{-- appserviceprovider file me pagination::bootstrapfive ka use kiya gya h --}}
                        {{-- ya --}}
                        {{-- {{$users->links('pagination::bootstrap-5')}} --}}
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
