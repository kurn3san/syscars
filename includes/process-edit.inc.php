<?php

if (isset($_POST['searchS-car-submit']))
{    

    $deleteCarsid=0;
    global $deleteCarsid;
    require 'dbh.inc.php';
    
    $model = $_POST['e-model'];
    $brand = $_POST['e-brand'];
    $colour=$_POST['e-colour'];
    
    if (empty($model) || empty($brand)||empty($colour))
    {
        header("Location: ../edit.php?error=emptyfields!");
        exit();
    }
    else
    {
    $sql = "select * FROM cars WHERE Model=? and Brand=? and colour=?;";
        $stmt = mysqli_stmt_init($conn);
        
        if (!mysqli_stmt_prepare($stmt, $sql))
        {
            header("Location: ../edit.php?error=sqlerror");
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt, "sss", $model,$brand,$colour);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if($row = mysqli_fetch_assoc($result)){
                session_start();
                            $_SESSION['idCars'] = $row['idCars'];
                            $_SESSION['Model'] = $row['Model'];
                            $_SESSION['Brand'] = $row['Brand'];
                            $_SESSION['colour'] = $row['colour'];
                            $_SESSION['kacTane'] = $row['kacTane'];
                            $_SESSION['description'] = $row['description'];
                            $_SESSION['carImg1'] = $row['carImg1'];
                            $_SESSION['carImg2'] = $row['carImg2'];
                            $_SESSION['carImg3'] = $row['carImg3'];
                            $_SESSION['carImg4']=$row['carImg4'];
                            header("Location: ../update.php?");
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


