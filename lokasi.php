<?php
                  include "koneksi.php";
                  $id_konter = $_GET['id_konter'];
  
                  $query = "SELECT AVG (rate) FROM reting WHERE id_konter='$id_konter'";
                  $hasil = mysqli_query ($conn, $query);
                  //mysqli_error($id_user);
                  if (!$hasil) die ("Gagal query ...");
                      
                  $data = mysqli_fetch_array($hasil);
                  //print_r($data);
                ?>
            <div class="rateyo" id= "rating"
                data-rateyo-rating="<?=$data['rate'];?>">
    </div>  