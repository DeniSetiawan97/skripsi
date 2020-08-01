<?php
// Start the session
session_start();
?>  
<?php 
    include "../koneksi.php";
    
    $id_user        = $_SESSION['id_user'];
    $nama		    = $_POST['nama'];
    $no_tlp			= $_POST['no_tlp'];
    $email			= $_POST['email'];
    $username		= $_POST['username'];
    $password		= $_POST['password'];    
              
    if (isset($_POST['update'])){
      $query=mysqli_query($conn, "update user set
          nama		= '$_POST[nama]',
          no_tlp	= '$_POST[no_tlp]',
          email		= '$_POST[email]',
          username	= '$_POST[username]',
          password	= '$_POST[password]'
          where id_user = '$id_user'") or die(mysqli_error);
          echo "<script>alert('Berhasil Update !!!');document.location.href='user.php'</script>/n";                                   
          
          exit;
      }                                      
    
?>