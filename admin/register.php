<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xeduler Admin's Login</title>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
    margin: 0;
    padding: 0;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #f0f2f5; 
}

.container-fluid {
    height: 100vh;
    display: flex;
}

.img-fluid {
    width: 70%; 
    height: 100vh;
    object-fit: cover;
}

.form-container {
    width: 30%; 
    height: 100vh;
    background: rgba(255, 255, 255, 0.85);
    padding: 2rem; 
    border-radius: 20px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    display: flex;
    flex-direction: column;
    justify-content: center;
    position: relative; 
}

.text-gradient {
    font-size: 3rem; 
    background: -webkit-linear-gradient(#4477f4, #00AEEF);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    text-shadow: 0px 0px 5px rgba(0, 0, 0, 0.2);
}

form .form-control {
    height: 55px; 
    padding-left: 20px;
    font-size: 18px;
    color: #555;
    background-color: rgba(255, 255, 255, 0.85); 
    box-shadow: inset 0px 0px 5px rgba(0, 0, 0, 0.1);
}

form .btn-outline-primary {
    border-color: #00AEEF;
    color: #010101;
    font-size: 18px;
    font-weight: bold;
}

form .btn-outline-primary img {
    height: 20px;
    margin-right: 10px;
}

form .text-muted {
    font-size: 0.9rem;
}

form .text-muted:hover {
    text-decoration: underline;
}

    </style>

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
                    <h4 class="text-secondary mb-4">Admin's Registration</h4>
                </div>
                <form class="w-100" method="POST" action="./php/register_admin.php">
                    <div class="form-group">
                        <input type="text" class="form-control rounded-pill shiny-border" name="username" id="username" placeholder="Username: usernme12" required>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control rounded-pill shiny-border" name="email" id="email" placeholder="Email: example@sltc.ac.lk" required>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control rounded-pill shiny-border" name="password" id="password" placeholder="Password: **********" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block rounded-pill shiny-button mb-3">SUBMIT</button>
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
