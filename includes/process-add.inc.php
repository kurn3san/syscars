<?php
if(isset($_POST['add-car-submit']))
{


echo'
<script>
console.log("hoo");
</script>';


 require 'dbh.inc.php';
    
    $userName = $_POST['uid'];
    $model = $_POST['model'];
    $brand = $_POST['brand'];
    $colour  = $_POST['colour'];
    $kacTane = $_POST['kacTane'];
    $description = $_POST['description'];


    // checking if a user already exists with the given username
        $sql = "select idCars from cars where Model=? and Brand=? and colour=?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql))
        {
            header("Location: ../add.php?error=sqlerror");
            exit();
        }else
        {
            mysqli_stmt_bind_param($stmt, "sss", $model,$brand,$colour);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            
            
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if ($resultCheck > 0)
            {
                header("Location: ../add.php?error=already_exists");
                exit();
            }
            else{
                //here you add
                $FileNameNew1 = 'default_car_1.png';
                $FileNameNew2 = 'default_car_2.png';
                $FileNameNew3 = 'default_car_3.png';
                $FileNameNew4 = 'default_car_4.png';

                require 'upload_car_image1.inc.php';
                require 'upload_car_image2.inc.php';
                require 'upload_car_image3.inc.php';
                require 'upload_car_image4.inc.php';

                $sql = "insert into cars(Model, Brand, colour, kacTane, description, "
                        . "carImg1, carImg2, carImg3,carImg4) "
                        . "values (?,?,?,?,?,?,?,?,?)";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql))
                {
                    header("Location: ../add.php?error=sqlerror");
                    exit();
                }
                else
                {                    
                    mysqli_stmt_bind_param($stmt, "sssisssss",$model, $brand, $colour, $kacTane, $description,
                            $FileNameNew1, $FileNameNew2,
                            $FileNameNew3, $FileNameNew4);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_store_result($stmt);
                    
                    header("Location: ../index.php?signup=success");
                    exit();
                }

                /////
                header("Location: ../index.php?message=done!");
                            print($resultCheck);

                exit();
        
            }
                }

    
}



