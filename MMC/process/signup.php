<?php include '../connection/connect-database.php';
	session_start();
	$sql="SELECT id,id_category from permitted_account where id=".$_POST["signup_username"];
    $res=$conn->query($sql);	
	
	if($res->num_rows != 0){
	    
		$row = mysqli_fetch_assoc($res);
		
		//$_SESSION["username"]=$row["studentid"];
		//$category=$row["id_category"];
		$sql="INSERT INTO ".$row["id_category"]."S (".$row["id_category"]."id,first_name,PASSWORD) VALUES (".$_POST["signup_username"].",'".$_POST["signup_username"]."','".$_POST["signup_password"]."');";
		$conn->query($sql);
		$_SESSION["user_first_name"]=$_SESSION["username"]=$_POST["signup_username"];
	    $_SESSION["user_category"]=$row["id_category"];
		header('Location: ../pages/'.$row["id_category"].'home.php');
	}
	else{
		header('Location: ../index.php');
	
	}
   //mayor-01714179516
	

?>