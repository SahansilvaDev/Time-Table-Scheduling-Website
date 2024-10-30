<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scheduler App</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- FullCalendar CSS -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css" rel="stylesheet"> -->
    <!-- Custom CSS -->

    <link href="./js/flatpickr/flatpickr.min.css" rel="stylesheet">  


    <link href="css/style.css" rel="stylesheet">
    <link href="css/calender.css" rel="stylesheet">  

    <link rel="stylesheet" href="css/theme.min.css">
</head>
<body>


<div class="container-fluid mt-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white text-center">
                    <h3 class="card-title">Event Calendar</h3>
                </div>
                <div class="card-body ">
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- Event Modal for Adding/Editing -->
    <div class="modal fade" id="eventModal" tabindex="-1" role="dialog" aria-labelledby="eventModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="eventModalLabel">Event Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="eventForm">
                        <input type="hidden" id="event_id" name="event_id">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title">
                        </div>
                        <div class="form-group">
                            <label for="start_date">Start Date</label>
                            <!-- <input type="datetime-local" class="form-control" id="start_date" name="start_date"> -->
                            <input class="form-control datetimepicker" name="start_date" id="start_date" type="text"  placeholder="yyyy/mm/dd hh:mm" data-options='{"static":"true","enableTime":"true","dateFormat":"Y-m-d H:i"}' />
                        </div>
                        <div class="form-group">
                            <label for="end_date">End Date</label>
                            <!-- <input type="datetime-local" class="form-control" id="end_date" name="end_date"> -->
                            <input class="form-control datetimepicker" name="end_date" id="end_date" type="text"  placeholder="yyyy/mm/dd hh:mm" data-options='{"static":"true","enableTime":"true","dateFormat":"Y-m-d H:i"}' />
                        </div>
                        <!-- <div class="form-group">
                            <label for="link">Link</label>
                            <input type="text" class="form-control" id="link" name="link">
                        </div> -->

                        <div class="mb-3 form-group">
                            <label class="fs-9">Schedule Meeting</label>
                            <div>
                                <a class="btn badge-subtle-success btn-sm" href="#!" onclick="toggleVideoConferenceInput()">
                                    <span class="fa-solid fa-video mx-1"><i class="fa fa-arrows-alt"></i></span>Add video conference link
                                </a>
                            </div>
                            <div class="mb-3" id="videoConferenceInput" style="display: none;">
                                <input class="form-control" type="url" id="link" name="link" placeholder="Video conference link (e.g., Zoom, Google Meet)" />
                            </div>
                        </div>

                        <script>
                        function toggleVideoConferenceInput() {
                            var inputField = document.getElementById("videoConferenceInput");
                            if (inputField.style.display === "none") {
                                inputField.style.display = "block";
                            } else {
                                inputField.style.display = "none";
                            }
                        }
                        </script>



                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="background_color">Event Color</label>
                            <input type="color" class="form-control" id="background_color" name="background_color">
                        </div>

                        <button type="button" class="btn btn-primary" id="saveEvent">Save Event</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Separate Modal for Viewing Event Details -->
    <div class="modal fade" id="viewEventModal" tabindex="-1" role="dialog" aria-labelledby="viewEventModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewEventModalLabel">View Event Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Title</th>
                            <td id="modalTitle"></td>
                        </tr>
                        <tr>
                            <th>Date and Time</th>
                            <td id="modalDateTime"></td>
                        </tr>
                        <tr>
                            <th>Location</th>
                            <td id="modalLocation"></td>
                        </tr>
                        <tr>
                            <th>Detail Link</th>
                            <td><a href="#" id="modalLink" target="_blank">View Details</a></td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="editEvent">Edit Event</button>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <!-- FullCalendar JS -->
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
    <!-- Custom JS -->
    <script src="js/script.js"></script>

    <script src="js/flatpickr.js"></script>


    <!-- <script src="js/calender.js"></script> -->


</body>
</html>
