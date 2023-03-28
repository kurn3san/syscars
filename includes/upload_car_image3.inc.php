<?php

$file3 = $_FILES['carImg3'];

if (!empty($_FILES['carImg3']['name']))
{
    $fileName3 = $_FILES['carImg3']['name'];
    $fileTmpName3 = $_FILES['carImg3']['tmp_name'];
    $fileSize3 = $_FILES['carImg3']['size'];
    $fileError3 = $_FILES['carImg3']['error'];
    $fileType3 = $_FILES['carImg3']['type']; 

    $fileExt3 = explode('.', $fileName3);
    $fileActualExt3 = strtolower(end($fileExt3));

    $allowed3 = array('jpg', 'jpeg', 'png', 'gif');
    if (in_array($fileActualExt3, $allowed3))
    {
        if ($fileError3 === 0)
        {
            if ($fileSize3 < 10000000)
            {
                $FileNameNew3 = uniqid('', true) . "." . $fileActualExt3;
                $fileDestination3 = '../uploads/' . $FileNameNew3;
                move_uploaded_file($fileTmpName3, $fileDestination3);

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
