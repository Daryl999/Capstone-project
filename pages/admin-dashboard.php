<?php if (session_status() === PHP_SESSION_NONE){ session_start(); } ?>
<?php 
date_default_timezone_set('Asia/Manila');
                date_default_timezone_get();
                $date_time = date("Y-m-d");
include 'connection.php';
// count the total patient record in the database
        $select = "SELECT * FROM patientprofiletbl WHERE dadmit='$date_time' ";
 
        $result = mysqli_query($con, $select);
         
        $total_patient = mysqli_num_rows($result);
// count the total medicine record in the database
        $select = "SELECT * FROM medicinetbl ";
 
        $result = mysqli_query($con, $select);
         
        $total_medicine = mysqli_num_rows($result);
// count the total sales in the database
        $total_price = 0;
        $grand_total = 0;
        $select = "SELECT * FROM prescriptiontbl WHERE patient_dorder = '$date_time' ";
        $result = mysqli_query($con, $select);
        while($row = mysqli_fetch_array($result)) {
          $total_price = $row["patient_qty"] * $row["patient_prc"];
          $grand_total = $grand_total + $total_price;
        }
// count the total user Verified in the database
        $select = "SELECT * FROM approvaltbl WHERE account_status='Verified' ";
 
        $result = mysqli_query($con, $select);
         
        $total_verified = mysqli_num_rows($result);
// count the total user Not Verified in the database
        $select = "SELECT * FROM approvaltbl WHERE account_status='Not Verified' ";
 
        $result = mysqli_query($con, $select);
         
        $total_not_verified = mysqli_num_rows($result);
?>
<style>
  .column {
    float: left;
    width: 50%;
    }
</style>
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

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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
          <a href="admin-dashboard.php" class="active">
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
          <a href="admin-add-doctor.php">
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
      <div class="overview-boxes">
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Patient Record</div>
            <div class="number"><?php echo $total_patient; ?></div>
            <div class="indicator">
              <i></i>
              <span class="text">Total admitted patient today</span>
            </div>
          </div>
          <!-- <i class='bx bx-cart-alt cart'></i> -->
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Total Medicine</div>
            <div class="number"><?php echo $total_medicine; ?></div>
            <div class="indicator">
              <i></i>
              <span class="text">Total medicine stock</span>
            </div>
          </div>
          <!-- <i class='bx bxs-cart-add cart two' ></i> -->
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Total Dispense</div>
            <div class="number">₱<?php echo number_format($grand_total,2) ?></div>
            <div class="indicator">
              <i></i>
              <span class="text">Today dispense</span>
            </div>
          </div>
          <!-- <i class='bx bx-cart cart three' ></i> -->
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Total Users</div>
              <div class="column">
                <label style="font-size: 79%;">Verified</label><br>
                <div class="number"><?php echo $total_verified; ?></div>
              </div>
              <div class="column">
                <label style="font-size: 79%;">Not Verified</label><br>
                <div class="number"><?php echo $total_not_verified; ?></div>
              </div>
            <div class="indicator">
              <i></i>
              <span class="text"></span>
            </div>
          </div>
          <!-- <i class='bx bxs-cart-download cart four' ></i> -->
        </div>
      </div>

      <div class="sales-boxes">
        <div class="recent-sales box">
          <img src="POC_Name.PNG" style="display: block; margin-left: auto; margin-right: auto; width: 50%;">
          <h1 style="text-align: center; text-transform: uppercase;">Therapeutic Drug Management System</h1><br>
        </div>
      </div>
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