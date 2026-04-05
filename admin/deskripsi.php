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
                <a href="#desk">Deskripsi</a>
            </li>
            <li>
                <a href="produk.php">Produk</a>
            </li>
        </ul>
    </nav>
    <artikel class="container">
        <h1 style="margin-bottom: 20px;" >Deskripsi</h1>
        <?php
        $tampil = mysqli_query($koneksi,"SELECT * FROM `info_toko` order by 'id' desc");
        $data1 = mysqli_fetch_array($tampil)
        ?>
        <tr>
            <td><textarea><?= $data1['deskripsi'] ?></textarea></td>
            <td><a href="edit.php?edit=<?= $data1['id'] ?>"><button class="btn-red" style="margin-top: 20px; border: 0;">Edit</button></a></td>
        </tr>
    </artikel>
</body>
</html>