<?php
if (isset($_POST['DontDelete-car-now'])){
    $deleteCarsid=null;
    unset($deleteCarsid);
    echo'<script>console.log("here")</script>';
    header("Location: ../delete.php?message=this_car_was_not_deleted");
    exit();
}
if (isset($_POST['Delete-car-now'])){

    $sql = "delete * FROM cars where idCars=?";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_bind_param($stmt, "s", $model,$brand,$colour);
    mysqli_stmt_execute($stmt);
            
    $result = mysqli_stmt_get_result($stmt);
            
    if($row = mysqli_fetch_assoc($result))
        {                
                    $deleteCarsid=null;
    unset($deleteCarsid);
                header("Location: ../delete.php?resulte=car_found");
                exit();
            }
        else
            {
                header("Location: ../delete.php?error=carNotFound");
                exit();
            }
       
    $deleteCarsid=null;
    unset($deleteCarsid);
    echo'<script>console.log("here")</script>';
    header("Location: ../index.php?message=this_car_was_not_deleted");
    exit();
}

?>