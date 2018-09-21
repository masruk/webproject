<!DOCTYPE html>
<?php include '../connection/connect-database.php';
	
?>
<html lang="">

	<head>
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<link rel="stylesheet" href="../scripts/bootstrap.min.css" />
		<script src="../scripts/bootstrap.min.js"></script>
		<script src="../scripts/jquery.min.js"></script>
		<style rel="stylesheet" type="text/css">
			#no-bordered-table {border: 0 !important;}
			#no-bordered-table tr{border: 0 !important;}
			#no-bordered-table tr td{border: 0 !important; padding:2px !important;}
			#no-bordered-table tr th{border: 0 !important; padding:2px !important;}
            #desease-info tr{height:20px;margin: 0;}
		
		</style>
        <style type="text/css">
            #search-result{
                position:absolute;
                z-index: 3;
                list-style-type: none;
                color: black;

            }
            #search-result li{
                padding: 2px 15px;
            }
            /*#search-result li:nth-child(odd){*/
                /*background-color:  #1ab2ff;*/
                /*padding: 2px 15px;*/

            /*}*/
            /*#search-result li:nth-child(even){*/
                /*background-color:  #00aaff;*/
                /*list-style-type: none;*/


            /*}*/

        </style>
    </head>
    
	 <body id="top">
		
		<!--<div class="wrapper row3" style="min-height:500px; padding-bottom:40px;"> -->
		<div class="container">
			
				<br />
				<br />
		<!--		<h2 align="center"><a href=#">MIST MEDICAL CENTER</a></h2><br /> -->
				<div class="table-responsive">
							<table class="table table-bordered" id="no-bordered-table">
								<tr>
									<th style=" width:300px;"></th>
									<th></th>
									<th style=" width:280px;"></th>
								</tr>
								<tr>
									<?php
										session_start();
										$sql="SELECT first_name,last_name,mobile_no from doctors where doctorid=".$_SESSION["username"];
										$res=$conn->query($sql);
										$row1 = mysqli_fetch_assoc($res);
										echo '<td style="font-size:135%; font-weight:600;color: #002080;">Dr.'.$row1["first_name"].' '.$row1["last_name"].'<td>';
										echo '<td rowspan="2" ><img src="../images/mist_logo.png" height="45px" width="45px;" style="float:left;margin-left:10px;"/><h4 style="color: #002080;">MIST MEDICAL CENTER</h4>Contact:8801892838484</td>';
									
									?>
								</tr>
								<tr>
									<?php
										$sql="SELECT degree,topic from degree where doctorid=".$_SESSION["username"];
										$res=$conn->query($sql);
										echo '<td style="color:#0086b3;">';
										$count=true;
										while($row=mysqli_fetch_assoc($res))
										{
											if($count==false)
												echo ",";
											else $count=false; 
											echo $row["degree"];
											if($row["topic"]!="")
												echo "(".$row["topic"].")";
											
										}
										
										echo '<tr><td style="color:#0086b3;">Contact: '.$row1["mobile_no"].'</td></tr>';
									?>
									
									
								</tr>
							</table>
				</div>
				<hr>

            <div class="form-group">
				<div class="table-responsive">
					<table class="table table-bordered">
						<tr>
							<td style="width:5%;">ID:</td>
							<td style="width:20%;"><form id="send_id"><input type="text" id="pid" name="pid" placeholder="Enter ID" style="border:0;" onkeyup="fetchPatientInfo(this.value)" ></form></td>
							<td style="width:10%;">Name:</td>
							<td style="width:25%;"><span id="pname"></span></td>
							<td style="width:8%;">Age:</td>
							<td style="width:12%;"><span id="page"></span></td>
							<td style="width:15%;">Date:<?php echo date("d-m-Y"); ?></td>

						</tr>
					</table>
				</div>

                <div class="table-responsive">
                    <table class="table table-bordered" id="no-bordered-table">
                        <form name="prescription" id="prescription" >

                            <tr>
                                <td rowspan="3" style="width:70%;"><input style="height:150px;" type="text" placeholder="Desease" name="desease" class="form-control name_list"/></td>
                                <td style="width:16%; text-align:right;">Blood pressure:</td>
                                <td style="width:14%; text-align:right;"><input type="text" placeholder="Ex: 80/120" name="bp" class="form-control name_list"/></td>

                            </tr>
                            <tr>
                                <td style="width:16%; text-align:right;">Weight:</td>
                                <td style="width:14%; text-align:right;"><input type="text" placeholder="Ex: 61.5kg" name="weight" class="form-control name_list"/></td>
                            </tr>
                            <tr>
                                <td style="width:16%; text-align:right;">Temparature:</td>
                                <td style="width:14%; text-align:right;"><input type="text" placeholder="Ex: 98F" name="temparature" class="form-control name_list"/></td>
                            </tr>

                    </table>
                </div>
				

					<!---------form----------->
						<div class="table-responsive">
							<table class="table table-bordered" id="dynamic_field" style="width:100%; text-align:right !important;">
								
								<tr style="background-color:green;">
									<th style="width:25%; "></th>
									<th style="width:12%;"></th>
									<th style="width:8%;"></th>
									<th style="width:8%;"></th>
									<th style="width:8%;"></th>
									<th style="width:11%;"></th>
									<th style="width:24%;"></th>
									<th style="width:4%;"></th>
								<tr/>
								<tr>
									<th colspan="7" style="text-align:center;">Prescription</th>
								</tr>
								<tr id="row1">
									<td><input  onkeyup="livemedicinesearch(this.value)" type="text" name="medicine[]" placeholder="Enter medicine" class="form-control name_list" /></td>
									<td><input type="text" name="dose[]" placeholder="Dose(mg)" class="form-control name_list" /></td>
									<td><input type="text" name="morning[]" placeholder="" class="form-control name_list" /></td>
									<td><input type="text" name="noon[]" placeholder="" class="form-control name_list" /></td>
									<td><input type="text" name="night[]" placeholder="" class="form-control name_list" /></td>
									<td><input type="text" name="day[]" placeholder="Days" class="form-control name_list" /></td>
									<td><input type="text" name="description[]" placeholder="Description" class="form-control name_list" /></td>
									<td><button type="button" name="remove" id="1" class="btn btn-danger btn_remove">X</button></td>
								</tr>
                                <tr id="row2">
                                    <td><input onkeyup="livemedicinesearch(this.value)" type="text" name="medicine[]" placeholder="Enter medicine" class="form-control name_list" /></td>
                                    <td><input type="text" name="dose[]" placeholder="Dose(mg)" class="form-control name_list" /></td>
                                    <td><input type="text" name="morning[]" placeholder="" class="form-control name_list" /></td>
                                    <td><input type="text" name="noon[]" placeholder="" class="form-control name_list" /></td>
                                    <td><input type="text" name="night[]" placeholder="" class="form-control name_list" /></td>
                                    <td><input type="text" name="day[]" placeholder="Days" class="form-control name_list" /></td>
                                    <td><input type="text" name="description[]" placeholder="Description" class="form-control name_list" /></td>
                                    <td><button type="button" name="remove" id="2" class="btn btn-danger btn_remove">X</button></td>

                                </tr>
                                <tr id="row3">
                                    <td><input id="m"  onkeyup="livemedicinesearch(this.value)" type="text" name="medicine[]" placeholder="Enter medicine" class="form-control name_list" /></td>
                                    <td><input type="text" name="dose[]" placeholder="Dose(mg)" class="form-control name_list" /></td>
                                    <td><input type="text" name="morning[]" placeholder="" class="form-control name_list" /></td>
                                    <td><input type="text" name="noon[]" placeholder="" class="form-control name_list" /></td>
                                    <td><input type="text" name="night[]" placeholder="" class="form-control name_list" /></td>
                                    <td><input type="text" name="day[]" placeholder="Days" class="form-control name_list" /></td>
                                    <td><input type="text" name="description[]" placeholder="Description" class="form-control name_list" /></td>
                                    <td><button type="button" name="remove" id="3" class="btn btn-danger btn_remove">X</button></td>

                                </tr>
                                <tr>
                                    <ul class="list-group" id="search-result"></ul>
                                </tr>
							</table>
							
							<input  type="text" name="advice" placeholder="Advice & Tests " class="form-control name_list" style="margin-bottom:15px; height:60px;"/>
							<button type="button" name="add" id="add" class="btn btn-success">More Medicine</button>
							<input type="button" name="submit" id="submit" class="btn btn-info" value="Done" />
						</div>
					</form>
				</div>
			
		
		</div>

		<script src="../scripts/prescription.js"></script>
		<script src="../scripts/ajax.js"></script>
        <script src="../scripts/livesearch.js"></script>
	
		
	 </body>
</html>
