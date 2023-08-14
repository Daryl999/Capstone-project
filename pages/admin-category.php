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

  <style>
    {
        box-sizing: border-box;
    }
    /* Set additional styling options for the columns*/
    .column {
    float: left;
    width: 50%;
    }

    .row:after {
    content: "";
    display: table;
    clear: both;
    }
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
      font-size: 17px;
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
          <a href="admin-inventory.php">
            <i class=' bx bx-undo' ></i>
            <span class="links_name">Return</span>
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
    </nav>

    <div class="home-content">
      <div class="sales-boxes">
        <div class="recent-sales box">
          <div class="title" align="center">Add New Category</div><hr><br>

          <form action="admin-category-action.php" class="form-container" method="post">
            <div class="row">
              <div class="column">
                <div class="d-flex fcol-md-3 align-items-center text-center p-3 py-5">
                  <div class="col-md-9">
                  <input class="form-control" type="text" name="categoryname" placeholder="Enter New Category" required="">
                </div>
                  <div class="col-md-2">
                  <button type="submit" name="submit" onclick="return confirm('Are you sure you want to save this record?');" class="btn btn-info">Save</button>
                </div>
                </div>
              </div>
          </form>
          <?php
            include 'connection.php';
            $connect = mysqli_connect("db5006392531.hosting-data.io", "dbu1468779", "@TDMSgroup9!", "dbs5321751");  
            $sql = "SELECT * FROM `categorytbl`";  
            $result = mysqli_query($connect, $sql);  
          ?>
              <div class="column">
                <!-- <div class="col-md-14"> -->
                  <table id="myTable" class="table table-striped table-bordered table-hover">
                    <thead style="font-size: 12px;">
                    <tr>
                      <th>NAME OF CATEGORY</th>
                    </tr>
                    </thead>
                    <tbody style="font-size: 15px;">
                    <tr>
                      <?php  
                      if(mysqli_num_rows($result) > 0) {  
                        while($row = mysqli_fetch_array($result))  
                        {
                      ?>
                      <tr>  
                        <td><?php echo $row["categoryname"];?></td>
                      </tr> 
                      <?php
                         }  
                      }  
                      ?> 
                    </tr>
                    </tbody>
                  </table>
                <!-- </div> -->
              </div>
            </div>
        </div>
      </div>
    </div>
  </section>

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