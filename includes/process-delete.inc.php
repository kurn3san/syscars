<?php

if (isset($_POST['searchDelete-car-submit']))
{    
    $deleteCarsid=0;
    global $deleteCarsid;
    require 'dbh.inc.php';
    
    $model = $_POST['d-model'];
    $brand = $_POST['d-brand'];
    $colour=$_POST['d-colour'];
    
    if (empty($model) || empty($brand)||empty($colour))
    {
        header("Location: ../delete.php?error=emptyfields!");
        exit();
    }
    else
    {
    $sql = "DELETE FROM cars WHERE Model=? and Brand=? and colour=?;";
        $stmt = mysqli_stmt_init($conn);
        
        if (!mysqli_stmt_prepare($stmt, $sql))
        {
            header("Location: ../delete.php?error=sqlerror");
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt, "sss", $model,$brand,$colour);
            mysqli_stmt_execute($stmt);
            
            $deletedRows = mysqli_affected_rows($conn);
            if($deletedRows>0){
                echo'Sucess!';
                header("Location: ../index.php?message=Sucessfully_deleted");
                exit();
            }
        }
    }
           
            
        
    }

 else 
{
    header("Location: ../index.php");
    exit();
}

?>


