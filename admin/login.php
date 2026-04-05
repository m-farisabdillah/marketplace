<?php
session_start();
include "../koneksi.php"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <title>Login-Admin</title>
</head>
<body>
    <form action="" method="POST">
        <table>
            <tr class="login">
                <th>Login</th>
            </tr>
            <tr class="user">
                <td>Username</td>
                <td><input type="text" name="username"></td>
            </tr>
            <tr class="user">
                <td>Password</td>
                <td><input type="password" name="password"></td>
            </tr>
            <tr class="masuk">
                <td><input type="submit" value="login" name="proseslog"></td>
            </tr>
        </table>
    </form>
</body>
</html>

<?php
if(isset($_POST['proseslog'])) {
    $sql=mysqli_query($koneksi,"select * from users where username='$_POST[username]'and password='$_POST[password]'");    $cek=mysqli_num_rows($sql);
    if($cek>0){
        $_SESSION['username']=$_POST['username'];
        echo "<meta http-equiv=refresh content=0;URL='index.php'>";
    }else{
        echo "<p align=center><b> Username dan Password Salah!! </b></p>";
        echo "<meta http-http-equiv=refresh content=2;URL='login.php'>";
    }
}
?>