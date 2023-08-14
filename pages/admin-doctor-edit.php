<?php if (session_status() === PHP_SESSION_NONE){ session_start(); } ?>
<!-- save action -->
<?php
include "connection.php";

if (isset($_POST['submit'])) {
  $id=$_GET['id'];
  $doctor_name= $_POST['doctor_name'];
  $doctor_surname= $_POST['doctor_surname'];

  $dup=mysqli_query ($con, "select * from doctortbl where doctor_name='$doctor_name' and doctor_surname='$doctor_surname' and doctor_position='$doctor_position' ");
  if(mysqli_num_rows($dup)>0){
    echo "<script>alert('The data you input is already exist.')</script>";
    echo "<script>document.location='admin-add-doctor.php';</script>";
  }
  else{

      $query = "UPDATE doctortbl SET `doctor_name`= '$doctor_name', 
                                      `doctor_surname`= '$doctor_surname' 
                                      WHERE `id` = '$id'";

        if($query){
        echo "<script>alert('Successfully updated!')</script>";
        echo "<script>document.location='admin-add-doctor.php';</script>";
        } else {
            echo "Failed";
         }
  mysqli_query ($con,$query);
  }
}
?>

<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
  <head>
    <title>Therapeutic Drug Management</title>
    <meta charset="UTF-8">
    <!--<title> Responsiive Admin Dashboard | CodingLab </title>-->
    <link rel="stylesheet" href="style.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="shortcut icon" type="image/x-1con" href="PMS.PNG" />
    <!-- theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Table Bootsrap CDN -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous"> -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script> -->

    <script
    src="http://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" ></script>
    <!-- dropdown -->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>
      p {
        font-size: 1.5rem;
      }
      .img-poc {
        width: 76%;
      }
    </style>
   </head>
   
<?php 
include "session.php";
include 'user-session.php'
?>

<body>
  <div class="sidebar">
    <div class="logo-details">
      <i></i>
      <span class="logo_name">Pharmacy</span>
    </div>
      <ul class="nav-links">
        <li>
          <a href="admin-dashboard.php">
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="admin-patient-profile1.php">
            <i class='bx bx-list-ul' ></i>
            <span class="links_name">Patient Profile</span>
          </a>
        </li>
        <li>
          <a href="admin-patient-record.php">
            <i class='bx bx-box' ></i>
            <span class="links_name">Patient Record</span>
          </a>
        </li>
        <li>
          <a href="admin-inventory.php">
            <i class='bx bx-pie-chart-alt-2' ></i>
            <span class="links_name">Inventory</span>
          </a> 
        </li>
        <li>
          <a href="admin-sales-report.php">
            <i class='bx bx-coin-stack' ></i>
            <span class="links_name">Sales Report</span>
          </a>
        </li>
        <li>
          <a href="admin-approval.php">
            <i class='bx bx-user' ></i>
            <span class="links_name">Approve User</span>
          </a>
        </li>
        <li>
          <a href="admin-add_doctor.php" class="active">
            <i class='bx bx-user' ></i>
            <span class="links_name">Add Doctor</span>
          </a>
        </li>
      </ul>
  </div>
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
      </div>
        <div class="w3-container">
          <div class="w3-dropdown-click">
            <button onclick="myFunction()" class="w3-button w3-green" style="border-radius: 0.25rem;">Logout</button>
            <div id="Demo" class="w3-dropdown-content w3-bar-block w3-border">
              <a href="user-profile.php" class="w3-bar-item w3-button">Profile</a>
              <a href="logout.php" class="w3-bar-item w3-button">Logout</a>
            </div>
          </div>
        </div>
    </nav>

    <div class="home-content">
      <div class="sales-boxes">
        <div class="recent-sales box">
          <h3 style="text-align: center;"><b>Update Doctor Name</b></h3><hr>
            <form method="POST">
              <div class="row">
                <div class="col-md-3">
                  <label>Name</label>
                </div>
                  <div class="col-md-3">
                  <label>Surname</label>
                </div>
                  <div class="col-md-6">
                  <label>Position</label>
                </div>
                <?php
                include 'connection.php';
                if (isset($_GET['id'])) {
                  $id = $_GET['id'];
                  $query = mysqli_query($con, "SELECT * FROM doctortbl WHERE id='$id' ");  
                  $row = mysqli_fetch_array($query);
                ?>
                <div class="col-md-3"> 
                  <input type="text" name="doctor_name" class="form-control" placeholder="Name" value="<?php echo $row['doctor_name']; ?>" />  
                </div>  
                <div class="col-md-3">  
                  <input type="text" name="doctor_surname" class="form-control" placeholder="Surname" value="<?php echo $row['doctor_surname']; ?>" required />  
                </div>
                <?php } ?>
                <div class="col-md-3">
                  <input type="text" name="doctor_position" class="form-control" placeholder="Position" value="<?php echo $row['doctor_position']; ?>" readonly />
                </div>
                <div class="col-md-3">
                  <button type="submit" name="submit" class="btn btn-info">Save</button>
                </div>
              </div>
            </form>
        </div>
      </div><br>
    </div>
  </section>

<script>
function myFunction() {
  var x = document.getElementById("Demo");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else { 
    x.className = x.className.replace(" w3-show", "");
  }
}
</script>

<script>
$(document).ready(function(){
    $('#myTable').dataTable({"ordering": false});
});
</script>

<script>
  let sidebar = document.querySelector(".sidebar");
  let sidebarBtn = document.querySelector(".sidebarBtn");
  sidebarBtn.onclick = function() {
  sidebar.classList.toggle("active");
  if(sidebar.classList.contains("active")){
  sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
}else
  sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
}
 </script>

</body>
</html>