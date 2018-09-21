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
                $sql="SELECT MAX(proposalid) as maxid FROM proposal";
                $res=$conn->query($sql);
                $row=mysqli_fetch_assoc($res);
                if($row["maxid"]=="")
                    $pid=200001;
                else $pid=$row["maxid"]+1;

                echo '<td id="pid" style="font-size:135%; font-weight:600;color: #002080;">PID-'.$pid.'<td>';
                echo '<td rowspan="2" ><img src="../images/mist_logo.png" height="45px" width="45px;" style="float:left;margin-left:10px;"/><h4 style="color: #002080;">MIST MEDICAL CENTER</h4>Contact:8801892838484</td>';

                ?>
            </tr>


        </table>
    </div>
    <hr>

    <div class="form-group">
        <form name="proposal" id="proposal" >
            <div class="table-responsive">
                <table class="table table-bordered" id="dynamic_field" style="width:100%; text-align:right !important;">

                    <tr style="background-color:green;">
                        <th style="width:18%; "></th>
                        <th style="width:13%;"></th>
                        <th style="width:23%;"></th>
                        <th style="width:20%;"></th>
                        <th style="width:10%;"></th>
                        <th style="width:13%;"></th>
                        <th style="width:5%;"></th>

                    <tr/>
                    <tr>
                        <th colspan="7" style="text-align:center;">Medicine Proposal</th>
                    </tr>
                    <tr id="row1">

                        <td><input type="text" name="medicine[]" placeholder="Medicine name" class="form-control name_list" /></td>
                        <td><input type="text" name="dose[]" placeholder="Dose(mg)" class="form-control name_list" /></td>
                        <td><input type="text" name="chemical[]" placeholder="Chemical name" class="form-control name_list" /></td>
                        <td><input type="text" name="company[]" placeholder="Company" class="form-control name_list" /></td>
                        <td><input type="text" name="quantity[]" placeholder="Piece" class="form-control name_list" /></td>
                        <td><input type="text" name="approxcost[]" placeholder="Cost(tk)" class="form-control name_list" /></td>
                        <td><button type="button" name="remove" id="1" class="btn btn-danger btn_remove">X</button></td>

                    </tr>
                    <tr id="row2">

                        <td><input type="text" name="medicine[]" placeholder="Medicine name" class="form-control name_list" /></td>
                        <td><input type="text" name="dose[]" placeholder="Dose(mg)" class="form-control name_list" /></td>
                        <td><input type="text" name="chemical[]" placeholder="Chemical name" class="form-control name_list" /></td>
                        <td><input type="text" name="company[]" placeholder="Company" class="form-control name_list" /></td>
                        <td><input type="text" name="quantity[]" placeholder="Piece" class="form-control name_list" /></td>
                        <td><input type="text" name="approxcost[]" placeholder="Cost(tk)" class="form-control name_list" /></td>
                        <td><button type="button" name="remove" id="2" class="btn btn-danger btn_remove">X</button></td>

                    </tr>
                    <tr id="row3">

                        <td><input type="text" name="medicine[]" placeholder="Medicine name" class="form-control name_list" /></td>
                        <td><input type="text" name="dose[]" placeholder="Dose(mg)" class="form-control name_list" /></td>
                        <td><input type="text" name="chemical[]" placeholder="Chemical name" class="form-control name_list" /></td>
                        <td><input type="text" name="company[]" placeholder="Company" class="form-control name_list" /></td>
                        <td><input type="text" name="quantity[]" placeholder="Piece" class="form-control name_list" /></td>
                        <td><input type="text" name="approxcost[]" placeholder="Cost(tk)" class="form-control name_list" /></td>
                        <td><button type="button" name="remove" id="3" class="btn btn-danger btn_remove">X</button></td>

                    </tr>
                    <tr id="row4">

                        <td><input type="text" name="medicine[]" placeholder="Medicine name" class="form-control name_list" /></td>
                        <td><input type="text" name="dose[]" placeholder="Dose(mg)" class="form-control name_list" /></td>
                        <td><input type="text" name="chemical[]" placeholder="Chemical name" class="form-control name_list" /></td>
                        <td><input type="text" name="company[]" placeholder="Company" class="form-control name_list" /></td>
                        <td><input type="text" name="quantity[]" placeholder="Piece" class="form-control name_list" /></td>
                        <td><input type="text" name="approxcost[]" placeholder="Cost(tk)" class="form-control name_list" /></td>
                        <td><button type="button" name="remove" id="4" class="btn btn-danger btn_remove">X</button></td>

                    </tr>
                    <tr id="row5">

                        <td><input type="text" name="medicine[]" placeholder="Medicine name" class="form-control name_list" /></td>
                        <td><input type="text" name="dose[]" placeholder="Dose(mg)" class="form-control name_list" /></td>
                        <td><input type="text" name="chemical[]" placeholder="Chemical name" class="form-control name_list" /></td>
                        <td><input type="text" name="company[]" placeholder="Company" class="form-control name_list" /></td>
                        <td><input type="text" name="quantity[]" placeholder="Piece" class="form-control name_list" /></td>
                        <td><input type="text" name="approxcost[]" placeholder="Cost(tk)" class="form-control name_list" /></td>
                        <td><button type="button" name="remove" id="5" class="btn btn-danger btn_remove">X</button></td>

                    </tr>

                </table>


                <button type="button" name="add" id="add" class="btn btn-success">More Medicine</button>
                <input type="button" name="submit" id="submit" class="btn btn-info" value="Done" />
            </div>
        </form>
    </div>


</div>
<script src="../scripts/proposal.js"></script>

</body>
</html>
