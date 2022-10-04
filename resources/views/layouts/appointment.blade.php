<!-- Script for Calendar -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var appointments = @json($appointments);
        //console.log(appointments)
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            editable: true,
            selectable: true,
            displayEventEnd: true,
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
            select: function(start, end) {
                $('#appointment-modal').modal('show');
                $('#appointment-modal-label').html('Set an appointment');

                var client_id = $('#client-id').val();
                var client_name = $('#client-name').val();
                // var pet_id = $('#pet-id').val();
                //var appointment_type = $('#appointment-type').val();
                // var appointment_code = $('#appointment-code').val();
                var symptoms = $('#symptoms').val();


                $("#btnSave").click(function() {
                    // const client_name = $('#client-name').val();
                    // const appointment_type = $('#appointment-type').val();
                    const client_id = $('#client-id').val();
                    const pet_id = $('#pet-id').val();
                    const appointment_code = $('#appointment-code').val();
                    const symptoms = $('#symptoms').val();
                    // const simula = $('#startTime').val(); // start hour
                    // const huli = $('#endTime').val(); // end hour

                    // console.log(start);
                    // console.log(end);
                    $.ajax({
                        url: "{{ route('appointment.store') }}",
                        type: "POST",
                        data: {
                            start: start,
                            end: end,
                            client_id: client_id,
                            // client_name: client_name,
                            pet_id: pet_id,
                            // appointment_type: appointment_type,
                            appointment_code: appointment_code,
                            symptoms: symptoms,
                            // am: simula,
                            // pm: huli,
                            // update: 'update'
                        },
                        success: function() {
                            $('#symptoms').val('');
                            // $('#startTime').val('');
                            // $('#endTime').val('');
                            $('#appointment-modal').modal('hide');
                            $('#btnSave').unbind('click');
                            calendar.refetchEvents();
                        },
                        error: function(err) {
                            console.log(err)
                        }
                    })
                });

                $("#btnDelete").click(function() {

                });
            }
        });
        calendar.render();
    });
</script>
