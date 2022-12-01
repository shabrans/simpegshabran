<?php
    // error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
    session_start();
    $hostname = 'localhost';// '127.0.0.1';
    $username = 'root';
    $password = '';
    $dbname = 'simpeg';

    //create connection
    $conn = mysqli_connect($hostname, $username, $password, $dbname); //or die('connection failed');
    
    //test connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    // echo "Connected successfully";
?>