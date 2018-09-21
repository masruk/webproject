
<?php include '../connection/connect-database.php';
	session_start();
	$sql1="SELECT studentid,first_name,last_name from students where studentid=".$_POST["username"]." AND password='".$_POST["password"]."'";
	$sql2="SELECT doctorid,first_name,last_name from doctors where doctorid=".$_POST["username"]." AND password='".$_POST["password"]."'";
	$sql3="SELECT staffid,first_name,last_name from medicalstaffs where staffid=".$_POST["username"]." AND password='".$_POST["password"]."'";
	$sql4="SELECT adminid,first_name,last_name,UPPER(designation) as designation,UPPER(department) as department from admin where adminid=".$_POST["username"]." AND password='".$_POST["password"]."'";
    $res1=$conn->query($sql1);
    $res2=$conn->query($sql2);	
    $res3=$conn->query($sql3);
	$res4=$conn->query($sql4);
	if($res1->num_rows != 0){
	    
		$row = mysqli_fetch_assoc($res1);
		
		$_SESSION["username"]=$row["studentid"];
		$_SESSION["user_first_name"]=$row["first_name"];
        $_SESSION["user_last_name"]=$row["last_name"];
		$_SESSION["user_category"]="student";
        header('Location: ../pages/studenthome.php');
	}
	else if($res2->num_rows != 0){
		$row = mysqli_fetch_assoc($res2);

		$_SESSION["username"]=$row["doctorid"];
		$_SESSION["user_first_name"]=$row["first_name"];
        $_SESSION["user_last_name"]=$row["last_name"];
		$_SESSION["user_category"]="doctor";
        header('Location: ../pages/doctorhome.php');
	}
	else if($res3->num_rows != 0){
		$row = mysqli_fetch_assoc($res3);

		$_SESSION["username"]=$row["staffid"];
		$_SESSION["user_first_name"]=$row["first_name"];
        $_SESSION["user_last_name"]=$row["last_name"];
		$_SESSION["user_category"]="medicalstaff";
        header('Location: ../pages/medicalstaffhome.php');
	}
    else if($res4->num_rows != 0){
        $row = mysqli_fetch_assoc($res4);

        $_SESSION["username"]=$row["adminid"];
        $_SESSION["user_first_name"]=$row["first_name"];
        $_SESSION["user_last_name"]=$row["last_name"];
        $_SESSION["user_category"]="admin";
        $_SESSION["designation"]=$row["designation"];
        $_SESSION["department"]=$row["department"];
        header('Location: ../pages/adminhome.php');
    }
	else{
		header('Location: ../index.php');
	}
   //mayor-01714179516
	

?>
