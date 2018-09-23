

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
						
						
						echo '
					
						<form  method="post" action="../Login/login.php">
							<table>
							<tr>
							<td>username:</td><td><input type="text" name="username"></input></td>
							</tr>
							<tr>
							<td>password:</td><td><input type="password" name="password"></input></td>
							</tr>
							<tr>
							<td>Login as:</td><td><select name="role">
											<option value="Admin">Admin</option>
											<option value="Employee">Employee</option>
											<option value="Visitor">Visitor</option>
											<option value="Developer">Developer</option>
										</select></td>
							</tr>
							<tr>
							<td><input type="submit" value="Login"></td>
							
							</tr>
							</table>
						</form> ';
						
						
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
					<li><a href="../FAQ/faq.php">FAQ</a></li>
					<?php
						if(isset($_SESSION["logged_in"]) && $_SESSION["logged_in"]==true && ($_SESSION["user_type"]=='Developer' or $_SESSION["user_type"]=='Admin')){

							echo '<li><a href="../Edit/edit.php">Edit Database</a></li>';
						}
					?>
					
				</ul>
			</nav>