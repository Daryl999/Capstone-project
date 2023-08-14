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
    <!-- Devider CDN -->
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"> -->

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
          <a href="user-inventory.php">
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

          <form action="user-category-action.php" class="form-container" method="post">
            <div class="row">
              <div class="column">
                <div class="d-flex fcol-md-3 align-items-center text-center p-3 py-5">
                  <div class="col-md-9">
                  <input class="form-control" type="text" name="categoryname" placeholder="Enter New Category" required="">
                </div>
                  <div class="col-md-2">
                  <button type="submit" name="submit" class="btn btn-info">Save</button>
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
                  <table>
                    <tr>
                      <th>NAME OF CATEGORY</th>
                    </tr>
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
                  </table>
                <!-- </div> -->
              </div>
            </div>
        </div>
      </div>
    </div>
  </section>

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