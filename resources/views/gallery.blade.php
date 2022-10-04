@extends('layouts.gallery')

@section('content')
    <div class="gallery-container">
        <h3 style="color: rgb(31, 29, 27)">&nbsp;&nbsp;Image Gallery</h3>

        <form action="{{ url('gallery') }}" class="form-image-upload" method="POST" enctype="multipart/form-data">
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
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif
            <div class="row">
                <div class="col-md-5">
                    <strong>Title:</strong>
                    <input type="text" name="title" class="form-control" placeholder="Title">
                </div>
                <div class="col-md-5">
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
            <div class='list-group gallery'>
                @if ($images->count())
                    @foreach ($images as $image)
                        <div class='col-sm-4 col-xs-6 col-md-3 col-lg-3'>
                            <a class="thumbnail fancybox" rel="lightbox" href="/images/{{ $image->image }}">
                                <img class="img-fluid" alt="" src="/images/{{ $image->image }}" />
                                <div class='text-center'>
                                    <small class='text-muted'>{{ $image->title }}</small>
                                </div> <!-- text-center / end -->
                            </a>
                            <form action="{{ url('gallery', $image->id) }}" method="POST">
                                <input type="hidden" name="_method" value="delete">
                                {!! csrf_field() !!} <button type="submit"
                                    class="close-icon btn btn-danger deleteImgBtn"><i
                                        class="glyphicon glyphicon-remove"></i></button>
                            </form>
                        </div> <!-- col-6 / end -->
                    @endforeach
                @endif
            </div> <!-- list-group / end -->
        </div> <!-- row / end -->
    </div> <!-- container / end -->

    {{-- Delete Modal --}}
    <div class="modal" id="deleteModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete Image</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- <p>Are you sure you want to delete?.</p> -->
                    </div>
                    <div class="modal-footer">
                        {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button> --}}
                        <button type="submit" class="btn btn-primary">Yes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

<!-- @section('scripts')
    <script>
        $(document).ready(function() {
            $(.deleteImgBtn).click(function(e) {
                e.preventDefault();

                var img_title = $(this).val();
                $(#deleteModal).modal('show');
            });
        });
    </script>
@endsection -->
