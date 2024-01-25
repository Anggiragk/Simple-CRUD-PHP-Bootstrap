<?php 
require 'function.php';
$id = $_GET["id"];

if (hapus($id) > 0){
    echo"
    <script>
    alert('success delete');
    document.location.href='index.php';
    </script>
    ";
}else{
    echo"
    <script>
    alert('failed delete');
    document.location.href='index.php';
    </script>
    ";
}

?>