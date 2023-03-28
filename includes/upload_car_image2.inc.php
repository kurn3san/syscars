<?php

$file2 = $_FILES['carImg2'];

if (!empty($_FILES['carImg2']['name']))
{
    $fileName2 = $_FILES['carImg2']['name'];
    $fileTmpName2 = $_FILES['carImg2']['tmp_name'];
    $fileSize2 = $_FILES['carImg2']['size'];
    $fileError2 = $_FILES['carImg2']['error'];
    $fileType2 = $_FILES['carImg2']['type']; 

    $fileExt2 = explode('.', $fileName2);
    $fileActualExt2 = strtolower(end($fileExt2));

    $allowed2 = array('jpg', 'jpeg', 'png', 'gif');
    if (in_array($fileActualExt2, $allowed2))
    {
        if ($fileError2 === 0)
        {
            if ($fileSize2 < 10000000)
            {
                $FileNameNew2 = uniqid('', true) . "." . $fileActualExt2;
                $fileDestination2 = '../uploads/' . $FileNameNew2;
                move_uploaded_file($fileTmpName2, $fileDestination2);

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
