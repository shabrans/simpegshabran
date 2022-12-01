<?php include 'connect.php'; 

    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $sql = 'SELECT * from pengguna WHERE username = "'.$username.'" AND password = "'.$password.'"';

    $query = mysqli_query($conn, $sql);

    if (mysqli_num_rows($query)){
        $row = mysqli_fetch_object($query);
        $_SESSION['username'] = $row->username;
        
    }

    header('location: pegawai.php');

    

?>
