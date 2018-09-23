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
    </title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        #searchresult {
            position: absolute;
            width: 100%;
            max-width:870px;
            cursor: pointer;
            overflow-y: auto;
            max-height: 400px;
            box-sizing: border-box;
            z-index: 1001;
        }
        .link-class:hover{
            background-color:#f1f1f1;

        }
        #search-result{
            position:absolute;
            z-index: 3;
            list-style-type: none;
            color: white;

        }
        #search-result li{
            padding: 2px 15px;
        }
        #search-result li:nth-child(odd){
            background-color:  #1ab2ff;
            padding: 2px 15px;

        }
        #search-result li:nth-child(even){
            background-color:  #00aaff;
            list-style-type: none;


        }
        #suggestion-container{
            position:absolute;
            z-index: 3;

            margin-left: 40px;
            padding: 0;

        }


    </style>


</head>

<body id="top">



<?php if($_SESSION["user_category"]=='doctor'){ include '../parts/doctor_header.php'; }
else if($_SESSION["user_category"]=='medicalstaff'){ include '../parts/medicalstaff_header.php';}
else if($_SESSION["user_category"]=='admin'){ include '../parts/admin_header.php';}
?>

<form action="<?php echo $_SERVER["PHP_SELF"];?> " method="post" style="margin-top: -30px;">
    <input type="text" name="proposalid" id="search-box"><input type="submit" value="search" id="search-btn"></form>

</form>

<ul class="list-group" id="search-result"></ul>



<div class="wrapper row3" style="z-index: 1;">
    <?php
    if(!empty($_POST["proposalid"]))
    {
        $_SESSION["showid"]=$_POST["proposalid"];
    }
    echo "<iframe frameborder='0' width='100%' src='proposalwisestore.php' frameborder=\"0\" style=\"min-height:900px; \"></iframe>";
    ?>

</div>


<?php include '../parts/footer.php'; ?>
<!--<script src="../scripts/ajax.js"></script>-->
<!--<script src="../scripts/prescription.js"></script>-->



<script src="../scripts/livesearch.js"></script>

</body>
</html>
