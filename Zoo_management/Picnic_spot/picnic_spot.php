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
			
			<div id="boat-rent">
			
			
			<?php
			$num_of_picnic_spot='select count(spot_no) from picnic_spot';
			
			$show_num_of_picnic_spot=OCI_PARSE($conn,$num_of_picnic_spot);
			
			OCI_EXECUTE($show_num_of_picnic_spot);
			while($row=oci_fetch_array($show_num_of_picnic_spot,OCI_ASSOC))
			{	
				
				foreach($row as $col)
				{
					$num_of_picnic_spot=$col;
					
				}
				
			}
			$total_area='select sum(capacity)*1000 from picnic_spot';
			$show_total_area=OCI_PARSE($conn,$total_area);
			OCI_EXECUTE($show_total_area);
			while($row=oci_fetch_array($show_total_area,OCI_ASSOC))
			{	
				
				foreach($row as $col)
				{
					$total_area=$col;
					
				}
				
			}
			
			
			echo "Zoo Authority arranged number of picnic spot inside the zoo to enhance the attractive features of zoo which will definately increase the visitor's enjoyment.There are <b>".$num_of_picnic_spot."</b> picnic spot in the zoo surrounding in total area <b>".$total_area.' square meter</b>';
			$booking_picnic_sopt='select spot_no,capacity*1000,cost_per_day,employee.Name from picnic_spot join RELATED_WITH_PICNIC_SPOT using(Spot_no) join Employee using(Employee_id)';
			//$booking_picnic_sopt='select spot_no,capacity*1000,cost_per_day from picnic_spot';
			$show_booking_picnic_sopt=oci_parse($conn,$booking_picnic_sopt);
			oci_execute($show_booking_picnic_sopt);
			echo '<table >';
			echo '<caption  style="color:  #005580; font-size: 170%;"><b>Contact to the supervisors for advance booking:</b></caption>';
			?>
			<tr>
				<th>Spot No</th>
				<th>Area</th>
				<th>Cost Per Day</th>
				<th>Supervisor Name</th>
				
			</tr>
			<?php
			
			while($row=oci_fetch_array($show_booking_picnic_sopt,OCI_ASSOC))
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