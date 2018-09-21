<!doctype html>
<head>

    <style rel="stylesheet" type="text/css">
        p{
            color: white;
            font-size: 230%;
            font-weight: 600;
        }
        div{
            width:50%;
            height: auto;
        }
        button{

            padding: 12px 17px;
            font-size: 110%;
            color: white;
            background-color:  #59A209;
            border:none;
            cursor: pointer;

        }
        button:hover{
            background-color:  #80ff00;

        }

    </style>
</head>



<body>
<div>
    <p class="heading" id="tips">Always laugh when you can, it is cheap medicine.</p>

    <button class="btn" onClick="get_more_tips()">More Health Tips</button>
</div>

<script >
    function get_more_tips(){

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("tips").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET",'../process/fetch_health_tips.php',true);
        xmlhttp.send();

    }
</script>
</body>
</html>
