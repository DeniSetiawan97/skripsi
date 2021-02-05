<?php 
  include 'koneksi.php'; 
?>
<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>    
    <meta name="description" content="Source Code Sistem Informasi Geografis / Geographic Information System (GIS) berbasis web dengan PHP dan MySQL. Studi kasus: lokasi pura di Bali."/>
    <meta name="keywords" content="Sistem, Informasi, geografis, gis, Tugas Akhir, Skripsi, Jurnal, Source Code, PHP, MySQL, CSS, JavaScript, Bootstrap, jQuery"/>
    <meta name="author" content="sarjanakomedi.com"/>
    <link rel="icon" href="favicon.ico"/>
    <link rel="canonical" href="https://sarjanakomedi.com/" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Sistem Informasi Geografis</title>
    <link href="assets/css/solar-bootstrap.min.css" rel="stylesheet"/>
    <link href="assets/css/general.css" rel="stylesheet"/>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>  
    <script src="assets/tinymce/tinymce.min.js"></script> 
    <script>
        tinymce.init({
        selector: "textarea.mce",
            plugins: [
                "advlist autolink lists link image charmap print preview anchor",
                "searchreplace visualblocks code fullscreen",
                "insertdatetime media table contextmenu paste"
            ],
            menubar : false,
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
        });
    </script>
    <script src="assets/js/script.js"></script>
    <script>
    .on {
            color: #f7d106
        }

        .off {
            color: #ddd;
        }
    </script>
  </head>
  <body>
    <nav class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">GIS</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            
            <li><a href="map_konter.php"><span class="glyphicon glyphicon-map-marker"></span>Persebaran Konter</a></li>
            <li><a href="tempat_list.php"><span class="glyphicon glyphicon-list-alt"></span> Daftar Konter</a></li>            
            <li><a href="login/login.php"><span class="glyphicon glyphicon-user"></span> Login</a></li>
                           
          </ul>          
        </div>
      </div>
    </nav>
    <div class="container">
        <div class="page-header">
            <h1>Tempat</h1>
        </div>
        <div class="panel panel-default">        
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr class="nw">
                            <th>No</th>
                            <th>Nama Konter</th>
                            <th>Layanan Antar Jemput</th>
                            <th>Rating</th>
                            <th>Alamat</th>
                            <th>Aksi</th>                
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                          $batas = 10;
                          $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
                          $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;	
                  
                          $previous = $halaman - 1;
                          $next = $halaman + 1;
                          
                          $data = mysqli_query($conn,"select * from konter_servis");
                          $jumlah_data = mysqli_num_rows($data);
                          $total_halaman = ceil($jumlah_data / $batas);
                  
                          $data_konter = mysqli_query($conn,"
                          select konter_servis.id_konter,konter_servis.nama_konter,konter_servis.antar_jemput,konter_servis.alamat,AVG(rate) as rata
                          from konter_servis
                          LEFT JOIN reting on reting.id_konter=konter_servis.id_konter 
                          group by konter_servis.id_konter limit $halaman_awal, $batas");
                          $nomor = $halaman_awal+1;
                          while($d = mysqli_fetch_array($data_konter)){
                        ?>
                         
                          <tr>
                          <?php
                            
                            echo "<td>".$nomor++."</td>";
                            echo "<td>".$d['nama_konter']."</td>"
                                ."<td>".$d['antar_jemput']."</td>"
                                ."<td>".round($d['rata'],1)."</td>"
                                ."<td>".$d['alamat']."</td>"
                                ."<td>
                                  <a href='detail_konter.php?id_konter=".$d['id_konter']."' class='btn btn-success'>Lihat detail</a>
                                </td>";
                            echo "</tr>";
                            
                          ?>
                          </tr>
                          <?php
                        }
                        ?>
                      </tbody>
                </table>
            </div>
        </div>
        <nav>
          <ul class="pagination justify-content-center">
            <li class="page-item">
              <a class="page-link" <?php if($halaman > 1){ echo "href='?halaman=$previous'"; } ?>>Previous</a>
            </li>
            <?php 
            for($x=1;$x<=$total_halaman;$x++){
              ?> 
              <li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
              <?php
            }
            ?>				
            <li class="page-item">
              <a  class="page-link" <?php if($halaman < $total_halaman) { echo "href='?halaman=$next'"; } ?>>Next</a>
            </li>
          </ul>
        </nav>
    </div>


    <footer class="footer bg-primary">
      <div class="container">
        <p>Copyright &copy; <?=date('Y')?> Deni Setiawan <em class="pull-right">7 Desember 2020</em></p>
      </div>
    </footer>
</body>
</html>