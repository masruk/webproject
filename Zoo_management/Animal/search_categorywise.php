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
		
		<div id="center_block">
			<p>Search Animal</p>
			<form method="post" action='<?php echo $_SERVER["PHP_SELF"];?>'>
				<input type="text" placeholder="Id or Name" name="search_animal"></input>
				<input type="submit" Value="Search">
			</form>
		
			<div id="content">
			
				<div id="left_side_nav">
					<form method="post" action='<?php echo $_SERVER["PHP_SELF"];?>'> 
					<?php 
					
						$catagory="select distinct class_name from catagory";
						$show_catagory=oci_parse($conn,$catagory);
						oci_execute($show_catagory);
						echo '<table>';
						while($row=oci_fetch_array($show_catagory,OCI_ASSOC))
						{	
							echo '<ul>';		
							foreach($row as $col)
							{
								?>
								<form method="post" action='<?php echo $_SERVER["PHP_SELF"];?>'>
									<input type="hidden" name="animal_category" value="<?php echo $col; ?>">
									<input type="submit" value="<?php echo $col ;?>">
								</form>
								<?php
							}
							echo '</ul>';
						}
						echo '</table>'
					?>
					
				</div>
				
				<div id="animal-search_result">
						<?php
							if(empty($_POST["search_animal"])){
								$_SESSION["animal_category"]=$_POST["animal_category"];
								
								$animal_name= 'select "name" from ANIMAL_CATAGORY where "catagory"=\''.$_POST["animal_category"].'\'' ;
								//$animal_name="select english_name from animal";
								$show_animal_name=oci_parse($conn,$animal_name);
								oci_execute($show_animal_name);
								
								echo '<table>' ;
								
								while($row=oci_fetch_array($show_animal_name,OCI_ASSOC))
								{	echo '<tr>';		
									foreach($row as $col)
									{
										echo '<td>'.$col.'</td>';
										?>
										<td id="view_btn">
										<form method="post" action='animal_profile.php'>
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
								
								
			
								$animal_name='select "name" from ANIMAL_CATAGORY where "catagory"=\''.$_SESSION["animal_category"].'\' AND UPPER("name") LIKE UPPER(\'%'.$_POST["search_animal"].'%\')';
								$show_animal_name=oci_parse($conn,$animal_name);
								oci_execute($show_animal_name);
								echo '<table>';
								while($row=oci_fetch_array($show_animal_name,OCI_ASSOC))
								{		
									echo '<tr>';
									foreach($row as $col)
									{
										
										echo '<td>'.$col.'</td>';
										?>
										<td id="view_btn">
										<form method="post" action='animal_profile.php'>
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