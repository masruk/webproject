<!DOCTYPE html>
<?php include 'connection/connect-database.php';?>
<html lang="">

	<head>
        <title>MISTMC</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <link rel="stylesheet" type="text/css" href="styles/layout.css" />
    </head>
    
	 <body id="top">
	 <?php include 'parts/header.php' ?>
<!-- ===============================nav===================================-->
    <!--	<div class="wrapper row1">
            <header id="header" class="hoc clear">

                <div id="logo" class="fl_left">

                    <h1><a href="/"><img src="images/mist_logo.png" />MIST Medical Center</a></h1>
                </div>
                <nav id="mainav" class="fl_right">
                    <ul class="clear">
                        <li class="active"><a href="index.html">Home</a></li>
                        <li><a href="#">Doctors</a> -->
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
                   <!--     <li><a href="#">Medicine</a></li>
                        <li><a href="#">Services</a></li>
                        <li><a href="#">About us</a></li>
                        <li><a id="gotofooter" href="#footer">Contact</a></li>
                        <li><a id="sign_in" href="#" style="color: red;">Sign In</a></li>

                    </ul>
                </nav>

            </header>
		</div> -->
		
<!-- ==========================end nav==================================== -->
<!-- ==========================Hompage photo=========================== -->	
		<div class="wrapper bgded overlay" style="background-image:url('images/stetho.jpg'); background-size: 100% 100%;">
			<div id="pageintro" class="hoc clear">

                <iframe frameborder='0' width='100%' src='pages/show_tips.php' frameborder="0" style="min-height:900px; "></iframe>
            </div>
		</div>
<!-- ========================End Hompage photo=========================== -->
<!-- ===============================Login================================ -->
		<div>
		    <div class="login" id="login-box">
                <i class="fa fa-close"  id="close_form"></i>
                <img src="images/avatar.png" id="avatar">
                <h1>Login Here</h1>
                <form action="process/account_validity.php" method="post">
                    <p>Username</p>
                    <input type="text" name="username" placeholder="Enter Username">
					<p style="color:red; font-size:80%;  visibility: hidden;" >*Username not found</p>
                    <p>Password</p>
                    <input type="password" name="password" placeholder="Enter Password">
                    <input type="submit" name="submit" value="Login">
                    <a id="forgotpassword" href="#">Forget Password</a><br>
                    <a id="havntacc" href="#">Don't have account?</a>
                </form>

            </div>
<!-- ============================End Login================================ -->
<!-- ==============================Signup============================== -->		<div class="signup" id="login-box">
                <i class="fa fa-close"  id="close_form2"></i>
                <img src="images/avatar.png" id="avatar">
                <h1>Signup Here</h1>
                <form action="process/signup.php" method="post">
                    <p>Username</p>
                    <input type="text" name="signup_username" placeholder="Enter Username">
					<p id="signup_validity" style="color:red; font-size:80%; visibility: hidden;"></p>
                    <p>Password</p>
                    <input type="password" name="signup_password" placeholder="Enter Password">
                    <p>Re-type Password</p>
                    <input type="password" name="signup_repassword" placeholder="Enter same Password">
                    <input type="submit" name="signup" value="Signup">
                    <a id="haveacc" href="#">Allready have account?</a>
                </form>

            </div>
		</div>

<!-- =============================End Signup============================== -->

     <!-- ========================doctor_info========================= -->
     <div class="wrapper row3" id="doctor" style="background-color: #f2f2f2;">
         <section class="hoc container clear">
             <div class="sectiontitle">
                 <h6 class="heading">Doctor's Information</h6>
                 <p>MIST medical center has some excellent Doctors.</p>
             </div>
             <ul class="nospace group services">
                 <li class="one_half first">
