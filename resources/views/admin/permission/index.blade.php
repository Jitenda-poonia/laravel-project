@extends('layouts.admin')
@push('title')
    <title>permission list</title>
@endpush
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-head-line">permission List</h1>
            <h1 class="page-subhead-line">
                <a href="{{ route('dashboard') }}">Dashboard</a>>>
                @can('permission')
                    <a href="{{ route('permission.create') }}">Add permission</a>>>permission list
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
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($permissions as $_permission)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $_permission->name }}</td>
                                        <td>
                                            @can('permission')
                                                <a href="{{ route('permission.edit', $_permission->id) }}"
                                                    class="btn btn-primary"><i class="glyphicon glyphicon-edit"></i>Edit</a>
                                            @endcan
                                            @can('permission')
                                                <form action="{{ route('permission.destroy', $_permission->id) }}"
                                                    method="POST">
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
                        {{-- <div>Total Role : {{$permissions->total()}}</div>
                        {{$$permissions->links()}}  --}}

                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
