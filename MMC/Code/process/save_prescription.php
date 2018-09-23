<?php
include '../connection/connect-database.php';
$number = count($_POST["medicine"]);
session_start();

if($number >= 1)
{
	$sql="SELECT MAX(prescriptionid) as maxid FROM medicalrecords";
	$res=$conn->query($sql);
	$row=mysqli_fetch_assoc($res);
	if($row["maxid"]=="")
		$pid=200001;
	else $pid=$row["maxid"]+1;

    $sql2 = "INSERT INTO medicalrecords(prescriptionid,patientId, doctorid, prescription_date,desease,bp,weight,temparature, advice) VALUES (".$pid.",".$_SESSION["patientid"].",".$_SESSION["username"].",CURDATE(),'".$_POST["desease"]."','".$_POST["bp"]."','".$_POST["weight"]."','".$_POST["temparature"]."','".$_POST["advice"]."')";
    $res2=$conn->query($sql2);

	
	for($i=0; $i<$number; $i++)
	{
		if(trim($_POST["medicine"][$i] != ''))
		{
			
			$sql1 = "INSERT INTO prescribed_medicine(prescriptionid,medicineName,dose,morning,noon,night,Day,description) VALUES(".$pid.",'".$_POST["medicine"][$i]."','".$_POST["dose"][$i]."','".$_POST["morning"][$i]."','".$_POST["night"][$i]."','".$_POST["noon"][$i]."','".$_POST["day"][$i]."','".$_POST["description"][$i]."');";
			$res1=$conn->query($sql1);

			
		}
		//echo $sql1." ".$sql2;

	}

    echo "Successfully Prescribed";
	
	
}


