<?php
session_start();
?>
<!DOCTYPE html>
<?php include '../Connection/connection.php'; ?>

<html>
	<head>
		<title> Bangladesh National Zoo</title>
		<link rel="stylesheet" type="text/css" href="../Style/style.css">
		<!-- <script src="../Script/script.js"></script> -->
	</head>

	<body>
		<?php include '../Body/header.php';?>
		
		<div id="content">
			<form method="post" action="../Employee/process_new_emp.php">
				<table>
					<tr>
						<td>Name</td>
						<td><input type="text" name="name"></input></td>
					</tr>
					<tr>
						<td>Id</td>
						<td><input type="text" name="id"></input></td>
					</tr>
					<tr>
						<td>Date of Birth</td>
						<td><input type="date" name="dob"></input></td>
					</tr>
					<tr>
						<td>Designation</td>
						<td><input type="text" name="designation"></input></td>
					</tr>
					<tr>
						<td>Salary</td>
						<td><input type="text" name="salary"></input></td>
					</tr>
					<tr>
						<td>City</td>
						<td><input type="text" name="city"></input></td>
					</tr>
					<tr>
						<td>Street No</td>
						<td><input type="text" name="street_no"></input></td>
					</tr>
					<tr>
						<td>Street Name</td>
						<td><input type="text" name="street_name"></input></td>
					</tr>
					<tr>
						<td>House No</td>
						<td><input type="text" name="house_no"></input></td>
					</tr>
					<tr>
						<td>Joining Date</td>
						<td><input type="date" name="joining_date"></input></td>
					</tr>
					<tr>
						<td>Grade</td>
						<td><input type="text" name="grade"></input></td>
					</tr>
					
				</table>
				<input type="submit" value="Enter">
			</form>
		</div>
	
		<?php include '../Body/footer.php';?>
	</body>
	

</html>