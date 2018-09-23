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
		<meta charset="utf-8" /> 
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
					$animal_detail="SELECT Employee.name,Designation,Cage_no,animal.English_name,animal.bengali_name,animal_id,catagory.class_name,caging.nick_name,animal.date_of_birth,addition.add_date,food.ITEM_NAME,food.SCALE_PER_DAY,food.TIMES,food.CALORY_PER_UNIT FROM Employee join works_for using(Employee_Id) join animal using(animal_id) join caging using(animal_id) join cage using(cage_no) join INCLUSION using(cage_no) join addition using(addition_no) join fooding using(animal_id) join food using(food_id) join animal_classification using(animal_id) join catagory using (catagory_id) where UPPER(animal.english_name)=UPPER('".$_POST["name"]."')";
					$show_animal_detail=oci_parse($conn,$animal_detail);
					oci_execute($show_animal_detail);
					$x=0;
					while($row=oci_fetch_array($show_animal_detail,OCI_ASSOC))
					{			
						foreach($row as $col)
						{
							 $animal[$x]=$col;
							 $x++;
						}
						
					}
				
				?>
				

				<table>
					<tr>
						<td>Bangla Name</td>
						<td><?php echo $animal[4]; ?></td>
					</tr>
					
					<tr>
						<td>Animal ID</td>
						<td><?php echo $animal[5]; ?></td>
					</tr>
					
					<tr>
						<td>Nick Name</td>
						<td><?php echo $animal[7]; ?></td>
					</tr>
					
					<tr>
						<td>Class Name</td>
						<td><?php echo $animal[6]; ?></td>
					</tr>
					
					<tr>
						<td>Date of Birth</td>
						<td><?php echo $animal[8]; ?></td>
					</tr>
					
					<tr>
						<td>Cage no</td>
						<td><?php echo $animal[2]; ?></td>
					</tr>
					
					<tr>
						<td>Entry Date</td>
						<td><?php echo $animal[9]; ?></td>
					</tr>
					
					<tr>
						<td>Supervisor</td>
						<td><?php echo $animal[0]; ?></td>
					</tr>
					
					<tr>
						<td>Supervisor Designation</td>
						<td><?php echo $animal[1]; ?></td>
					</tr>
					
					<tr>
						<td>Food</td>
						<td><?php echo $animal[10].", ".$animal[12]." times in a day in the scale of ".$animal[11]." per time<br>which contains ".$animal[13]."calory/unit"; ?></td>
					</tr>
				
				
				
				</table>
				
				
			</div>
		
		
		</div>
		
		<?php include '../Body/footer.php';?>
	</body>
</html>