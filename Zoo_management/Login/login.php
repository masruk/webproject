<?php
session_start();
?>
<!DOCTYPE html>

<?php include '../Connection/connection.php'; ?>

<html>
	<head>
		<title> Bangladesh National Zoo</title>
		<link rel="stylesheet" type="text/css" href="../Style/style.css">
	</head>
	
	
	
	<body>
		<?php include '../Body/header.php';?>
		
		<div id="content">
			<?php
				
				$username=$_POST["username"];
				$password=$_POST["password"];
				$user_type=$_POST["role"];
				$result='false';
				
				$user="select 'true' from login where EXISTS (select * from login where login_username='".$username."' and login_password='".$password."' and UPPER(user_type)=UPPER('".$user_type."'))";
				$varify_user=oci_parse($conn,$user);
				oci_execute($varify_user);
				
				while($row=oci_fetch_array($varify_user,OCI_ASSOC))
				{	
					
					foreach($row as $col)
					{
						 $result=$col;	
				
	    			}
				}
				
				if($result=='true')
				{
					echo "logged in successfully!";
					$_SESSION["user"]=$username;
					$_SESSION["password"]=$password;
					$_SESSION["user_type"]=$user_type;
					$_SESSION["logged_in"]=true;
				}
				else
				{
					echo "access denied!";
				}
			
			?>
		</div>
		<?php include '../Body/footer.php';?>
	</body>
</html>