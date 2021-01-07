<!DOCTYPE html>
<html lang="id">
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD2t66MDpj3mi7QnqPODUOb25VtT6VnOaA&region=ID"></script>
    <script src="assets/js/script.js"></script>
  </head>
  <body>
    <?php
        include("koneksi.php");
    ?>


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
            "nama_konter": '<?php echo $data['nama_konter']; ?>',
            "id_konter": '<?php echo $data['id_konter']; ?>'
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
                            infoWindow.setContent('<h5>Nama Konter</b> :'+ data.nama_konter +'</h5>'+'<p align="center"><a href="detail_konter.php?id_konter='+data.id_konter+'" class="link_detail btn btn-primary">Lihat Detail');
                            infoWindow.open(map, marker);
                        });
                    })(marker, data);
            }
        }
    </script>
<script>
var origin_pos  = {
    lat : default_lat,
    lng : default_lng
};
var dst_pos = {
        lat : data.latitude,
        lng : <?=$row->lng?>
    };
var errorRoute = false;
var map_detail;
var dragged = false;
var directionsDisplay;
var routeDisplayed = 0;

//menampilkan map detail
function tampilDetail(){          
    
    
    map_detail = new google.maps.Map(document.getElementById('map'), {
        zoom: default_zoom,
        center: dst_pos
    });  
    
    directionsDisplay = new google.maps.DirectionsRenderer({map: map_detail});
    
    addMarker(dst_pos, map_detail, '<?=$row->nama_tempat?>');    
    
    infoWindow = new google.maps.InfoWindow;
    
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
            };
            
            
            origin_pos = pos;

            infoWindow.setPosition(pos);
            infoWindow.setContent('Lokasi anda saat ini');
            infoWindow.open(map_detail);
            map_detail.setCenter(pos);
        }, function() {
            handleLocationError(true, infoWindow, map_detail.getCenter());
        });
    } else {          
        handleLocationError(false, infoWindow, map_detail.getCenter());
    }
}

function handleLocationError(browserHasGeolocation, infoWindow, pos) {
    infoWindow.setPosition(pos);
    infoWindow.setContent(browserHasGeolocation ?
                          'Error: The Geolocation service failed.' :
                          'Error: Your browser doesn\'t support geolocation.');
    infoWindow.open(map);
}
    
</body>
</html>