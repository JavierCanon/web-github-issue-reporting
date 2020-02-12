<?php

//TODO: SPAM validation, block malicious users.

if(!isset($_FILES['file']['name'])){
    die("Error, not file.");

}

$uploadDir = 'Upload/';
$uploadFile = $uploadDir . basename($_FILES['file']['name']);
if (is_uploaded_file($_FILES['file']['tmp_name']))
{
    echo "File ". $_FILES['file']['name'] ." is successfully uploaded!\r\n";
    if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadFile))
    {
        echo "File is successfully stored! ";
    }
    else print_r($_FILES);
}
else
{
    print_r($_FILES);
    die("Upload Failed!");
}
?>
