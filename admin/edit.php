<?php
include "session.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <title>Dashboard-Admin</title>
</head>
<body>
    <header>
      <div class="top">
        <h2>NAME BRAND</h2>
      </div>
    </header>
    <div class="container">
        <h2>Edit Deskripsi Toko</h2>
        <div class="box">
            <?php 
            include "../koneksi.php";
            $id = $_GET['edit'];

            $sql = "SELECT * FROM info_toko WHERE id=$id";
            $query = mysqli_query($koneksi, $sql);
            $tampil = mysqli_fetch_array($query);
            //$edit = mysqli_query($koneksi,"select * from deskripsi order by tanggal desc");
            //if(mysqli_num_rows($edit) >0 ){
            //while ($row = mysqli_fetch_array($edit)) {
            ?>
            <form action="edit-proses.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $tampil['id'] ?>" />
                <tr>
                    <td>Deskripsi</td>
                    <td>
                        <!--<input style="width: 70%; height: 5vh;" type="text" name="desk" value="<?php echo $tampil['deskripsi'] ?>">-->
                        <textarea style="width: 90%; height: 25vh;" type="text" name="desk" ><?php echo $tampil['deskripsi'] ?></textarea>
                    </td>					
                </tr>
                <tr>
                    <td><input class="btn-red" type="submit" value="Simpan" name="simpan" ></td>					
                </tr>            
            </form>
        </div>
    </div>
</body>
</html>