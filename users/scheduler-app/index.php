<?php
include '../config.php';

// Get the current date in 'Y-m-d' format
$current_date = date('Y-m-d');

// Query to select title where start_date and end_date match the current date
$c_sql = "SELECT title FROM t_events WHERE start_date <= ? AND end_date >= ?";
$stmt = $conn->prepare($c_sql);
$stmt->bind_param("ss", $current_date, $current_date);
$stmt->execute();
$c_result = $stmt->get_result();

// Check if the query was successful
if ($c_result) {
    // Fetch and display the results
    while ($row = $c_result->fetch_assoc()) {
        $title =  htmlspecialchars($row['title']);
    }
} else {
    // Handle query error
    echo "Error: " . mysqli_error($conn);
}

// Close the statement and database connection
$stmt->close();
mysqli_close($conn);
?>



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
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'poppins', sans-serif;
        }

        .nav-tabs {
            border-bottom: none;
        }

        .nav-tabs .nav-link {
            border: 1px solid transparent;
            border-radius: 25px;
            padding: 10px 20px;
            color: #555;
            margin-right: 10px;
            background-color: #ffffff;
            transition: all 0.3s ease;
        }

        .nav-tabs .nav-link.active {
            background-color: #ffffff;
            border-color: #40c4ff;
            color: #007bff;
            box-shadow: 0 0 10px rgba(64, 196, 255, 0.5);
        }

        .tab-content {
            padding: 20px;
            border: 1px solid #e9ecef;
            border-radius: 5px;
            background-color: #ffffff;
            margin-top: 20px;
        }

        .subject-card {
            background: linear-gradient(135deg, #0079F1, #8e24aa);
            border-radius: 25px;
            color: #fff;
            padding: 10px 20px;
            display: inline-block;
            font-weight: bold;
            margin-top: 20px;
        }
    </style>
</head>

<body>


    <div class="container-fluid mt-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card shadow-sm">
                    <div class="card-header ">
                    </div>
                    <div class="card-body ">
                        <div id="calendar"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>





    <!-- Event Modal for Adding/Editing -->
    <div class="modal fade" id="eventModal" tab="-1" role="dialog" aria-labelledby="eventModalLabel" aria-hidden="true">
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
                            <input class="form-control datetimepicker" name="start_date" id="start_date" type="text" placeholder="yyyy/mm/dd hh:mm" data-options='{"static":"true","enableTime":"true","dateFormat":"Y-m-d H:i"}' />
                        </div>
                        <div class="form-group">
                            <label for="end_date">End Date</label>
                            <!-- <input type="datetime-local" class="form-control" id="end_date" name="end_date"> -->
                            <input class="form-control datetimepicker" name="end_date" id="end_date" type="text" placeholder="yyyy/mm/dd hh:mm" data-options='{"static":"true","enableTime":"true","dateFormat":"Y-m-d H:i"}' />
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
    <div class="modal fade" id="viewEventModal" tab="-1" role="dialog" aria-labelledby="viewEventModalLabel" aria-hidden="true">
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