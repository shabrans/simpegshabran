<?php
    include 'connect.php';

    $username = $_GET['username'];

    $sql = 'DELETE FROM pengguna WHERE username = "'.$username.'"';

    $result = mysqli_query($conn, $sql);

    if ($result){
        header('location: pengguna.php');
    } else {
        echo 'Deleted Failed';
    }
?>