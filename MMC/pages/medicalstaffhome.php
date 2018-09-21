<!--<!DOCTYPE html>-->
<?php //include '../connection/connect-database.php';
//
//?>
<!--<html lang="">-->
<!---->
<!--<head>-->
<!--    <title>MISTMC</title>-->
<!--    <meta charset="utf-8">-->
<!--    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">-->
<!--    <link rel="stylesheet" type="text/css" href="../styles/layout.css" />-->
<!---->
<!--</head>-->
<!---->
<!--<body id="top">-->
<?php //include '../parts/medicalstaff_header.php'; ?>
<!---->
<!---->
<!--<div class="wrapper row3">-->
<!---->
<!--    <iframe frameborder='0' width='100%' src='showprescriptionforissue.php' frameborder="0" style="min-height:900px; "></iframe>-->
<!--</div>-->
<!---->
<!---->
<!---->
<!---->
<?php //include '../parts/footer.php'; ?>
<!--<script src="../scripts/ajax.js"></script>-->
<!--<script src="../scripts/prescription.js"></script>-->
<!---->
<!--</body>-->
<!--</html>-->
<!---->
<?php
////session_start();
///*echo "Doctor";
//echo "<br>".$_SESSION["user_first_name"];*/
//
//?>

<!DOCTYPE html>
<?php include '../connection/connect-database.php';
session_start();
?>
<html lang="">

<head>
    <title>MISTMC</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="stylesheet" type="text/css" href="../styles/layout.css" />


</head>

<body id="top">
<?php if($_SESSION["user_category"]=='doctor'){ include '../parts/doctor_header.php'; }
else if($_SESSION["user_category"]=='medicalstaff'){ include '../parts/medicalstaff_header.php';}
?>

<form action="<?php echo $_SERVER["PHP_SELF"];?> " method="post" style="margin-top: -30px;">
    <input type="text" name="patient_id" id="search-box"><input type="submit" value="search" id="search-btn"></form>

</form>

<div class="wrapper row3">
    <?php
    if(!empty($_POST["patient_id"]))
    {
        $_SESSION["patient_id"]=$_POST["patient_id"];
    }
    echo "<iframe frameborder='0' width='100%' src='showprescriptionforissue.php' frameborder=\"0\" style=\"min-height:900px; \"></iframe>";
    ?>

</div>


<?php include '../parts/footer.php'; ?>
<script src="../scripts/ajax.js"></script>
<script src="../scripts/prescription.js"></script>

</body>
</html>

