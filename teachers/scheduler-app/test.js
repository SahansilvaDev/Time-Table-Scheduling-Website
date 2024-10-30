document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        initialView: 'dayGridMonth',
        editable: true,
        selectable: true,
        select: function(info) {
            $('#eventModal').modal('show');
            $('#eventForm')[0].reset(); // Clear the form
            $('#start_date').val(info.startStr);
            $('#end_date').val(info.endStr);
        },
        events: 'php/events.php', // Fetch events from a PHP script
        eventClick: function(info) {
            $('#viewEventModal').modal('show');
            $('#modalTitle').text(info.event.title);
            $('#modalDateTime').text(info.event.startStr + ' to ' + info.event.endStr);
            $('#modalLocation').text('Location details not provided'); // Adjust as needed
            $('#modalLink').attr('href', info.event.extendedProps.link);
        },
        eventDidMount: function(info) {
            if (info.event.backgroundColor) {
                info.el.style.backgroundColor = info.event.backgroundColor;
            }
        }
    });

    calendar.render();

    // Optional: Handle edit button in the view event modal
    $('#editEvent').on('click', function() {
        $('#viewEventModal').modal('hide');
        $('#eventModal').modal('show');
        // Load event data into the form for editing if needed
        $('#event_id').val($('#modalTitle').text());
        $('#title').val($('#modalTitle').text());
        $('#start_date').val($('#modalDateTime').text().split(' to ')[0]);
        $('#end_date').val($('#modalDateTime').text().split(' to ')[1]);
        $('#link').val($('#modalLink').attr('href'));
        $('#description').val(''); // Adjust if needed to load description
        $('#background_color').val(''); // Adjust if needed to load color
    });




});






$(document).ready(function() {
    $('#saveEvent').on('click', function() {
        $.ajax({
            url: 'php/save_event.php',
            type: 'POST',
            data: $('#eventForm').serialize(),
            success: function(response) {
                $('#eventModal').modal('hide');
                $('#calendar').fullCalendar('refetchEvents');
            },
            error: function() {
                alert('There was an error saving the event.');
            }
        });
    });
});



// $(document).ready(function() {
//     $('#saveEvent').on('click', function() {
//         $.ajax({
//             url: 'php/save_event.php',
//             type: 'POST',
//             data: $('#eventForm').serialize(),
//             success: function(response) {
//                 $('#eventModal').modal('hide');
//                 calendar.refetchEvents(); // Refresh the calendar events
//             },
//             error: function() {
//                 alert('There was an error saving the event.');
//             }
//         });
//     });
// });


