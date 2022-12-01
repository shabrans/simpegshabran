<?php
    include 'connect.php';

    $id_jabatan = $_POST['id_jabatan'];
    $jabatan = $_POST['jabatan'];
    $gaji = $_POST['gaji'];

    if (empty($id_jabatan)){
        $sql = 'INSERT INTO jabatan VALUE ("", "'.$jabatan.'", "'.$gaji.'")';
    } else {
        $sql = "UPDATE jabatan SET jabatan='$jabatan', gaji='$gaji' WHERE id_jabatan='$id_jabatan'";
    }

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header('Location: jabatan.php');
    } else {
        if (empty($id_jabatan)){
            echo 'Inserted Failed.';
        } else {
            echo 'Update Failed.';
        }
        
    }
?>