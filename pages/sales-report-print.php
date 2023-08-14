<?php if (session_status() === PHP_SESSION_NONE){ session_start(); } ?>
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
                  <th>Date Dispense</th>
                  <th >Name Of Medicine</th>
                  <th >Quantity</th>
                  <th>Price Each</th>
                  <th>Total</th>
                </thead>
          <tbody>
            <?php
              include_once('connection.php');
                if(isset($_SESSION['to_date']) && isset($_SESSION['from_date'])){
                  $from_date = $_SESSION['from_date'];
                  $to_date = $_SESSION['to_date'];

                  $sql = "SELECT * FROM prescriptiontbl  
                            WHERE patient_dorder 
                            BETWEEN '$from_date' AND '$to_date' ";

        }else{
          $sql = "SELECT * FROM `prescriptiontbl` ";

        }
                  // Refresh the filtration of date
                  unset($_SESSION['to_date']);
                  unset($_SESSION['from_date']);

              //use for MySQLi-OOP
              $query = $con->query($sql);
              ?>
                
                <center>
                  <img src="POC_Name.png">
                  <br>
                  <label style=""> 
                     <b>PHARMACY SECTION</b>
                     <h5>LIST OF DISPENSE MEDICINES</h5>
                    <br>
                    <br>
                  </label>
                </center>
              <?php
              $grand_total = 0;
              while($row = $query->fetch_assoc()){
                ?>
                <tr>   
                  <td><?php echo date("M d,Y",strtotime($row["patient_dorder"])) ?></td>
                  <td><?php echo $row["patient_nom"]; ?></td>  
                  <td><?php echo $row["patient_qty"]; ?></td>  
                  <td>₱ <?php echo number_format($row["patient_prc"],2) ?></td>
                  <?php  $total_price = $row["patient_qty"] * $row["patient_prc"];  ?>
                  <td><?php echo number_format($total_price,2) ?></td>     
                </tr>
                <?php
                
                $grand_total = $grand_total + $total_price;
              }

            ?>
          </tbody>
          <td colspan="3"></td>
           <th>Total Price</th>
           <th><?php echo number_format($grand_total,2) ?></th>
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