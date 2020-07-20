<?php
session_start();
include '../koneksi.php';

if (isset($_POST['login'])){
	$username 	= addslashes(trim($_POST['username']));
	$password	= md5($_POST['password']);

	$query = mysqli_query($conn, "SELECT * FROM user WHERE username='$username' AND password='$password'");
	if (mysqli_num_rows($query) == 0) 
	{
		echo "<script>alert('Username atau Password yang Anda masukan salah !!!');document.location.href='login.php'</script>/n";
	}else{
		$row = mysqli_fetch_assoc($query);
		$_SESSION['username']	= $row['username'];
		$_SESSION['level']  	= $row['level'];
		$_SESSION['id_user']	= $row['id_user'];
		
		if($row['level'] == "admin")
		{	
			echo "<script>alert('Selamat Datang Admin !');document.location.href='../admin/dashboard.php'</script>/n";
		}
		else if($row['level'] == "pemilik")
		{
			echo "<script>alert('Welcome To Pemilik !');document.location.href='../pemilik/dashboard.php'</script>/n";
		} 
		elseif($row['level'] == "pengunjung")
		{
			echo "<script>alert('Welcome To Pengunjung !');document.location.href='../pengunjung/index.php'</script>/n";
		}
		else
		{
			echo "<script>alert('Login Gagal !!!');document.location.href='../login/login.php'</script>/n";
		}
	}
}else{
	echo "<script>alert('Anda belum mengisi Form !!!');document.location.href='../login/login.php'</script>/n";
}
?>