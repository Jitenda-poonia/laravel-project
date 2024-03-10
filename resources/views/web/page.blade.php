@extends('layouts.website')
@section('title')
    <title> {{($page->title)}} |  SafeCam</title>
@endsection
 
@section('content')
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row gx-5">
                <div class="col-lg-5 mb-5 mb-lg-0" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-90 rounded wow zoomIn" data-wow-delay="0.3s"
                            src="{{ $page->getFirstMediaUrl('image', 'thumb') }}" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="mb-4">
                        <h5 class="text-primary text-uppercase" style="letter-spacing: 5px;"> {{ $page->title }}</h5>
                        <h1 class="display-5 mb-0"> {{ $page->heading }} </h1>
                    </div>

                    <p class="mb-4">{!! $page->description !!}</p>

                </div>
            </div>
        </div>
</div @endsection
