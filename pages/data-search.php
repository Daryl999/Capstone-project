<?php
include "connetion.php";
if(isset($_POST['search'])){
        $input = $_POST['search'];

        $query = "SELECT * FROM prescriptiontbl WHERE patient_dorder='$input' ORDER BY id"; 
        $result = mysqli_query($con, $query);

        if(mysqli_num_rows($result) > 0){
        while ($row =mysqli_fetch_array($result)) {
        	# code...
        
        


	$total_price = 0;
	$grand_total = 0;
?>
		<td><?php echo $row["patient_dorder"];?></td>
		<td><?php echo $row["patient_nom"];?></td>  
		<td><?php echo $row["patient_qty"]; ?></td>
		<td><?php echo $row["patient_prc"];?></td>
		<?php  $total_price = $row["patient_qty"] * $row["patient_prc"];  ?>
		<td><?php echo $total_price ?></td> 

	<?php
		$grand_total = $grand_total + $total_price;
		}}else{
			echo "no value";
		}
	}
	?>

        <td colspan="3"></td>
		<td>GRAND TOTAL</td>
		<td><?php echo $grand_total ?></td>
