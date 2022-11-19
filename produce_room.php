

<!doctype html>
<meta charset="utf-8">
<title>T&R 룸소개</title>
		<link rel="stylesheet" type="text/css" href = "./css/style_pr.css">
        <link rel="stylesheet" type="text/css" href = "./css/common.css">
		<script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=ea44ecb0969a18388ea307ad38863375&libraries=services"></script>
<head>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>

</head>
<script>
</script>   
<body><?php include "./header_other.php"; ?>
<?php
$con = mysqli_connect("localhost", "root", "", "test");
$sql1 = "select avg(rating) as avg1 from board where r_name='네이처'";
$result1 = mysqli_query($con, $sql1);
$sql2 = "select avg(rating) as avg2 from board where r_name='마운틴'";
$result2 = mysqli_query($con, $sql2);
$sql3 = "select avg(rating) as avg3 from board where r_name='오션'";
$result3 = mysqli_query($con, $sql3);
$sql4 = "select avg(rating) as avg4 from board where r_name='베르데'";
$result4 = mysqli_query($con, $sql4);
$sql5 = "select avg(rating) as avg5 from board where r_name='허니블루'";
$result5 = mysqli_query($con, $sql5);
$sql6 = "select avg(rating) as avg6 from board where r_name='아마빌레'";
$result6 = mysqli_query($con, $sql6);
$row = mysqli_fetch_array($result1);
$row2 = mysqli_fetch_array($result2);
$row3 = mysqli_fetch_array($result3);
$row4 = mysqli_fetch_array($result4);
$row5 = mysqli_fetch_array($result5);
$row6 = mysqli_fetch_array($result6);
$avg1 = (string) ($row["avg1"] / 5) * 100;
$avg1 = $avg1 . "%";
$avg2 = (string) ($row2["avg2"] / 5) * 100;
$avg2 = $avg2 . "%";
$avg3 = (string) ($row3["avg3"] / 5) * 100;
$avg3 = $avg3 . "%";
$avg4 = (string) ($row4["avg4"] / 5) * 100;
$avg4 = $avg4 . "%";
$avg5 = (string) ($row5["avg5"] / 5) * 100;
$avg5 = $avg5 . "%";
$avg6 = (string) ($row6["avg6"] / 5) * 100;
$avg6 = $avg6 . "%";
?>   			
<script>
$(document).ready(function(){
    $('.span1').css('width', '<?= $avg1 ?>');
    $('.span2').css('width', '<?= $avg2 ?>');
    $('.span3').css('width', '<?= $avg3 ?>');
    $('.span4').css('width', '<?= $avg4 ?>');
    $('.span5').css('width', '<?= $avg5 ?>');
    $('.span6').css('width', '26.4%');
})

</script>

   			 <div class="room_wrap">
             <br>   
                <table>
                <tr>
                    <th><hr></th>
                    <th><center><div class="top_name"><b>T</b>&<b>R</b> <b>HOUSE</b></div></center></th>
                    <th><hr></th>
                </tr>
                <tr>
                    <td><center><img src="./room/na1.jpg" width="350px" height="180px"></center></td>
                    <td><center><img src="./room/moun1.jpg" width="350px" height="180px"></center></td>
                    <td><center><img src="./room/sea1.jpg" width="350px" height="180px"></center></td>
                 </tr>
                 <tr>
                 <td><span class = "rm_name" ><b>네이처</b></span><span class="sm_rm_name">(Nature)</span>
                    <span class="star-rating" style="float:right">
                            <span class="span1"></span>
                        </span><br><br>
                        <span class = "explain">커플스파, 프라이빗 개별 바비큐<br>기준인원2명/최대4명</span>
                    </td>

                    <td><span class = "rm_name" ><b>마운틴</b></span><span class="sm_rm_name">(Mountain)</span>
                    <span class="star-rating" style="float:right">
                            <span class="span2"></span>
                        </span><br><br>
                        <span class = "explain">커플스파, 프라이빗 개별 바비큐<br>기준인원2명/최대4명</span>
                    </td>
                    <td><span class = "rm_name" ><b>오션</b></span><span class="sm_rm_name">(Ocean)</span>
                    <span class="star-rating" style="float:right">
                            <span class="span3"></span>
                        </span><br><br>
                        <span class = "explain">커플스파, 프라이빗 개별 바비큐<br>기준인원2명/최대4명</span>
                    </td>
                      
                 </tr>
                 <tr>
                    <td><a href="./room01.php" class = "btn btn-dark" >View More</a></td>
                    <td><a href="./room02.php" class = "btn btn-dark">View More</a></td>
                    <td><a href="./room03.php" class = "btn btn-dark">View More</a></td>
                 </tr>
</table>
<br><br><br><br>
                <table>
                 <tr>
                    <td><center><img src="https://cdn.imweb.me/thumbnail/20180607/5b18ffec88fac.jpg" width="350px" height="180px"></center></td>
                    <td><center><img src="https://cdn.imweb.me/thumbnail/20180516/5afbd2efcac88.jpg" width="350px" height="180px"></center></td>
                    <td><center><img src="https://cdn.imweb.me/thumbnail/20180517/5afcd926bacfa.jpg" width="350px" height="180px"></center></td>
                 </tr>
                 <tr>
                    <td>
                        <span class = "rm_name" ><b>베르데</b></span><span class="sm_rm_name">(Verde)</span>
                        <span class="star-rating" style="float:right">
                            <span class="span4"></span>
                        </span><br>
                        <span class = "explain">커플스파, 프라이빗 개별 바비큐<br>기준인원2명/최대4명</span>
                    </td>
                    <td><span class = "rm_name" ><b>허니블루</b></span><span class="sm_rm_name">(Honey Blue)</span>
                    <span class="star-rating" style="float:right">
                            <span class="span5"></span>
                        </span><br>
                        <span class = "explain">가족스파, 프라이빗 개별 바비큐<br>기준인원4명/최대8명</span>
                    </td>
                    <td><span class = "rm_name" ><b>아마빌레</b></span><span class="sm_rm_name">(Amabille)</span>
                    <span class="star-rating" style="float:right">
                            <span class="span6"></span>
                        </span><br>
                        <span class = "explain">가족스파, 프라이빗 개별 바비큐<br>기준인원8명/최대10명</span>
                    </td>
                 </tr>
                 <tr>
                    <td><a href="./room04.php" class = "btn btn-dark">View More</a></td>
                    <td><a href="./room05.php" class = "btn btn-dark">View More</a></td>
                    <td><a href="./room06.php"class = "btn btn-dark">View More</a></td>
                 </tr>
                 
                </table> 
                <br><br><br><br><br><br>
   			</div></center>
<?php include "./footer.php"; ?>
   	</body>