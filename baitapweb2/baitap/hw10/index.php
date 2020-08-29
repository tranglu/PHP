<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>1888180</title>
	<script type="text/javascript" src="../../vendor/js/bootstrap.js"></script>
	<link rel="stylesheet" href="../../vendor/css/bootstrap.css">	
	<link rel="stylesheet" href="../../css/fish.css">

</head>
<body style="text-align: center; ">
    <div class="banner ">
        <h1>Homework 2: BẢNG CỬU CHƯƠNG</h1>
        <P class="font-weight-bold w-100"> Lữ Thị Thùy Trang<br>
            MSSV:1888180<br>
            Email:lu.t.t.trang@gmail.com</P>
            <?php
                echo "Today is " . date("Y/m/d") . "<br>";
                date_default_timezone_set("Asia/Ho_Chi_Minh");
                echo "The time is " . date("h:i:sa") ."<br>";
                $now = getdate();
                $phut= $now["minutes"];
                $html="
                        <table style='position: relative; left:40%;text-align:center;width:20%;border: black solid 1px;'>
                        <tr>
                        <th>Bảng cửu chương $phut</th>
                        </tr>";
                for($i=1; $i < 11; $i++){
                    $a=$phut*$i;
                    $html.="<tr  >
                    <td  style='border:gray solid 1px;'>$phut x $i = $a <br>;</td>
                    </tr>";
                }
                $html.="</table>";
                echo $html;
                ?>

    
</div>
</body>
</html>