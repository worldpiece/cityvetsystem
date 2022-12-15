<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Attendance</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script>
    <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <!-- Styles -->
</head>

<body class="antialiased">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Attendance') }}</div>
                <div class="card-body">
                    <div class="justify-content-center">
                        <div class="form-group mb-2 p-0">
                            <video width="480" height="480" id="preview" class="form-control p-0"></video>
                        </div>
                        <div class="form-row">
                            <form id="form-attendance" class="form-inline" method="post" action="{{ url('attendance/store' )}}">
                                @csrf
                                <div class="row">
                                    <div class="col-2">
                                        <label for="employee_no">Employee No.</label>
                                        <input type="text" class="form-control mb-2 mr-sm-2" id="employee_no"
                                            readonly disabled value="">
                                    </div>
                                    <div class="col-10">
                                        <label for="designation">Designation</label>
                                        <input type="text" class="form-control mb-2 mr-sm-2" id="designation"
                                            readonly disabled>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <label for="first_name">First Name</label>
                                        <input type="text" class="form-control mb-2 mr-sm-2" readonly
                                            name="first_name" id="first_name" disabled>
                                    </div>
                                    <div class="col-6">
                                        <label for="last_name">Last Name</label>
                                        <input type="text" class="form-control mb-2 mr-sm-2" id="last_name" disabled>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <label for="am_in">AM In</label>
                                        <input type="text" class="form-control mb-2 mr-sm-2" id="am_in" disabled>
                                    </div>
                                    <div class="col-3">
                                        <label for="am_out">AM Out</label>
                                        <input type="text" class="form-control mb-2 mr-sm-2" id="am_out" disabled>
                                    </div>
                                    <div class="col-3">
                                        <label for="pm_in">PM In</label>
                                        <input type="text" class="form-control mb-2 mr-sm-2" id="pm_in" disabled>
                                    </div>
                                    <div class="col-3">
                                        <label for="pm_out">PM Out</label>
                                        <input type="text" class="form-control mb-2 mr-sm-2" id="pm_out" disabled>
                                    </div>
                                    <input type="hidden" name="qrId" id="qrId" value="1">
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="form-row d-flex justify-content-center">
                        <div class="col-auto my-1">
                            <button type="button" class="btn btn-primary" id="time-in">Time-In</button>
                            &nbsp;
                            &nbsp;
                            &nbsp;
                            &nbsp;
                            <button type="button" class="btn btn-primary" id="time-out">Time-Out</button>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</body>
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        // $.ajax({
        //     url: "{{ route('attendance.store' ) }}",
        //     type: "POST",
        //     data: {
        //         id: 1,
        //         _token: '{{csrf_token()}}'
        //     },
        //     success: function(response) {
        //         console.log('response: ', response)
        //         document.getElementById('employee_no').value = response.employee_no;
        //         document.getElementById('designation').value = response.designation;
        //         document.getElementById('first_name').value = response.first_name;
        //         document.getElementById('last_name').value = response.last_name;
        //         if (response.am_in) {
        //             document.getElementById('am_in').value = new Date(response.am_in).toLocaleString();
        //         }
        //         if (response.am_out) {
        //             document.getElementById('am_out').value = new Date(response.am_out).toLocaleString();
        //         }
        //         if (response.pm_in) {
        //             document.getElementById('pm_in').value = new Date(response.pm_in).toLocaleString();
        //         }
        //         if (response.pm_out) {
        //             document.getElementById('pm_out').value = new Date(response.pm_out).toLocaleString();
        //         }
        //         // document.getElementById('#appointment-modal').value = response.last_name;
        //         // alert('selected ' + start + ' and ' + client_id + ' and ' + pet_name + ' and ' + appointment_type + ' and ' + symptoms);
        //     },
        //     error: function(err) {
        //         console.log('err: ', err)
        //     }
        // })
    });

    
    let scanner = new Instascan.Scanner({
        video: document.getElementById('preview')
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

    scanner.addListener('scan', function(c) {
        document.getElementById('qrId').value = c;
        // $( "#form-attendance" ).submit();
        // document.forms[0].submit();
        $.ajax({
            url: "{{ route('attendance.store' ) }}",
            type: "POST",
            data: {
                id: c,
                _token: '{{csrf_token()}}'
            },
            success: function(response) {
                console.log('response: ', response)
                document.getElementById('employee_no').value = response.employee_no;
                document.getElementById('designation').value = response.designation;
                document.getElementById('first_name').value = response.first_name;
                document.getElementById('last_name').value = response.last_name;
                if (response.am_in) {
                    document.getElementById('am_in').value = new Date(response.am_in).toLocaleString();
                }
                if (response.am_out) {
                    document.getElementById('am_out').value = new Date(response.am_out).toLocaleString();
                }
                if (response.pm_in) {
                    document.getElementById('pm_in').value = new Date(response.pm_in).toLocaleString();
                }
                if (response.pm_out) {
                    document.getElementById('pm_out').value = new Date(response.pm_out).toLocaleString();
                }
                // document.getElementById('#appointment-modal').value = response.last_name;
                // alert('selected ' + start + ' and ' + client_id + ' and ' + pet_name + ' and ' + appointment_type + ' and ' + symptoms);
            },
            error: function(err) {
                console.log('err: ', err)
            }
        })
    });

    document.getElementById("time-in").addEventListener("click", function() {
        const qrId = document.getElementById('qrId').value
        $.ajax({
            url: "{{ route('attendance.store' ) }}",
            type: "POST",
            data: {
                id: qrId,
                _token: '{{csrf_token()}}',
                action: 'timein'
            },
            success: function(response) {
                console.log('response: ', response)
                document.getElementById('employee_no').value = response.employee_no;
                document.getElementById('designation').value = response.designation;
                document.getElementById('first_name').value = response.first_name;
                document.getElementById('last_name').value = response.last_name;
                if (response.am_in) {
                    document.getElementById('am_in').value = new Date(response.am_in).toLocaleString();
                }
                if (response.am_out) {
                    document.getElementById('am_out').value = new Date(response.am_out).toLocaleString();
                }
                if (response.pm_in) {
                    document.getElementById('pm_in').value = new Date(response.pm_in).toLocaleString();
                }
                if (response.pm_out) {
                    document.getElementById('pm_out').value = new Date(response.pm_out).toLocaleString();
                }
                alert('Successful time in');
                // document.getElementById('#appointment-modal').value = response.last_name;
                // alert('selected ' + start + ' and ' + client_id + ' and ' + pet_name + ' and ' + appointment_type + ' and ' + symptoms);
            },
            error: function(err) {
                console.log('err: ', err)
            }
        })
        console.log('response: ', document.getElementById('qrId').value)
    });
    document.getElementById("time-out").addEventListener("click", function() {
        const qrId = document.getElementById('qrId').value
        $.ajax({
            url: "{{ route('attendance.store' ) }}",
            type: "POST",
            data: {
                id: qrId,
                _token: '{{csrf_token()}}',
                action: 'timeout'
            },
            success: function(response) {
                console.log('response: ', response)
                alert('Successful time out');
                document.getElementById('employee_no').value = response.employee_no;
                document.getElementById('designation').value = response.designation;
                document.getElementById('first_name').value = response.first_name;
                document.getElementById('last_name').value = response.last_name;
                if (response.am_in) {
                    document.getElementById('am_in').value = new Date(response.am_in).toLocaleString();
                }
                if (response.am_out) {
                    document.getElementById('am_out').value = new Date(response.am_out).toLocaleString();
                }
                if (response.pm_in) {
                    document.getElementById('pm_in').value = new Date(response.pm_in).toLocaleString();
                }
                if (response.pm_out) {
                    document.getElementById('pm_out').value = new Date(response.pm_out).toLocaleString();
                }
                // document.getElementById('#appointment-modal').value = response.last_name;
                // alert('selected ' + start + ' and ' + client_id + ' and ' + pet_name + ' and ' + appointment_type + ' and ' + symptoms);
            },
            error: function(err) {
                console.log('err: ', err)
            }
        })
    });
</script>

</html>
