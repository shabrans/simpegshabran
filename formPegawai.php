<?php 
    include 'header.php';
    include 'connect.php';

    $act = 'add';
    
    if(!empty($_GET['id_pegawai'])) {
        $sql = 'SELECT * FROM pegawai WHERE id_pegawai="'.$_GET['id_pegawai'].'"';
        
        $query = mysqli_query($conn, $sql);
   
        if(mysqli_num_rows($query)) {
            $act = 'edit';

            $row = mysqli_fetch_object($query);
        }
    }
?>

<h1 class="mt-3 mb-3 container">Form Pegawai</h1>
<form action="savePegawai.php" method="POST" class="container" >

    <div class="mb-3">
        <label class="form-label">Nama</label>
        <input type="text" class="form-control" name="nama" placeholder="Nama" value="<?php if ($act == 'edit') echo $row->nama; ?>"
            required>
        <input type="hidden" name="id_pegawai" value="<?php if ($act == 'edit') echo $row->id_pegawai; ?>">
    </div>
    <div class="mb-3">
        <label class="form-label">Jenis Kelamin</label>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="jenis_kelamin" value="Pria" id="pria" checked>
            <label class="form-check-label" for="pria">
                Pria
            </label>
            </div>
            <div class="form-check">
            <input class="form-check-input" type="radio" name="jenis_kelamin" value="Wanita" id="wanita"
                <?php if ($act == 'edit' && $row->jenis_kelamin == 'wanita') echo 'checked'; ?>>
            <label class="form-check-label" for="wanita">
                Wanita
            </label>
        </div>
    </div>
    <div class="mb-3">
        <label class="form-label*">Tanggal Lahir</label>
        <input type="date" class="form-control" name="tanggal_lahir" placeholder="Tanggal Lahir" 
            value="<?php if ($act == 'edit') echo $row->tanggal_lahir; ?>"required>
    </div>
    <div class="mb-3">
        <label class="form-label">Alamat</label>
        <textarea class="form-control" name="alamat" rows="3" required><?php if ($act == 'edit') echo $row->alamat; ?></textarea>
    </div>
    <div class="mb-3">
        <label class="form-label">Jabatan</label>
        <select class="form-control" name="id_jabatan" required>

        <?php
            $sql = 'SELECT * FROM jabatan';

            $query = mysqli_query($conn, $sql);

            while ($rows = mysqli_fetch_object($query)) {
        ?>

            <option value="<?php echo $rows->id_jabatan; ?>"
                <?php if ($act == 'edit' && $row->id_jabatan == $rows->id_jabatan) echo 'selected'; ?>><?php echo $rows->jabatan; ?>
            </option>
        
        <?php } ?>

        </select>
    </div>
    <div class="mb-3">
        <input type="submit" value="Simpan" class="btn btn-sm btn-success">
        <input type="submit" value="Batal" class="btn btn-sm btn-warning" href="pegawai.php">
    </div>
</form>
