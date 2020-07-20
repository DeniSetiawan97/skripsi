<!doctype html>
<html class="no-js " lang="en">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">

    <title>:: Noob Programmer::</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="../image/x-icon">
    <!-- Custom Css -->
    <link rel="stylesheet" href="../assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="stylesheet" href="../assets/css/authentication.css">
    <link rel="stylesheet" href="../assets/css/color_skins.css">
</head>

<body class="theme-orange">
<div class="authentication">
    <div class="card">
        <div class="body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="header slideDown">
                        <div class="logo"><img src="../assets/images/logo.png" alt="Nexa"></div>
                        <h1>Noob Programmer</h1>
                        <ul class="list-unstyled l-social">
                            <li><a href="#"><i class="zmdi zmdi-facebook-box"></i></a></li>
                            <li><a href="#"><i class="zmdi zmdi-linkedin-box"></i></a></li>                            
                            <li><a href="#"><i class="zmdi zmdi-twitter"></i></a></li>
                        </ul>
                    </div>                        
                </div>
                <form action="../signup/save_signup.php" method="post" class="col-lg-12">
                    <h5 class="title">Sign in to your Account</h5>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" name="nama" class="form-control" required>
                            <label class="form-label">Nama</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="number" name="no_tlp" class="form-control" required>
                            <label class="form-label">No.Telpon</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="email" name="email" class="form-control" required>
                            <label class="form-label">Email</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" name="username" class="form-control" required>
                            <label class="form-label">Username</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="password" name="password" class="form-control" required>
                            <label class="form-label">Password</label>
                        </div>
                    </div>   
                    <div class="form-group form-float">
                        <div class="form-line">
                            <select class="form-control" name="level" required>
                                <option value="" disabled selected>Pilih Sebagai</option>
                                <option value="pengunjung" >Pengunjung</option>
                                <option value="pemilik" >Pemilik Toko</option>
                            </select>
                        </div>
                    </div> 
                <div class="col-lg-12">
                    <button type="submit" value="Action" name="action" class="btn btn-raised btn-primary waves-effect">SIGN UP</button>
                                          
                </div>
                </form>
                <div class="col-lg-12 m-t-20">
                    <a class="" href="../login/login.php">BACK</a>
                </div>                    
            </div>
        </div>
    </div>
</div>

<!-- Jquery Core Js -->
<script src="../assets/bundles/libscripts.bundle.js"></script>    
<script src="../assets/bundles/vendorscripts.bundle.js"></script>
<script src="../assets/bundles/mainscripts.bundle.js"></script>
</body>
</html>