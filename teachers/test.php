<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Page</title>
</head>
<body>
    <a href="./profile.php">Profile</a>

    <div class="row" id="show_data">
        Upcoming Events
    </div>

    <div class="row" id="profile_show_data">
        Profile Details
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            if (window.location.pathname.includes("test.php")) {
                document.getElementById("profile_show_data").style.display = "none";
                document.getElementById("show_data").style.display = "block";
            }
        });
    </script>
</body>
</html>
