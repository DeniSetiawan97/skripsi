


<?php 
 
    include '../koneksi.php';

    $id		        = $_GET['id_konter'];
    $rating         = $_POST["rating"];
    

  
        if (isset($_POST['add'])){
            $query = mysqli_query($conn, "INSERT INTO reting VALUES
            (NULL,'$id','$rating')");

            echo "<script>alert('Terima Kasih !');document.location.href='../index.php'</script>/n";
              
          } 
    
    
?>