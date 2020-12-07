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
    <script src="assets/js/script.js"></script>
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
            
            <li><a href=".php"><span class="glyphicon glyphicon-map-marker"></span> Tempat</a></li>
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
                            <th>Detail Konter</th>
                            <th>Aksi</th>                
                        </tr>
                    </thead>
                    <?php
                        include "koneksi.php";
                            
                        $query = "SELECT * FROM konter_servis";
                        $hasil	= mysqli_query($conn, $query);
                        if (!$hasil){
                            die("Gagal AMbil Data...");
                        }
                    ?>

                    <tr>
                        <?php
                            $no = 0;
                            while($data = mysqli_fetch_array($hasil)) {
                            $no++;
                            echo "<td>$no</td>";
                            echo "<td>".$data['nama_konter']."</td>"
                                ."<td>".$data['antar_jemput']."</td>"
                                ."<td>".$data['detail_konter']."</td>"
                                ."<td>
                                    <a href='detail_konter.php' class='btn btn-success'>Lihat detail</a>
                                </td>";
                            echo "</tr>";
                            }
                        ?>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    
    <footer class="footer bg-primary">
      <div class="container">
        <p>Copyright &copy; <?=date('Y')?> SarjanaKomedi.com <em class="pull-right">13 Oktober 2017</em></p>
      </div>
    </footer>
</body>
</html>