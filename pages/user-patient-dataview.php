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

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- script for symbol -->
	<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

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
    .name b {
      color: #1cc88a;
    }
    .casenumber b {
      color: #1cc88a;
    }
    .details b {
      color: #1cc88a;
    }
    .patientprofile b {
      color: #1cc88a;
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
          <a href="user-patient-record.php">
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

<?php
include 'connection.php';

if (isset($_GET['patient_id'])) {
  $id = $_GET['patient_id'];
  $query="SELECT * FROM patientprofiletbl WHERE id='$id' ";
  $result = mysqli_query($con,$query);
}
while($row=mysqli_fetch_array($result))
{
?>

    <div class="home-content">
      <div class="sales-boxes">
        <div class="recent-sales box">
          <div class="title" align="center">Patient Medication Profile</div>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <a href="user-patient-profile-edit.php?patient_id=<?php echo $row['id'];?>"><i class="fa fa-edit"></i></a>&nbsp;
          <a href="user-add-prescription.php?patient_id=<?php echo $row['id'];?>"><i class="fa fa-plus"></i></a>&nbsp;
          <a href="patient-profile-print.php?patient_id=<?php echo $_GET['patient_id']; ?>&order_date=<?php echo $_GET['order_date']; ?>" target="_blank" ><i class="fa fa-print"></i></a><hr>
<div class="column">
  <div class="name"><br>
    <h3><b>PATIENT NAME</b></h3>
    <div class="labels">
      <h4>
      <label><?php echo $row['lname']; ?></label>
      <label>, <?php echo $row['fname']; ?></label>
      <label><?php echo $row['mname']; ?></label>
      </h4>   
    </div>
  </div>
</div>
<div class="column">
  <div class="casenumber"><br>
    <h3><b>HOSPITAL CASE NO.</b></h3>
    <div class="casenum">
      <h4>
      <label><?php echo $row['cnum']; ?></label>
      </h4>
    </div>
  </div>
</div>

<div class="column">
  <div class="details"><br>
    <h3  class="m-0 font-weight-bold text-success"><b>DETAILS</b></h3>
    <h5>BIRTHDAY</h5>
    <label><?php echo date("M d,Y",strtotime($row['bday'])) ?></label>
    <h5>AGE</h5>
    <label><?php echo $row['age']; ?></label>
    <h5>SEX</h5>
    <label><?php echo $row['gend']; ?></label>
    <h5>MARITAL STATUS</h5>
    <label><?php echo $row['sstat']; ?></label>
    <h5>TEL/MOBILE NO.</h5>
    <label><?php echo $row['contact']; ?></label>
    <h5>WEIGHT</h5>
    <label><?php echo $row['weight']; ?></label>
    <h5>HEIGHT</h5>
    <label><?php echo $row['height']; ?></label>
  </div>
</div>
<div class="column">
  <div class="patientprofile"><br>
    <h3><b>PATIENT PROFILE</b></h3>
    <div class="dates">
      <h5>DATE ADMITTED</h5>
      <label><?php echo date("M d,Y",strtotime($row['dadmit'])) ?></label><br>
      <h5>DATE DISCHARGE</h5>
      <label><?php if(!empty($row['ddis'])){ echo date("M d,Y",strtotime($row['ddis'])); } ?></label><br>
    </div>
    <div class="others">
      <h5>WARD</h5>
      <label><?php echo $row['wrd']; ?></label>
      <h5>ATTENDING PHYSICIAN</h5>
      <label><?php echo $row['aphy']; ?></label>
      <h5>ALLERGIES</h5>
      <label><?php echo $row['alerg']; ?></label>
      <h5>DIET</h5>
      <label><?php echo $row['diet']; ?></label>
      <h5>DIAGNOSIS</h5>
      <label><?php echo $row['diag']; ?></label><br><br>
    </div>
  </div>
</div>
<?php } ?>
<?php  
 $patient_id = $_GET['patient_id'];
 $connect = mysqli_connect("db5006392531.hosting-data.io", "dbu1468779", "@TDMSgroup9!", "dbs5321751"); 
 $sql = "SELECT * FROM prescriptiontbl WHERE patient_id = '$id'";
 $result = mysqli_query($connect, $sql);  
 ?> 

      <form>
      <table>
        <tr>
          <th>Date</th>
          <th>Name of Medicine</th>
          <th>Quantity</th>
          <th>Price Each</th>
          <th>Total Price</th>
        </tr>
        <tr>
        <?php
          $query = "SELECT * FROM prescriptiontbl WHERE patient_id='$id' GROUP BY patient_id, patient_dorder HAVING COUNT(patient_dorder) > 0 ORDER BY id"; 
          $result = mysqli_query($con, $query);
        ?>
        <select  id="search" name="search" class="form-control search" >
          <option>Select Date</option>
          <option value="user-patient-dataview.php?patient_id=<?php echo $id?>">All Date</option>
          <?php
            while($row = mysqli_fetch_assoc($result)){
          ?>
          <option value="user-patient-dataview.php?patient_id=<?php echo $id?>&order_date=<?php echo $row['patient_dorder']; ?>"><?php echo $row['patient_dorder'];  ?></option>
          <?php } ?>
        </select>
              
          <div id="searchresult"></div>
          <?php

          if(isset($_GET['patient_id'])){
            if(isset($_GET['order_date'])){
                  $input = $_GET['order_date'];
                  $id = $_GET['patient_id'];
                  $query = "SELECT * FROM prescriptiontbl WHERE patient_dorder='$input'AND patient_id = '$id' ORDER BY id"; 
                  $result = mysqli_query($con, $query);

                  if(mysqli_num_rows($result) > 0){
                  while ($row =mysqli_fetch_array($result)) {
                    # code...
          ?><tr>
              <td><?php echo date("M d,Y",strtotime($row["patient_dorder"])) ?></td>
              <td><?php echo $row["patient_nom"];?></td>  
              <td><?php echo $row["patient_qty"]; ?></td>
              <td><?php echo number_format($row["patient_prc"],2)?></td>
              <?php  $total_price = $row["patient_qty"] * $row["patient_prc"];  ?>
              <td id="loop"><?php echo number_format($total_price,2) ?></td> 
              <?php  $grand_total = $grand_total + $total_price;  ?>
            </tr>
            <?php
              }
            }else{
                echo "no value";
              }
            }else {
                  $input = $_GET['patient_id'];
                  $query = "SELECT * FROM prescriptiontbl WHERE patient_id='$input'AND patient_id = '$id' ORDER BY id"; 
                  $result = mysqli_query($con, $query);

                  if(mysqli_num_rows($result) > 0){
                  while ($row =mysqli_fetch_array($result)) {
                    # code...
          ?><tr>
              <td><?php echo date("M d,Y",strtotime($row["patient_dorder"])) ?></td>
              <td><?php echo $row["patient_nom"];?></td>  
              <td><?php echo $row["patient_qty"]; ?></td>
              <td><?php echo number_format($row["patient_prc"],2)?></td>
              <?php  $total_price = $row["patient_qty"] * $row["patient_prc"];  ?>
              <td id="loop"><?php echo number_format($total_price,2) ?></td> 
              <?php  $grand_total = $grand_total + $total_price;  ?>
            </tr>
            <?php
              }
            }
            }
            ?>
              <td colspan="3"></td>
              <?php 
              $patient_id = $_GET['patient_id'];
              $order_date = $_GET['order_date'];
              if (!empty($patient_id && !empty($order_date))) { ?>
                <th>Partial Total</th>
              <th  id="total"><?php echo number_format($grand_total,2) ?></th>
            </tr>
              <?php } else { ?> 
                <th>Grand Total</th>
              <th  id="total"><?php echo number_format($grand_total,2) ?></th>
            </tr>
              <?php } ?>
              
                </table>
                </form>
          <?php
          }
          ?>

        </div>
      </div>
    </div>
  </section>
<!-- Computation
<script type="text/javascript">
  //Sum Total
    $(function() {

       var TotalValue = 0;

       $("tr #loop").each(function(index,value){
         currentRow = parseFloat($(this).text());
         TotalValue += currentRow
       });

       document.getElementById('total').innerHTML = TotalValue;

});
</script>
 -->
<script  type="text/javascript">

// dropdown 
var urlmenu = document.getElementById( 'search' );
 urlmenu.onchange = function() {
      window.location.href=( this.options[ this.selectedIndex ].value );

 };
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