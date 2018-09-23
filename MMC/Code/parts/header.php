
        <div class="wrapper row1">
            <header id="header" class="hoc clear">

                <div id="logo" class="fl_left">

                    <h1><a href="/mmc"><img src="images/mist_logo.png" />MIST Medical Center</a></h1>
                </div>
                <nav id="mainav" class="fl_right">
                    <ul class="clear">
                        <li><a href="/mmc">Home</a></li>
                        <li><a id="gotodoctor" href="#">Doctors</a>
                          <!--  <ul>
                                <li><a href="pages/gallery.html">Gallery</a></li>
                                <li><a href="pages/full-width.html">Full Width</a></li>
                                <li><a href="pages/sidebar-left.html">Sidebar Left</a></li>
                                <li><a href="pages/sidebar-right.html">Sidebar Right</a></li>
                                <li><a href="pages/basic-grid.html">Basic Grid</a></li>
                            </ul>
                        </li> -->
                      <!--  <li><a class="drop" href="#">Dropdown</a>
                            <ul>
                                <li><a href="#">Level 2</a></li>
                                <li><a class="drop" href="#">Level 2 + Drop</a>
                                    <ul>
                                        <li><a href="#">Level 3</a></li>
                                        <li><a href="#">Level 3</a></li>
                                        <li><a href="#">Level 3</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Level 2</a></li>
                            </ul>
                        </li> -->
                        <li><a id="gotoservice" href="#">Services</a></li>
<!--                        <li><a href="#">About us</a></li>-->
                        <li><a id="gotofooter" href="#footer">Contact</a></li>
                        <?php
							
										session_start();
										if(empty($_SESSION["username"])){
											echo '<li>';
											echo '<a id="sign_in" href="#" style="color: red;">Sign In</a>';
											
										}
										else{
											echo '
											<li class="drop">
											<a href="#" style="color: red; font-weight:600;">'.$_SESSION["user_first_name"].'</a>
											
												<ul>
													<li><a href="pages/'.$_SESSION["user_category"].'home.php">Workspace</a></li>
													<li><a href="#">Persional Info</a></li>
													<li><a href="process/logout.php">Logout</a></li>
												</ul>';
										}
									
							echo '</li>';
							?>
		
                    </ul>
                </nav>

            </header>
		</div>