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

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="shortcut icon" type="image/x-1con" href="PMS.PNG" />
    
  <script type="application/javascript">

    function isNumberKey(evt)
        {
           var charCode = (evt.which) ? evt.which : event.keyCode
           if (charCode > 31 && (charCode < 48 || charCode > 57))
              return false;

           return true;
        }

  </script>

  <style>
    
    .img-poc {
      width: 76%;
    }
    
  </style>

   </head>

   <?php 
  include "session.php";
  include 'admin-session.php'
  ?>

<?php
    //PHP $_REQUEST is a PHP super global variable which is used to collect data after submittin an HTML form or requesting data from other file.
    include 'connection.php';
    $request = $_REQUEST['id'];
    //select request by id
    $query = "SELECT * FROM medicinetbl where id='$request'";
    $result= mysqli_query($con,$query);
    
    while($row=mysqli_fetch_array($result))
    { 
        $data= $row; 
    }
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
          <div class="title" align="center">Update Stock</div><hr>

            <form action="user-update-medicine-action.php" method="POST">
              <span id="error"></span>
       <table class="table table-bordered" id="item_table">
        <tr>
         <th>Name of Medicine</th>
         <th>Current Quantity</th>
         <th>Enter Quantity</th>
         <th>Enter Price Each</th>
        </tr>
        <tr>
          <input value ="<?=$data['id']?>" type ="hidden" name="id">
          <td><input type="text" class="form-control #" name="med_nom" value = "<?=$data['med_nom']?>"></td>
          <td><input type="text" onkeypress="return isNumberKey(event)" maxlength="10" class="form-control #" name="current_med_qty" value = "<?=$data['med_qty']?>" readonly></td>
          <td><input type="text" onkeypress="return isNumberKey(event)" maxlength="10" class="form-control #" name="med_qty" value = ""></td>
          <td><input type="text" onkeypress="return isNumberKey(event)" maxlength="10" class="form-control #" name="med_prc" value = "<?=$data['med_prc']?>"></td>
        </tr>
       </table>
       <div align="center">
        <br>
        <input type="submit" name="submit" class="btn btn-info" value="Update" />
       </div>

            </form>

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