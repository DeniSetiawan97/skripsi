<?php
session_start();
if($_SESSION['level']=="") {
    header("Location: ../login/login.php");
}

?>
<!--
=========================================================
 Light Bootstrap Dashboard - v2.0.1
=========================================================

 Product Page: https://www.creative-tim.com/product/light-bootstrap-dashboard
 Copyright 2019 Creative Tim (https://www.creative-tim.com)
 Licensed under MIT (https://github.com/creativetimofficial/light-bootstrap-dashboard/blob/master/LICENSE)

 Coded by Creative Tim

=========================================================

 The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.  -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Light Bootstrap Dashboard - Free Bootstrap 4 Admin Dashboard by Creative Tim</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/light-bootstrap-dashboard.css?v=2.0.0 " rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="assets/css/demo.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="http://maps.googleapis.com/maps/api/js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD2t66MDpj3mi7QnqPODUOb25VtT6VnOaA&callback=initialize" async defer></script>
    
    <style>
        .comment {
            float: left;
            width: 100%;
            height: auto;
        }

        .commenter {
            float: left;
        }

        .commenter img {
            width: 35px;
            height: 35px;
        }

        .comment-text-area {
            float: left;
            width: 100%;
            height: auto;
        }

        .textinput {
            float: left;
            width: 100%;
            min-height: 75px;
            outline: none;
            resize: none;
            border: 1px solid grey;
        }
    </style>

</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-image="assets/img/sidebar-5.jpg">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

        Tip 2: you can also add an image using data-image tag
    -->
            <div class="sidebar-wrapper">
                <div class="logo">
                    <h3>SIG</h3>
                </div>
                <ul class="nav">
                    <li>
                        <a class="nav-link" href="dashboard.php">
                            <i class="nc-icon nc-chart-pie-35"></i>
                            <p>Dasbor</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="profil.php">
                            <i class="nc-icon nc-circle-09"></i>
                            <p>Profil Anda</p>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="Toko.php">
                            <i class="nc-icon nc-notes"></i>
                            <p>Toko</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="maps.php">
                            <i class="nc-icon nc-pin-3"></i>
                            <p>Lokasi Konter</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg " color-on-scroll="500">
                <div class="container-fluid">
                    <p> Tambah Toko </p>                    
                </div>
            </nav>
            <!-- End Navbar -->

            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Tambah Toko</h4>
                                </div>
                                <div class="card-body">
                                    <form action="php/simpan_toko.php" method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-5 pr-1">
                                                <div class="form-group">
                                                    <label>Nama Konter</label>
                                                    <input type="text" class="form-control" name="nama_konter" placeholder="Nama Konter" required>
                                                </div>
                                            </div>
                                            <div class="col-md-5 pr-1">
                                                <div class="form-line">
                                                    <label>Layanan Antar Jemput</label>
                                                        <select class="form-control" name="antar_jemput" required>
                                                            <option value="" disabled selected>Silahkan Pilih</option>
                                                            <option value="ya">YA</option>
                                                            <option value="tidak">TIDAK</option>
                                                        </select>
                                                </div>
                                            </div>                                            
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 pr-2">
                                            <label>Nomor Wa</label>
                                                <div class="form-group">
                                                    <input type="tel" class="form-control" name="no_wa" placeholder="Nomor Wa Anda" required> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-10 pr-2">
                                            <label>Alamat Konter</label>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="alamat" placeholder="Alamat"> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-11 pr-5">
                                            <label>Deskripsi Konter</label>
                                                <div class="comment">
                                                    <textarea rows="3" class="textinput" name="detail_konter" placeholder="Deskripsi Konter" required></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 pr-1">
                                                <div class="form-group">
                                                    <label>Latitude</label>
                                                        <input type="text" class="form-control" name="latitude" placeholder="Latitude" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4 pr-1">
                                                <div class="form-group">
                                                    <label>Longitude</label>
                                                        <input type="text" class="form-control" name="longitude" placeholder="longitude" required>
                                                </div>
                                            </div>  
                                        </div>
                                        <button type="submit" name="submit" class="btn btn-info btn-fill pull-right">Tambah Toko</button>
                                        <a class="btn btn-primary" href="toko.php">Kembali</a>
                                        
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-11">
                                    <!-- Form pencarian -->
                                    <form class="form-horizontal" id="formCariTempat" method="POST" autocomplete="off">
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" >Cari Tempat:</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="tempat" name="tempat">
                                                </div>
                                        </div>          
                                        <div class="form-group"> 
                                            <div class="col-sm-offset-3 col-sm-9">
                                                <button type="submit" class="btn btn-default">Cari</button>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- tempat meletakan keterangan alamat dan lat, lng -->
                                    <div id="panelContent"></div>
                                    <div class="col-md-7">
                                    <div id="map" style="height: 300px; width: 400px;"></div>
                                    <div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer">
                <div class="container-fluid">
                    <nav>
                        <ul class="footer-menu">
                            <li>
                                <a href="#">
                                    Home
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Company
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Portfolio
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Blog
                                </a>
                            </li>
                        </ul>
                        <p class="copyright text-center">
                            ©
                            <script>
                                document.write(new Date().getFullYear())
                            </script>
                            <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
                        </p>
                    </nav>
                </div>
            </footer>
        </div>
    </div>

<script type="text/javascript">
  $(document).ready(function() { 
    $("#formCariTempat").submit(function(e) {
        e.preventDefault();
        //ambil value dari form
        var namatempat=$("#tempat").val();

        if (namatempat!="") {
           //replace semua spasi menjadi tanda plus (+)
            namatempat=namatempat.replace(/ /g, "+");
           //api google maps
            var url="https://maps.googleapis.com/maps/api/geocode/json?address="+namatempat+"&key=AIzaSyD2t66MDpj3mi7QnqPODUOb25VtT6VnOaA";

            document.getElementById("panelContent").innerHTML="";

            //ambil data dari json
            $.getJSON(url, function(result){ 

                //menampilkan peta
                var map;          
                var infowindow = new google.maps.InfoWindow({ });   
                map = new google.maps.Map(document.getElementById('map'), {                
                  zoom: 15,  
                  center: {lat: result.results[0].geometry.location.lat, lng: result.results[0].geometry.location.lng},              
                });
                
                //looping data json
                $.each(result.results, function(i){  
                //menampilkan data keterangan alamat, lat, long                  
                document.getElementById("panelContent").innerHTML +="<b>Alamat :</b>"+ result.results[i].formatted_address + "<br><b>Lat :</b>"+ result.results[i].geometry.location.lat + "<br><b>Long :</b>"+ result.results[i].geometry.location.lng + "<br><br>";

                 //set marker
                 var marker = new google.maps.Marker({
                    position: {lat: result.results[i].geometry.location.lat, lng: result.results[i].geometry.location.lng},
                    title:result.results[i].formatted_address
                });

                //menampilkan popup keterangan di saat marker di click
                google.maps.event.addListener(marker, 'click', function () {
                        infowindow.setContent(result.results[i].formatted_address);
                        infowindow.open(map, marker);
                });
                 // To add the marker to the map, call setMap();
                marker.setMap(map);

               });

             });   

        }else{
          alert("Nama tempat tidak boleh kosong!");
        } 
       
    });
});
   
</script>

</body>
<!--   Core JS Files   -->
<script src="assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="assets/js/plugins/bootstrap-switch.js"></script>
<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!--  Chartist Plugin  -->
<script src="assets/js/plugins/chartist.min.js"></script>
<!--  Notifications Plugin    -->
<script src="assets/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
<script src="assets/js/light-bootstrap-dashboard.js?v=2.0.0 " type="text/javascript"></script>
<!-- Light Bootstrap Dashboard DEMO methods, don't include it in your project! -->
<script src="assets/js/demo.js"></script>
<script>
var defaultCenter = {
    lat : <?=get_option('default_lat')?>, 
    lng : <?=get_option('default_lng')?>
};
function initMap() {

  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: <?=get_option('default_zoom')?>,
    center: defaultCenter 
  });

  var marker = new google.maps.Marker({
    position: defaultCenter,
    map: map,
    title: 'Click to zoom',
    draggable:true
  });
  
  
    marker.addListener('drag', handleEvent);
    marker.addListener('dragend', handleEvent);
    
    var infowindow = new google.maps.InfoWindow({
        content: '<h4>Drag untuk pindah lokasi</h4>'
    });
    
    infowindow.open(map, marker);
}

function handleEvent(event) {
    document.getElementById('lat').value = event.latLng.lat();
    document.getElementById('lng').value = event.latLng.lng();
}

$(function(){
    initMap();
})
</script>



</html>
