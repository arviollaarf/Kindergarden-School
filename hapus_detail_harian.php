
<?php
require 'function.php';

if(isset($_GET['id'])){
  // Delete user row from table based on given id
  $result = mysqli_query($conn, "DELETE FROM terdiri WHERE id_kriteria_harian = '".$_GET['id']."'");
 
  // After delete redirect to Home, so that latest user list will be displayed.
  echo "<script>location.href='nilai-harian.php';</script>";
}
?>