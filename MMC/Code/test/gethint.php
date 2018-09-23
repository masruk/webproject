 <?php
 include '../connection/connect-database.php';

$q = $_REQUEST["q"];
 
if ($q !== "") {
   
    $sql="select first_name,last_name from students where studentId=".$q;
	$res=$conn->query($sql);
	$row = mysqli_fetch_assoc($res);
	echo $row["first_name"]." ".$row["last_name"];

}
?> 