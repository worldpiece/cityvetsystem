@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-12">
            <h2 class="mb-3 text-primary text-center">Image Gallery</h2>
        </div>
    </div>
    <div class="row">
        <div class="row row-cols-1 row-cols-md-2 g-4">
            @if ($images->count())
                @foreach ($images as $image)
                    <div class="col">
                        <div class="card">
                            <img src="/images/{{ $image->image }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h4 class="card-title text-center fw-bold">{{ $image->title }}</h4>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
 @endsection
