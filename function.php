<?php
$conn = mysqli_connect("localhost", "root", "", "php_dasar");

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    if(!$result){
        echo mysqli_error($conn);
        // die;
    }
    $books = [];
    while ($book = mysqli_fetch_assoc($result)) {
        $books[] = $book;
    }
    return $books;
}

function search($keyword){
    $query = "SELECT * FROM books WHERE
        title LIKE '%$keyword%' OR
        author LIKE '%$keyword%'
    ";
    return query($query);

}

function insert($data)
{
    global $conn;
    $title = htmlspecialchars($data["title"]);
    $author = htmlspecialchars($data["author"]);
    $cover = htmlspecialchars($data["cover"]);

    $query = "INSERT INTO books VALUES (
        '',
        '$title',
        '$author',
        '$cover'
        )";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function update($data){
    global $conn;
    $id = htmlspecialchars($data["id"]);
    $title = htmlspecialchars($data["title"]);
    $author = htmlspecialchars($data["author"]);
    $cover = htmlspecialchars($data["cover"]);

    $query = "UPDATE books SET 
        title = '$title',
        author = '$author',
        cover = '$cover'
        WHERE id = $id ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapus($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM books WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function flash($status, $message)
{
    echo "
            <div class='container'>
            <div class='alert alert-success alert-dismissible fade show' role='alert'>
            <strong>$status!</strong>  $message.
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            </div>
        ";
    return;
}

function get($id){
    global $conn;
    $book = [];
    $result = mysqli_query($conn, "SELECT * FROM books WHERE id = $id");
    $book[] = mysqli_fetch_assoc($result);
    if (!count($book)){
        echo"
    <script>
    alert('failed delete');
    document.location.href='index.php';
    </script>
    ";
    return;
    }
    return $book;
}

function register($data) : int {
    global $conn;
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $confirmPassword = mysqli_real_escape_string($conn, $data["password2"]);

    if($password !== $confirmPassword){
        return -500;
    }

    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

    if(mysqli_fetch_assoc($result)){
        return -501;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);
    
    $query = "INSERT INTO users VALUES (
        '',
        '$username',
        '$password'
    )";
    
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
