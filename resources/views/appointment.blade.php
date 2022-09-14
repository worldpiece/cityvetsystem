<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Appointment</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>

<body>
    <div class="container mt-5" style="max-width: 1000px">
        <h2 class="h2 text-left mb-5 border-bottom pb-3">Set an appointment</h2>
        <div id='calendar' style="border: 2px solid #eee"></div>
    </div>
    <!-- Modal -->
    <div class="modal" id="appointment-modal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Set an appointment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-2">
                            <div class="row">
                                <div class="form-group col-md-4" style="overflow: auto;">
                                    <label for="client-id" class="col-form-label">ID</label>
                                    <input type="text" value="001" class="form-control" id="client-id" disabled>
                                </div>
                                <div class="form-group col-md-8" style="overflow: auto;">
                                    <label for="client-name" class="col-form-label">Client Name</label>
                                    <input type="text" value="Peter Cayetano" class="form-control" id="client-name"
                                        disabled>
                                </div>
                            </div>
                        </div>
                        <div class="mb-2">
                            <label for="middle-name" class="col-form-label">Pet Name</label>
                            <select class="form-select" aria-label="Default select example">
                                {{-- <option selected>Open this select menu</option> --}}
                                <option value="1">Charmander</option>
                                <option value="2">Ricardo</option>
                                <option value="3">Alberto</option>
                            </select>
                            {{-- <input type="text" class="form-control" id="pet-id" disabled> --}}
                        </div>
                        <div class="mb-2">
                            <div class="form-group">
                                <label for="timeStarts">Time Starts</label>
                                <div class='input-group' id='date-time-starts'>
                                    <input type='time' name="time-starts" id="timeStarts" class="form-control" />
                                </div>
                            </div>
                            {{-- <label for="start-time" class="col-form-label">Start Time</label>
                            <input type="text" class="form-control" id="start-time" value="9:00 AM"> --}}
                        </div>
                        <div class="mb-2">
                            <div class="form-group">
                                <label for="timeEnds">Time Ends</label>
                                <div class='input-group' id='date-time-ends'>
                                    <input type='time' name="time-ends" id="timeEnds" class="form-control" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-time"></span>
                                    </span>
                                </div>
                            </div>
                            {{-- <label for="end-time" class="col-form-label">End Time</label>
                            <input type="text" class="form-control" id="end-time" value="10:00 AM"> --}}
                        </div>
                        <div class="mb-2">
                            <label for="message-text" class="col-form-label">Symptoms:</label>
                            <textarea class="form-control" id="symptoms-text"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    {{-- Scripts --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function formatAMPM(date) {
            let hours = new Date(date);
            hours = hours.getHours();
            let minutes = new Date(date);
            minutes = minutes.getMinutes();
            var ampm = hours >= 12 ? 'pm' : 'am';
            hours = hours % 12;
            hours = hours ? hours : 12; // the hour '0' should be '12'
            minutes = minutes < 10 ? '0' + minutes : minutes;
            return timeDate = hours + ':' + minutes + ' ' + ampm;
        }

        document.addEventListener('DOMContentLoaded', function() {
                    var calendarEl = document.getElementById('calendar');
                    var calendar = new FullCalendar.Calendar(calendarEl, {
                            //initialView: 'dayGridMonth'
                            editable: true,
                            weekends: false,
                            eventLimit: true, // for all non-TimeGrid views
                            headerToolbar: {
                                left: 'dayGridMonth,timeGridWeek,timeGridDay',
                                right: 'today prev,next'
                            },
                            //events: '',
                            selectable: true,
                            select: function(start, end) {
                                $('#appointment-modal').modal('show');
                                $('#event-modal-label').html('Add an event');
                                var client_id = $('#client-id').val();
                                var client_name = $('#client-name').val();
                                var pet_id = $('#pet-id').val();
                                var symptoms = $('#symptoms-text').val();
                                var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm");
                                var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm");

                                // $("#save-appointment-modal").click(function() {
                                //         const kliyente_id = $('#client-id').val();
                                //         const kliyente_name = $('#client-name').val();
                                //         const alaga_id = $('#pet-id').val();
                                //         const sintomas = $('#symptoms-text');
                                //         const simula = $('#timeStarts').val();
                                //         const huli = $('#timeEnds').val();
                                //         $.ajax({
                                //             url: "kung_san_nakalagay_insert.blade.php",
                                //             type: "POST",
                                //             data: {
                                //                 client_id: kliyente_id,
                                //                 client_name: kliyente_name,
                                //                 pet_id: alaga_id,
                                //                 symptoms: sintomas,
                                //                 am: simula,
                                //                 pm: huli
                                //             },
                                //             success: function() {
                                //                 $('#client-id').val('');
                                //                 $('#client-name').val('');
                                //                 $('#pet-id').val('');
                                //                 $('#symptoms-text').val('');
                                //                 $('#appointment-modal').modal('hide');
                                //                 $('#save-appointment-modal').unbind('click');
                                //                 calendar.fullCalendar('refetchEvents');
                                //             },
                                //             error: function(err) {
                                //                 console.log(err)
                                //             }
                                //         })
                                //     },

                            }); calendar.render();
                    });
    </script>
</body>

</html>
