<?php
    include '../connection/connect-database.php';
    session_start();


   $query="SELECT medicineName FROM prescribed_medicine WHERE prescriptionId=".$_POST["presid"].";";
   $res=$conn->query($query);

 //  var_dump($_POST);

    while($row=mysqli_fetch_assoc($res))
    {
        $trimmedName=preg_replace("/[^A-Za-z0-9]/", "",  $row["medicineName"]);
      //  echo $_POST[$trimmedName]."<br>";

        if(!empty($_POST[$trimmedName]))
            $query="INSERT INTO issued_medicine(prescriptionId, medicineName, quantity,issued_by,issue_date) VALUES (".$_POST["presid"].",'".$row["medicineName"]."',".$_POST[$trimmedName].",".$_SESSION["username"].",CURDATE());";
            $res1=$conn->query($query);
    }

    header('Location:../pages/showprescriptionforissue.php');

?>

<?php
//
//$text   = "\t\tThese are a few words :) ...  ";
//$binary = "\x09Example string\x0A";
//$hello  = "Hello World";
//var_dump($text, $binary, $hello);
//
//print "\n";
//
//$trimmed = trim($text);
//var_dump($trimmed);
//
//$trimmed = trim($text, " \t.");
//var_dump($trimmed);
//
//$trimmed = trim($hello, '" ""Hdle"');
//var_dump($trimmed);
//
//$trimmed = trim($hello, ' HdWr');
//var_dump($trimmed);
//
//// trim the ASCII control characters at the beginning and end of $binary
//// (from 0 to 31 inclusive)
//$clean = trim($binary, "\x00..\x1F");
//var_dump($clean);
//
//?>
<!---->
