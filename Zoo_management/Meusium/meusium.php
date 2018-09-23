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
				echo '<p id="boat_riding_desc"><span style="color: red; font-size: 180%;">B</span>angladesh National Zoo hass a very rich museum which is constituted with a big collection of various organs and fosils of animal.
Alongside all things research, the museum also contains an enriched collection of organs from the present zoo animals living in the last 100 years. 
Decorative interior, proper guidelines of visit and rich description of all the subjects present in the museum make for a more surreal experience.</br>Collection of Organs and their quantity are:</br></p>';
			echo '<div id="boat-rent">';
			$organ_quantity="select ORGAN_NAME,SUM(QUANTITY) from museum GROUP BY ORGAN_NAME";
			$show_organ_quantity=oci_parse($conn,$organ_quantity);
			oci_execute($show_organ_quantity);
			echo '<table>';
			echo '<caption  style="color:  #005580; font-size: 170%;"><b>Organ and Quantity</b></caption>';
			?>
			<tr>
				<th>ORGAN NAME</th>
				<th> QUANTITY</th>
				
			</tr>
			<?php
			while($row=oci_fetch_array($show_organ_quantity,OCI_ASSOC))
			{	
				echo '<tr>';
				foreach($row as $col)
				{
					echo '<td>'.$col.'</td>';
				}
				echo '</tr>';
			}
			echo '</table>';
			?>
			
			
			<p id="boat_riding_desc">Classwise organ collection are:</p>
			<?php
			$categorywise_content="select CLASS_NAME,SUM(QUANTITY) from museum GROUP BY CLASS_NAME";
			$show_categorywise_content=oci_parse($conn,$categorywise_content);
			oci_execute($show_categorywise_content);
			echo '<table >';
			echo '<caption  style="color:  #005580; font-size: 170%;"><b>Classwise View</b></caption>';
			?>
			<tr>
				<th>CLASS NAME</th>
				<th>TOTAL ORGAN</th>
				
			</tr>
			<?php
			while($row=oci_fetch_array($show_categorywise_content,OCI_ASSOC))
			{	
				echo '<tr>';
				foreach($row as $col)
				{
					echo '<td>'.$col.'</td>';
				}
				echo '</tr>';
			}
			echo '</table>';
			?>
			
			<p id="boat_riding_desc">People may see museum organised by dividing different area based on animal.  </p>
			<?php
			$animalwise_content="select ORGAN_NAME, ANIMAL_NAME,QUANTITY from museum ORDER BY ANIMAL_NAME";
			$show_animalwise_content=oci_parse($conn,$animalwise_content);
			oci_execute($show_animalwise_content);
			echo '<table >';
			echo '<caption  style="color:  #005580; font-size: 170%;"><b>Organ Details</b></caption>';
			?>
			<tr>
				<th>ORGAN NAME</th>
				<th>ANIMAL NAME</th>
				<th>TOTAL ORGAN</th>
				
			</tr>
			<?php
			while($row=oci_fetch_array($show_animalwise_content,OCI_ASSOC))
			{	
				echo '<tr>';
				foreach($row as $col)
				{
					echo '<td>'.$col.'</td>';
				}
				echo '</tr>';
			}
			echo '</table>';
			
			?>
			
			
			</div>
		</div>

		<?php include '../Body/footer.php';?>
	</body>
</html>