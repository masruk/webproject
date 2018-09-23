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
					
					<?php
					
						$catagory="select distinct class_name from catagory order by class_name desc";
						$show_catagory=oci_parse($conn,$catagory);
						oci_execute($show_catagory);
						echo '<table>';
						while($row=oci_fetch_array($show_catagory,OCI_ASSOC))
						{	
							echo '<ul>';		
							foreach($row as $col)
							{
								?>
								<form method="post" action='search_categorywise.php'>
									<input type="hidden" name="animal_category" value="<?php echo $col; ?>"></input>
									<input type="submit" value="<?php echo $col ;?>"></input>
								</form>
								<?php
							}
							echo '</ul>';
						}
						echo '</table>'
					?>
					
					</form>
				</div>
				
				<div id="right-of-side-nav">
					
					<?php
					
						//echo "<h1>Welcome to Bangladesh National Zoo</h1>";
						$num_of_animal="SELECT SUM(NUMBER_OF_ANIMAL) FROM CATAGORY";
						$show_num_of_animal=oci_parse($conn,$num_of_animal);
						oci_execute($show_num_of_animal);
						while($row=oci_fetch_array($show_num_of_animal,OCI_ASSOC))
						{			
							foreach($row as $col)
							{
								 $num_of_animal=$col;
								
							}
						}
						$total_category="SELECT COUNT(DISTINCT CLASS_NAME) FROM CATAGORY";
						$show_total_category=oci_parse($conn,$total_category);
						oci_execute($show_total_category);
						while($row=oci_fetch_array($show_total_category,OCI_ASSOC))
						{			
							foreach($row as $col)
							{
								 $total_category=$col;
								
							}
						}
						
						$num_of_bird="SELECT COUNT(NUMBER_OF_ANIMAL) FROM CATAGORY WHERE UPPER(CLASS_NAME)=UPPER('BIRD')";
						$show_num_of_bird=oci_parse($conn,$num_of_bird);
						oci_execute($show_num_of_bird);
						while($row=oci_fetch_array($show_num_of_bird,OCI_ASSOC))
						{			
							foreach($row as $col)
							{
								 $num_of_bird=$col;
								
							}
						}
						
						$num_of_harbivores="SELECT COUNT(NUMBER_OF_ANIMAL) FROM CATAGORY WHERE UPPER(CLASS_NAME)=UPPER('LARGE heRBIVORES')";
						$show_num_of_harbivores=oci_parse($conn,$num_of_harbivores);
						oci_execute($show_num_of_harbivores);
						while($row=oci_fetch_array($show_num_of_harbivores,OCI_ASSOC))
						{			
							foreach($row as $col)
							{
								 $num_of_harbivores=$col;
								
							}
						}
						
						$num_of_carnivores="SELECT COUNT(NUMBER_OF_ANIMAL) FROM CATAGORY WHERE UPPER(CLASS_NAME)=UPPER('CARNIVORES')";
						$show_num_of_carnivores=oci_parse($conn,$num_of_carnivores);
						oci_execute($show_num_of_carnivores);
						while($row=oci_fetch_array($show_num_of_carnivores,OCI_ASSOC))
						{			
							foreach($row as $col)
							{
								 $num_of_carnivores=$col;
								
							}
						}
						
						$num_of_mammals="SELECT COUNT(NUMBER_OF_ANIMAL) FROM CATAGORY WHERE UPPER(CLASS_NAME)=UPPER('MAMMALS')";
						$show_num_of_mammals=oci_parse($conn,$num_of_mammals);
						oci_execute($show_num_of_mammals);
						while($row=oci_fetch_array($show_num_of_mammals,OCI_ASSOC))
						{			
							foreach($row as $col)
							{
								 $num_of_mammals=$col;
								
							}
						}
						
						$num_of_fish="SELECT COUNT(NUMBER_OF_ANIMAL) FROM CATAGORY WHERE UPPER(CLASS_NAME)=UPPER('FISH')";
						$show_num_of_fish=oci_parse($conn,$num_of_fish);
						oci_execute($show_num_of_fish);
						while($row=oci_fetch_array($show_num_of_fish,OCI_ASSOC))
						{			
							foreach($row as $col)
							{
								 $num_of_fish=$col;
								
							}
						}
						
						$num_of_reptiles="SELECT COUNT(NUMBER_OF_ANIMAL) FROM CATAGORY WHERE UPPER(CLASS_NAME)=UPPER('REPTILES')";
						$show_num_of_reptiles=oci_parse($conn,$num_of_reptiles);
						oci_execute($show_num_of_reptiles);
						while($row=oci_fetch_array($show_num_of_reptiles,OCI_ASSOC))
						{			
							foreach($row as $col)
							{
								 $num_of_reptiles=$col;
								
							}
						}
					
						echo "<p id=\"Disc\"><span style=\"color: red; font-size: 180%;\">M</span>ain attractioin of Bangladesh National Zoo is different species of Animal. This zoo is enriched with <b>".$num_of_animal."</b> animals of <b>".$total_category."</b> categories. There are <b>".$num_of_harbivores."</b> herbivores, <b>".$num_of_carnivores."</b> Carnivores, <b>".$num_of_mammals."</b> Mammals, <b>".$num_of_reptiles."</b> Reptiles, <b>".$num_of_bird."</b> Birds and more than <b>".$num_of_fish."</b> fishes. Among them, about 40% animals are overseas and rest of them are collected from different part of the country. </p>";
					
					
					
					?>
					<!--  search start    -->
					<div id="animal-search_result">
						<?php
							if(!empty($_POST["search_animal"]))
							{
								
			
								$animal_name='select "name" from ANIMAL_CATAGORY where  UPPER("name") LIKE UPPER(\'%'.$_POST["search_animal"].'%\')';
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
					
					<!--search end-->
				</div>
			</div>
		</div>

		<?php include '../Body/footer.php';?>
	</body>
</html>