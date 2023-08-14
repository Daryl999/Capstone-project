<?php
include 'connection.php';
if(isset($_GET['id'])){
  $id=$_GET['id'];
  $query= "INSERT INTO medicinetbl SELECT * FROM archivemedicinetbl WHERE id='$id' ";

  if($con->query($query) === TRUE){
    $sql="DELETE FROM archivemedicinetbl WHERE id='$id' ";
    if ($con->query($sql) === TRUE) {
    ?>
    <script>
      alert("Record successfully restore.");
      window.location.href='admin-archive-medicine.php';
    </script>
    <?php
    } else {
      $message = "Record failed to restore!";
      echo "<script type='text/javascript'>alert('$message');</script>";
    }
  } else {
    ?>
    <script>
      alert ("Failed to restore");
    </script>
    <?php
  }
}
?>
