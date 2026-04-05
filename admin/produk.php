
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
    <title>Document</title>
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
                <a href="#produk">Produk</a>
            </li>
        </ul>
    </nav>
    <div class="container">
        <h1>List data produk</h1>
        <a href="upload.php" class="btn-red" style="width: 120px;">Upload Produk</a>
        <table border="1" cellspacing="0">
            <thead>
                <tr>
                    <th width="60px">No</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Gambar</th>
                    <th width="150px">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $no = 1 ;
                    $produk = mysqli_query($koneksi,"select * from produk order by product_id desc");
                    if(mysqli_num_rows($produk) >0 ){
                    while ($row = mysqli_fetch_array($produk)) {
                ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $row['product_name'] ?></td>
                    <td>Rp.<?php echo $row['product_harga'] ?></td>
                    <td><img src="assets/<?php echo $row['product_gambar'] ?>"></td>
                    <td style="justify-content: center; text-align: center;">
                        <a  class="btn-red" href="hapus.php?idp=<?php  echo $row['product_id'] ?>" onclick="return confirm('Yakin ingin dihapus ?')">Hapus</a>
                    </td>
                </tr>
                <?php }}else{ ?>
                    <tr>
                        <td colspan="5">Tidak ada Data</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

    </div>
</body>
</html>