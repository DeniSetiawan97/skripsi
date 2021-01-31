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
                    <a class="navbar-brand" href="#pablo"> Toko Anda </a>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="logout.php">
                                    <span class="no-icon">Log out</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->

            

            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card strpied-tabled-with-hover">
                                <div class="card-header ">
                                    <h4 class="card-title">Toko Anda</h4>
                                    <p class="card-category">Toko Anda Yang Teregistrasi</p>                                    
                                    <a href="tambah_toko.php" name="add" class="btn btn-info btn-sm btn-fill pull-right">Tamabah Toko</a>
                                </div>
                                <div class="card-body table-full-width table-responsive">
                                
                                    <table class="table table-hover table-striped">
                                        <thead>
                                            <th>No</th>
                                            <th>Nama Konter</th>
                                            <th>Alamat Konter</th>
                                            <th>Detail Konter</th>
                                            <th>No Wa</th>
                                            <th>Antar Jemput</th>
                                            <th>Latitude</th>
                                            <th>Longitude</th>
                                            <th>Aksi</th>
                                        </thead>
                                        <tbody>
                                            <?php
                                                include "../koneksi.php";
                                                $id_user = $_SESSION['id_user'];
                                                
                                                $batas = 5;
                                                $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
                                                $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;	
                                        
                                                $previous = $halaman - 1;
                                                $next = $halaman + 1;
                                                
                                                $data = mysqli_query($conn,"SELECT * FROM konter_servis WHERE id_user='$id_user'");
                                                $jumlah_data = mysqli_num_rows($data);
                                                $total_halaman = ceil($jumlah_data / $batas);
                                        
                                                $data_konter = mysqli_query($conn,"select * from konter_servis WHERE id_user='$id_user' limit $halaman_awal, $batas");
                                                $nomor = $halaman_awal+1;
                                                while($d = mysqli_fetch_array($data_konter)){
                                            ?>
                                            <tr>
                                            <?php
                                                
                                                    echo "<td>".$nomor++."</td>";
                                                    echo "<td>".$d['nama_konter']."</td>"
                                                        ."<td>".$d['alamat']."</td>"
                                                        ."<td>".$d['detail_konter']."</td>"
                                                        ."<td>".$d['no_wa']."</td>"
                                                        ."<td>".$d['antar_jemput']."</td>"
                                                        ."<td>".$d['latitude']."</td>"
                                                        ."<td>".$d['longitude']."</td>"
                                                        ."<td>                                                            
                                                            <a href='edit_toko.php?id_konter=".$d['id_konter']."' class='btn btn-primary btn-fill btn-sm'>Edit</a>
                                                            <a href='php/hapus_toko.php?id_konter=".$d['id_konter']."' class='btn btn-danger btn-fill btn-sm'>Hapus</a>
                                                        </td>";
                                                    echo "</tr>";
                                                }
                                            ?>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
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

</html>
