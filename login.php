<?php
require 'function.php';
session_start();
if(isset($_SESSION["login"])){
    header("Location: index.php");
}

if(isset($_POST["login"])){
    global $conn;
    $username = $_POST["username"];
    $password = $_POST["password"];
    

    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
    if (mysqli_num_rows($result)===1){
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password, $row["password"])){
            $_SESSION["login"] = true; 
            header("Location: index.php");
        }else{
            flash("Failed","wrong username or password");
        }
    }
}


?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row border border-3 border-success rounded-pill bg-body">
            <div class="col-8 mx-auto">
                <h1 class="text-center">Login Form</h1>
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="username" class="form-label fw-bold">username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="username..." required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label fw-bold">password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="password..." required>
                    </div>
                    <div class="col-12 py-3">
                        <button type="submit" class="btn btn-primary" name="login">Login</button>
                        <a href="register.php"><span>Register here </span></a>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>