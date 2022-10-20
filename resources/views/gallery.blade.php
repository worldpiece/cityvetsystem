@extends('layouts.app')
@section('content')
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                @if ($images->count())
                    @foreach ($images as $image)
                        <div class="carousel-item">
                            <img src="/images/{{ $image->image }}" class="d-block w-100" alt="...">
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
@endsection
