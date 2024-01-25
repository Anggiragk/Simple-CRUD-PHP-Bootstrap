<?php
require 'function.php';

if (isset($_POST["submit"])) {
    if(tambah($_POST)>0){
        echo "
        <div class='container'>
        <div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>Success!</strong> insert new data.
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>
        </div>
        ";
    }else{
        echo "
        <div class='container'>
        <div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>Success!</strong> insert new data.
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>
        </div>
        ";
    }
}

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Insert</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
    <h1>Insert New</h1>
    <form action="" method="post">
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Title..." required>
        </div>
        <div class="mb-3">
            <label for="author" class="form-label">Author</label>
            <input type="text" class="form-control" id="author" name="author" placeholder="Author..." required>
        </div>
        <div class="mb-3">
            <label for="cover" class="form-label">Cover</label>
            <input type="text" class="form-control" id="cover" name="cover" placeholder="Cover..." required>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        <a href="index.php"><span class="btn btn-warning" name="submit">Dashboard</span></a>

        </div>
    </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>