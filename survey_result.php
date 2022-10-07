<?php
 $con = mysqli_connect("localhost", "root", "", "test");
  //mysql_select_db("sample",$connect);
   $sql ="select * from survey";
   $result = mysqli_query($con, $sql);
   $row = mysqli_fetch_array($result);
	$total = $row["ans1"] + $row["ans2"] + $row["ans3"] + $row["ans4"]; 

	$ans1_percent = $row["ans1"]/$total * 100;
	$ans2_percent = $row["ans2"]/$total * 100;
	$ans3_percent = $row["ans3"]/$total * 100;
	$ans4_percent = $row["ans4"]/$total * 100;

	$ans1_percent = floor($ans1_percent);
	$ans2_percent = floor($ans2_percent);
	$ans3_percent = floor($ans3_percent);
	$ans4_percent = floor($ans4_percent);
	?>
	<html>
 <head>
  <title> 설문조사</title>
  <link rel="stylesheet" href="./css/survey.css" type="text/css">
  <meta charset="utf-8">
 </head>
<body>
			
    <table width=250 height=250 border='0' cellspacing='0' cellpadding='0'>
        <tr>
          <td width=180 height=1 colspan=5 bgcolor=#ffffff></td>
        </tr>
        <tr>
          <td width=1 height=35 bgcolor='#ffffff'></td>
          <td width=9 bgcolor='#ffffff'></td>
          <td width=150  align=center bgcolor='#ffffff'><b> 
          총 투표수 : <?= $total ?> &nbsp; </b></td>
          <td width=9 bgcolor='#ffffff'></td>
          <td width=1 bgcolor='#ffffff'></td>
        </tr>
        <tr>
          <td height=29 bgcolor='#ffffff'></td>
          <td></td>
          <td valign=middle><b>가장 좋아하는 숙박 유형은?</b></td>
          <td></td>
          <td bgcolor='#ffffff'></td>
        </tr>
        <tr>
          <td height=20 bgcolor='#ffffff'></td>
          <td></td>
          <td>글램핑 (<b><?= $ans1_percent ?></b> %)
            <font color=purple><b><?= $row["ans1"] ?></b></font> 명</td>
          <td></td>
          <td bgcolor='#ffffff'></td>
        </tr>
        <tr>
          <td height=3 bgcolor='#ffffff'></td>
          <td></td>
          <td>
    <table width=100 border=0 height=3 cellspacing=0 cellpadding=0>
        <tr>
<?php
   $rest = 100 - $ans1_percent;
   print "
        <td width='$ans1_percent%' bgcolor=purple></td>
        <td width='$rest%' bgcolor='#dddddd' height=5></td>
               ";
?>
        </tr>
    </table>	
          </td>
          <td></td>
          <td bgcolor='#ffffff'></td>
        </tr>
        <tr>
          <td height=20 bgcolor='#ffffff'></td>
          <td></td>
          <td> 호텔 (<b><?= $ans2_percent ?></b> %)
            <font color=blue><b><?= $row["ans2"] ?></b></font> 명</td>
          <td></td>
          <td bgcolor='#ffffff'></td>
        </tr>
         <tr>
          <td height=3 bgcolor='#ffffff'></td>
          <td></td>
          <td>
    <table width=100 border=0 height=3 cellspacing=0 cellpadding=0>
        <tr>
<?php
   $rest = 100 - $ans2_percent;
   print "
        <td width='$ans2_percent%' bgcolor=blue></td>
        <td width='$rest%' bgcolor='#dddddd' height=5></td>
               ";
?>
        </tr>
    </table>	
          </td>
          <td></td>
          <td bgcolor='#ffffff'></td>
        </tr>
        <tr>
          <td height=20 bgcolor='#ffffff'></td>
          <td></td>
          <td> 캠핑 (<b><?=$ans3_percent ?></b> %)
            <font color=green><b><?= $row["ans3"] ?></b></font> 명</td>
          <td></td>
          <td bgcolor='#ffffff'></td>
        </tr>
        <tr>
          <td height=3 bgcolor='#ffffff'></td>
          <td></td>
          <td>
    <table width=100 border=0 height=3 cellspacing=0 cellpadding=0>
        <tr>
<?php
     $rest = 100 - $ans3_percent;
     print "
          <td width='$ans3_percent%' bgcolor=green></td>
          <td width='$rest%' bgcolor='#dddddd' height=5></td>
               ";
?>
        </tr>
    </table>	
          </td>
          <td></td>
          <td bgcolor='#ffffff'></td>
        </tr>

        <tr>
          <td height=20 bgcolor='#ffffff'></td>
          <td></td>
          <td> 펜션 (<b><?=$ans4_percent ?></b> %)
            <font color=skyblue><b><?=$row["ans4"] ?></b></font> 명</td>
          <td></td>
          <td bgcolor='#ffffff'></td>
        </tr>
        <tr>
          <td height=3 bgcolor='#ffffff'></td>
          <td></td>
          <td>
          	<table width=100 border=0 height=3 cellspacing=0 cellpadding=0>
        <tr>
<?php
   $rest = 100 - $ans4_percent;
    print "
          <td width='$ans4_percent%' bgcolor=skyblue></td>
          <td width='$rest%' bgcolor='#dddddd' height=5></td>
               ";
?>
         </tr>
     </table>
          </td>
          <td></td>
          <td bgcolor='#ffffff'></td>
        </tr>
        <tr>
          <td height=40 bgcolor='#ffffff'></td>
          <td></td>
          <td align=center valign=middle>
            <a onfocus=this.blur() onclick="window.close()">제출</a></td>
                 <td></td>
          <td bgcolor='#ffffff'></td>
        </tr>
        <tr>
          <td height=1 colspan=5 bgcolor=#ffffff></td>
        </tr>
    </table>
</body>
</html>