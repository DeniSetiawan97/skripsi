

<?php 
 
    include '../../koneksi.php';
    $id_konter		= $_POST['id_konter'];
    $nama_konter    = $_POST['nama_konter'];
    $antar_jemput	= $_POST['antar_jemput'];
    $detail_konter	= $_POST['detail_konter'];
    $longtitude		= $_POST['longtitude'];
    $latitude		= $_POST['latitude']; 
 
    //perintah sql untuk menyimpan ke database
    $sql = "UPDATE konter_servis SET 
    nama_konter='$nama_konter', antar_jemput='$antar_jemput', detail_konter='$detail_konter', longtitude ='$longtitude', latitude='$latitude' 
    WHERE id_konter='$id_konter'";
     
    $que = mysqli_query($conn, $sql);  
    //peyimpanan
    
    
?>