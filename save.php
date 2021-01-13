<?php

include 'koneksi.php';

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['action'])){

    // ambil data dari formulir
    $nohp = $_POST['nohp'];

    // buat query
    $sql = "INSERT INTO hp (nohp) VALUE ($nohp)";
    $query = mysqli_query($conn, $sql);

    // apakah query simpan berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman index.php dengan status=sukses
        header('Location: index.php?status=sukses');
    } else {
        // kalau gagal alihkan ke halaman indek.php dengan status=gagal
        header('Location: index.php?status=gagal');
    }


} else {
    die("Akses dilarang...");
}

?>