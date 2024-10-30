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

        // Handle date selection to add new events
        select: function(info) {
            $('#eventModal').modal('show');
            $('#eventForm')[0].reset(); // Clear the form
            $('#start_date').val(info.startStr);
            $('#end_date').val(info.endStr);
        },

        // Load events from server
        events: 'php/events.php', 

        // Handle clicking on an existing event
        eventClick: function(info) {
            $('#viewEventModal').modal('show');
            $('#modalTitle').text(info.event.title);
            $('#modalDateTime').text(info.event.startStr + ' to ' + info.event.endStr);
            $('#modalLocation').text('Location details not provided'); // Adjust as needed
            $('#modalLink').attr('href', info.event.extendedProps.link);
        },

        // Apply custom styling based on event properties
        eventDidMount: function(info) {
            if (info.event.backgroundColor) {
                info.el.style.backgroundColor = info.event.backgroundColor;
            }
        },

        // Limit the number of events shown per day and display the others in a dropdown
        dayMaxEventRows: 2, // Display a maximum of two events per day
        moreLinkClick: 'popover' // Use a popover to show extra events
    });

    calendar.render();

    // Handle editing of an event
    $('#editEvent').on('click', function() {
        $('#viewEventModal').modal('hide');
        $('#eventModal').modal('show');

        // Load event data into the form for editing
        $('#event_id').val($('#modalTitle').text());
        $('#title').val($('#modalTitle').text());
        var dateTimes = $('#modalDateTime').text().split(' to ');
        $('#start_date').val(dateTimes[0]);
        $('#end_date').val(dateTimes[1]);
        $('#link').val($('#modalLink').attr('href'));
        $('#description').val(''); // Adjust if needed to load description
        $('#background_color').val(''); // Adjust if needed to load color
    });
});

$(document).ready(function() {
    // Handle saving of an event
    $('#saveEvent').on('click', function() {
        $.ajax({
            url: 'php/save_event.php',
            type: 'POST',
            data: $('#eventForm').serialize(),
            success: function(response) {
                $('#eventModal').modal('hide');
                $('#calendar').fullCalendar('refetchEvents'); // Refresh events after saving
            },
            error: function() {
                alert('There was an error saving the event.');
            }
        });
    });
});
