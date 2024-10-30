<?php include './header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="./css/prof_Style.css" rel="stylesheet">
</head>
<body>
    

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h2>Update Your Profile</h2>
            <p style="color:black">Create an account to manage your schedule.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-body">

                <form action="./API/profile.php"  method="post" >


<div class="form-row">
    <div class="form-group col-md-6">
        <label for="inputtext1">Frist Name</label>
        <input type="text" class="form-control" name="fname" placeholder="Your Frist Name">
        <input type="hidden" name="user_id" value="<?php echo $admin_id; ?>">
    </div>
    <div class="form-group col-md-6">
        <label for="inputtext1">Last Name</label>
        <input type="text" class="form-control" name="lname" placeholder="Your second Name">
    </div>
</div>


<div class="form-row">
    <div class="form-group col-md-6">
        <label for="inputEmail4">Email</label>
        <input type="email" class="form-control" name="email" id="inputEmail4" placeholder="21ug1178@sltc.ac.lk">
    </div>
    <div class="form-group col-md-6">
        <label for="inputPassword4">Password</label>
        <input type="password" class="form-control" name="password" id="inputPassword4" placeholder="*********">
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="inputAddress">Address</label>
        <input type="text" class="form-control" name="address" id="inputAddress" placeholder="123 Street">
    </div>
    <div class="form-group col-md-6">
        <label for="inputCity">City</label>
        <input type="text" class="form-control" name="city" id="inputCity" placeholder="City">
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="inputAddress2">Address 2</label>
        <input type="text" class="form-control" name="address_2" id="inputAddress2" placeholder="123 Street ">
    </div>
    <div class="form-group col-md-6">
        <label for="inputCity">City</label>
        <input type="text" class="form-control" name="city2" id="inputCity" placeholder="Living City">
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-4">
        <label for="inputState">District</label>
        <select id="inputState" name="district" class="form-control">
            <option selected>Choose...</option>
            <option>Ampara District</option>
            <option>Anuradhapura District</option>
            <option>Badulla District</option>
            <option>Batticaloa District</option>
            <option>Colombo District</option>
            <option>Galle District</option>
            <option>Gampaha District</option>
            <option>Hambantota District</option>
            <option>Jaffna District</option>
            <option>Kalutara District</option>
            <option>Kandy District</option>
            <option>Kegalle District</option>
            <option>Kilinochchi District</option>
            <option>Kurunegala District</option>
            <option>Mannar District</option>
            <option>Matale District</option>
            <option>Matara District</option>
            <option>Monaragala District</option>
            <option>Mullaitivu District</option>
            <option>Nuwara Eliya District</option>
            <option>Polonnaruwa District</option>
            <option>Puttalam District</option>
            <option>Ratnapura District</option>
            <option>Trincomalee District</option>
            <option>Vavuniya District</option>
        </select>
    </div>
    <div class="form-group col-md-4">
        <label for="inputState">Province</label>
        <select id="inputState" name="province" class="form-control">
            <option selected>Choose...</option>
            <option>Central Province</option>
            <option>Eastern Province</option>
            <option>Northern Province</option>
            <option>Southern Province</option>
            <option>Western Province</option>
            <option>North Western Province</option>
            <option>North Central Province</option>
            <option>Uva Province</option>
            <option>Sabaragamuwa Province</option>
        </select>
    </div>
    <div class="form-group col-md-2">
        <label for="inputZip">Zip</label>
        <input type="number" name="zip" class="form-control" id="inputZip" placeholder="zipcode">
    </div>
</div>

<div class="custom-file  my-3">

    <label class="custom-file-label"  for="customFile">Choose file</label>
    <input type="file" name="file" class="custom-file-input" id="customFile">

</div>

<div class="form-group">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="gridCheck">
        <label class="form-check-label" for="gridCheck">
            Check me out
        </label>
    </div>
</div>
<button type="submit" class="btn btn-primary" name="submit" id="prof-submit">SUBMIT</button>
</form>


                </div>
            </div>
        </div>

    </div>
</div>













<?php include './footer.php'; ?>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        if (window.location.pathname.includes("profile.php")) {
            document.getElementById("profile_show_data").style.display = "block";
            document.getElementById("show_data").style.display = "none";
        }
    });
</script>
</body>
</html>