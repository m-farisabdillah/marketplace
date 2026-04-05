<?php
if(isset($_POST['simpan']))
	{
		include('../koneksi.php');

		$desk = $_POST['desk'];

		$hasil = mysqli_query($koneksi, "update info_toko set deskripsi = '$desk' where 1");
		
		if ($hasil) {
			echo "<script>
				alert('Deskripsi Berhasil Diubah');
				document.location='deskripsi.php';
			</script>";
			} else {
			echo "<script>
				alert('Deskripsi Gagal Diubah');
				document.location='edit.php';
				</script>";
			}
		}
?>