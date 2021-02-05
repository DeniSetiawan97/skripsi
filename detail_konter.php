<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>    
    <meta name="description" content="Source Code Sistem Informasi Geografis / Geographic Information System (GIS) berbasis web dengan PHP dan MySQL. Studi kasus: lokasi pura di Bali."/>
    <meta name="keywords" content="Sistem, Informasi, geografis, gis, Tugas Akhir, Skripsi, Jurnal, Source Code, PHP, MySQL, CSS, JavaScript, Bootstrap, jQuery"/>
    <link rel="icon" href="favicon.ico"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">

    <title>Sistem Informasi Geografis</title>
    <link href="assets/css/solar-bootstrap.min.css" rel="stylesheet"/>
    <link href="assets/css/general.css" rel="stylesheet"/> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
    <style>
      -webkit-box-sizing:border-box;
      -moz-box-sizing:border-box;
      -ms-box-sizing:border-box;
      -o-box-sizing:border-box;
      box-sizing:border-box;
      outline:none;
      margin:0;
      padding:0;
    }
    .whatsapp-btn {
      cursor:pointer;
      position:fixed;
      bottom:90px;
      right:90px;
      display:block;
      width:90px;
      height:90px;
      border-radius:90px;
      text-indent:-9999px;
      background:#fff url(https://lh3.googleusercontent.com/-evFtor-f_w8/W4pfajfP17I/AAAAAAAAE9E/f7H52hrT5UoY4ZqdkxSGh2ZftYrH8fiDwCLcBGAs/s300/Whatsapp.png) no-repeat center center;
      background-size:50% auto;
      box-shadow:0 20px 25px rgba(0,0,0,.05);
      transition:.2s;
    }
    .whatsapp-btn:active {
      bottom:35px;
    }
    #whatsapp {
      position:fixed;
      z-index:+100;
      bottom:0px;
      right:0px;
      display:block;
      background:#fff;
      box-shadow:0 20px 25px rgba(000);
      max-width:-webkit-fill-available;
      font-family:Helvetica, sans-serif;
      font-size:90%;
      border-radius:4px;
      visibility:hidden;
      opacity:0;
      transition:.3s;
    }
    #whatsapp.toggle {
        font-size: 100%;
        padding: 1px;
        position: relative;
        visibility: initial;
        opacity: unset;
    }
    @media(max-width:320px) {
      .whatsapp-btn {
        bottom:10px;
        right:10px;
      }
      #whatsapp.toggle {
        bottom:80px;
        right:10px;
        visibility:visible;
        opacity:1;
      }
    }
    #whatsapp label,
    #whatsapp a {
      display:block;
      margin:15px;
      text-decoration:none;
    }
    #whatsapp input,
    #whatsapp textarea {
      display:block;
      border:1px solid #21811a;
      box-shadow:inset 0 2px 5px #ffffff00;
      width:100%;
      padding:15px;
      border-radius:2px;
    }
    #whatsapp input.nama {
      text-transform:capitalize;
    }
    #whatsapp input:focus,
    #whatsapp textarea:focus {
      border:1px solid #ddd;
    }
    #whatsapp textarea {
      min-height:80px;
      resize: none;
    }
    #whatsapp a {
      cursor:pointer;
      display:block;
      padding:10px;
      font-weight:bold;
      text-align:center;
      background:#25D366;
      color:white;
      border-radius:2px;
    }
    #whatsapp a:hover {
      background:#20b558;
    }
    #star {
      float: left;
      padding-right: 20px;
    }

    #star span {
      padding: 3px;
      font-size: 20px;
    }
    .on {
      color: #f7d106
    }

    .off {
      color: #ddd;
    }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
    <script src="https://maps.googleapis.com/maps/api/js?v=weekly&key=AIzaSyD2t66MDpj3mi7QnqPODUOb25VtT6VnOaA&region=ID"></script>
    <script type="text/javascript">
        var markers = [
          <?php
                include "koneksi.php";
                $id_konter = $_GET['id_konter'];

                $query = "SELECT * FROM reting RIGHT JOIN konter_servis
                on reting.id_konter=konter_servis.id_konter
                where konter_servis.id_konter='$id_konter'";
                $hasil = mysqli_query ($conn, $query);
                //mysqli_error($id_user);
                if (!$hasil) die ("Gagal query ...");
                    
                $data = mysqli_fetch_array($hasil);
                //print_r($data);
                
          ?>
            {
                "latitude": '<?php echo $data['latitude']; ?>',
                "longitude": '<?php echo $data['longitude']; ?>',
                "nama_konter": '<?php echo $data['nama_konter']; ?>',
                "id_konter": '<?php echo $data['id_konter']; ?>'
            }
        ];
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
            <h1><?=$data["nama_konter"];?></h1>
        </div>
        <div class="row">
            <div class="col-md-6">
                  <p>Alamat: <?=$data['alamat'];?></p>
                <div>
                  <p>Detail: <?=$data['detail_konter'];?></p>
                </div>
                <div>
                  <p>Fitur Antar Jemput: <?=$data['antar_jemput'];?></p>
                </div>
                <?php 
                  $q      = $conn->query("SELECT AVG(rate) AS jml FROM reting WHERE id_konter='$id_konter'")->fetch_assoc();
                  $hasil  = round($q['jml'],1); 
                ?>                
                <div class="rateyo" id= "rating"
                            data-rateyo-rating="<?php echo $hasil; ?>">
                </div>  

                <div id="hasil">
                    Rating <?php echo $hasil; ?>
                </div>
                <div>    
                <?php
                        include 'rating/rating.php';
                ?>
                </div>                
            </div>
                <div class="col-md-6">
                    <p>
                        <a href="tempat_list.php" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-chevron-left"></span> Lihat semua tempat</a>
                        <a href="rute/rute.php?id_konter=<?=$_GET['id_konter']?>" class="btn btn-info btn-sm"> <span class="glyphicon glyphicon-search"></span> Tampilkan Rute </a>
                        <a href="#" name="age" id="age" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-envelope"></span> Kirim Pesan</a>
                    </p>
                    <div id="dvMap" style="height: 500px;"></div>
                        
                </div>
        </div>
    </div>

    
    <footer class="footer bg-primary">
      <div class="container">
        <p>Copyright &copy; <?=date('Y')?> Deni Setiawan <em class="pull-right">7 Desember 2020</em></p>
      </div>
    </footer>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
 
