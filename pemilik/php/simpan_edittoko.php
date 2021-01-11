

<?php 
 
    include '../../koneksi.php';

    $id		        = $_GET['id_konter'];
    $nama_konter    = $_POST['nama_konter'];
    $alamat         = $_POST['alamat'];
    $antar_jemput	= $_POST['antar_jemput'];
    $detail_konter	= $_POST['detail_konter'];
    $latitude		= $_POST['latitude']; 
    $longitude		= $_POST['longitude'];
    

  
        if (isset($_POST['update'])){
          $query=mysqli_query($conn, "UPDATE konter_servis SET
              nama_konter		= '$_POST[nama_konter]',
              alamat		    = '$_POST[alamat]',
              antar_jemput	    = '$_POST[antar_jemput]',
              detail_konter		= '$_POST[detail_konter]',
              latitude	        = '$_POST[latitude]',
              longitude	        = '$_POST[longitude]'              
              where id_konter   = '$id'") or die(mysqli_error);
              echo "<script>alert('Berhasil Update !!!');document.location.href='../toko.php'</script>/n";                                   
              
              exit;
          } 
    
    
?>