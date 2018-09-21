 <?php
 include '../connection/connect-database.php';

$q = $_REQUEST["q"];
 
if ($q !== "") {
   
	$now = new DateTime();
    $sql="select dob from students where studentId=".$q;
	$dob=$conn->query($sql);
	$row = mysqli_fetch_assoc($dob);

	//echo $row["dob"];
	$dob = new DateTime($row["dob"]);
	 
	 $age = $now->diff($dob);
	 echo $age->y;

	

}
?> 