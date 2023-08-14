<?php if (session_status() === PHP_SESSION_NONE){ session_start(); } ?>
<!-- refresh -->
<?php 
      if(isset($_GET['action'])){ 
        unset($_SESSION['to_date']);
        unset($_SESSION['from_date']);
        ?>
        <script>
          window.location.href = 'admin-inventory.php';
        </script>
        <?php
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
    <!-- link for textbox design -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <!-- ??? -->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
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
    /* css */
    table {
    margin-top: 3%;
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
    }

    td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }

    .column {
    }
    label {
      font-size: 12px;
    }
    .img-poc {
      width: 76%;
    }
    /*Active*/
    .active {
      background-color: #10a36b;
      border-radius: 0.25rem;
      color: #fff;
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
          <a href="admin-inventory.php" class="active">
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
      <div class="title">
        <img class="img-poc" src="POC_Name.png">
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
    
      <ul class="nav navbar-nav" style="background-color: #d2f4e8; width: 100%; margin-bottom: 2%; border-radius: 0.25rem">
        <li class="active"><a href="admin-inventory.php">Medicine Stocks</a></li>
        <li><a href="admin-archive-medicine.php">Archive Stocks</a></li>
      </ul><br>
    
<?php 
include 'connection.php';

if (isset($_POST['search'])) {
  # code...
  $valuesearchcategory = $_POST['valuesearchcategory'];
  $str = $valuesearchcategory;

  if (empty($valuesearchcategory)) {
    # code...
    echo "<script>alert('Please select category')</script>";
    echo "<script>document.location='admin-inventory.php';</script>";
  }else if (!empty($valuesearchcategory)){
    $query = "SELECT * FROM `medicinetbl` WHERE med_id=$str";
    $result=mysqli_query($con,$query);
  }
}else {
  $query = "SELECT * FROM `medicinetbl`";
  $result = mysqli_query($con,$query);
}
?>

<form action="admin-inventory.php" method="post">
  <div class="col-md-6">
    <select class="form-control category" id="type"  name="valuesearchcategory" required>
              <option disabled selected>Select Category</option>
              <?php 
                        $category_member = "SELECT * FROM categorytbl";

                        $category_result = mysqli_query($con, $category_member);
                                        
                        while ($category_row = mysqli_fetch_array($category_result)):
                      ?>
                      <option value="<?php echo $category_row['id']?>"><?php  echo $category_row['categoryname']; ?></option>

                      <?php 
                      
                      endwhile;
              ?>

        </select>
  </div>
  <div class="col-md-6">
        <button type="submit" name="search" id="searcbtn" class="searchbtn btn btn-info">Search</button>
        <a href="admin-category.php"  class="btn btn-success" >Add Category</a>
        <a href="admin-add-medicine.php"  class="btn btn-success" >Add Medicine</a>
        <a href="admin-inventory.php?action=refresh" class="btn btn-primary" >Refresh</a>
  </div><br><br>
</form>

<form action="medicinedataedit.php" method="post"><br><br>

      <table id="myTable" class="table table-striped table-bordered table-hover">
        <thead style="font-size: 12px;"> 
        <tr>
          <th>Date</th>
          <th>Name of Medicine</th>
          <th>Quantity</th>
          <th>Price Each</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody style="font-size: 15px;"> 
        <?php
 while ($row = mysqli_fetch_array($result)) {
  # code...
  ?>
      <div class="column">
        <tr>
          <td><?php echo date("M d,Y",strtotime($row['med_dorder'])) ?></td>
          <td><?php echo $row['med_nom']; ?></td>
          <td><?php echo $row['med_qty']; ?></td>
          <td>₱ <?php echo number_format($row["med_prc"],2) ?></td>
          <td align="center">
            <a href="admin-update-medicine.php?id=<?php echo $row['id'];?>"  class="btn btn-info">Update</a>
            <a href="admin-inventory.php?id=<?php echo $row['id'];?>" onclick="return confirm('Are you sure you want to archive this record?');" class="btn btn-warning">Archive</a>
          </td>
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

<?php

if(isset($_GET['id'])){
  $id=$_GET['id'];
  $query= "INSERT INTO archivemedicinetbl SELECT * FROM medicinetbl WHERE id='$id' ";

  if($con->query($query) === TRUE){
    $sql="DELETE FROM medicinetbl WHERE id='$id' ";
    if ($con->query($sql) === TRUE) {
    ?>
    <script>
      alert("Record successfully archive.");
      window.location.href='admin-inventory.php';
    </script>
    <?php
    } else {
      $message = "Record failed to archive!";
      echo "<script type='text/javascript'>alert('$message');</script>";
    }
  } else {
    ?>
    <script>
      alert ("Failed to archive");
    </script>
    <?php
  }
}


?>

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
    $('#myTable').dataTable({searching: false, "ordering": false});
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