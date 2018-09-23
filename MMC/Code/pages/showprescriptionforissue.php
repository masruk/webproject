<!DOCTYPE html>
<?php include '../connection/connect-database.php';
session_start();
?>

<html>
<head>
    <title>MISTMC</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="stylesheet" type="text/css" href="../styles/showprescription.css">
    <link rel="stylesheet" type="text/css" href="../styles/bootstrap.min.css">
    <style rel="stylesheet" type="text/css" >
        #no-bordered-table {border: 0 !important;}
        #no-bordered-table tr{border: 0 !important;}
        #no-bordered-table tr td{border: 0 !important; padding:2px !important;}
        #no-bordered-table tr th{border: 0 !important; padding:2px !important;}
        #desease-info tr{height:20px;margin: 0;}
    </style>
</head>

<body>
<?php
if($_SESSION["user_category"]=='doctor' or $_SESSION["user_category"]=='medicalstaff' or $_SESSION["user_category"]=='admin')
{
    if(!empty($_SESSION["patient_id"]))
        $username=$_SESSION["patient_id"];
    else{
        $query="SELECT patientid FROM medicalrecords WHERE prescriptionid=(SELECT MAX(prescriptionid) FROM medicalrecords)";
        $res=$conn->query($query);
        $row=mysqli_fetch_assoc($res);
        $username=$row["patientid"];
    }
    $query="select first_name,last_name from students where studentId=".$username;
    $row=$conn->query($query);
    $name=$row->fetch_array(MYSQLI_ASSOC);
    $full_name=$name["first_name"]." ".$name["last_name"];
}
else{
    $username=$_SESSION["username"];

    $full_name=$_SESSION["user_first_name"]." ".$_SESSION["user_last_name"];
}
?>
<div id="container" style="overflow:hidden;">
    <div class="row">
        <div class="col-md-3" id="prescription-list" style="padding-top:50px;">
            <ul id="prescription-id-list">

                <?php
                echo "<h4 style=\"color:#2e86d9; font-weight:600;\">PRESCRIPTION ID</h4>";
                $sql1="select prescriptionid,prescription_date from medicalrecords 
                            where patientid=".$username." ORDER BY prescriptionid desc";
                $res1=$conn->query($sql1);

                if($res1->num_rows > 0)
                {
                    while($row=mysqli_fetch_assoc($res1))
                    {
                        $_date=new DateTime($row["prescription_date"]);
                        echo '<li>
                                    <form method="post" action="" enctype="multipart/form-data">
                                    <input type="hidden" name="prescriptionID" value="'.$row["prescriptionid"].'"></input>
									<input type="submit" value="'.$_date->format('d M Y')." PID".$row["prescriptionid"].'"></input></li></form>';

                    }
                }

                ?>
            </ul>

        </div>
        <?php

        if(!empty($_POST['prescriptionID']))
        {
            $prescribedID = $_POST['prescriptionID'];

            $query="select * from prescribed_medicine WHERE prescribed_medicine.prescriptionId = '$prescribedID'";
            $all_medicine=$conn->query($query) or die('wrong query');



            $query1="select * from medicalrecords WHERE
                    medicalrecords.prescriptionid = '$prescribedID'";
            $res1=$conn->query($query1) or die('wrong query');
            $medicalrcord=$res1->fetch_array(MYSQLI_ASSOC);

            $doctorID = $medicalrcord['doctorid'];


            $query2="select * from doctors WHERE doctors.doctorId = '$doctorID'";
            $res2=$conn->query($query2) or die('wrong query');
            $doctor=$res2->fetch_array(MYSQLI_ASSOC);


            $query3="SELECT * FROM degree WHERE degree.doctorId = '$doctorID'";
            $all_degree=$conn->query($query3) or die('wrong query');


        }
        else
        {
            $query="SELECT MAX(prescriptionid) as prescriptionid FROM medicalrecords where patientId=".$username;
            $res=$conn->query($query) or die('wrong query');
            $row=$res->fetch_array(MYSQLI_ASSOC);

            $prescribedID = $row['prescriptionid'];

            $query1="SELECT * FROM medicalrecords WHERE prescriptionid='$prescribedID'";
            $res1=$conn->query($query1) or die('wrong query');
            $medicalrcord=$res1->fetch_array(MYSQLI_ASSOC);

            $doctorID = $medicalrcord['doctorid'];


            $query2="SELECT * FROM doctors WHERE doctors.doctorId = '$doctorID'";
            $res2=$conn->query($query2) or die('wrong query');
            $doctor=$res2->fetch_array(MYSQLI_ASSOC);

            $query3="SELECT * FROM degree WHERE degree.doctorId = '$doctorID'";
            $all_degree=$conn->query($query3) or die('wrong query');

            $query4="SELECT * FROM prescribed_medicine WHERE prescriptionId = '$prescribedID'";
            $all_medicine=$conn->query($query4) or die('wrong query');


        }



        ?>


        <div class="col-md-9" style="border-left:1px solid green;">
            <div id="pres_div" style="margin-top: -50px !important;">
                <table id="no-bordered-table" style="width:100%; border:none !important; margin-bottom:35px !important;">

                    <tr>
                        <td><h2 style="color:#116d8f;"><?php echo "Dr. ". $doctor['first_name']." ".$doctor['last_name']; ?></h2></td>
                        <td rowspan="2" ><img src="../images/mist_logo.png" height="45px" width="45px;" style="float:left;margin-left:10px;"/><h4 style="color: #002080;">MIST MEDICAL CENTER</h4><span style="color:#2b9fae">Contact:8801892838484</span></td>
                    </tr>
                    <tr>

                        <td style="color:#ae2b2b"><?php
                            /*   echo '<pre>';
                               print_r($degree);
                               echo '</pre>';*/

                            $count=true;
                            while($degree=$all_degree->fetch_array(MYSQLI_ASSOC))
                            {
                                if($count==false)
                                    echo ",";
                                else $count=false;
                                echo $degree["degree"];
                                if($degree["topic"]!="")
                                    echo "(".$degree["topic"].")";

                            }

                            ?></td>
                    </tr>
                    <tr>
                        <td style="color:#ae2b2b">Contact: 01234567900</td>
                    </tr>

                </table>

                </table>
                <table id="showprescription" style="width:100%; color:#2b71ae;">
                    <tr>
                        <td rowspan="6" style="width:60%"><span style="color:#38b25f;font-weight: 600;font-size: 103%;">Deseas: </span><?php echo $medicalrcord["desease"];?></td>
                        <th style="color:#d9352e;">Date:</th>
                        <td><?php echo $medicalrcord["prescription_date"]; ?></td></tr>
                    <tr>

                        <th style="color:#38b25f;">Name:</th>
                        <td><?php echo $full_name; ?></td>
                    </tr>
                    <tr>
                        <th style="color:#38b25f;">Age:</th>
                        <td><?php

                            $sql="select dob from students where studentId=".$username;
                            $dob=$conn->query($sql);
                            $row = mysqli_fetch_assoc($dob);
                            $sql="select prescription_date from medicalrecords where prescriptionid=".$prescribedID;
                            $pdt=$conn->query($sql);
                            $row1 = mysqli_fetch_assoc($pdt);
                            //echo $row["dob"];
                            $dob = new DateTime($row["dob"]);
                            $pdate=new DateTime($row1["prescription_date"]);

                            $age = $pdate->diff($dob);
                            echo $age->y;

                            ?></td>
                    </tr>
                    <tr>
                        <th style="color:#38b25f;">BP:</th>
                        <td><?php if(!empty($medicalrcord["bp"]))echo $medicalrcord["bp"]; else echo "-----"; ?></td>
                    </tr>
                    <tr>
                        <th style="color:#38b25f;">Weight:</th>
                        <td><?php if(!empty($medicalrcord["weight"])) echo $medicalrcord["weight"]; else echo "-----"; ?></td>
                    </tr>
                    <tr>
                        <th style="color:#38b25f;">Temp:</th>
                        <td><?php if(!empty($medicalrcord["temparature"])) echo $medicalrcord["temparature"]; else echo "-----"; ?></td>
                    </tr>
                </table>


                <table id="showprescription" align="center" style="width:100%; color:#2b71ae; ">
                    <tr>
                        <th style="color:#38b25f; width:30%;">Medicine</th>
                        <th style="width:15%; color:#38b25f;"></th>
                        <th style="width:15%; color:#38b25f; "></th>
                        <th style="width:25%; color:#38b25f;"></th>
                        <th style="width:15%;color:#38b25f;">Issued(pc)</th>

                    </tr>
                        <form action="../process/process_issue.php" method="post">
                             <input type="hidden" name="presid" value="<?php echo $prescribedID; ?>">
                    <?php
                    while($medicine=$all_medicine->fetch_array(MYSQLI_ASSOC))
                    {
                        echo "<tr>";
                        echo "<td>".$medicine["medicineName"];
                        if($medicine["dose"]!="") echo " (".$medicine["dose"]."mg)";
                        echo "</td><td>";
                        if($medicine["morning"]!="" and $medicine["noon"]!="" and $medicine["night"]!="")echo $medicine["morning"]."-".$medicine["noon"]."-".$medicine["night"];
                        echo "</td><td>".$medicine["day"];
                        if($medicine["day"]>1) echo " days";
                        else if($medicine["day"]==1) echo " day";
                        echo "</td>";
                        echo "<td>";
                        echo $medicine["description"];
                        echo"</td>";
                        $fieldName = preg_replace("/[^A-Za-z0-9]/", "", $medicine["medicineName"]);
                        echo '<td>
                        <input type="text" name="'.$fieldName.'"  placeholder="Enter quantity"></td>';
                        echo "</tr>";
                    }
                    ?>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><input type="submit" value="Done"></td>
                    </tr>
                    </form>

                </table>
                <br>
                <?php
                if(!empty( $medicalrcord["advice"]))
                    echo '<p style="border: 1px solid green; color:red; margin-top: 20px; padding:10px;">'.$medicalrcord["advice"].'</p>';

                ?>
            </div>
        </div>
    </div>
</div>


</body>
</html>