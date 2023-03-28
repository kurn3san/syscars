<?php

$file4 = $_FILES['carImg4'];

if (!empty($_FILES['carImg4']['name']))
{
    $fileName4 = $_FILES['carImg4']['name'];
    $fileTmpName4 = $_FILES['carImg4']['tmp_name'];
    $fileSize4 = $_FILES['carImg4']['size'];
    $fileError4 = $_FILES['carImg4']['error'];
    $fileType4 = $_FILES['carImg4']['type']; 

    $fileExt4 = explode('.', $fileName4);
    $fileActualExt4 = strtolower(end($fileExt4));

    $allowed4 = array('jpg', 'jpeg', 'png', 'gif');
    if (in_array($fileActualExt4, $allowed4))
    {
        if ($fileError4 === 0)
        {
            if ($fileSize4 < 10000000)
            {
                $FileNameNew4 = uniqid('', true) . "." . $fileActualExt4;
                $fileDestination4 = '../uploads/' . $FileNameNew4;
                move_uploaded_file($fileTmpName4, $fileDestination4);

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
