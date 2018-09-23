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


<div id="container" style="overflow:hidden;">
    <div class="row">
        <div class="col-md-3" id="prescription-list" style="padding-top:0px;">
            <ul id="prescription-id-list">

                <?php
                echo "<h4 style=\"color:#2e86d9; font-weight:600;\">Proposal List</h4>";
                if($_SESSION["user_category"]=="medicalstaff")
                {
                    $sql1 = "select proposalid,proposaldate,accountofficer from proposal  ORDER BY proposalid desc";
                    $res1 = $conn->query($sql1);
                    $count = true;
                    if ($res1->num_rows > 0) {
                        while ($row = mysqli_fetch_assoc($res1)) {
                            $_date = new DateTime($row["proposaldate"]);
                            if ($count == true) {
                                $showid = $row["proposalid"];
                                $count = false;
                            }
                            if ($row["accountofficer"] == 'a') $sign = '*';
                            else $sign = "";

                            echo '<li>
                                            <form method="post" action="" enctype="multipart/form-data">
                                            <input type="hidden" name="showid" value="' . $row["proposalid"] . '"></input>
                                            <input type="submit" value="' . $_date->format('d M Y') . " PID" . $row["proposalid"] .$sign. '"></input></li></form>';

                        }
                    }
                }
                else if($_SESSION["user_category"]=="doctor") {
                    $sql1 = "select proposalid,proposaldate,medicalincharge from proposal ORDER BY proposalid desc ";
                    $res1 = $conn->query($sql1);
                    $count = true;
                    if ($res1->num_rows > 0) {
                        while ($row = mysqli_fetch_assoc($res1)) {
                            $_date = new DateTime($row["proposaldate"]);
                            if ($count == true) {
                                $showid = $row["proposalid"];
                                $count = false;
                            }
                            if ($row["medicalincharge"] == 'p') $sign = '*';
                            else $sign = "";
                            //echo $st.'<br>';
                            echo '<li>
                                            <form method="post" action="" enctype="multipart/form-data">
                                            <input type="hidden" name="showid" value="' . $row["proposalid"] . '"></input>
                                            <input type="submit" value="' . $_date->format('d M Y') . " PID" . $row["proposalid"] . $sign . '"></input></li></form>';

                        }
                    }
                }
                else if($_SESSION["user_category"]=="admin")
                {
                    if($_SESSION["designation"]=="DSW")
                    {
                        $sql1 = "select proposalid,proposaldate,dsw from proposal  WHERE medicalincharge='a' ORDER BY proposalid desc";
                        $res1 = $conn->query($sql1);
                        $count = true;
                        if ($res1->num_rows > 0) {
                            while ($row = mysqli_fetch_assoc($res1)) {
                                $_date = new DateTime($row["proposaldate"]);
                                if ($count == true) {
                                    $showid = $row["proposalid"];
                                    $count = false;
                                }
                                if ($row["dsw"] == 'p') $sign = '*';
                                else $sign = "";
                                //echo $st.'<br>';
                                echo '<li>
                                            <form method="post" action="" enctype="multipart/form-data">
                                            <input type="hidden" name="showid" value="' . $row["proposalid"] . '"></input>
                                            <input type="submit" value="' . $_date->format('d M Y') . " PID" . $row["proposalid"] . $sign . '"></input></li></form>';

                            }
                        }
                    }
                    else if($_SESSION["designation"]=="COMMANDANT")
                    {
                        $sql1 = "select proposalid,proposaldate,commandant from mistmedical.proposal  WHERE dsw='a' ORDER BY proposalid desc";
                        $res1 = $conn->query($sql1);
                        $count = true;
                        if ($res1->num_rows > 0) {
                            while ($row = mysqli_fetch_assoc($res1)) {
                                $_date = new DateTime($row["proposaldate"]);
                                if ($count == true) {
                                    $showid = $row["proposalid"];
                                    $count = false;
                                }
                                if ($row["commandant"] == 'p') $sign = '*';
                                else $sign = "";
                                //echo $st.'<br>';
                                echo '<li>
                                            <form method="post" action="" enctype="multipart/form-data">
                                            <input type="hidden" name="showid" value="' . $row["proposalid"] . '"></input>
                                            <input type="submit" value="' . $_date->format('d M Y') . " PID" . $row["proposalid"] . $sign . '"></input></li></form>';

                            }
                        }
                    }
                    else if($_SESSION["designation"]=="ACCOUNTANT")
                    {
                        $sql1 = "select proposalid,proposaldate,accountofficer from proposal  WHERE commandant='a' ORDER BY proposalid desc";
                        $res1 = $conn->query($sql1);
                        $count = true;
                        if ($res1->num_rows > 0) {
                            while ($row = mysqli_fetch_assoc($res1)) {
                                $_date = new DateTime($row["proposaldate"]);
                                if ($count == true) {
                                    $showid = $row["proposalid"];
                                    $count = false;
                                }
                                if ($row["accountofficer"] == 'p') $sign = '*';
                                else $sign = "";
                                //echo $st.'<br>';
                                echo '<li>
                                            <form method="post" action="" enctype="multipart/form-data">
                                            <input type="hidden" name="showid" value="' . $row["proposalid"] . '"></input>
                                            <input type="submit" value="' . $_date->format('d M Y') . " PID" . $row["proposalid"] . $sign . '"></input></li></form>';

                            }
                        }
                    }



                }

                ?>
            </ul>

        </div>

        <?php
        if(!empty($_POST["showid"]))
        {
            $showid=$_POST["showid"];
            $query1="SELECT * FROM proposal WHERE proposalid=".$showid;
            $query2="SELECT * FROM proposedmedicines WHERE proposalid=".$showid;

            $res1=$conn->query($query1);
            $prop=$conn->query($query2);
            $proposal=mysqli_fetch_assoc($res1);

        }
        else if(!empty($_SESSION["showid"]))
        {
            $showid=$_SESSION["showid"];
            $query1="SELECT * FROM proposal WHERE proposalid=".$showid;
            $query2="SELECT * FROM proposedmedicines WHERE proposalid=".$showid;

            $res1=$conn->query($query1);
            $prop=$conn->query($query2);
            $proposal=mysqli_fetch_assoc($res1);
        }
        else
        {
            $query1="SELECT * FROM proposal WHERE proposalid=".$showid;
            $query2="SELECT * FROM proposedmedicines WHERE proposalid=".$showid;
            $res1=$conn->query($query1);
            $prop=$conn->query($query2);
            $proposal=mysqli_fetch_assoc($res1);

        }



        ?>


        <div class="col-md-9" style="border-left:1px solid green;margin-top: -40px;">
            <div style="min-height:600px; background: url('../images/mist_logo.png') no-repeat center; background-size: 65% 65%;">
                <div id="pres_div" style="min-height:600px; background-color:#ffffff; opacity:0.9;">
                    <table id="no-bordered-table" style="width:100%; border:none !important; margin-bottom: 35px;">

                        <tr>
                            <td style="width:60%;"><h2 style="color:#116d8f;"><?php echo "PID-".$showid; ?></h2></td>
                            <td rowspan="2" ><img src="../images/mist_logo.png" height="45px" width="45px;" style="float:left;margin-left:10px;"/><h4 style="color: #002080;">MIST MEDICAL CENTER</h4><span style="color:#2b9fae">Contact:8801892838484</span></td>
                        </tr>
                        <tr>

                            <td style="color:#ae2b2b"><?php
                                /*   echo '<pre>';
                                   print_r($degree);
                                   echo '</pre>';*/



                                ?></td>
                        </tr>
                        <tr>
                            <td style="color:#ae2b2b">Contact: 01234567900</td>
                        </tr>

                    </table>


                    <table id="showprescription" style="width:100%; color:#2b71ae;margin-bottom: 30px;">
                        <tr>
                            <td style="width:77%"><span style="color:#38b25f;font-weight: 600;font-size: 103%;"> </span></td>
                            <td style="color:#d9352e;">Date: <?php echo $proposal["proposaldate"] ?></td>

                        </tr>
                    </table>


                    <table id="showprescription" align="center" style="width:100%; color:#2b71ae;">
                        <tr>
                            <th style="color:#38b25f;">Medicine Name</th>
                            <th style="color:#38b25f;">Dose</th>
                            <th style="color:#38b25f;">Chemical Name</th>
                            <th style="color:#38b25f;">Company</th>
                            <th style="color:#38b25f;">Quantity</th>
                            <th style="color:#38b25f;">Approximate Cost</th>
                            <th style="color:#38b25f;">Brought quantity</th>
                        </tr>
                        <form action="../process/process_store_medicinie.php" method="post">
                            <input type="hidden" name="proposedid" value="<?php echo $showid; ?>">
                        <?php


                        while($p=mysqli_fetch_assoc($prop))
                        {
                            $fieldName = preg_replace("/[^A-Za-z0-9]/", "",$p["medicineName"]);
                            echo '<tr>
                                        <td>'.$p["medicineName"].'</td>
                                        <td>'.$p["dose"].'</td>
                                        <td>'.$p["ChemicalName"].'</td>
                                        <td>'.$p["Company"].'</td>
                                        <td>'.$p["quantity"].'piece</td>
                                        <td>'.$p["cost"].'tk</td>
                                        <td><input type="text" name="'.$fieldName.'" placeholder="Enter quantity"></td>                                    
                            
                                 </tr> ';
                        }
                        ?>
                            <tr><td><input type="submit" value="Done"></td></tr>
                        </form>

                    </table>
                    <br>
                    <?php
                    if(!empty($_POST["approve"]))
                    {
                        if($_SESSION["user_category"]=="doctor")
                        {
                            $query="UPDATE proposal SET medicalincharge='a' WHERE proposalid=".$_POST["approve"].";";
                            $res=$conn->query($query);
                            $msg = "Sir, you have a pending proposal for approval.Please  check mist medical website.";

                            //  $msg = wordwrap($msg,70);

                            if(mail('201514041.cse.mist@gmail.com','My subject',$msg,'From: xotil.manchitro@gmail.com'))
                            {
                                echo 'succesful';
                            }
                            else{
                                echo "failed";
                            }
                        }
                        else if($_SESSION["user_category"]=="admin" && $_SESSION["designation"]=="DSW")
                        {
                            $query="UPDATE proposal SET dsw='a' WHERE proposalid=".$_POST["approve"].";";
                            $res=$conn->query($query);
                        }
                        else if($_SESSION["user_category"]=="admin" && $_SESSION["designation"]=="COMMANDANT")
                        {
                            $query="UPDATE proposal SET mistmedical.proposal.commandant='a' WHERE proposalid=".$_POST["approve"].";";
                            $res=$conn->query($query);
                        }
                        else if($_SESSION["user_category"]=="admin" && $_SESSION["designation"]=="ACCOUNTANT")
                        {
                            $query="UPDATE proposal SET mistmedical.proposal.accountofficer='a' WHERE proposalid=".$_POST["approve"].";";
                            $res=$conn->query($query);
                        }

                    }
                    if(!empty($_POST["reject"]))
                    {
                        if($_SESSION["user_category"]=="doctor") {
                            $query = "UPDATE proposal SET medicalincharge='r' WHERE proposalid=" . $_POST["reject"] . ";";
                            $res = $conn->query($query);
                        }
                        if($_SESSION["user_category"]=="admin" && $_SESSION["dsignation"]="DSW") {
                            $query = "UPDATE proposal SET dsw='r' WHERE proposalid=" . $_POST["reject"] . ";";
                            $res = $conn->query($query);
                        }
                        if($_SESSION["user_category"]=="admin" && $_SESSION["dsignation"]="COMMANDANT") {
                            $query = "UPDATE proposal SET commandant='r' WHERE proposalid=" . $_POST["reject"] . ";";
                            $res = $conn->query($query);
                        }
                        if($_SESSION["user_category"]=="admin" && $_SESSION["dsignation"]="ACCOUNTANT") {
                            $query = "UPDATE proposal SET medicalincharge='r' WHERE accountofficer=" . $_POST["reject"] . ";";
                            $res = $conn->query($query);
                        }


                    }

                    ?>
                    <?php
                    $query="SELECT medicalincharge,dsw,commandant,accountofficer FROM proposal WHERE proposalid=".$showid;
                    $res=$conn->query($query);
                    $row=mysqli_fetch_assoc($res);
                    // $_SESSION["user_category"]=="doctor"?$status=$row["medicalincharge"]:$_SESSION["designation"]=="DSW"? $status=$row["dsw"]:$_SESSION["designation"]=="COMMANDANT"?$status=$row["commandant"]:$_SESSION["designation"]=="ACCOUNTANT"?$status=$row["accountofficer"]:$status='p';
                    if($_SESSION["user_category"]=="doctor") $status=$row["medicalincharge"];
                    else if(!empty($_SESSION["designation"]) && $_SESSION["designation"]=="DSW") $status=$row["dsw"];
                    else if(!empty($_SESSION["designation"]) && $_SESSION["designation"]=="COMMANDANT") $status=$row["commandant"];
                    else if(!empty($_SESSION["designation"]) && $_SESSION["designation"]=="ACCOUNTANT") $status=$row["accountofficer"];



                    ?>
                    <?php
                    if($_SESSION["user_category"]!="medicalstaff") {
                        echo '
                    <table  align="center" style="width:100%; color:#2b71ae;">
                        <tr>
                             <th style="color:#38b25f; width:40%; ">
                                <form  method="post" style="display: inline-block;">
                                    <input type="hidden" name="showid" value="' . $showid . '">
                                    <input type="hidden" name="approve" value="' . $showid . '">
                                    <input type="submit" ';
                        if ($status == 'a') echo ' style="background-color:green;color:white;" value="Approved"'; else echo 'value="Approve"';
                        if ($status != 'p') echo 'disabled';
                        echo '>';
                        echo ' </form>
                                <form  method="post" style="display: inline-block;">
                                    <input type="hidden" name="showid" value="' . $showid . '">
                                    <input type="hidden" name="reject" value="' . $showid . '">
                                    <input type="submit" value="Reject" ';
                        if ($status == 'r') echo ' style="background-color:green;color:white;" value="Rejected"'; else echo 'value="Reject"';
                        if ($status != 'p') echo 'disabled>';
                        echo '</form>
                            </th>
                            <th style="color:#38b25f;width:60%;"></th>
                        </tr>
                    </table>';
                    }
                    ?>

                    <table style="margin-top: 40px; color:grey;">

                        <tr>
                            <th>State : </th>
                            <?php $sql="SELECT medicalincharge,dsw,commandant,accountofficer FROM proposal WHERE proposalid=".$showid;
                            $res=$conn->query($sql);
                            $row=mysqli_fetch_assoc($res);
                            echo "<td>Medical";
                            if($row["medicalincharge"]=='r')
                            {
                                echo '(rejected)';
                            }
                            echo '</td>';
                            if($row["medicalincharge"]=='a')
                            {
                                echo "<td>-->DSW";
                                if($row["dsw"]=='r')
                                    echo '(rejected)';
                                echo '</td>';
                            }
                            if($row["dsw"]=='a')
                            {
                                echo "<td>-->Commandant";
                                if($row["commandant"]=='r')
                                {
                                    echo '(rejected)';
                                }
                                echo '</td>';
                            }
                            if($row["commandant"]=='a')
                            {
                                echo '<td>-->Account Office';
                                if($row["accountofficer"]=='r')
                                {
                                    echo '(rejected)';
                                }
                                echo '</td>';
                            }
                            if($row["accountofficer"]=='a')
                            {
                                echo '<td>-->Proposal passed</td>';
                            }

                            ?>

                        </tr>
                    </table>


                </div>
            </div>
        </div>
    </div>
</div>


</body>
</html>