<script>
 
 
    $(function () {
        $(".rateyo").rateYo().on("rateyo.change", function (e, data) {
            var rating = data.rating;
            $(this).parent().find('.score').text('score :'+ $(this).attr('data-rateyo-score'));
            $(this).parent().find('.result').text('rating :'+ rating);
            $(this).parent().find('input[name=rating]').val(rating); //add rating value to input field
        });
    });
 
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
                    map: map
                });
                    (function (marker, data) {
                        google.maps.event.addListener(marker, "click", function (e) {
                            infoWindow.setContent('<h5>Nama Konter</b> :'+ data.nama_konter );
                            infoWindow.open(map, marker);
                        });
                    })(marker, data);              
            }
            
        }
    </script>
</html>
  
<div>  
  <div id="add_data_Modal" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Silahkan Isi Pesan Anda (Pastikan Sudah Masuk Ke WhatsApp Web)</h4>
        </div>
        <div id="whatsapp" class="toggle">
          <input class="tujuan" type="hidden" value="<?=$data['no_wa'];?>" /> <!-- No. WhatsApp -->

          <label>Nama :
            <input class="nama" type="text" placeholder="Tulis Nama Lengkap." />
          </label>
          <label>Alamat :
            <input class="alamat" type="alamat" placeholder="contoh : Jl.Tamansari I RT 002/008 No.1 Kel.Pekayon Kec.Ps Rebo Jak Tim." />
          </label>
          <label>Keluhan :
            <textarea class="keluhan" placeholder="contoh: Hp saya mati tiba tiba"></textarea>
          </label>
            <a class="submit">> KIRIM WHATSAPP</a>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  $('.whatsapp-btn').click(function(){
  $('#whatsapp').toggleClass('toggle');
  });
  // Onclick Whatsapp Sent!
  $('#whatsapp .submit').click(WhatsApp);

  $("#whatsapp input, #whatsapp textarea").keypress(function() {
    if (event.which == 13) WhatsApp();
  });
  var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
  function WhatsApp() {
    var ph = '';
    if ($('#whatsapp .nama').val() == '') { // Cek Nama
      ph = $('#whatsapp .nama').attr('placeholder');
      alert('Silahkan tulis ' + ph);
      $('#whatsapp .nama').focus();
      return false;
    } else if ($('#whatsapp .alamat').val() == '') { // Cek alamat
      ph = $('#whatsapp .alamat').attr('placeholder');
      alert('Silahkan tulis ' + ph);
      $('#whatsapp .alamat').focus();
      return false;
    } else if ($('#whatsapp .keluhan').val() == '') { // Cek Pesan
      ph = $('#whatsapp .keluhan').attr('placeholder');
      alert('Silahkan tulis ' + ph);
      $('#whatsapp .keluhan').focus();
      return false;
    } else {
      if (!confirm("Kirim Ke WhatsApp?")) {
        window.open("https://www.whatsapp.com/download/");
      } else {
        // Check Device (Mobile/Desktop)
        var url_wa = 'https://web.whatsapp.com/send';
        if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
          url_wa = 'whatsapp://send/';
        }
        // Get Value
        var tujuan = $('#whatsapp .tujuan').val(),
            via_url = location.href,
            nama = $('#whatsapp .nama').val(),
            alamat = $('#whatsapp .alamat').val(),
            keluhan = $('#whatsapp .keluhan').val();
        $(this).attr('href', url_wa + '?phone=62 ' + tujuan + '&text=Halo saya ingin memperbaiki hand phone, saya *' + nama + '* %0A%0AAlamat:%20' + alamat + ' %0A%0AKeluhan:%20' + keluhan + '%0A%0AMohon dibantu perbaikan hand phone saya');
        var w = 960,
            h = 540,
            left = Number((screen.width / 2) - (w / 2)),
            tops = Number((screen.height / 2) - (h / 2)),
            popupWindow = window.open(this.href, '', 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=1, copyhistory=no, width=' + w + ', height=' + h + ', top=' + tops + ', left=' + left);
        popupWindow.focus();
        return false;
      }
    }
  }
</script>