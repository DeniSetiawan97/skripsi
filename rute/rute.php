<!DOCTYPE html>
<html>

<head>
    <title>CARI ALAMAT</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous">
    
</head>

<body>

<?php
                include "../koneksi.php";
                $id_konter = $_GET['id_konter'];

                $query = "SELECT * FROM konter_servis WHERE id_konter='$id_konter'";
                $hasil = mysqli_query ($conn, $query);
                //mysqli_error($id_user);
                if (!$hasil) die ("Gagal query ...");
                    
                $data = mysqli_fetch_array($hasil);
                //print_r($data);
                
            ?>
    
    <div id="pesan">
        <div class="inner">
            <h1 id="title">CARI RUTE</h1>
            <form>
                <div class="form-group">
                    <label>Lokasi Konter</label>
                    <input type="text" class="form-control" disabled="" id="start" value = "<?=$data['alamat'];?>">
                </div>

                <div class="form-group">
                    <label>Masukkan Lokasi Anda</label>
                    <input type="text" class="form-control" id="end" placeholder="Lokasi Anda" required>
                </div>
                <p>
                    <a class="btn btn-primary" href="../detail_konter.php?id_konter=<?=$_GET['id_konter']?>">Kembali</a>
                    <button type="submit" class="btn btn-secondary btn-fill pull-right">CARI</button>                    
                </p>
            </form>

            <div id="detail">
                <hr />
                <h4>Detail Rute</h4>
                <div class="card-custom">
                    <table>
                        <tr>
                            <th>Jarak</th>
                            <th>:</th>
                            <td id="distance"></td>
                        </tr>
                        <tr>
                            <th>Durasi</th>
                            <th>:</th>
                            <td id="duration"></td>
                        </tr>
                        <tr>
                            <th>Tarif Antar Jemput Hp </th>
                            <th>:</th>
                            <td id="price"></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div id="map"></div>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD2t66MDpj3mi7QnqPODUOb25VtT6VnOaA&libraries=places"></script>
    <script src="script.js"></script>
</body>

</html>