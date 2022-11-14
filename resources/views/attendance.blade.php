@extends('layouts.home')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Attendance') }}</div>
                    <div class="card-body">
                        <div class="justify-content-center">


                            <div class="form-group mb-2 p-0">
                                <video id="preview" class="form-control p-0"></video>
                            </div>
                        </div>
                        <form>
                            <div class="form-row d-flex justify-content-center">
                                <div class="col-auto my-1">
                                    <button type="submit" class="btn btn-primary" id="time-in">Time-In</button>
                                    &nbsp;
                                    &nbsp;
                                    &nbsp;
                                    <button type="submit" class="btn btn-primary" id="time-out">Time-Out</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('scripts')
    <script type="text/javascript">
        let scanner = new Instascan.Scanner({
            video: document.getElementById('preview')
        });
        scanner.addListener('scan', function(content) {
            console.log(content);
        });
        Instascan.Camera.getCameras().then(function(cameras) {
            if (cameras.length > 0) {
                scanner.start(cameras[0]);
            } else {
                console.error('No cameras found.');
            }
        }).catch(function(e) {
            console.error(e);
        });
    </script>
@endsection
