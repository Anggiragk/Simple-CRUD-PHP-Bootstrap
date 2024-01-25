<?php
require 'function.php';

//session login
session_start();
if(!$_SESSION["login"]){
    header("Location: login.php");
}

if (isset($_POST["submit"])) {
    if (isset($_POST["insert"])) {
        if (insert($_POST) > 0) {
            flash("save", "successfully");
        } else {
            flash("save ", "failed");
        }
    } elseif (isset($_POST["update"])) {
        if (update($_POST) > 0) {
            flash("update", "successfully");
        } else {
            flash("update ", "failed");
        }
    }
}

//get current book data for update
$book;
if (isset($_GET["id"])) {
    $book = get($_GET["id"])[0];
}



?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $_GET["action"]; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container">
    <div class="row border border-3 border-success rounded-pill bg-body">
        <div class="col-8 mx-auto">
        <h1 class="text-center" ><?= $_GET["action"]; ?> data</h1>
        <form action="" method="post">
            <?php if ($_GET["action"]=="Update") : ?>
                <input type="hidden" name="id" value="<?= $book["id"]; ?>">
                <!-- <input type="hidden" name="id" value="coba"> -->
                <input type="hidden" name="update">
            <?php else : ?>
                <input type="hidden" name="insert">
            <?php endif; ?>
            <div class="mb-3">
                <label for="title" class="form-label fw-bold">Title</label>
                <?php if ($_GET["action"]=="Update") : ?>
                    <input type="hidden" name="id" value="<?= $book["id"]; ?>">
                    <input type="hidden" name="update">
                    <input type="text" class="form-control" id="title" name="title" placeholder="Title..." value="<?= $book["title"]; ?>" required>
                <?php else : ?>
                    <input type="hidden" name="insert">
                    <input type="text" class="form-control" id="title" name="title" placeholder="Title..." required>
                <?php endif; ?>
            </div>
            <div class="mb-3">
                <label for="author" class="form-label fw-bold">Author</label>
                <?php if ($_GET["action"]=="Update") : ?>
                    <input type="text" class="form-control" id="author" name="author" placeholder="Author..." value="<?= $book["author"]; ?>" required>
                <?php else : ?>
                    <input type="text" class="form-control" id="author" name="author" placeholder="Author..." required>
                <?php endif; ?>
            </div>
            <div class="mb-3">
                <label for="cover" class="form-label fw-bold">Cover</label>
                <?php if ($_GET["action"]=="Update") : ?>
                    <input type="text" class="form-control" id="cover" name="cover" placeholder="Cover..." value="<?= $book["cover"]; ?>" required>
                <?php else : ?>
                    <input type="text" class="form-control" id="cover" name="cover" placeholder="Cover..." required>
                <?php endif; ?>

            </div>
            <div class="col-12 py-3">
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                <a href="index.php"><span class="btn btn-warning" name="submit">Dashboard</span></a>
            </div>
        </form>
        </div>
        
    </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>