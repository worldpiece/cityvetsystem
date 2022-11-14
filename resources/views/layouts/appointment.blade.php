<!-- Script for Calendar -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var SITEURL = "{{ url('/') }}";
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var currentDate = new Date().toISOString();
        var appointments = @json($appointments);
        // console.log(appointments)
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
                themeSystem: 'bootstrap5',
                editable: true,
                selectable: true,
                dayMaxEventRows: true,
                validRange: function(nowDate) {
                    return {
                        start: currentDate
                    };
                },
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
                // var start = allDay.startStr;
                // alert('selected ' + start);

                $('#appointment-modal').modal('show');
                $('#appointment-modal-label').html('Set an appointment');

                var start = allDay.startStr;

                var client_id = $('#client-id').val();
                var pet_name = $('#pet-name').val();
                var appointment_type = $('#appointment-type').val();
                var symptoms = $('#symptoms').val();

                $("#btnSave").click(function() {
                    const simula = start;
                    const client_id = $('#client-id').val();
                    const pet_name = $('#pet-name').val();
                    const appointment_type = $('#appointment-type').val();
                    const symptoms = $('#symptoms').val();
                    // alert('selected ' + start + ' and ' + client_id + ' and ' + pet_name + ' and ' + appointment_type + ' and ' + symptoms);

                    $.ajax({
                        url: "{{ route('appointment.store') }}",
                        type: "POST",
                        data: {
                            start: simula,
                            client_id: client_id,
                            pet_name: pet_name,
                            appointment_type: appointment_type,
                            symptoms: symptoms
                        },
                        success: function() {
                            $('#symptoms').val('');
                            $('#appointment-type').val('');
                            $('#pet-name').val('');
                            $('#appointment-modal').modal('hide');
                            $('#btnSave').unbind('click');
                            eventSource.refetch();
                            calendar.render();
                        },
                        error: function(err) {
                            console.log(err)
                            $('#nameError').text(err.responseJSON.errors);
                        }
                    })
                    eventSource.refetch();
                });
                $("#btnDelete").click(function() {
                    // calendar.refetchEvents();
                });
                // calendar.fullCalendar('unselect');
                calendar.refetchEvents();
            }
        }); 
        calendar.render();
    });
</script>
