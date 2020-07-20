<?php
	include "../koneksi.php";
	$id = $_GET['id_user'];
	$query = "DELETE FROM user WHERE id_user = '$id'";
	$hsl = mysqli_query($conn, $query);
	if (!$hsl) {
		echo "<script>alert('Gagal Hapus ".mysqli_error($conn)."');
				self.history.back(); </script>";
	} else {
		echo "<script>alert('Data Berhasil Dihapus !');document.location.href='table.php'</script>/n";
	}			
?>
