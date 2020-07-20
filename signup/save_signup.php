<?php

include '../koneksi.php';

if(isset($_POST['action'])){
    $nama       = $_POST['nama'];
    $no_tlp     = $_POST['no_tlp'];
    $email      = $_POST['email'];
    $username   = $_POST['username'];
    $password   = $_POST['password'];
    $level      = $_POST['level'];

    if (strlen($username)>10){
        echo "<script>alert(Username Tidak Boleh dari 10 Karakter !!!);document.location.href='register.php'</script>";
    }else{
        if ($password){
            $sql_get = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
            $num_rows =mysqli_num_rows($sql_get);

            if($num_rows == 0){
                $password = md5 ($password);
                $insert = mysqli_query($conn,"INSERT INTO user VALUES('','$nama','$no_tlp','$email','$username','$password', '$level')");
                if($insert == TRUE){
                    echo "<script>alert('Register Berhasil !!!');document.location.href='../login/login.php'</script>";
                }else{
                    echo "<script>alert('Register Gagal !!!');document.location.href='../signup/signup.php'</script>";
                }
            }else{
                echo "<script>alert('Username Telah Digunakan !!!');document.location.href='../signup/signup.php'</script>";
            }
        }else{
            echo "<script>alert('Password Gagal !!!');document.location.href='../signup/signup.php'</script>";
        }
    }

}else{
    echo "<script>alert('Anda Belum Register !!!');document.location.href='../signup/signup.php'</script>";
}

?>