<?php
include './config.php';

session_start();

date_default_timezone_set('Asia/Colombo');

if (isset($_SESSION['email'])) {

    // Session variables are available, so assign them to local variables
    $admin_id = $_SESSION['user_id'];
    $username = $_SESSION['username'];
    $email = $_SESSION['email'];

    $sql = "SELECT title, start_date, end_date FROM t_events WHERE start_date >= CURDATE() ORDER BY start_date DESC LIMIT 5";
    $result = $conn->query($sql);


?>





    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Student's Dashboard</title>
        <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="css/faculty_style.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <body style="overflow-x:hidden;">
        <!--Top navbar start-->
        <nav class="navbar navbar-expand-md navbar-dark navbar-default">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mr-auto" id="navbar-li">
                    <li class="nav-item">
                        <p style="cursor:pointer; font-size:35px;" class="main_hedding">
                            <img src="../teachers/sltc.png" alt="" width="100px" height="50px">
                            <a href="./index.php" style="cursor: pointer;">Xeduler</a>
                        </p>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">



                    <!--<li class="nav-item mt-2">
                        <a class="nav-link" href="#" style="color: black;">Subjects</a>
                    </li>-->
                    <li class="nav-item mt-2">
                        <a class="nav-link" href="#">

                        </a>
                    </li>

                    <li class="nav-item dropdown ">
                        <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-bell mt-2" style="font-size: 20px;  color:aliceblue; font-weight:600; "></i>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="profileDropdown">
                            notification
                        </div>
                    </li>


                    <li class="nav-item dropdown ">
                        <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="img/upes-logo.png" class="profile-image" width="50" height="50">
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="profileDropdown">
                            <a class="dropdown-item" href="./profile.php">View Profile</a>
                            <a class="dropdown-item" href="#">Settings</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="./logout.php">Logout</a>
                        </div>
                    </li>
                    <!-- <li class="nav-item">
                <a class="nav-link" href="student.php">
                    <img src="img/upes-logo.png" height="45px" alt="Logo">
                </a>
            </li> -->
                </ul>
            </div>
        </nav>
        <!--Top navbar end-->

        <br>
        <div class="row">
            <!--Sidebar start-->
            <nav id="sidebar" style="border: 1px solid rgb(174, 223, 255); border-radius:0px 120px 0px 0px;">
                <div class="sidebar-header text-center">
                    <div class="row">
                        <div class="col-sm-7 main_hedding">
                            <h1>Hello, <?php echo $username; ?></h1>
                        </div>
                        <div class="col-sm-5 mt-4">
                            <a href="./profile.php"><i class="fa fa-gear fa-spin" style="font-size:35px"></i></a>
                        </div>
                    </div>
                </div>

                <div class="row" id="show_data"> <!-- show profile.php file -->
                    <div class="col-sm-12 coming_events mx-2">
                        <div class="coming_events_section">
                            <div class="heading_events">
                                <h5 style="color: black; text-align:center; padding-top:10px;">Coming Events</h5>
                            </div>
                            <!-- Events list -->
                            <div class="events-list" id="eventsList">
                                <?php
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo '
                        <div class="card event-card">
                            <div class="row align-items-center">
                                <div class="col-sm-9 py-1">
                                    <p class="event-title">' . htmlspecialchars($row["title"]) . '</p>
                                </div>
                                <div class="col-sm-3 text-right">
                                    <img src="./img/XCircle.png" alt="close" class="fa-close">
                                </div>
                            </div>
                        </div>';
                                    }
                                } else {
                                    echo '<p style="text-align:center; color:black;">No upcoming events</p>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>




                <script>
                    document.querySelectorAll('.fa-close').forEach(closeBtn => {
                        closeBtn.addEventListener('click', function() {
                            this.closest('.card').remove();
                            // Optional: Send an AJAX request to delete the event from the database
                        });
                    });

                    // Start the scrolling animation when the page is ready
                </script>

                <div class="row" id="profile_show_data">
                    <!-- show profile.php file -->

                    <div class="col-sm-12 coming_events mx-2">
                        <div class="coming_events_section">
                            <div class="heading_events">

                            </div>
                            <!-- Events list -->
                            <div class="events_list_profile" id="profileEventsList" style="height: 350px;">
                                <!-- PHP code to fetch and display user profile data -->


                                <div class="list_profile ">
                                    email: <?php echo $email; ?><br>
                                    <h6 class="mt-2"> Subjects: </h6>
                                    Discrete Mathematics
                                    Natural Language Processing
                                    Software Engineering Methods
                                    Software Architecture
                                    Software Quality Assurance
                                    Data Warehousing
                                    Virtualization & Containers
                                    Technology Challenge Competition
                                    Capstone Project
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        if (window.location.pathname.includes("index.php")) {
                            document.getElementById("profile_show_data").style.display = "none";
                            document.getElementById("show_data").style.display = "block";
                        }
                    });
                </script>


                <ul class="list-unstyled components text-center">
                    <!-- <li>
                    <div class="text-center">
                         <button type="button" class="btn btn-light  change_pw" >  <a href="#" style="font-size: 15px;">  Change Password  </a> </button> 
                      
                    </div>
                </li>
                <li>
                    <div class="text-center">
                      
                          <button type="button" class="btn btn-light  change_pw" > <a href="logout2.php" style="font-size: 15px;">  Logout  </a> </button> 
                    </div>

                    <div class="text-center">
                      
                         <button type="button" class="btn btn-light  change_pw" >  <a href="logout2.php" style="font-size: 15px;">  Feedback  </a> </button> 
                    </div>
                </li> -->

                    <div class="mx-4 text-center">
                        <a href="change_password.php">
                            <button type="button" class="btn btn-primary btn-lg btn-block my-2 custom-btn">Change Password?</button>
                        </a>
                        <a href="logout2.php">
                            <button type="button" class="btn btn-primary btn-lg btn-block my-2 custom-btn">Log Out?</button>
                        </a>
                        <a href="feedback.php">
                            <button type="button" class="btn btn-primary btn-lg btn-block my-2 custom-btn">Feedback?</button>
                        </a>
                    </div>

                </ul>



            </nav>
            <!--Sidebar end-->

            <div class="col">

            <?php


        } else {
            // Redirect if session variables are not set
            header("Location: ../Login/Student.php");
            exit;
        }
            ?>