<?php
require 'function.php';

//session login
session_start();
if(!$_SESSION["login"]){
   header("Location: login.php");
}

//get all books from db
$books = query("SELECT * FROM books");

//search feature
$keyword = "";
if(isset($_POST["search"])){
   $books = search($_POST["keyword"]);
   $keyword = $_POST["keyword"];
}
?>

<!doctype html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Php Dasar</title>
   <link rel="stylesheet" href="style.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
   <div class="container">
      <a href="index.php" class="text-decoration-none text-dark"><h1>Book List</h1></a>
      <div class="row justify-content-between">
         <div class="col-4">
            <form action="" method="POST" class="d-sm-flex" role="search">
               <input class="form-control me-2" type="search" name="keyword" placeholder="Search" aria-label="Search" value="<?= $keyword; ?>">
               <button class="btn btn-outline-success" type="submit" name="search" autocomplete="off" >Search</button>
            </form>
         </div>
         <div class="col-3 px-4">
            <a href="insert.php?action=Insert"><button type="button" class="btn btn-outline-primary" title="Insert new data">Insert</button></a>
            <a href="logout.php"><button type="button" class="btn btn-outline-danger" title="Logout" onclick="return confirm('Logout ?')">Logout</button></a>
         </div>
      </div>
      <table class="table table-striped table-hover">
         <tr>
            <th>No</th>
            <th>Action</th>
            <th>Title</th>
            <th>Author</th>
            <th>Cover</th>
         </tr>
         <?php $number = 1 ?>
         <?php foreach ($books as $book) : ?>
            <tr class="list-item">
               <td><?= $number++; ?></td>
               <td>
                  <a href="insert.php?action=Update&id=<?= $book["id"]; ?>"><span class="badge text-bg-primary" title="Update data">Update</span></a> |
                  <a href="delete.php?id=<?= $book["id"]; ?>" onclick="return confirm('are you sure ?')"><span class="badge text-bg-danger" title="Delete data">Delete</span></a>
               </td>
               <td><span title="Book tittle"><?= $book["title"]; ?></span></td>
               <td><span title="Book author"><?= $book["author"]; ?></span></td>
               <td>
                  <img src="<?= $book["cover"]; ?>" class="img-thumbnail cover" alt="Cover image" title="cover image">
               </td>
            </tr>
         <?php endforeach;  ?>

      </table>
   </div>


   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
   </script>
</body>

</html>