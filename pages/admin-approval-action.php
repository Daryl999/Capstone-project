<?php
include 'connection.php';
if(isset($_GET['id'])){
  $id=$_GET['id'];
  $result=$con->query("DELETE from approvaltbl WHERE id='$id'");

  if($result){
    ?>
    <script>
      alert("Successfully deleted.");
      window.location.href='admin-approval.php';
    </script>
    <?php
  } else {
    ?>
    <script>
      alert ("Failed to delete");
      window.location.href='admin-approval.php';
    </script>
    <?php
  }
}
?>
