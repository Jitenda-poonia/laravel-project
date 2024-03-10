@extends('layouts.admin')
@push('title')
    <title>permission create</title>
@endpush

@section('content')
    <h1>Add permission</h1>
    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                    permission
                </div>
                <div class="panel-body">
                    <form role="form" action="{{ route('permission.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Enter permission Name</label>
                            <input class="form-control" type="text" name="name" value="{{ old('name') }}">
                            <p class="help-block" style="color:red;">
                                @error('name')
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
@endsection
