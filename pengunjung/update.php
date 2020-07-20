<?php 
    include "../koneksi.php";
    
    //$proses			= $_GET['username'];
    $nama		    = $_POST['nama'];
    $no_tlp			= $_POST['no_tlp'];
    $email			= $_POST['email'];
    $username		= $_POST['username'];
    $password		= $_POST['password'];    
              
    if (isset($_POST['username'])){
      $query=mysqli_query($conn, "update user set
          nama		= '$_POST[nama]',
          no_tlp	= '$_POST[no_tlp]',
          email		= '$_POST[email]',
          username	= '$_POST[username]',
          password	= '$_POST[password]'
          where username = '$username'") or die(mysqli_error);
          echo "<script>alert('Berhasil Update !!!');document.location.href='user.php'</script>/n";                                   
          
          exit;
      }                                      
    
?>