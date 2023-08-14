<?php if (session_status() === PHP_SESSION_NONE){ session_start(); } ?>
<!-- refresh -->
<?php 
      if(isset($_GET['action'])){ 
        unset($_SESSION['to_date']);
        unset($_SESSION['from_date']);
        ?>
        <script>
          window.location.href = 'admin-sales-report.php';
        </script>
        <?php
      }
    ?>
<!-- connection in database -->
<?php  
 $connect = mysqli_connect("localhost", "root", "", "dbs5321751");  
 $query = "SELECT * FROM prescriptiontbl ORDER BY id desc";  
 $result = mysqli_query($connect, $query);  
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
    <!-- Whole table CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.min.js" integrity="sha256-hlKLmzaRlE8SCJC1Kw8zoUbU8BxA+8kR3gseuKfMjxA=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.debug.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js" ></script>
    <!-- dropdown -->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  
    <style>
      
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
          <a href="admin-sales-report.php" class="active">
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
          <div class="title" align="center">Medicine Report</div>
          <p align="center">Dispense Data</p>
          <hr>
          <form method="POST">
            <?php
              if (isset($_SESSION['to_date']) && isset($_SESSION['from_date'])) {
                  $to_date = $_SESSION['to_date'];
                  $from_date = $_SESSION['from_date'];
              } else {
                  $to_date = '';
                  $from_date = '';
              }
            ?>
                <div class="col-md-3">  
                     <input type="text" name="from_date" id="from_date" class="form-control" placeholder="From Date" />  
                </div>  
                <div class="col-md-3">  
                     <input type="text" name="to_date" id="to_date" class="form-control" placeholder="To Date" />  
                </div>  

                <div class="col-md-5">  
                     <input type="button" name="filter" id="filter" value="Filter" class="btn btn-info" /> 
                     <a target="_blank" href="sales-report-print.php"  class="btn btn-success" >Print</a>
                     <a href="admin-sales-report.php?action=refresh" class="btn btn-primary" >Refresh</a>
                </div>  
          </form>
                <div style="clear:both"></div>                 
                <br />  
                <div id="order_table">  
                     <table class="table table-bordered">  
                          <tr>    
                               <th>Order Date</th>
                               <th>Name of Medicines</th>  
                               <th>Quantity</th>  
                               <th>Price Each</th>  
                               <th>Total</th> 
                          </tr>  
                     <?php  
                     $grand_total = 0; 
                     while($row = mysqli_fetch_array($result))  
                     {  
                     ?>
                          <tr>   
                               <td><?php echo date("M d,Y",strtotime($row["patient_dorder"])) ?></td>
                               <td><?php echo $row["patient_nom"]; ?></td>  
                               <td><?php echo $row["patient_qty"]; ?></td>  
                               <td>₱ <?php echo number_format($row["patient_prc"],2) ?></td>   
                               <?php  $total_price = $row["patient_qty"] * $row["patient_prc"];  ?>
                               <td>₱ <?php echo number_format($total_price,2) ?></td> 
                          </tr>  
                     <?php  
                     $grand_total = $grand_total + $total_price;
                     }  
                     ?>  
                               <td colspan="3"></td>
                               <th>GRAND TOTAL</th>
                               <th>₱ <?php echo number_format($grand_total,2) ?></th>
                     </table>  
                </div>

        </div>
      </div>
    </div>
  </section>

<script>  
       $(document).ready(function(){
           $.datepicker.setDefaults({  
                dateFormat: 'yy-mm-dd'   
           });  
           $(function(){  
                $("#from_date").datepicker();  
                $("#to_date").datepicker();  
           });  
           $('#filter').click(function(){  
                var from_date = $('#from_date').val();  
                var to_date = $('#to_date').val();   
                
                if(from_date != '' && to_date != '')  
                {  
                     $.ajax({  
                          url:"filter.php",  
                          method:"POST",  
                          data:{
                            from_date:from_date, 
                            to_date:to_date
                          },  
                          success:function(data)  
                          {  
                               $('#order_table').html(data);  
                          }  
                     });  
                }  
                else  
                {  
                     alert("Please Select Date");  
                }  
           });  
      });  
</script>

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