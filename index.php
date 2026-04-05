<?php
include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="sty.css" />
    <title>Marketplace</title>
  </head>
  <body>
    <header>
      <div class="top">
        <h2>NAME BRAND</h2>
        <div class="btn">
          <a style="text-decoration: none;" href="admin/login.php"><button class="btn-red">Admin</button></a>
        </div>
      </div>
    </header>
    <div class="container">
      <nav>
        <div class="slideshow-container">
          <?php
          $banner = mysqli_query($koneksi,"select * from promosi order by id desc");
          if(mysqli_num_rows($banner) >0 ){
          while ($row = mysqli_fetch_array($banner)) {
          ?>
          <div class="mySlides banner">
            <img src="admin/banner/<?php echo $row['gambar'] ?>" />
          </div>
          <?php }} ?>
        </div>
        <div class="store">
          <img src="banner_new - copy.jpg" />
          <div class="name">
            <h2>NAME BRAND</h2>
            <h7>Tagline</h7>
          </div>
        </div>
        <div class="desk">
          <h3>Deskripsi Toko</h3>
          <?php
          $tampil = mysqli_query($koneksi,"SELECT * FROM `info_toko` order by 'id' desc");
          $data1 = mysqli_fetch_array($tampil)
          ?>
          <div>
          <p><?= $data1['deskripsi'] ?></p>
          </div>
        </div>
      </nav>
      <article>
        <h3>Produk</h3>
        <table>
          <?php
          $produk = mysqli_query($koneksi,"select * from produk order by product_id desc");
          if(mysqli_num_rows($produk) >0 ){
          while ($row = mysqli_fetch_array($produk)) {
          ?>
          <tr>
            <td><img src="admin/assets/<?php echo $row['product_gambar'] ?>" /></td>
            <td><?php echo $row['product_name'] ?></td>
            <td>Rp.<?php echo $row['product_harga'] ?></td>
          </tr>
          <?php }}else{ ?>
            <tr>
              <td colspan="5">Tidak ada Produk</td>
            </tr>
          <?php } ?>
        </table>
      </article>
      <div class="contact">
        <h3>Hubungi</h3>
        <div class="cct">
          <a href="#"
            ><button style="background-color: #06D001;">
              <img src="WhatsApp.png">
              <h3>0812344567889</h3>
            </button>
          </a>
          <a href="#"
            ><button style="background-color: #ff0c55;">
              <img src="ig.png">
              <h3>@instagramyou</h3>
            </button></a
          >
          <a href="#"
            ><button style="background-color: #028dff;">
              <img src="fb.png">
              <h3>Name Facebook</h3>
            </button></a
          >
        </div>
      </div>
      <footer>
        <p>© 2024Marketplace. All rights reserved.</p>
      </footer>
    </div>
    <script src="script.js"></script>
  </body>
</html>
