<?php
    include "connection.php";
    
    if (isset($_POST['id'])){
        $id=$_POST['id'];
        $med_nom=$_POST['med_nom'];
        $current_med_qty=$_POST['current_med_qty'];
        $med_qty=$_POST['med_qty'];
        $med_prc=$_POST['med_prc'];

        $total_qty = $current_med_qty + $med_qty;
        
            $query = "UPDATE medicinetbl SET `med_nom`= '$med_nom', 
                                            `med_qty`= '$total_qty',
                                            `med_prc`='$med_prc' 
                                            WHERE `id` = '$id'";
           
            if ($query) {
                ?>
                <script>
               alert("Successfully Updated");
                window.location.href ='user-inventory.php';
                </script>
                <?php
            }
            else{
                ?>
                <script>
                alert("Failed to Update");
                window.location.href = 'user-inventory.php';
                </script>
                
                <?php
            }
        mysqli_query($con,$query);
    }
?>