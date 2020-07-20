<?php
$host = "localhost";
$user = "root";
$pass = "";
$namadb = "sig";

$conn = mysqli_connect($host, $user, $pass, $namadb);
if (!$conn) {
	die("Error".mysqli_connect_error());
}

?>	