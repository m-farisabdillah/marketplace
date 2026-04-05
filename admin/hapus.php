<?php 
	
	include '../koneksi.php';

	if(isset($_GET['idk'])){
		$delete = mysqli_query($koneksi, "DELETE FROM produk WHERE product_id = '".$_GET['idk']."' ");
		echo '<script>window.location="admin.php"</script>';
	}

	if(isset($_GET['idp'])){
		$produk = mysqli_query($koneksi, "SELECT product_gambar FROM produk WHERE product_id = '".$_GET['idp']."' ");
		$p = mysqli_fetch_object($produk);

		unlink('./assets/'.$p->product_gambar);

		$delete = mysqli_query($koneksi, "DELETE FROM produk WHERE product_id = '".$_GET['idp']."' ");
		echo '<script>window.location="produk.php"</script>';
	}

	if(isset($_GET['hps'])){
		$spnd = mysqli_query($koneksi, "SELECT gambar FROM promosi WHERE id = '".$_GET['hps']."' ");
		$h = mysqli_fetch_object($spnd);

		unlink('./banner/'.$h->gambar);

		$delete = mysqli_query($koneksi, "DELETE FROM promosi WHERE id = '".$_GET['hps']."' ");
		echo '<script>window.location="index.php"</script>';
	}

?>