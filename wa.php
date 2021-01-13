<?php
                include "koneksi.php";

                $query = "SELECT * FROM user Where id_user=9";
                $hasil = mysqli_query ($conn, $query);
                //mysqli_error($id_user);
                if (!$hasil) die ("Gagal query ...");
                    
                $data = mysqli_fetch_array($hasil);
                //print_r($data);
                
          ?>
<html>
<head>
<title>Membuat api whatsapp message generator dengan php| www.hakkoblogs.com</title>
</head>
<body>
<?php
if(isset($_POST['kirim'])){
$nohape  = $_POST['nohp'];
function hp($nohp)
{
 $nohp = str_replace(" ","",$nohp);
 // kadang ada penulisan no hp 0811 239 345
 $nohp = str_replace("(","",$nohp);
 // kadang ada penulisan no hp (0274) 778787
 $nohp = str_replace(")","",$nohp);
 // kadang ada penulisan no hp (0274) 778787
 $nohp = str_replace(".","",$nohp);
 // kadang ada penulisan no hp 0811.239.345 

 if(!preg_match('/[^+0-9]/',trim($nohp)))
 // cek apakah no hp mengandung karakter + dan 0-9
 {
 if(substr(trim($nohp), 0, 3)=='+62')
 // cek apakah no hp karakter 1-3 adalah +62
 {
 $hp = trim($nohp);
 }
 elseif(substr(trim($nohp), 0, 1)=='0')
 // cek apakah no hp karakter 1 adalah 0
 {
 $hp = '+62'.substr(trim($nohp), 1);
 }
 // fungsi trim() untuk menghilangan
 // spasi yang ada didepan/belakang
 }
 else
 {
 $hp = 'Format no hp yang dimasukkan tidak lengkap atau salah!';
 }
 print $hp;
}
hp($nohp); 
$isi     = $_POST['isi'];

echo "<script>window.location = 'https://api.whatsapp.com/send?phone=$nohape&text=$isi&source=&data='</script>";

}
?>
<form method="post" action="">
<input type="text" name="nohp" value = "<?=$data['no_tlp'];?>"/><br/><br/>
<textarea cols="40" rows="5" name="isi" Placeholder="Isi pesan"></textarea>
<br/><br/>
<input type="submit" name="kirim" value="Kirim Pesan"/>
</form>
</body>
</html>
