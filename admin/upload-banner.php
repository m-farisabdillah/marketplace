<?php
include "session.php";
include "../koneksi.php";
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
    <nav>
        <ul>
            <li>
                <a href="index.php">Home</a>
            </li>
            <li>
                <a href="deskripsi.php">Deskripsi</a>
            </li>
            <li>
                <a href="produk.php">Produk</a>
            </li>
        </ul>
    </nav>
    <div class="container">
        <h1>Tambah Papan Promosi Baru</h1>
        <div class="box">
            <h4>Rekomendasi ukuran 1200 x 600 px</h4>
            <form action="" method="POST" enctype="multipart/form-data">
                <input type="file" name="gambar" class="input" required>
                <input type="submit" name="submit" value="submit" class="btn-red" required>
            </form>
			<?php 
            if(isset($_POST['submit'])) {

                $targetDir = "banner/";
                $file_name=$_FILES['gambar']['name'];
                move_uploaded_file($_FILES['gambar']['tmp_name'],$targetDir.$file_name);

                $query = mysqli_query($koneksi, "insert into promosi (gambar) values ('$file_name')");

                if ($query) {
                    echo "<script>
                            alert('File Gagal Diupload');
                            document.location='upload-banner.php';
                        </script>";
                } else {
                    echo "<script>
                            alert('File Berhasil Diupload');
                            document.location='index.php';
                        </script>";
                }
            }				
            ?>
        </div>
    </div>
</body>
</html>