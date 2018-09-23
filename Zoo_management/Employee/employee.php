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
		
		
		<div id="center_block">
			<p>Search Employee</p>
			<form method="post" action='<?php echo $_SERVER["PHP_SELF"];?>'>
				<input type="text" placeholder="Id or Name" name="search_employee"></input>
				<input type="submit" Value="Search" onclick="show_search_result()">
			</form>
			

			<?php //echo $_SERVER["PHP_SELF"];?>
			
			<div id="content">
				<div id="search_result">
					<?php
						if(empty($_POST["search_employee"])){
							
							$employee_name='SELECT employee.name from Employee';
							$show_emp_name=oci_parse($conn,$employee_name);
							oci_execute($show_emp_name);
							
							echo '<table>' ;
							
							while($h_row=oci_fetch_array($show_emp_name,OCI_ASSOC))
							{	echo '<tr>';		
								foreach($h_row as $col)
								{
									echo '<td>'.$col.'</td>';
									?>
									<td id="view_btn">
									<form method="post" action='employee_profile.php'>
										<input type="hidden" name="name" value="<?php echo $col; ?>"></input> <input type="submit" value="View Detail"></input>
									</form>
									</td>
									<?php

											
								}
								echo '</tr>';
							}
							echo '</table>';
							
						}
						else{
		
							$employee_name="SELECT DISTINCT employee.name from Employee where UPPER(employee.name) LIKE UPPER('%".$_POST["search_employee"]."%') or UPPER(employee.name) LIKE UPPER('".$_POST["search_employee"]."%')";
							$show_emp_name=oci_parse($conn,$employee_name);
							oci_execute($show_emp_name);
							echo '<table>';
							while($h_row=oci_fetch_array($show_emp_name,OCI_ASSOC))
							{		
								echo '<tr>';
								foreach($h_row as $col)
								{
									
									echo '<td>'.$col.'</td>';
									?>
									<td id="view_btn">
									<form method="post" action='employee_profile.php'>
									<input type="hidden" name="name" value="<?php echo $col; ?>"></input> <input type="submit" value="View Detail"></input></td>
									</form>
									<?php

								}
								echo '</tr>';
							}
							echo '</table>';
							
							
						}
					
					?>
				</div>
			</div>
			
		
		</div>


		<?php include '../Body/footer.php';?>
	</body>
</html>