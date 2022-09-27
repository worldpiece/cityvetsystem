<!-- Script for Calendar -->
<script>
    function formatAMPM(date) {
        let hours = new Date(date);
        hours = hours.getHours();
        let minutes = new Date(date);
        minutes = minutes.getMinutes();
        var ampm = hours >= 12 ? 'pm' : 'am'; // check if am or pm
        hours = hours % 12;
        hours = hours ? hours : 12; // the hour '0' should be '12'
        minutes = minutes < 10 ? '0' + minutes : minutes; //check if minute is less than 10 or more than 10.
        return timeDate = hours + ':' + minutes + ' ' + ampm;
    }

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
                //var client_name = $('#client-name').val();
                var pet_id = $('#pet-id').val();
                //var appointment_type = $('#appointment-type').val();
                var appointment_code = $('#appointment-code').val();
                var symptoms = $('#symptoms').val();
                var start = moment(start).format('YYYY-MM-DD HH:mm');
                var end = moment(end).format('YYYY-MM-DD HH:mm');
                // console.log(startStr);
                // console.log(endStr);

                $("#btnSave").click(function() {
                    // const client_name = $('#client-name').val();
                    // const appointment_type = $('#appointment-type').val();
                    const client_id = $('#client-id').val();
                    const pet_id = $('#pet-id').val();
                    const appointment_code = $('#appointment-code').val();
                    const symptoms = $('#symptoms').val();
                    const simula = $('#startTime').val(); // start hour
                    const huli = $('#endTime').val(); // end hour

                    start = new Date(start)
                    start.setHours(0, 0, 0, 0);
                    end = new Date(end)
                    end.setHours(0, 0, 0, 0);
                    var start_time = moment(simula, ["hh:mm A"]).format("HH:mm");
                    var end_time = moment(huli, ["hh:mm A"]).format("HH:mm");
                    const split = start_time.split(":");
                    const split_end = end_time.split(":");
                    start.setHours(split[0], split[1], 0)
                    end.setHours(split_end[0], split_end[1], 0)


                    // console.log(start);
                    // console.log(end);
                    $.ajax({
                        url: "{{ route('appointment.store') }}",
                        type: "POST",
                        data: {
                            start: start.toLocaleString(),
                            end: end.toLocaleString(),
                            client_id: client_id,
                            // client_name: client_name,
                            pet_id: pet_id,
                            // appointment_type: appointment_type,
                            appointment_code: appointment_code,
                            symptoms: symptoms,
                            am: simula,
                            pm: huli,
                            update: 'update'
                        },
                        success: function() {
                            $('#symptoms').val('');
                            $('#startTime').val('');
                            $('#endTime').val('');
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
