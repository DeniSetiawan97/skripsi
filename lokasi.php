<?php
include 'koneksi.php';
?>

<table border="1">
  <tr>
  	<th>No</th>
    <th>Nama Konter</th>
    <th>Layanan Antar Jemput</th>
    <th>Alamat</th>                         
  </tr>
  <?php 
  $batas = 5;
  $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
  $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;	

  $previous = $halaman - 1;
  $next = $halaman + 1;
  
  $data = mysqli_query($conn,"select * from konter_servis");
  $jumlah_data = mysqli_num_rows($data);
  $total_halaman = ceil($jumlah_data / $batas);

  $data_konter = mysqli_query($conn,"select * from konter_servis limit $halaman_awal, $batas");
  $nomor = $halaman_awal+1;
  while($d = mysqli_fetch_array($data_konter)){
    ?>
    <tr>
      <td><?php echo $nomor++; ?></td>                  
	  <td><?php echo $d['nama_konter']; ?></td>
	  <td><?php echo $d['antar_jemput']; ?></td>
	  <td><?php echo $d['alamat']; ?></td>              
                  
    </tr>

    <?php               
  } 
  ?>
  

</table>          

<div class="">
  <?php for ($i=1; $i<=$halaman ; $i++){ ?>
  <a href="?batas=<?php echo $i; ?>"><?php echo $i; ?></a>

  <?php } ?>

</div>