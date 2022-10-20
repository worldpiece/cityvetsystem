@extends('layouts.app')
@section('title')
    CVS | Gallery
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="gallery-container">
                <h3 style="color: rgb(31, 29, 27)">Image Gallery</h3>
                <br>

                <form action="{{ url('admin/gallery') }}" class="form-image-upload" method="POST"
                    enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <strong>Title:</strong>
                            <input type="text" name="title" class="form-control" placeholder="Title">
                        </div>
                        <div class="col-md-4">
                            <strong>Image:</strong>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <div class="col-md-2">
                            <br />
                            <button type="submit" class="btn btn-success">Upload</button>
                        </div>
                    </div>
                </form>
                <div class="row">
                    @if ($images->count())
                        @foreach ($images as $image)
                            <div class="col-md-4 mt-3 col-lg-3">
                                <img src="/images/{{ $image->image }}" class="img-fluid" alt="image"
                                    style="height: 300px; width:300px;">
                                <div>
                                    <strong><p>{{ $image->title }}</p></strong>
                                </div> <!-- text-center / end -->
                                <div>
                                    <form action="{{ url('admin/gallery', $image->id) }}" method="POST">
                                        <input type="hidden" name="_method" value="delete">
                                        {!! csrf_field() !!}
                                        <button type="submit" onclick="return confirm('Are you sure you want to delete {{ $image->title }}?')" class="close-icon btn btn-danger">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div> <!-- container / end -->
        </div>
    </div>
@endsection