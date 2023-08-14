<?php
include 'connection.php';
if(isset($_GET['id'])){
  $id=$_GET['id'];
  $result=$con->query("DELETE from doctortbl WHERE id='$id'");

  if($result){
    ?>
    <script>
      alert("Doctor successfully deleted.");
      window.location.href='admin-add-doctor.php';
    </script>
    <?php
  } else {
    ?>
    <script>
      alert ("Failed to Delete");
      window.location.href='admin-add-doctor.php';
    </script>
    <?php
  }
}
?>
