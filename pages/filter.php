<?php  if (session_status() === PHP_SESSION_NONE){ session_start(); } ?>
<?php  
 //filter.php  
 if(isset($_POST["from_date"], $_POST["to_date"]))  
 {  
      $connect = mysqli_connect("localhost", "root", "", "dbs5321751");  
      $output = '';  

      $from_date = $_POST['from_date'];
      $to_date = $_POST['to_date'];
      $_SESSION['from_date'] = $from_date;
      $_SESSION['to_date'] = $to_date;

      $query = "  
           SELECT * FROM prescriptiontbl WHERE patient_dorder BETWEEN '$from_date' AND '$to_date'";  
      $result = mysqli_query($connect, $query);  
      $output .= '  
           <table class="table table-bordered">  
                <tr>    
                     <th>Order Date</th>
                     <th>Name of Medicines</th>  
                     <th>Quantity</th>  
                     <th>Price Each</th>   
                     <th>Total</th>   
                </tr>  
      ';  

      $total_order = 0;

      if(mysqli_num_rows($result) > 0)  
      {  
           while($row = mysqli_fetch_array($result))  
           {  
            $total_price = $row["patient_qty"] * $row["patient_prc"];
                $output .= '  
                     <tr>  
                          <td>'.date("M d,Y",strtotime($row["patient_dorder"])).'</td>
                          <td>'. $row["patient_nom"] .'</td>  
                          <td>'. $row["patient_qty"] .'</td>  
                          <td>₱ '.number_format($row["patient_prc"],2).'</td> 
                          <td id="loop">₱ '.number_format($total_price,2).'</td>    
                     </tr>  
                ';  

                  $total_order = $total_order + floatval($total_price);
                  // $total_prc = $total_prc + floatval($row["patient_prc"])];
                  // $total_order = $total_order + floatval($row["patient_qty"]) * floatval($row["patient_prc"]);

           }  

           $output .= '<tr align= center>
               <th colspan="4" style="text-align: right;">Partial Price</th>
               <td ><b>₱'.number_format($total_order,2).'</b></td>
               
                </tr>';

      }  
      else  
      {  
           $output .= '  
                <tr>  
                     <td colspan="4">No Order Found</td>  
                </tr>  
           ';  
      }  
      $output .= '</table>';  
      echo $output;  
 }  
 ?>