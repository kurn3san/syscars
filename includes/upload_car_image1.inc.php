<?php

$file1 = $_FILES['carImg1'];


if (!empty($_FILES['carImg1']['name']))
{
    $fileName1 = $_FILES['carImg1']['name'];
    $fileTmpName1 = $_FILES['carImg1']['tmp_name'];
    $fileSize1 = $_FILES['carImg1']['size'];
    $fileError1 = $_FILES['carImg1']['error'];
    $fileType1 = $_FILES['carImg1']['type']; 

    $fileExt1 = explode('.', $fileName1);
    $fileActualExt1 = strtolower(end($fileExt1));

    $allowed1 = array('jpg', 'jpeg', 'png', 'gif');
    if (in_array($fileActualExt1, $allowed1))
    {
        if ($fileError1 === 0)
        {
            if ($fileSize1 < 10000000)
            {
                $FileNameNew1 = uniqid('', true) . "." . $fileActualExt1;
                $fileDestination1 = '../uploads/' . $FileNameNew1;
                move_uploaded_file($fileTmpName1, $fileDestination1);

            }
            else
            {
                header("Location: ../add.php?error=imgsizeexceeded");
                exit(); 
            }
        }
        else
        {
            header("Location: ../add.php?error=imguploaderror");
            exit();
        }
    }
    else
    {
        header("Location: ../add.php?error=invalidimagetype");
        exit();
    }
}
