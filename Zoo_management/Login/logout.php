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
					$_SESSION["logged_in"]=false;
					session_unset();
					session_destroy();
					echo "You've successfully logged out! ";
			
			?>
		</div>
		<?php include '../Body/footer.php';?>
	</body>
</html>