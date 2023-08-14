<?php if (session_status() === PHP_SESSION_NONE){ session_start(); } ?>

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
    <!-- link for textbox design -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
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
      label {
      font-size: 12px;
      }
      .img-poc {
        width: 76%;
      }
    </style>
   </head>

<?php 
include "session.php";
include 'admin-session.php';
?>

<body>
  <div class="sidebar">
    <div class="logo-details">
      <i></i>
      <span class="logo_name">Pharmacy</span>
    </div>
      <ul class="nav-links">
        <li>
          <a href="user-dashboard.php">
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="user-patient-profile1.php">
            <i class='bx bx-list-ul' ></i>
            <span class="links_name">Patient Profile</span>
          </a>
        </li>
        <li>
          <a href="user-patient-record.php" class="active">
            <i class='bx bx-box' ></i>
            <span class="links_name">Patient Record</span>
          </a>
        </li>
        <li>
          <a href="user-inventory.php">
            <i class='bx bx-pie-chart-alt-2' ></i>
            <span class="links_name">Inventory</span>
          </a>
        </li>
        <!-- <li>
          <a href="user-sales-report.php">
            <i class='bx bx-coin-stack' ></i>
            <span class="links_name">Crystal Report</span>
          </a>
        </li> -->
      </ul>
  </div>
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
      </div>
      <div class="title">
        <img class="img-poc" src="POC_Name.png">
      </div>
        <div class="w3-container">
          <div class="w3-dropdown-click">
            <button onclick="myFunction()" class="w3-button w3-green" style="border-radius: 0.25rem;">Logout</button>
            <div id="Demo" class="w3-dropdown-content w3-bar-block w3-border">
              <a href="user-user-profile.php" class="w3-bar-item w3-button">Profile</a>
              <a href="logout.php" class="w3-bar-item w3-button">Logout</a>
            </div>
          </div>
        </div>
    </nav>

    <div class="home-content">
      <div class="sales-boxes">
        <div class="recent-sales box">

          <?php 
          include 'connection.php';
          if (isset($_POST['search'])) {
            # code...
            $valuesearch = $_POST['valuesearch'];

            $query = "SELECT * FROM `patientprofiletbl` WHERE CONCAT(`cnum`,`fname`,`mname`,`lname`) LIKE '%".$valuesearch."%'";
            $result=mysqli_query($con,$query);

          } else {  
            $query = "SELECT * FROM `patientprofiletbl`";
            $result = mysqli_query($con,$query);
          }
          ?>

          <form action="user-patient-record.php" method="post">
            <!-- <div class="col-md-10">
              <input type="text" class="form-control" name="valuesearch" placeholder=" Search Name, Middle Name, Surname, or Case Number">
            </div>
            <div class="col-md-2">
              <button type="submit" name="search" id="searcbtn" class="search btn btn-info">Search</button>
            </div><br><br><br><br><br> -->
            <table id="myTable" class="table table-striped table-bordered table-hover">  
              <thead style="font-size: 12px;">  
                <tr>  
                  <th>Case No.</th>
                  <th>Last Name</th>
                  <th>First Name</th>
                  <th>Middle Name</th>
                  <th>Sex</th>
                  <th>Ward</th>
                  <th>Date</th>
                  <th>Action</th>  
                </tr>  
              </thead>  
              <tbody style="font-size: 15px;">  
                
                  <?php
                   while ($row = mysqli_fetch_array($result)) {
                    # code...
                  ?>
                  <div class="column">
                    <tr align="center">
                      <td><?php echo $row['cnum'];?></td>
                      <td><?php echo $row['lname'];?></td>
                      <td><?php echo $row['fname'];?></td>
                      <td><?php echo $row['mname'];?></td>
                      <td><?php echo $row['gend'];?></td>
                      <td><?php echo $row['wrd'];?></td>
                      <td><?php echo date("M d,Y",strtotime($row['dadmit'])) ?></td>
                      <td><a href="user-patient-dataview.php?patient_id=<?php echo $row['id'];?>"  class="btn btn-info">VIEW</a></td>
                    </tr>
                  </div>
                  <?php
                  }
                  ?> 
              </tbody>  
            </table>
          </form> 

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