@extends('layouts.app')
@section('title')
    CityVet System | Appointment
@endsection
@section('content')
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
                                    <input type="text" class="form-control" id="client-id" value="1" disabled>
                                </div>
                                <div class="form-group col-md-8" style="overflow: auto;">
                                    <label for="client-name" class="col-form-label">Client Name</label>
                                    <input type="text" class="form-control" id="client-name" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="mb-2">
                            <label for="pet-name" class="col-form-label">Pet Name</label>
                            <select class="form-select" aria-label="Default select example" id="pet-name">
                                <option value="1">Thor</option>
                                <option value="2">Loki</option>
                                <option value="3">Hera</option>
                            </select>
                        </div>
                        <div class="mb-2">
                            <label for="appointment-type" class="col-form-label">Appointment Type</label>
                            <select class="form-select" aria-label="Default select example" id="appointment-type">
                                <option value="1">Check Up</option>
                                <option value="2">Spay/Neuter</option>
                                <option value="3">Hera</option>
                            </select>
                        </div>
                        <div class="mb-2">
                            <div class="form-group">
                                <label for="timeStarts">Time Starts</label>
                                <div class='input-group' id='date-time-starts'>
                                    <input type='time' name="time-starts" id="timeStarts" class="form-control" />
                                </div>
                            </div>
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
        document.addEventListener('DOMContentLoaded', function() {
            var appointments = @json($appointments);
            // console.log(appointments)
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                editable: true,
                selectable: true,
                //displayEventEnd: true,
                headerToolbar: {
                    left: 'dayGridMonth,timeGridWeek,timeGridDay',
                    center: 'title',
                    right: 'today prev,next'
                },
                eventLimit: true, // for all non-TimeGrid views
                views: {
                    timeGrid: {
                        eventLimit: 6 // adjust to 6 only for timeGridWeek/timeGridDay
                    }
                },
                events: appointments,
                eventTimeFormat: {
                    hour: 'numeric',
                    meridiem: 'short'
                },
                select: function(appointments) {
                    $('#appointment-modal').modal('show');
                    $('#appointment-modal-label').html('Set an appointment');
                    var client_id = $('#client-id').val();
                    var client_name = $('#client-name').val();
                    var pet_id = $('#pet-id').val();
                    var appointment_type = $('#appointment-type').val();
                    var symptoms = $('#symptoms').val();
                    var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm");
                    var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm");
                    $.ajax({
                        url: "",
                        type: "POST",
                        data: {
                            client_id: client_id,
                            client_name: client_name,
                            pet_id: pet_id,
                            appointment_type: appointment_type,
                            symptoms: symptoms,
                            start: start,
                            end: end,
                        },
                        success: function() {
                            $('#client-id').val('');
                            $('#client-name').val('');
                            $('#pet-id').val('');
                            $('#appointment-type').val('');
                            $('#symptoms').val('');
                            $('#appointment-modal').modal('hide');
                            $('#appointment-modal-label').unbind('click');
                            calendar.fullCalendar('refetchEvents');
                        },
                        error: function(err) {
                            console.log(err)
                        }
                    })
                },
                // eventResize: function(event) {
                //     var client_id = appointments.client_id;
                //     var client_name = appointments.client_name;
                //     var pet_id = $('#pet-id').val();
                //     var appointment_type = $('#appointment-type').val();
                //     var symptoms = $('#symptoms').val();
                //     var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                //     var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                //     //type = 'edit';
                //     $.ajax({
                //         url: "",
                //         type: "POST",
                //         data: {
                //             client_id: client_id,
                //             client_name: client_name,
                //             pet_id: pet_id,
                //             appointment_type: appointment_type,
                //             symptoms: symptoms,
                //             start: start,
                //             end: end,
                //         },
                //         success: function() {
                //             calendar.fullCalendar('refetchEvents');
                //             alert('Event Update');
                //         }
                //     })
                // },
            });
            calendar.render();
        });
    </script>
@endsection
