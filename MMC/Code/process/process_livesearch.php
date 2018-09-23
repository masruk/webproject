<?php
    include '../connection/connect-database.php';

    $key=$_GET["key"];
   $cat=$_GET["cat"];

    if($cat=="medicine")
    {
        $query="SELECT medicineName FROM mistmedical.medicines WHERE medicineName LIKE '".$key."'";
        $res=$conn->query($query);
        echo json_encode($res);

    }
    else if($cat="patient")
    {

    }



?>
