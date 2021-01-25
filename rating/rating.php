
<form action="rating/simpan_rating.php?id_konter=<?php echo $data['id_konter'];?>" method="POST"" method="post">  

    <div>
        <h3>Silahkan Masukkan Penilaian Anda</h3>
    </div>                    
    <div>
        <label>Nama Anda</label>
        <input type="text" name="nama">
    </div>                    
    <div class="rateyo" id= "rating"
                data-rateyo-rating="4"
                data-rateyo-num-stars="5"
                data-rateyo-score="3">
    </div>                    
        <span class='result'>0</span>
        <input type="hidden" name="rating">

    <div>
        <?php
            echo "<input type='submit' name='add'> ";
        ?>
    </div>
                
</form>

                 