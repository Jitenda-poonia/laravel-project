@extends('layouts.admin')
@push('title')
    <title>slider index</title>
@endpush
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-head-line">Slider List</h1>
            <h1 class="page-subhead-line">
                <a href="{{ route('dashboard') }}">Dashboard</a> >>
                @can('slider_create')
                    <a href="{{ route('slider.create') }}">Add Slider</a> >>slider list
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
                                    <th>Title</th>
                                    <th>Odering</th>
                                    <th>Status</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($sliders as $key => $slider)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $slider->title }}</td>
                                        <td>{{ $slider->ordering }}</td>
                                        <td>{{ $slider->status == 1 ? 'Enable' : 'Disable' }}</td>
                                        <td>
                                            <img src="{{ $slider->getFirstMediaUrl('image', 'thumb') }}" / width="120px">

                                        </td>

                                        <td>
                                            @can('slider_edit')
                                                <a href="{{ route('slider.edit', $slider->id) }}" class="btn btn-primary"><i
                                                        class="glyphicon glyphicon-edit"></i>Edit</a>
                                            @endcan
                                            @can('slider_delete')
                                                <form action="{{ route('slider.destroy', $slider->id) }}" method="POST">
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
