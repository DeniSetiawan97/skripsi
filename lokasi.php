<?php
include("koneksi.php");
?>
<div id="dvMap" style="width: 1000px; height: 550px"></div>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD2t66MDpj3mi7QnqPODUOb25VtT6VnOaA&callback=initialize" async defer></script>
  <script type="text/javascript">
    var markers = [
    <?php
    $sql = mysqli_query($db, "SELECT * FROM konter_servis");
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
                        infoWindow.setContent('<b>Lokasi</b> :' + data.nama_konter + '<p><a href="https://google.com">Lihat Detail');
                        infoWindow.open(map, marker);
                    });
                })(marker, data);
            }
        }
    </script>