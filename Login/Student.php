<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xeduler Students Login</title>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="./assests/css/style.css">
</head>
<body>
    <div class="container-fluid vh-100 d-flex">
        <div class="row w-100 no-gutters">
            <!-- Left Image Section -->
            <div class="col-lg-7 d-none d-lg-block p-0">
                <img src="images/img01.png" class="img-fluid h-100 w-100" alt="Campus Image">
            </div>
            
            <!-- Right Form Section -->
            <div class="col-lg-5 d-flex flex-column justify-content-center align-items-center bg-white p-4 p-lg-5">
                <div class="text-center">
                    <div class="d-flex justify-content-center align-items-center mb-4">
                        <img src="images/logo01.svg" alt="SLTC Logo" style="width: 120px; margin-right: 15px;">
                        <h2 class="font-weight-bold m-0">SLTC Research University</h2>
                    </div>
                    <h1 class="font-weight-bold text-gradient display-4">Xeduler</h1>
                    <h4 class="text-secondary mb-4">Student Login</h4>
                </div>
                <form action="./php/student_login.php" method="POST" class="w-100">
                    <div class="form-group">
                        <input type="text" name="login" class="form-control rounded-pill shiny-border" id="login" placeholder="example@sltc.ac.lk" required>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control rounded-pill shiny-border" id="password" placeholder="**********" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block rounded-pill shiny-button mb-3">SUBMIT</button>
                    <button type="button" class="btn btn-outline-primary btn-block mt-3 rounded-pill shiny-border">
                    <svg xml:space="preserve" style="enable-background:new 0 0 512 512;" viewBox="0 0 512 512" y="0px" x="0px" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg" id="Layer_1" width="20" version="1.1">
                            <path d="M113.47,309.408L95.648,375.94l-65.139,1.378C11.042,341.211,0,299.9,0,256
                                c0-42.451,10.324-82.483,28.624-117.732h0.014l57.992,10.632l25.404,57.644c-5.317,15.501-8.215,32.141-8.215,49.456
                                C103.821,274.792,107.225,292.797,113.47,309.408z" style="fill:#FBBB00;"></path>
                            <path d="M507.527,208.176C510.467,223.662,512,239.655,512,256c0,18.328-1.927,36.206-5.598,53.451
                                c-12.462,58.683-45.025,109.925-90.134,146.187l-0.014-0.014l-73.044-3.727l-10.338-64.535
                                c29.932-17.554,53.324-45.025,65.646-77.911h-136.89V208.176h138.887L507.527,208.176L507.527,208.176z" style="fill:#518EF8;"></path>
                            <path d="M416.253,455.624l0.014,0.014C372.396,490.901,316.666,512,256,512
                                c-97.491,0-182.252-54.491-225.491-134.681l82.961-67.91c21.619,57.698,77.278,98.771,142.53,98.771
                                c28.047,0,54.323-7.582,76.87-20.818L416.253,455.624z" style="fill:#28B446;"></path>
                            <path d="M419.404,58.936l-82.933,67.896c-23.335-14.586-50.919-23.012-80.471-23.012
                                c-66.729,0-123.429,42.957-143.965,102.724l-83.397-68.276h-0.014C71.23,56.123,157.06,0,256,0
                                C318.115,0,375.068,22.126,419.404,58.936z" style="fill:#F14336;"></path>
                            
                            </svg>  Google
                    </button>
                    <div class="text-center mt-4">
                        <div class="row justify-content-center">
                            <div class="col-auto">
                                <a href="./Teacher.php" class="btn btn-primary rounded-pill">Lecturer's Login</a>
                            </div>
                            
                            <div class="col-auto">
                                <a href="./Admin.php" class="btn btn-primary rounded-pill">Admin's Login</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
