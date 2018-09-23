<!DOCTYPE html>
<?php include '../connection/connect-database.php';

?>
<html lang="">

<head>
    <title>MISTMC</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="stylesheet" type="text/css" href="../styles/layout.css" />

</head>

<body id="top">
<?php include '../parts/admin_header.php'; ?>


<!--<div class="wrapper row3">-->
<!---->
<!--    <iframe frameborder='0' width='100%' src='proposal_viewer.php' frameborder="0" style="min-height:900px; "></iframe>-->
<!--</div>-->
<?php

header('Location: ../pages/proposal_viewer.php');
?>



<?php include '../parts/footer.php'; ?>
<script src="../scripts/ajax.js"></script>
<script src="../scripts/prescription.js"></script>

</body>
</html>

<?php
//session_start();
/*echo "Doctor";
echo "<br>".$_SESSION["user_first_name"];*/

?>