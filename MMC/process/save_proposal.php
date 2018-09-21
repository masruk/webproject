<?php
include '../connection/connect-database.php';
$number = count($_POST["medicine"]);
session_start();

if($number >= 1)
{
    $sql="SELECT MAX(proposalid) as maxid FROM proposal";
    $res=$conn->query($sql);
    $row=mysqli_fetch_assoc($res);
    if($row["maxid"]=="")
        $pid=200001;
    else $pid=$row["maxid"]+1;

    $sql2 = "INSERT INTO proposal(proposalid,generatedby, proposaldate) VALUES (".$pid.",".$_SESSION["username"].",CURDATE());";
    $res2=$conn->query($sql2);


    for($i=0; $i<$number; $i++)
    {
        if(trim($_POST["medicine"][$i] != ''))
        {

            $sql1 = "INSERT INTO proposedmedicines(proposalid,medicineName,dose,chemicalName,company,quantity,cost) VALUES(".$pid.",'".$_POST["medicine"][$i]."','".$_POST["dose"][$i]."','".$_POST["chemical"][$i]."','".$_POST["company"][$i]."','".$_POST["quantity"][$i]."','".$_POST["approxcost"][$i]."');";
            $res1=$conn->query($sql1);

        }

    }

    $x=array("Successfully Prescribed",($pid+1));
    $message = json_encode($x);
    echo $message;
}


?>


