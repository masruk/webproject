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
			<div id="profile_info">
				<div id="profile_image">
					<img src="#" height="100%" width="100%" alt="Can't be displayed">
				</div>
				<p><?php echo $_POST["name"]; ?></p>
			
			
				
				<?php
					$employee_detail="select * from employee where employee.name='".$_POST["name"]."'";
					$show_employee_detail=oci_parse($conn,$employee_detail);
					oci_execute($show_employee_detail);
					$x=0;
					while($row=oci_fetch_array($show_employee_detail,OCI_ASSOC))
					{			
						foreach($row as $col)
						{
							 $employee[$x]=$col;

							 $x++;
						}
						
					}
				
				?>
				
				<table>
					<tr>
						<td>Employee ID</td>
						<td><?php echo $employee[0]; ?></td>
					</tr>
					
					<tr>
						<td>Date of Birth</td>
						<td><?php echo $employee[2]; ?></td>
					</tr>
					
					<tr>
						<td>Joining Date</td>
						<td><?php echo $employee[9]; ?></td>
					</tr>
					
					<tr>
						<td>Designation</td>
						<td><?php echo $employee[3]; ?></td>
					</tr>
					
					<tr>
						<td>Grade</td>
						<td><?php echo $employee[10]; ?></td>
					</tr>
					
					<tr>
						<td>Salary</td>
						<td><?php echo $employee[4]; ?></td>
					</tr>
				
				
					<tr>
						<td>City</td>
						<td><?php echo $employee[5]; ?></td>
					</tr>
					
					<tr>
						<td>Street no.</td>
						<td><?php echo $employee[6]; ?></td>
					</tr>
					
					<tr>
						<td>Street name</td>
						<td><?php echo $employee[7]; ?></td>
					</tr>
					
					<tr>
						<td>House no.</td>
						<td><?php echo $employee[8]; ?></td>
					</tr>
				
				</table>
			</div>
		
		
		</div>
		
		<?php include '../Body/footer.php';?>
	</body>
</html>