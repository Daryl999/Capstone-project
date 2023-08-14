<?php
 include "connection.php";
    if(isset($_POST['input'])){
        $input = $_POST['input'];
        
        $query = "SELECT * FROM medicinetbl WHERE med_nom = '$input' ";

        $result = mysqli_query($con,$query);

        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
               ?>
                <input type="text" name="patient_prc[]" maxlength="10" class="form-control patient_prc" value="<?php echo $row['med_prc']; ?>" />
                <?php
            }
        }else{
        }
    }
?>