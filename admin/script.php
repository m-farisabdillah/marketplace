<?php
include ".../koneksi.php";

if(isset($_POST['submit'])) {

    $targetDir = "assets/";
    $file_name=$_FILES['fileupload']['name'];
    move_uploaded_file($_FILES['fileupload']['tmp_name'],$targetDir.$file_name);

    mysqli_query($koneksi, "insert into data_file set cloud='$file_name'");

    if ($query) {
        echo "<script>
                alert('File Gagal Diupload');
                document.location='index.php';
            </script>";
    } else {
        echo "<script>
                alert('File Berhasil Diupload');
                document.location='index.php';
            </script>";
    }
}
?>