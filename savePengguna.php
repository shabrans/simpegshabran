<?php
    include 'connect.php';

    $username = $_POST['username'];
    $password = md5($_POST['password']);

    if (!empty($username)){
        $sql = 'INSERT INTO pengguna VALUE ("'.$username.'", "'.$password.'")';
    } else {
        $sql = "UPDATE pengguna SET username='$username', password='$password' WHERE username='$username'";
    }

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header('Location: pengguna.php');
    } else {
        if (empty($username)){
            echo 'Inserted Failed.';
        } else {
            echo 'Update Failed.';
        }
        
    }
?>