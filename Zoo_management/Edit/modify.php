<?php
	session_start();
?>
<?php include '../Connection/connection.php'; ?>
<?php
	
	if(isset($_POST["table_name"]))
	{
		$_SESSION["table_name"]=strtoupper($_POST["table_name"]);
	}
	$tab_name=$_SESSION["table_name"];
	$show_table="SELECT * FROM " . $tab_name;
	$col_name="select  COLUMN_NAME  from user_tab_columns where table_name= '" . $tab_name ."'";
	$get_primary_key= " SELECT column_name FROM all_cons_columns WHERE constraint_name = ( SELECT constraint_name FROM user_constraints WHERE UPPER(table_name) = UPPER('".$tab_name."') AND CONSTRAINT_TYPE='P' )";
	$pk=oci_parse($conn,$get_primary_key);
	$tab_data=oci_parse($conn,$show_table);
	$show_col=oci_parse($conn,$col_name);
	oci_execute($tab_data);
	oci_execute($pk);
	$add_data=$update_data=$delete_data=$delete_table=$delete_key=NULL;
	$errMsg="";
	$update_sign=false;
	
?>


<!doctype html>
<html>

	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="css\style.css">
	</head>
	
	<body onload="all_edit_opt_hide()" >
		
		<header>
			<div id="logo">
				<img src="../photo/logo.jpg">
				
			</div>
			<div id="zoo_name">
				<p>Bangladesh National Zoo</p>
			</div>
			<div id="login_section">
				<?php
					if(!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"]==false)
					{
						echo '<form method="post" action="../Login/login.php">
							username: <input type="text" name="username"></input>
							<br>
							password: <input type="password" name="password"></input>
											<br>	
							Login as: <select name="role">
											<option value="admin">Admin</option>
											<option value="employee">Employee</option>
											<option value="visitor">Visitor</option>
											<option value="Developer">Developer</option>
									</select> <br>
							<input type="submit" value="Login">
						</form>';
					}
					else if(isset($_SESSION["logged_in"]) && $_SESSION["logged_in"]==true )
					{
						echo '<p>Logged in as <b id="current_user">'.$_SESSION["user"].'</b></p>';
						echo '<form method="post" action="../index.php">';
						echo '<input type="hidden" name="logout" value="loggedout"></input>';
						echo '<input type="submit" value="logout">';
						echo '</form>';
					}
				?>
			</div>
		
		</header>
		
		<nav>
			<ul>
				<li><a href="../index.php">Home</a></li>
				<li><a href="../Animal/animal.php">Animal</a></li>
				<li><a href="../Meusium/meusium.php">Museum</a></li>
				<li><a href="../Picnic_spot/picnic_spot.php">Picnic Spot</a></li>
				<li><a href="../Angling/angling.php">Angling</a></li>
				<li><a href="../Boat_riding/boat_riding.php">Boat Riding</a></li>
				<li><a href="../Employee/employee.php">Employee</a></li>
				<li><a href="edit.php">Edit Database</a></li>
				<?php /*
					if(isset($_SESSION["logged_in"]) && $_SESSION["logged_in"]==true && ($_SESSION["user_type"]=='Developer' or $_SESSION["user_type"]=='Admin')){

						echo '<li><a href="../Edit/edit.php">Edit Database</a></li>';
					} */
				?>
					
			</ul>
		</nav>
		
		<div id="container">
			<nav >
			
				<ul>
					<li onclick="adddata()" ><a>Add Data</a></li>
					<li onclick="deletedata()"><a href="#">Delete Data</a></li>
					<li onclick="updatedata()"><a href="#">Update Data</a></li>
				</ul>
				
			</nav>
		
		</div>
		<?php
			oci_execute($pk);
			while($temp2=oci_fetch_array($pk,OCI_ASSOC)){	
				foreach($temp2 as $row)
					$primary_key=$row;
			}
		?>
		
		<div id="container" >
		
			<div id="add_data" >
				<input type="button" value="Close" onclick="all_edit_opt_hide()">
				<div   id="data_input">
					<form method="post" action='<?php echo $_SERVER["PHP_SELF"];?>'>
					<?php
							oci_execute($show_col);
							
							
							while($h_row=oci_fetch_array($show_col,OCI_ASSOC))
							{
						
								foreach($h_row as $column)
								{
									echo $column.'<br><input type="text" name="'.$column.'" id="in">';
								
									if($primary_key==$column) echo '<span style="color: red !important; font-size: 125%;">  *</span>';		
									
									echo "</br>";
								}
							}
							echo '<input type="submit" value="Submit">';
							echo '</form>';
						if ($_SERVER["REQUEST_METHOD"] == "POST" )
						{
							if(empty($_POST[$primary_key])==true or $_POST[$primary_key]=="" or empty($_POST)==true)
							{
								$errMsg="\n* marked field must be fiulled!";
								echo '<span style="color: red !important;font-size: 110%;">'.$errMsg.'</span>';
							}
							else
							{
							//	echo $primary_key." ".$_POST[$primary_key]." ".$tab_name."<br>";
								$insert_query="INSERT INTO ".$tab_name." (".$primary_key.") VALUES ('".$_POST[$primary_key]."')";
							//	echo $insert_query."<br>";
								$insert_first=oci_parse($conn,$insert_query);
								oci_execute($insert_first);
								oci_execute($show_col);
								while($insert_row=oci_fetch_array($show_col,OCI_ASSOC)){
									foreach($insert_row as $insert_col_name)
									{
										if( empty($_POST[$insert_col_name])!=true  and $insert_col_name != $primary_key){
											$update_query="UPDATE ".$tab_name." SET ".$insert_col_name."= '".$_POST[$insert_col_name]."'  WHERE ".$primary_key."= '".$_POST[$primary_key]."'";
											//echo $update_query."<br>";
											$update=oci_parse($conn,$update_query);
											oci_execute($update);
											
											//$_POST[$insert_col_name]="";
											
										}
									}
								
								}
								
								$_POST="";
							}
							
							$errMsg="";
							
						}
						
					?>
				</div>
			</div>
	
		</div>
		
		<div id="container">
			<div id="delete_data">
				<input type="button" value="Close" onclick="all_edit_opt_hide()">
				<div  id="data_input">
					<form method="post" action='<?php echo $_SERVER["PHP_SELF"];?>'>
					<?php
					

						echo 'Enter '.$primary_key.'<br><input type="text" name="delete_key" id="in"> <br>';
						echo '<input type="submit" value="Delete">';
						echo '</form>';
						if($_SERVER["REQUEST_METHOD"] == "POST" and empty($_POST["delete_key"])==false)
						{
							$delete_query="DELETE FROM ".$tab_name." WHERE ".$primary_key." = '".$_POST["delete_key"]."'";
							//echo "$delete_query";
							$delete=oci_parse($conn,$delete_query);
							oci_execute($delete);
						}
						$_POST["delete_key"]="";
					
					?>
				</div>
			</div>
		</div>
		

		
		<div id="container">
			<div id="update_data">
				<input type="button" value="Close" onclick="all_edit_opt_hide()">
				<div id="data_input">
					<form method="post" action='<?php echo $_SERVER["PHP_SELF"];?>'>
					<?php
						 
						echo 'Enter '.$primary_key.'<br><input type="text" name="update_key" id="in"> <br>';
						echo '<input type="submit" value="Update">';
						echo "</form>";
					?>
					
					<form method="post" action='<?php echo $_SERVER["PHP_SELF"];?>'>
					
					<?php
						if($_SERVER["REQUEST_METHOD"] == "POST" and empty($_POST["update_key"])==false)
						{
							$update_key=$_POST["update_key"];
							
							oci_execute($show_col);
							echo "<table id='entity_table'>";
							echo '<caption>'.$tab_name.'</caption>';
			
							echo "<tr>" ;
							while($u_row=oci_fetch_array($show_col,OCI_ASSOC)){
							
								foreach($u_row as $col_n){
									echo "<th>" . ($col_n!==null ? htmlentities($col_n,ENT_QUOTES) : "NULL" ) . "</th>\n ";
								}
							}
							echo "</tr>";
							
							$select_row_query="SELECT * FROM ".$tab_name." WHERE ".$primary_key."= '".$update_key."'";
							$update_query_parse=oci_parse($conn,$select_row_query);
							oci_execute($update_query_parse);
							oci_execute($show_col);
							$update_sign=true;
							echo "<tr>";
							while($u_row=oci_fetch_array($update_query_parse,OCI_ASSOC+OCI_RETURN_NULLS))
							{
								
								foreach($u_row as $col_val)
								{
									while($u_col=oci_fetch_array($show_col,OCI_ASSOC)){
							
										foreach($u_col as $col_n){
											
											echo '<td><input type="text" name="'.$col_n.'" Value="'.$col_val.'" </td>';
										}
										//echo $col_n." ->".$col_val;
										break;
									}
								}
								
							}
							
							echo "</tr>";
							
							
							echo '</table>';
							
							echo '<input type="submit" value="Done">';
						}	
			
						if($_SERVER["REQUEST_METHOD"] == "POST" and $update_sign==true)
						{
							
							
							oci_execute($show_col);	
							
							while($up_row=oci_fetch_array($show_col,OCI_ASSOC)){
								foreach($up_row as $up_col_name)
								{
									
									 if( empty($_POST[$up_col_name])==false ){
										
										if($up_col_name == $primary_key and $_POST[$up_col_name]!=$update_key)
										{
											$update_pk_query="UPDATE ".$tab_name." SET ".$up_col_name."= '".$_POST[$primary_key]."'  WHERE ".$primary_key."= '".$update_key."'";
											
											$update_pk=oci_parse($conn,$update_pk_query);
											oci_execute($update_pk);
											$update_key=$_POST[$primary_key];
										}
										else if($up_col_name != $primary_key)
										{
											$up_q="UPDATE ".$tab_name." SET ".$up_col_name."= '".$_POST[$up_col_name]."'  WHERE ".$primary_key."= '".$update_key."'";
											echo $up_q."<br>";
											$upd=oci_parse($conn,$up_q);
											oci_execute($upd);
											
											$_POST[$up_col_name]="";
										}
									}
								}
								
							}
							$update_sign=false;
								
						}
							
						
						
					?>
				</div>
			</div>
		</div>
		
	
		
		
		<div id="container">

		<?php
			
			oci_execute($show_col);
			echo "<table id='entity_table'>";
		
			echo '<caption>'.$tab_name.'</caption>';
			
			echo "<tr>" ;
			while($h_row=oci_fetch_array($show_col,OCI_ASSOC)){
			
				foreach($h_row as $column){
					echo "<th>" . ($column!==null ? htmlentities($column,ENT_QUOTES) : "NULL" ) . "</th>\n ";
				}
			}
			echo "</tr>";
		
			oci_execute($tab_data);
		
			while($row=oci_fetch_array($tab_data,OCI_ASSOC+OCI_RETURN_NULLS))
			{
				echo "<tr>\n";
					
				foreach($row as $item)
				{
					echo "<td>" . ($item!==null ? htmlentities($item,ENT_QUOTES) : "NULL" ) . "</td>\n ";	//&nbsp;
				}
				echo "</tr>\n";
			}
			echo "</table>";
			
			
		//	oci_free_statement($stid);
		//	oci_close($conn); 
		
		?>
	
	
	<footer>
	
		<p> &copyCopyright 2017 </p>
		<p> All rights reserved. Powered by <span style="color:#999999;">DB Group-8</span></p>
	
	</footer>
	
	<script src="script/event_handle.js"></script>


	
	</body>
</html>