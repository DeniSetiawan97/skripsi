<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
<?php 
include "koneksi.php";
				  
$q      = $conn->query("SELECT AVG(rate) AS jml FROM reting WHERE id_konter='9'")->fetch_assoc();
$hasil  = round($q['jml'],1); 
?>                
                
	<div class="rateyo" id= "rating"
            data-rateyo-rating="<?php echo $hasil; ?>">
    </div>  

    <div id="hasil">
        Rating <?php echo $hasil; ?>
    </div>