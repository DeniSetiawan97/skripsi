

<?php 
 
    include '../../koneksi.php';

    $id		= $_POST['id'];
    $nama_konter    = $_POST['nama_konter'];
    $antar_jemput	= $_POST['antar_jemput'];
    $detail_konter	= $_POST['detail_konter'];
    $longtitude		= $_POST['longtitude'];
    $latitude		= $_POST['latitude']; 

    if (isset($_POST['update'])){
        $query=mysqli_query($conn, "UPDATE konter_servis SET 
        nama_konter     ='$nama_konter', 
        antar_jemput    ='$antar_jemput', 
        detail_konter   ='$detail_konter', 
        longtitude      ='$longtitude', 
        latitude        ='$latitude' 
        WHERE id_konter='$id'") or die(mysqli_error);
          //  echo "<script>alert('Berhasil Update !!!');document.location.href='../toko.php'</script>/n";                                   
            
            exit;
        } 
    
    
?>