<?php
	include "../../koneksi.php";
	$id = $_GET['id_konter'];
	$query = "DELETE FROM konter_servis WHERE id_konter = '$id'";
	$hsl = mysqli_query($conn, $query);
	if (!$hsl) {
		echo "<script>alert('Gagal Hapus ".mysqli_error($conn)."');
				self.history.back(); </script>";
	} else {
		echo "<script>alert('Data Berhasil Dihapus !');document.location.href='../toko.php'</script>/n";
	}			
?>
