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
			
				echo "<p  id=\"boat_riding_desc\"><span style=\"color: red; font-size: 180%;\">Z</span>oo Authority arranged a nice angling spot which is open all through the day. The visitors can get chance to enjoy a quality time here. Since there is also a boat riding option, so there are
multiple ways for people to come in and have a great time and connect with the animals dweling in the water. There also all sorts of angling equipment available here so that the convenience
of use is maintained. Really it's a good place for anglers. </p>";
			?>
		
		
		<div id="boat-rent">
			
			
			<?php
			$booking_picnic_sopt='select NO_OF_BOAT AS "BOAT NUMBER",NAME AS "SUPERVISOR NAME",PHONE_NO AS "PHONE NO" from angling join related_with_angling using(spot_no) join employee using(employee_id) join phone_no using(employee_id)';
			$show_booking_picnic_sopt=oci_parse($conn,$booking_picnic_sopt);
			oci_execute($show_booking_picnic_sopt);
			echo '<table >';
			echo '<caption  style="color:  #005580; font-size: 170%;"><b>Contact to the supervisors for advance booking:</b></caption>';
			?>
			<tr>
				<th>Boat No</th>
				<th>Supervisor Name</th>
				<th>Phone No</th>
				
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