<?php
include '../connection/connect-database.php';
session_start();


$query="SELECT medicineName FROM proposedmedicines WHERE proposalid=".$_POST["proposedid"].";";
$res=$conn->query($query);

//  var_dump($_POST);

    while($row=mysqli_fetch_assoc($res))
    {
        $trimmedName=preg_replace("/[^A-Za-z0-9]/", "",  $row["medicineName"]);
        //  echo $_POST[$trimmedName]."<br>";

        if(!empty($_POST[$trimmedName])) {
            $query = "INSERT INTO stored_medicine(proposalid, medicineName, quantity,issued_by,issue_date) VALUES (" . $_POST["proposedid"] . ",'" . $row["medicineName"] . "'," . $_POST[$trimmedName] . "," . $_SESSION["username"] . ",CURDATE());";
            $res1 = $conn->query($query);

        }
    }

    header('Location:../pages/proposalwisestore.php');

?>