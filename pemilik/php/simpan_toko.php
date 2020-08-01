<?php
// Start the session
session_start();
?>
<?php
    include "../../koneksi.php"; 

    $id_user=$_SESSION['id_user'];
    //echo $_SESSION['id_user'];
    
    $nama_konter    = $_POST['nama_konter'];
    //echo $_POST['nama_konter'];
    $antar_jemput   = $_POST['antar_jemput'];
    //echo $_POST['antar_jemput'];
    $detail_konter  = $_POST['detail_konter'];
    //echo $_POST['detail_konter'];
    $longtitude     = $_POST['longtitude'];
    //echo $_POST['longtitude'];
    $latitude       = $_POST['latitude'];
    //echo $_POST['latitude'];

    if(isset($_POST['submit'])) {
    $query = mysqli_query($conn, "INSERT INTO konter_servis VALUES
    (NULL,'$id_user','$nama_konter','$antar_jemput','$detail_konter','$longtitude','$latitude')");

    // Show message when user added
    echo "<script>alert('Data Berhasil Ditambah !');document.location.href='../toko.php'</script>/n";
    }
?>