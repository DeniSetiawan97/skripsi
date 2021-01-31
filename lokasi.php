<?php
include "koneksi.php";
$produk = mysqli_query($conn,"select * from konter_servis");
while($row = mysqli_fetch_array($produk)){
	$nama_konter[] = $row['nama_konter'];
	
	$query = mysqli_query($conn,"SELECT AVG(rate) AS jumlah FROM reting WHERE id_konter='".$row['id_konter']."'");
	$row = $query->fetch_array();
	$jumlah_produk[] = round($row['jumlah'],1);
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Membuat Grafik Menggunakan Chart JS</title>
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
</head>
<body>
	<div style="width: 800px;height: 800px">
		<canvas id="myChart"></canvas>
	</div>


	<script>
		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: <?php echo json_encode($nama_konter); ?>,
				datasets: [{
					label: 'Grafik Penjualan',
					data: <?php echo json_encode($jumlah_produk); ?>,
					backgroundColor: 'rgba(255, 99, 132, 0.2)',
					borderColor: 'rgba(255,99,132,1)',
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	</script>
</body>
</html>

<?php

$nilai=3.7143;

$hasil=round($nilai,1);

echo"$nilai<br>";

echo"$hasil";

?>