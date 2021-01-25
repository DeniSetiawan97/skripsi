


<?php 
 
    include 'koneksi.php';

    $id		        = $_GET['id_konter'];
    $name           = $_POST["nama"];
    $rating         = $_POST["rating"];
    

  
        if (isset($_POST['add'])){
            $query = mysqli_query($conn, "INSERT INTO reting VALUES
            (NULL,'$id','$name','$rating')");

            echo "<script>alert('Data Berhasil Ditambah !');document.location.href='index.php'</script>/n";
              
          } 
    
    
?>