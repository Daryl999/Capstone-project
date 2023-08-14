<?php  if (session_status() === PHP_SESSION_NONE){ session_start(); } ?>

<!DOCTYPE html>
<html>
<title>PRINT</title>
<head>
  <style>
    /* css */
    table {
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
    .column1 {

    }
    .column2 {
      margin-left: 350px;
      margin-top: -183px;
    }
    label {
      font-size: 17px;
    }
  </style>
</head>
<body>

  <div class="row mb">
          <!-- page start-->

          <div class="content-panel">
            <div style="margin-left: 3%; margin-right: 3%; font-size: 15px;" class="adv-table">
              <table cellpadding="0" cellspacing="0" border="0" class="display table table-hover" id="hidden-table-info" >
                <thead>
                  <th >Date Order</th>
                  <th >Name of Medicine</th>
                  <th>Quantity</th>
                  <th>Price Each</th> 
                  <th>Total Price</th> 
                </thead>
          <tbody>
            <?php
              include_once('connection.php');

                  $id=$_GET['patient_id'];
                  $sql = "SELECT * FROM patientprofiletbl WHERE id='$id'";
                  $result = mysqli_query($con,$sql);
                  $row1 = mysqli_fetch_assoc($result);

              ?>
                
                <center>
                  <img src="POC_Name.png">
                  <br>

                  <label style=""> 
                     <b>PHARAMCY SECTION</b>
                     <br>
                     <b>PATIENT'S MEDICATION PROFILE</b>
                    <br>
                    <br>
                  </label>
                </center>
                <br><br>
                <div class="column1">
                <label><b>Name :</b> <?php echo $row1['lname']?>, <?php echo $row1['fname']?> <?php echo $row1['mname']?></label>
                <br>
                <label><b>Ward :</b> <?php echo $row1['wrd']?></label>
                <br>
                <label><b>Height :</b> <?php echo $row1['height']?></label>
                <br>
                <label><b>Contact Number :</b> <?php echo $row1['contact']?></label> 
                <br>
                <label><b>Marital Status :</b> <?php echo $row1['sstat']?></label>            
                <br>
                <label><b>Sex :</b> <?php echo $row1['gend']?></label>
                <br>
                <label><b>Birthday :</b> <?php echo date("M d,Y",strtotime($row1['bday'])) ?></label>
                <br>
                <label><b>Age :</b> <?php echo $row1['age']?></label>
                <br>
                <label><b>Diagnosis :</b> <?php echo $row1['diag']?></label>
                <br>
                </div>
                <div class="column2">
                  <label><b>Case Number :</b> <?php echo $row1['cnum']?></label> 
                  <br>
                  <label><b>Date Admit :</b> <?php echo date("M d,Y",strtotime($row1['dadmit'])) ?></label> 
                  <br>   
                  <label><b>Weight :</b> <?php echo $row1['weight']?></label> 
                  <br>
                  <label><b>Date Discharge :</b> <?php echo date("M d,Y",strtotime($row1['ddis'])) ?></label>
                  <br>
                  <label><b>Attending Physician :</b> <?php echo $row1['aphy']?></label>
                  <br>
                  <label><b>Allergy :</b> <?php echo $row1['alerg']?></label>
                  <br>
                  <label><b>Diet :</b> <?php echo $row1['diet']?> </label>
                </div>
                <br><br><br><br>
            <?php

          if(isset($_GET['order_date'])){

              $id = $_GET['patient_id'];
              $input = $_GET['order_date'];

              $query = "SELECT * FROM prescriptiontbl WHERE patient_dorder = '$input' AND patient_id = '$id' ORDER BY id";
              $result = mysqli_query($con, $query);

              $grand_total = 0;

              if(mysqli_num_rows($result) > 0){
              while ($row =mysqli_fetch_array($result)) {
                $grand_total = 0
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
                $input = $_GET['patient_id'];
                  $query = "SELECT * FROM prescriptiontbl WHERE patient_id='$input'AND patient_id = '$id' ORDER BY id"; 
                  $result = mysqli_query($con, $query);

                  if(mysqli_num_rows($result) > 0){
                  while ($row =mysqli_fetch_array($result)) {
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
            }
            ?>
                 <td colspan="3"></td>
                 <?php 
              $patient_id = $_GET['patient_id'];
              $order_date = isset($_GET['order_date']) ? $_GET['order_date'] : null;
              if (!empty($patient_id && !empty($order_date))) { ?>
                <td>Partial Total</td>
              <td  id="total"><?php echo number_format($grand_total,2) ?></td>
            </tr>
              <?php } else { ?> 
                <td>Grand Total</td>
              <td  id="total"><?php echo number_format($grand_total,2) ?></td>
            </tr>
              <?php } ?>
              
              </table>
            </div>
          </div>
          <!-- page end-->
        </div>
  <script>
      window.print();
  </script>

</body>
</html>