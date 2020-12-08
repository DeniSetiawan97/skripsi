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
    </script>   
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD2t66MDpj3mi7QnqPODUOb25VtT6VnOaA&region=ID"></script>
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
          <a class="navbar-brand" href="?">GIS</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="map_konter.php"><span class="glyphicon glyphicon-map-marker"></span> Persebaran Konter</a></li>
            <li><a href="tempat_list.php"><span class="glyphicon glyphicon-list-alt"></span> Daftar Konter</a></li>            
            <li><a href="login/login.php"><span class="glyphicon glyphicon-user"></span> Login</a></li>                  
          </ul>          
        </div>
      </div>
    </nav>
    
    

    <div class="container">
    <?php
        include("koneksi.php");
    ?>

    <div class="page-header">
        <h1>Persebaran Konter</h1>
    </div>

    <div id="dvMap" style="height: 500px;"></div>
    <script type="text/javascript">
        var markers = [
        <?php
            $sql = mysqli_query($conn, "SELECT * FROM konter_servis");
            while(($data =  mysqli_fetch_assoc($sql))) {
        ?>
        {
            "latitude": '<?php echo $data['latitude']; ?>',
            "longitude": '<?php echo $data['longitude']; ?>',
            "nama_konter": '<?php echo $data['nama_konter']; ?>'
        },
        <?php
        }
        ?>
        ];
    </script>
    <script type="text/javascript">
        window.onload = function () {
            var mapOptions = {
                center: new google.maps.LatLng(-7.7955798,110.3694896),
                zoom: 13,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            }; 
            var infoWindow = new google.maps.InfoWindow();
            var map = new google.maps.Map(document.getElementById("dvMap"), mapOptions);
            for (i = 0; i < markers.length; i++) {
                var data = markers[i];
                var latnya = data.latitude;
                var longnya = data.longitude;
                
                var myLatlng = new google.maps.LatLng(latnya, longnya);
                var marker = new google.maps.Marker({
                    position: myLatlng,
                    map: map,
                    title: data.nama_konter
                });
                    (function (marker, data) {
                        google.maps.event.addListener(marker, "click", function (e) {
                            infoWindow.setContent('<h5>Nama Konter</b> :'+ data.nama_konter +'</h5>'+'<p align="center"><a href="https://google.com" class="link_detail btn btn-primary">Lihat Detail');
                            infoWindow.open(map, marker);
                        });
                    })(marker, data);
            }
        }
    </script>
    </div>
    <footer class="footer bg-primary">
      <div class="container">
        <p>Copyright &copy; <?=date('Y')?> Deni Setiawan <em class="pull-right">7 Desember 2020</em></p>
      </div>
    </footer>
</body>
</html>