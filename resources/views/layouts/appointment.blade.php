<!-- Script for Calendar -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var SITEURL = "{{ url('/') }}";
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var appointments = @json($appointments);
        console.log(appointments)
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            themeSystem: 'bootstrap5',
            editable: true,
            selectable: true,
            draggable: false,
            dayMaxEventRows: true,
            headerToolbar: {
                left: 'dayGridMonth,timeGridWeek,timeGridDay',
                center: 'title',
                right: 'today prev,next'
            },
            views: {
                timeGrid: {
                    dayMaxEventRows: 6
                }
            },
            events: appointments,
            eventTimeFormat: {
                hour: 'numeric',
                meridiem: 'short'
            },
            select: function(allDay) {
                $('#appointment-modal').modal('show');
                $('#appointment-modal-label').html('Set an appointment');

                // var client_id = $('#client-id').val();
                // var client_name = $('#client-name').val();
                // var pet_name = $('pet-name').val();
                // var appointment_type = $('#appointment-type').val();
                // var symptoms = $('#symptoms').val();
                // // var allDay = moment();
                // var start = moment(start, "DD MM YYYY hh:mm:ss");
                // // var end = moment(end, "DD MM YYYY hh:mm:ss");

                $("#btnSave").click(function() {
                    const client_id = $('#client-id').val();
                    const client_name = $('#client-name').val();
                    const pet_id = $('#pet-id').val();
                    const pet_name = $('#pet-name').val();
                    const appointment_type = $('#appointment-type').val();
                    const symptoms = $('#symptoms').val();


                    $.ajax({
                        processData: false,
                        contentType: false,
                        // url: SITEURL + "/store",
                        url: "{{ route('appointment.store') }}",
                        type: "POST",
                        data: {
                            // "_token": "{{ csrf_token() }}",
                            start: start,
                            // end: end,
                            // allDay: allDay,
                            client_id: client_id,
                            client_name: client_name,
                            pet_name: pet_name,
                            appointment_type: appointment_type,
                            symptoms: symptoms
                        },
                        success: function() {
                            $('#symptoms').val('');
                            $('#appointment-modal').modal('hide');
                            $('#btnSave').unbind('click');
                            calendar.render();
                        },
                        error: function(err) {
                            console.log(err)
                            $('#nameError').text(response.responseJSON.errors
                                .appointment - type22);
                        }
                    })
                    // calendar.refetchEvents();
                });

                $("#btnDelete").click(function() {

                    // calendar.refetchEvents();
                });
                // calendar.fullCalendar('unselect');
                // calendar.refetchEvents();
            }
        });
        calendar.render();
    });
</script>
