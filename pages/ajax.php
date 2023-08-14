<?php 
ob_start();
$action = $_GET['action'];

include('filter.php');

$crud = new Action();  //Login============ Start 
if ($action == "admin_sales_report") {
	$save = $crud->admin_sales_report();
	if ($save) {
		echo $save;
	}
}
ob_end_flush();
?>