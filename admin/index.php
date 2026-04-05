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
                <a href="#home">Home</a>
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
        <div class="isi">
            <h1>Papan Promosi</h1>
            <a href="upload-banner.php" class="btn-red">Add Banner</a>
            <table border="1" cellspacing="0" style="margin-top:20px;">
                <thead>
                    <tr>
                        <th width="60px">No</th>
                        <th width="200px">Gambar</th>
                        <th width="150px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $no = 1 ;
                        $banner = mysqli_query($koneksi,"select * from promosi order by id desc");
                        if(mysqli_num_rows($banner) >0 ){
                        while ($row = mysqli_fetch_array($banner)) {
                    ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><img style="width: 150px;" src="banner/<?php echo $row['gambar'] ?>"></td>
                        <td style="justify-content: center; text-align: center;">
                            <a class="btn-red" href="hapus.php?hps=<?php  echo $row['id'] ?>" onclick="return confirm('Yakin ingin dihapus ?')">Hapus</a>
                        </td>
                    </tr>
                    <?php }} ?>
                </tbody>
            </table>
        </div>
        <a href="../index.php" type="button" class="btn-red" style="width: 80px; text-align: center;">Kembali ke Toko</a>
    </div>
</body>
</html>