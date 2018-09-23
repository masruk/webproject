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
		
		$num_of_boat="select count(\"Boat No\") from boat_view";
		$show_num_of_boat=oci_parse($conn,$num_of_boat);
		oci_execute($show_num_of_boat);
		
		while($row=oci_fetch_array($show_num_of_boat,OCI_ASSOC))
		{			
			foreach($row as $col)
			{
				$num_of_boat=$col;
			}
			
		}
		
		$num_of_type="select count(Distinct \"Boat Type\") from boat_view";
		$show_num_of_type=oci_parse($conn,$num_of_type);
		oci_execute($show_num_of_type);
		
		while($row=oci_fetch_array($show_num_of_type,OCI_ASSOC))
		{			
			foreach($row as $col)
			{
				$num_of_type=$col;
			}
			
		}
		
		$num_of_area="select count(Distinct \"Riding Zone\") from boat_view";
		$show_num_of_area=oci_parse($conn,$num_of_area);
		oci_execute($show_num_of_area);
		
		while($row=oci_fetch_array($show_num_of_area,OCI_ASSOC))
		{			
			foreach($row as $col)
			{
				$num_of_area=$col;
			}
			
		}
		
		
		
		echo "<p id=\"boat_riding_desc\"><span style=\"color: red; font-size: 200%;\">B</span>angladesh National Zoo is having 130 acre of lake which contains plenty of water with a very charming view. To enhance the enjoyment of visitors zoo authority introduced a boat riding club with all updated boat riding facilities.About <b>".$num_of_boat."</b> of <b>".$num_of_type."</b> types can be sail over more than <b>".$num_of_area."</b> area enchanting enjoyment.</p>";
		echo "<p id=\"boat_riding_desc\">Bangladesh national zoo provides with different types of boat at low cost for the better entertainment of visitors. Available types of boat and quantity are: </p>";
		?>
		<div id="boat-rent">
			<table>
				<tr>
					<th>Boat type</th>
					<th>No of Boat</th>
				</tr>
				<?php
					$boat_type="select DISTINCT type_of_boat,count(type_of_boat) from boat_riding group by type_of_boat";
					$show_boat_type=oci_parse($conn,$boat_type);
					oci_execute($show_boat_type);
					while($row=oci_fetch_array($show_boat_type,OCI_ASSOC))
					{	
						echo '<tr>';
						foreach($row as $col)
						{
							echo '<td>'.$col.'</td>';
						}
						echo '</tr>';
					}
					
				?>
			</table>
				
		</div>
		<?php
		echo "<p id=\"boat_riding_desc\">Visitor can hire different types of boats directly coming here or in advance contacting with associated authority from the list:</p>";
		?>
		<div id="boat-rent">
		<table>
			<tr>
				<th>Boat No.</th>
				<th>Boat type</th>
				<th>Max capacity</th>
				<th>Riding Zone</th>
				<th>Cost/Hour</th>
				<th>Associate employee</th>
				<th>Phone No</th>
			</tr>
			<?php
			$Boat='select "Boat No","Boat Type","Max Capacity","Riding Zone","Cost","Name","phone" from boat_view';
			$show_boat_detail=oci_parse($conn,$Boat);
			oci_execute($show_boat_detail);
			while($row=oci_fetch_array($show_boat_detail,OCI_ASSOC))
			{	
				echo '<tr>';
				foreach($row as $col)
				{
					echo '<td>'.$col.'</td>';
				}
				echo '</tr>';
			}
			?>
		</table>
		
		

		</div>	
		
		</div>

		<?php include '../Body/footer.php';?>
	</body>
</html>