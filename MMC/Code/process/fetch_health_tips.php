<?php
include '../connection/connect-database.php';


    $sql="select count(id) as total from health_tips";
    $exc=$conn->query($sql);
    $row = mysqli_fetch_assoc($exc);
    $n=rand(1,$row["total"]);

    $sql="select tips from health_tips where id=".$n;
    $exc=$conn->query($sql);
    $row = mysqli_fetch_assoc($exc);
    echo $row["tips"];

?>