<?php session_start(); ?>

<div class="wrapper row1">
    <header id="header" class="hoc clear">

        <div id="logo" class="fl_left">

            <h1><a href="/mmc"><img src="../images/mist_logo.png" />MIST Medical Center</a></h1>
        </div>
        <nav id="mainav" class="fl_right">
            <ul class="clear">
                <li><a href="../pages/medicalstaffhome.php">Issue</a></li>
                <li><a href="#">Proposal</a></li>
<!--                <li><a href="../pages/propose.php">Proposal</a>-->
<!--                    <ul>-->
<!--                        <li><a href="../pages/propose.php">Create Proposal</a></li>-->
<!--                        <li><a href="../pages/proposal_viewer.php">View Proposal</a></li>-->
<!--                    </ul>-->
<!--                </li>-->
                <li><a href="../pages/search_medical_records.php">Patient</a></li>
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
                <li><a href="../pages/store_medicine_container.php">Medicine</a>
                    <ul>
                        <li><a href="../pages/store_medicine_container.php">Store Medicine</a></li>
                        <li><a href="#">View All</a></li>
                    </ul>
                </li>
                <li><a id="gotofooter" href="#footer">Contact</a></li>
                <li><a class="drop" href="#" style="color: red;font-weight:600;"><?php echo $_SESSION["user_first_name"];?></a>
                    <ul>
                        <li><a href="#">Persional Info</a></li>

                        <li><a href="../process/logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>

    </header>
</div>