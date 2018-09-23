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
else if($_SESSION["user_category"]=='admin'){ include '../parts/admin_header.php';}
?>


<div class="wrapper row3">
    <iframe frameborder="0" width="100%" src="view_proposal.php"  style="min-height:900px;"></iframe>

</div>


<?php include '../parts/footer.php'; ?>
<!--<script src="../scripts/ajax.js"></script>-->
<!--<script src="../scripts/prescription.js"></script>-->

</body>
</html>
