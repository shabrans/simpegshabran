<?php 
    include 'header.php';
    include 'connect.php';

    $act = 'add';
    
    if(!empty($_GET['id_jabatan'])) {
        $sql = 'SELECT * FROM jabatan WHERE id_jabatan="'.$_GET['id_jabatan'].'"';
        
        $query = mysqli_query($conn, $sql);
   
        if(mysqli_num_rows($query)) {
            $act = 'edit';

            $row = mysqli_fetch_object($query);
        }
    }
?>

<h1 class="mt-3 mb-3 container">Form Jabatan</h1>
<form action="saveJabatan.php" method="POST" class="container" >

    <div class="mb-3">
        <label class="form-label">Jabatan</label>
        <input type="text" class="form-control" name="jabatan" placeholder="Jabatan" value="<?php if ($act == 'edit') echo $row->jabatan; ?>"
            required>
        <input type="hidden" name="id_jabatan" value="<?php if ($act == 'edit') echo $row->id_jabatan; ?>">
    </div>

    <div class="mb-3">
        <label class="form-label">Gaji</label>
        <input type="text" class="form-control" name="gaji" placeholder="Gaji" value="<?php if ($act == 'edit') echo $row->gaji; ?>"
            required>
        <input type="hidden" name="id_jabatan" value="<?php if ($act == 'edit') echo $row->id_jabatan; ?>">
    </div>
    
    <div class="mb-3">
        <input type="submit" value="Simpan" class="btn btn-sm btn-success">
        <input type="submit" value="Batal" class="btn btn-sm btn-warning" href="jabatan.php">
    </div>
</form>
