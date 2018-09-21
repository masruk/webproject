<!doctype html>
    <?php include '../connection/connect-database.php';?>
    <head>

        <style rel="stylesheet" type="text/css">
            #chart-container1{
                display:inline-block;
                border-right: 2px solid  #a6a6a6;
                width: 45%;
                min-width: 455px;
                padding-left:15px;

            }

            table{
                margin: 0px;
                padding: 0;
                border-collapse: collapse;

            }

            #bar{

                padding: 0;
            }
            #bar:hover{
                opacity:0.8 !important;

            }

            td{
                width:35px;
                margin:0;
                color: #0E76A8;
                text-align: center;

            }
            section p{
                test-align:center;
            }








        </style>
    </head>
    <?php
    $month=array_fill(0,12,0);

    $query1="SELECT MAX(cpid) as mpid from (SELECT COUNT(prescriptionid) as cpid
    FROM medicalrecords
    GROUP BY MONTH(prescription_date) )as t";
    $query2="SELECT MONTH(prescription_date) as _month ,COUNT(prescriptionid) as _count
    FROM medicalrecords
    GROUP BY MONTH(prescription_date)";
    $res1=$conn->query($query1);
    $res2=$conn->query($query2);
    $m=mysqli_fetch_assoc($res1);
    $max=$m["mpid"]/9*10;
    $rate=$max/250;
    $month=array_fill(0,12,0);
    $height=array_fill(0,12,0);
    while($row=mysqli_fetch_assoc($res2))
    {
        $month[$row["_month"]-1]=intval($row["_count"]);
        $height[$row["_month"]-1]=intval($month[$row["_month"]-1]/$rate);
    }
    // var_dump($month);
    // var_dump($height);

    ?>


    <body style="width:94%; margin: 20px auto;">
        <div id="chart-container1">
            <?php
            $color=array("#4F81BC","#C0504E","#9BBB58","#23BFAA","#8064A1","#339966","#996633","#990033","#999900","#550080","#007acc","#527a7a",);
            $month_name=array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
            for($x=0;$x<=11;$x++)
            {
                echo '<table  style="display: inline-block;">
                                <tr><td>'.$month[$x].'</td></tr>
                                <tr style="height:'.$height[$x].'px;">
                                    <td id="bar" style="background-color: '.$color[$x].'; height:'.$height[$x].';"></td>
                                </tr>
                                <tr>
                                    <td style="border-top:2px solid'.$color[$x].';">'.$month_name[$x].'</td>
                                </tr>
                             </table>';
            }

            ?>
        </div>
        <div style="position:absolute;margin: 10px auto; top:50px;width:45%;display:inline-block; padding:0 10px 30px 30px; text-align:center; color: #404040; ">


            <h2 class="heading">Statistics</h2>
            <p>Everyday number of students take medical fascilities from MIST medical center. Chart shown represent the patient count each month. Based on regular research on statistical medical data,MIST Medical center always
                try to improve its lacking.</p>


            <!-- ################################################################################################ -->


        </div>


    </body>
</html>
