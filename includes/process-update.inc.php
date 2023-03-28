<?php
if(isset($_POST['update-car-submit']))
{


echo'
<script>
console.log("hoo");
</script>';


 require 'dbh.inc.php';
    $id=$_GET['id'];
    print($id);
    $model = $_POST['u-model'];
    $brand = $_POST['u-brand'];
    $colour  = $_POST['u-colour'];
    $kacTane = $_POST['u-kacTane'];
    $description = $_POST['u-description'];


    // checking if a user already exists with the given username
    $FileNameNew1 = 'default_car_1.png';
                $FileNameNew2 = 'default_car_2.png';
                $FileNameNew3 = 'default_car_3.png';
                $FileNameNew4 = 'default_car_4.png';

                require 'upload_car_image1.inc.php';
                require 'upload_car_image2.inc.php';
                require 'upload_car_image3.inc.php';
                require 'upload_car_image4.inc.php';
        $sql = "update cars set Model=? , Brand=? , colour=?,kacTane=?, description=?, "
                        . "carImg1=?, carImg2=?, carImg3=?,carImg4=? "
                        ."where idCars=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql))
        {
            header("Location: ../update.php?error=sqlerror");
            exit();
        }else
        {
            mysqli_stmt_bind_param($stmt, "sssisssssi",$model, $brand, $colour, $kacTane, $description,
                            $FileNameNew1, $FileNameNew2,
                            $FileNameNew3, $FileNameNew4,$id); 
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            header("Location: ../index.php?update=success");
            exit();
        
                }

    
}



