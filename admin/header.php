<?php  

include './config.php';



?>

<?php
session_start();
if (!isset($_SESSION['admin_id'])) {

   

?>

<?php 


header("Location: ../Login/Admin.php");

exit;
}

?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Student Login</title>
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
        <ul class="navbar-nav mr-auto" id="navbar-li">
            <li class="nav-item">
                <p style="cursor:pointer; font-size:35px;" class="main_hedding">
                    <a href="student_tt.php" style="cursor: pointer;">Xeduler</a>
                </p>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="#"><img src="img/upes-logo.png" height="45px" href="student.php"></a>
            </li>
        </ul>
    </nav>
    <!--Top navbar end-->

    <br>
    <div class="row">
        <!--Sidebar start-->
        <nav id="sidebar" style="border: 1px solid rgb(174, 223, 255); border-radius:0px 120px 0px 0px;">
            <div class="sidebar-header text-center">
                <div class="row">
                    <div class="col-sm-7 main_hedding">
                        <h1>Hello, [Student Name]</h1>
                    </div>
                    <div class="col-sm-5 mt-4">
                        <i class="fa fa-gear fa-spin" style="font-size:35px"></i>
                    </div>
                </div>
                <br>
            </div>

            <div class="row">
                <div class="col-sm-12 comming_events mx-2">
                    <div class="coming_events_section">
                        <div class="hedding_events">
                            <h5 style="color: black; text-align:center; padding-top:10px;">Coming Events</h5>
                        </div>
                        <!-- Events list -->
                        <div class="card m-2" style="height: 40px;">
                            <div class="row">
                                <div class="col-sm-9 py-1 m-0">
                                    <p style="color:black; padding-left:5px;">Event 01</p>
                                </div>
                                <div class="col-sm-3 my-1" style="color: black;">
                                    <i class="fa fa-close" style="font-size:24px"></i>
                                </div>
                            </div>
                        </div>

                        <div class="card m-2" style="height: 40px;">
                            <div class="row">
                                <div class="col-sm-9 py-1 m-0">
                                    <p style="color:black; padding-left:5px;">Event 02</p>
                                </div>
                                <div class="col-sm-3 my-1" style="color: black;">
                                    <i class="fa fa-close" style="font-size:24px"></i>
                                </div>
                            </div>
                        </div>
                        <!-- Add more events as needed -->
                    </div>
                </div>
            </div>

            <ul class="list-unstyled components text-center">
                <li>
                    <div class="text-center">
                        <a href="#" style="font-size: 15px;">Change Password</a>
                    </div>
                </li>
                <li>
                    <div class="text-center">
                        <a href="logout2.php" style="font-size: 15px;">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        <!--Sidebar end-->


 