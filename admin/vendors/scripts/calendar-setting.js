(function () {
    "use strict";

    // Initial events array
    var eventsArray = [
        {
            title: "Barber",
            description: "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras eu pellentesque nibh. In nisl nulla, convallis ac nulla eget, pellentesque pellentesque magna.",
            start: "2024-05-05",
            end: "2024-08-25",
            className: "fc-bg-default",
            icon: "circle",
        }
    ];

    jQuery(function () {
        // Initialize the calendar with existing events
        jQuery("#calendar").fullCalendar({
            themeSystem: "bootstrap4",
            businessHours: false,
            defaultView: "month",
            editable: true,
            header: {
                left: "title",
                center: "month,agendaWeek,agendaDay",
                right: "today prev,next",
            },
            events: eventsArray,  // Use eventsArray to populate the calendar
            
            dayClick: function (date) {
                jQuery("#add-event")[0].reset();
                jQuery("#modal-view-event-add").modal();

                jQuery("#add-event").off("submit").on("submit", function (e) {
                    e.preventDefault();

                    var eventData = {
                        title: jQuery("input[name='ename']").val(),
                        start: jQuery("input[name='sdate']").val(),
                        end: jQuery("input[name='edate']").val(),
                        description: jQuery("textarea[name='edesc']").val(),
                        className: jQuery("select[name='ecolor']").val(),
                        icon: jQuery("select[name='eicon']").val(),
                        location: jQuery("input[name='elocation']").val(),
                        link: jQuery("input[name='elink']").val(),
                        allDay: jQuery("#allDayCheckbox").is(":checked")
                    };

                    // Save event to the JavaScript array
                    eventsArray.push(eventData);
                    
                    // Save event to fullCalendar
                    jQuery("#calendar").fullCalendar('renderEvent', eventData, true);

                    // Save event to the database via AJAX
                    jQuery.ajax({
                        url: './save_event.php', // Ensure this path is correct
                        type: 'POST',
                        data: {
                            title: eventData.title,
                            start_date: eventData.start,
                            end_date: eventData.end,
                            description: eventData.description,
                            label: eventData.className,
                            link: eventData.link,
                            location: eventData.location,
                            user_id: 1, // Replace with actual user ID
                            created_at: new Date().toISOString(),
                            all_day: eventData.allDay ? 1 : 0
                        },
                        success: function(response) {
                            console.log('Event saved:', response);
                        },
                        error: function(xhr, status, error) {
                            console.error('Error saving event:', xhr.responseText); // Print response text for debugging
                        }
                    });

                    jQuery("#modal-view-event-add").modal('hide');
                });
            },
            
            eventClick: function (event, jsEvent, view) {
                jQuery(".event-icon").html("<i class='fa fa-" + event.icon + "'></i>");
                jQuery(".event-title").html(event.title);
                jQuery(".event-body").html(event.description + "<br><strong>Location:</strong> " + event.location);
                jQuery("#modal-view-event").modal();
            },
        });
    });
})(jQuery);
