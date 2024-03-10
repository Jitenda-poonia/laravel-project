@extends('layouts.admin')
@push('title')
    <title>dashboard</title>
@endpush
@section('message')
    @if (session()->has('success'))
        <div class="alert alert-success" id="msg">
            {{ session()->get('success') }}
    @endif
@endsection

@section('content')
@endsection
