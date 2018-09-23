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
				
				$database="select table_name from user_tables where table_name NOT LIKE 'DEMO%' and table_name NOT LIKE 'APEX%' order by table_name";
				$show_database=oci_parse($conn,$database);
				oci_execute($show_database);
				echo '<table id="database_table">';
				$x=0;
				while($row=oci_fetch_array($show_database,OCI_ASSOC))
				{	
							
					foreach($row as $col)
					{
						if($x==0)
						{
							echo '<tr>';
						}
						
						echo '<td>';
						?>
						<form method="post" action="modify.php">
						<input type="hidden" name="table_name" value="<?php echo $col; ?>"></input>
						<input type="submit" value="<?php echo $col;?>">
						</form>
						<?php
						echo '</td>';
						$x++;
						if($x==4)
						{
							echo '</tr>';
							$x=0;
						}
					}
				}
				echo '</table>';
			?>
		
		</div>

		<?php include '../Body/footer.php';?>
	</body>
</html>