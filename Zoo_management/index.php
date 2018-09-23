<?php
session_start();
?>
<?php
	
	if(isset($_POST["logout"]) && $_POST["logout"]=="loggedout")
	{
		$_SESSION["logged_in"]=false;
		session_unset();
		session_destroy();
		
	}
			
			
?>
<!DOCTYPE html>

<?php include 'Connection/connection.php'; ?>

<html>
	<head>
		<title> Bangladesh National Zoo</title>
		<link rel="stylesheet" type="text/css" href="Style/style.css">
	</head>
	
	
	
	<body>
		
		<?php include 'Home_body/header.php';?>
		
		<div id="nav_area" style="background-image: url('photo/giraff.jpg');">
		</div>

		<div id="content">
		
			<div id="Disc">
				
				<?php
					echo "<h1>Welcome to Bangladesh National Zoo</h1>";
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
					$opening_time="SELECT DISTINCT OPENNING_TIME FROM ENTERTAINMENT WHERE UPPER(ENTERTAINMENT_DAY)=UPPER('MONDAY')";
					$show_opening_time=oci_parse($conn,$opening_time);
					oci_execute($show_opening_time);
					while($row=oci_fetch_array($show_opening_time,OCI_ASSOC))
					{			
						foreach($row as $col)
						{
							 $opening_time=$col;
							
						}
					}
					$closing_time="SELECT DISTINCT CLOSING_TIME FROM ENTERTAINMENT WHERE UPPER(ENTERTAINMENT_DAY)=UPPER('MONDAY')";
					$show_closing_time=oci_parse($conn,$closing_time);
					oci_execute($show_closing_time);
					while($row=oci_fetch_array($show_closing_time,OCI_ASSOC))
					{			
						foreach($row as $col)
						{
							 $closing_time=$col;
							
						}
					}
					
					$spot_no="SELECT COUNT(SPOT_NO) FROM PICNIC_SPOT";
					$show_spot_no=oci_parse($conn,$spot_no);
					oci_execute($show_spot_no);
					while($row=oci_fetch_array($show_spot_no,OCI_ASSOC))
					{			
						foreach($row as $col)
						{
							 $spot_no=$col;
							
						}
					}
					
					$mammal_names="SELECT DISTINCT REGEXP_REPLACE(ENGLISH_NAME,'-.*','') FROM ANIMAL JOIN ANIMAL_CLASSIFICATION USING (ANIMAL_ID) JOIN CATAGORY USING (CATAGORY_ID) WHERE UPPER(CLASS_NAME)=UPPER('MAMMALS')";
					$show_mammal_names=oci_parse($conn,$mammal_names);
					oci_execute($show_mammal_names);
					$mammal_names="";
					while($row=oci_fetch_array($show_mammal_names,OCI_ASSOC))
					{			
						foreach($row as $col)
						{
							 if($mammal_names=="")
							 {
								$mammal_names=$col; 
							 }
							 else
							 {
								$mammal_names=$mammal_names.",".$col;
							 }
							
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
					$name_of_birds="SELECT ENGLISH_NAME FROM ANIMAL JOIN ANIMAL_CLASSIFICATION USING (ANIMAL_ID) JOIN CATAGORY USING (CATAGORY_ID) WHERE UPPER(CLASS_NAME)=UPPER('BIRD')";
					$show_name_of_birds=oci_parse($conn,$name_of_birds);
					oci_execute($show_name_of_birds);
					$name_of_birds="";
					while($row=oci_fetch_array($show_name_of_birds,OCI_ASSOC))
					{			
						foreach($row as $col)
						{
							if($name_of_birds=="")
							{
								 $name_of_birds=$col;
							}
							else
							{
								$name_of_birds=$name_of_birds.",".$col;
							}
							 
							
						}
					}
					echo "<p><span style=\"color: red; font-size: 200%;\">B</span>angladesh National Zoo located in the Mirpur section of the capital city of Bangladesh. Bangladesh National Zoo is home to more than <b>".$num_of_animal."</b> animals from <b>".$total_category."</b> categories and is a popular place to spend the day, both for Bangladeshis and International visitors usually from <b>".$opening_time." am</b> to <b>".$closing_time." pm</b>. Established in 1974, The Bangladesh National Zoo has been developed and improved over the years, and is widely considered to be one of the best zoos in Bangladesh, receiving hundreds of thousands of visitors each year.</p>

	<p>Visitors to the Bangladesh National Zoo will appreciate the way the animal enclosures are designed to make each occupant feel at home by mimicking the animal’s natural environment as closely as possible. Of course, the animals are safely behind bars, but the overall appearance of the zoo, with its tree-lined pathways and <b>".$spot_no."</b> picnic spots and large tranquil lakes that host migratory water-fowl each winter, gives one the impression of being out in the country rather than within the boundaries of one of the busiest cities in Bangladesh.</p>

	<p>Mammals at the zoo include <b>".$mammal_names.".</b> The majestic Royal Bengal Tigers are a highlight of the Bangladesh National Zoo which is fitting, seeing as it is the national animal of Bangladesh.</p>

	<p>The aviaries at the Bangladesh National Zoo house more than <b>".$num_of_bird."</b> birds and visitors can expect to see <b>".$name_of_birds."</b> and too many others to mention.while The Museum provides many informative displays relating to the animals as well as the history of the zoo.</p>";
				
				
				?>
		
			</div>
		</div>
		
		<?php include 'Home_body/footer.php';?>


	</body>
</html>






