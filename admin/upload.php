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
    <div class="container">
        <h1>Tambah Produk Baru</h1>
        <div class="box">
            <form action="" method="POST" enctype="multipart/form-data">
                <input type="text" name="nama" class="input" placeholder="Nama Produk" required>
                <input type="text" name="harga" class="input" placeholder="Harga Produk" required>
                <input type="file" name="gambar" class="input" required>
                <input type="submit" name="submit" value="submit" class="btn-red" required>
            </form>
				<?php 
					if(isset($_POST['submit'])){

						// print_r($_FILES['gambar']);
						// menampung inputan dari form
						$nama 		= $_POST['nama'];
						$harga 		= $_POST['harga'];

						// menampung data file yang diupload
						$filename = $_FILES['gambar']['name'];
						$tmp_name = $_FILES['gambar']['tmp_name'];

						$type1 = explode('.', $filename);
						$type2 = $type1[1];

						$newname = 'produk'.time().'.'.$type2;

						// menampung data format file yang diizinkan
						$tipe_diizinkan = array('jpg', 'jpeg', 'png');

						// validasi format file
						if(!in_array($type2, $tipe_diizinkan)){
							// jika format file tidak ada di dalam tipe diizinkan
							echo '<script>alert("Format file tidak diizinkan")</scrtip>';

						}else{
							// jika format file sesuai dengan yang ada di dalam array tipe diizinkan
							// proses upload file sekaligus insert ke database
							move_uploaded_file($tmp_name, './assets/'.$newname);

							$query = mysqli_query($koneksi, "insert into produk (product_name,product_harga,product_gambar) values ('$nama','$harga','$newname')");

							if ($query) {
								echo "<script>
										alert('Tambah Produk Berhasil');
										document.location='produk.php';
									</script>";
							} else {
								echo "<script>
										alert('Tambah Produk Gagal');
										document.location='upload.php';
									</script>";
							}
						}

						
						
					}
				?>
        </div>
    </div>
</body>
</html>