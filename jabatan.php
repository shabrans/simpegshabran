<?php include 'connect.php'; ?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIMPEG | Jabatan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <style>
        .tambah{
            margin-top:20px;
        };
    </style>
  </head>
  <body>
    <?php include 'header.php'; ?>

    <div class = "container">
        <h1>Jabatan</h1>
        <?php if (!empty($_SESSION['username'])) { ?>
            <a href="formJabatan.php" class="tambah btn btn-sm btn-success mb-3">Tambah</a>
        <?php } ?>
        <table class="table">
            <thead class="table-light">
                <tr>
                    <th>Jabatan</th>
                    <!-- <th>Nama</th> -->
                    <th>Gaji Pokok</th>
                    <!-- <th>Alamat</th> -->
                    <?php if (!empty($_SESSION['username'])) { ?>
                        <th>Aksi</th>
                    <?php } ?>
                </tr>
            </thead>
            <tbody>
            <?php
                // $sql = 'SELECT * FROM jabatan JOIN pegawai ON jabatan.id_jabatan = pegawai.id_jabatan';
                $sql = 'SELECT * FROM jabatan';

                $query = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_object($query)) {
            ?>

                <tr>
                <td><?php echo $row->jabatan; ?></td>
                    <!-- <td><?php echo $row->nama; ?></td> -->
                    <td><?php echo "Rp." .number_format($row->gaji, 0, '', '.') ; ?></td>
                    <!-- <td><?php echo $row->alamat; ?></td> -->
                    <?php if (!empty($_SESSION['username'])) { ?>
                        <td> 
                            <a href="deleteJabatan.php?id_jabatan=<?php echo $row->id_jabatan; ?> " class="btn btn-sm btn-danger" 
                            onclick="return confirm('apakah anda yakin ingin menghapus data?');">HAPUS</a>
                            <a href="formJabatan.php?id_jabatan=<?php echo $row->id_jabatan; ?> " class="btn btn-sm btn-warning">UBAH</a>
                        </td>
                    <?php } ?>
                </tr>

            <?php
                } if (mysqli_num_rows($query) == 0) {
                    echo '<tr><td colspan="5" class="text-center">Tidak ada data.</td></tr>';
                }
            ?>
            </tbody>
        </table>
        </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
  </body>
</html>