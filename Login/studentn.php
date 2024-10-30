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
                        <input type="text" name="login" class="form-control rounded-pill shiny-border" id="login" placeholder="Email, Username, or User ID" required>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control rounded-pill shiny-border" id="password" placeholder="Password : **********" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block rounded-pill shiny-button mb-3">SUBMIT</button>
                    <button type="button" class="btn btn-outline-primary btn-block mt-3 rounded-pill shiny-border">
                        <img src="images/img02.png" alt="Google Icon" class="mr-2"> Google
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
