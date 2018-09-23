 <?php
 include '../connection/connect-database.php';
session_start();
$q = $_REQUEST["q"];
 
if ($q !== "") {
   
    $sql="select first_name,last_name from students where studentId=".$q;
	if($res=$conn->query($sql)){
		$row = mysqli_fetch_assoc($res);
		echo $row["first_name"]." ".$row["last_name"];
		$_SESSION["patientid"]=$q;
		
		
	}
	
	

}
?> 