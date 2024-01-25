<?php
require 'function.php';
if (isset($_POST["register"])){
    if(register($_POST)>0){
        flash("successfully", "register new user");
    }elseif(register($_POST)=== -500) {
        flash("failed", "password not same");
    }elseif(register($_POST)=== -501) {
        flash("failed", "username already registered");
    }else{
        flash("failed", mysqli_error($conn));
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row border border-3 border-success rounded-pill bg-body">
            <div class="col-8 mx-auto">
                <h1 class="text-center">Registration Form</h1>
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="username" class="form-label fw-bold">username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="username..." required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label fw-bold">password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="password..." required>
                    </div>
                    <div class="mb-3">
                        <label for="password2" class="form-label fw-bold">confirm password</label>
                        <input type="password" class="form-control" id="password2" name="password2" placeholder="confirm password..." required>
                    </div>
                    <div class="col-12 py-3">
                        <button type="submit" class="btn btn-primary" name="register">Register</button>
                        <a href="login.php"><span>already have an account ?</span></a>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>