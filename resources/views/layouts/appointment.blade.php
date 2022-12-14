<!-- Script for Calendar -->
<script>
    var calendar
    document.addEventListener('DOMContentLoaded', function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var currentDate = new Date().toISOString();
        var appointments = @json($appointments);
        var blocked_out_dates = @json($blocked_out_dates);
        const combinedDates = [...appointments, ...blocked_out_dates]
        console.log('combinedDates: ', combinedDates)
        var calendarEl = document.getElementById('calendar');
        calendar = new FullCalendar.Calendar(calendarEl, {
            themeSystem: 'bootstrap5',
            editable: true,
            selectable: true,
            dayMaxEventRows: true,
            weekends: false,
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
            events: combinedDates,
            eventTimeFormat: {
                hour: 'numeric',
                meridiem: 'short'
            },
            select: function(allDay) {
                // var start = allDay.startStr;
                // alert('selected ' + start);
                let isDisabledDate = false;
                blocked_out_dates && blocked_out_dates.forEach(el => {
                    if (allDay.startStr == el.start) {
                        isDisabledDate = true;
                    }
                })
                if (isDisabledDate) {
                    alert('You cannot book on this day!')
                    return
                } else {
                    $('#appointment-modal').modal('show');
                }
                $('#appointment-modal-label').html('Set an appointment');
                var start = allDay.startStr;
                var client_id = $('#client-id').val();
                var pet_name = $('#pet-name').val();
                var appointment_type = $('#appointment-type').val();
                var symptoms = $('#symptoms').val();
                console.log("blocked_out_dates", blocked_out_dates)
                console.log("allDay.startStr", allDay.startStr);
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
                            // alert('selected ' + start + ' and ' + client_id + ' and ' + pet_name + ' and ' + appointment_type + ' and ' + symptoms);
                            /* This will make it show up */
                            location.reload();
                        },
                        error: function(err) {
                            $('#nameError').text(err.responseJSON.errors);
                        }
                    })
                });
            },
        });
        calendar.render();
        calendar.refetchEvents();
    });
    
</script>
