<?php
// Start the session
session_start();
?>
<?php
    include "../../koneksi.php"; 

    $id_user=$_SESSION['id_user'];
    //echo $_SESSION['id_user'];
    
    $nama_konter    = $_POST['nama_konter'];
    $antar_jemput   = $_POST['antar_jemput'];
    $no_wa          = $_POST['no_wa'];
    $alamat         = $_POST['alamat'];
    $detail_konter  = $_POST['detail_konter'];
    $latitude       = $_POST['latitude'];
    $longitude      = $_POST['longitude'];

    if(isset($_POST['submit'])) {
    $query = mysqli_query($conn, "INSERT INTO konter_servis VALUES
    (NULL,'$id_user','$nama_konter','$antar_jemput','$no_wa','$alamat','$detail_konter','$latitude','$longitude')");

    echo "<script>alert('Data Berhasil Ditambah !');document.location.href='../toko.php'</script>/n";
    }
?>