<!--                     <article class="infobox">-->
<!--                         <h6 class="heading"><div>-->
<!--                                 <img src="images/avatar.png" style="width:25%; float: left;">-->
<!--                             </div><a href="#">Dr. Mahbuba Alam</a></h6>-->
<!--                         <p>MBBS,FCPS(Gynecology)</p>-->
<!--                     </article>-->
                     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                     <style type="text/css">
                         .card {
                             box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
                             max-width: 300px;
                             margin: auto;
                             padding-top: 30px;
                             text-align: center;
                             font-family: arial;
                             background-color: white;
                         }
                         .card img{
                             margin-bottom: 30px;
                         }

                         .title {
                             color: grey;
                             font-size: 18px;
                         }

                         button {
                             border: none;
                             outline: 0;
                             display: inline-block;
                             padding: 8px;
                             color: white;
                             background-color: #000;
                             text-align: center;
                             cursor: pointer;
                             width: 100%;
                             font-size: 18px;
                         }

                         a {
                             text-decoration: none;
                             font-size: 22px;
                             color: black;
                         }
                         button{
                             background-color: #214B38;
                         }

                         button:hover, a:hover {
                             opacity: 0.7;
                         }
                     </style>

<!--                     <h2 style="text-align:center">User Profile Card</h2>-->

                     <div class="card">
                         <img src="images/avatar.png" alt="John" style="width:40%">
                         <h1>Dr. Mahbuba Alam</h1>
                         <p>MBBS,FCPS(Gynecology)</p>
<!--                         <p>Harvard University</p>-->
                         <p><button>Contact : 192833848</button></p>
                     </div>

                 </li>
                 <li class="one_half">
<!--                     <article class="infobox"><div>-->
<!--                             <img src="images/avatar.png" style="width:25%; float: left;">-->
<!--                         </div>-->
<!--                         <h6 class="heading"><a href="#">Dr. Harun Hamza</a></h6>-->
<!--                         <p>MBBS,FCPS(Medicine),FRCS(Neurology)</p>-->
<!--                     </article>-->
                     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<!--                     <h2 style="text-align:center">User Profile Card</h2>-->

                     <div class="card">
                         <img src="images/avatar.png" alt="John" style="width:40%">
                         <h1>Dr.Harun Hamza</h1>
                         <p>MBBS,FCPS(Medicine),FRCS(Neurology)</p>
<!--                         <p>Harvard University</p>-->
                         <p><button>Contact : 1283446455</button></p>
                     </div>

                 </li>

             </ul>

             <div class="clear"></div>
         </section>
     </div>

     <!-- ========================end doctor_info========================= -->
     <!-- ==========================Populer features=========================== -->
     <div class="wrapper row2" id="service">
         <section class="hoc container clear">
             <div class="sectiontitle">
                 <h6 class="heading">Our Services</h6>
                 <p>MIST medical center is fully concerned about students health.</p>
             </div>
             <ul class="nospace group services">
                 <li class="one_third first">
                     <article class="infobox">
                         <h6 class="heading"><i class="fa fa-balance-scale"></i> <a href="#">Test & Diagnosis</a></h6>
                         <p>Medical and diagnosis test recommended by te doctors to the patients outside [&hellip;]</p>
                     </article>
                 </li>
                 <li class="one_third">
                     <article class="infobox">
                         <h6 class="heading"><i class="fa fa-medium"></i> <a href="#">Affiliated Hospitals</a></h6>
                         <p>The serious patients which need to be admitted to affilated hospitals for better facilty [&hellip;]</p>
                     </article>
                 </li>
                 <li class="one_third">
                     <article class="infobox">
                         <h6 class="heading"><i class="fa fa-motorcycle"></i> <a href="#">Finacial support</a></h6>
                         <p>The financial support policy for the patient for helping them to meet the hospltal expendture[&hellip;]</p>
                     </article>
                 </li>


             </ul>

             <div class="clear"></div>
         </section>
     </div>
     <!-- ========================end Populer features========================= -->

 <!-- ========================treatment statistics========================= -->
		<div class="wrapper row6">
			<div>
				<div>
                    <iframe frameborder='0' width='100%' src='pages/show_statistics.php' frameborder="0" style="min-height:350px; "></iframe>
				</div>

		</div>
<!-- ======================end treatment statistics======================= -->
		<?php include 'parts/footer.php'; ?>

     <script>

         function health_tips() {

             var xmlhttp = new XMLHttpRequest();
             xmlhttp.onreadystatechange = function() {
                 if (this.readyState == 4 && this.status == 200) {
                     document.getElementById("tips").innerHTML = this.responseText;
                 }
             };
             xmlhttp.open("GET",'../process/fetch_health_tips.php',true);
             xmlhttp.send();

         }
     </script>
	 </body>
</html>