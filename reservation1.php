<?php
$date = $_POST["datepicker"];
$men = $_POST["men"];

$con = mysqli_connect("localhost", "root", "", "test");
$sql = "select * from tb_house";
$resultHouse = mysqli_query($con, $sql);

$sSql =
  "select * 
from tb_house
where (house_id != (select house_id from tb_house_reservation where rs_date = '" .
  $date .
  "') );";
$result = mysqli_query($con, $sSql);

// 고쳐야 할 점 : 인원에 맞는 조건을 먼저 걸고, 그 테이블을 참조하여 select 할것 select ~ from ( select ~)

//$isReservation = false;
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
   
	<title>펜션예약</title>
	  <script src="jquery.min.js"></script>
  <script src="jquery-ui.min.js"></script>
<link rel="stylesheet" type="text/css" href = "./css/style.css">

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="./css/common.css">
<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" integrity="sha512-aOG0c6nPNzGk+5zjwyJaoRUgCdOrfSDhmMID2u4+OIslr0GjpLKo7Xm0Ao3xmpM4T8AmIouRkqwj1nrdVsLKEQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdn.jsdelivr.net/combine/npm/fullcalendar@5.11.3,npm/fullcalendar@5.11.3/locales-all.min.js,npm/fullcalendar@5.11.3/locales-all.min.js,npm/fullcalendar@5.11.3/main.min.js"></script>
</head>
<body>
<?php include "./header_other.php"; ?>
<div class="wrap">
	<div class="rs_wrap">
      <div class = "dtTitle"><strong>T&R HOUSE</strong></div><br>
         <!-- 날짜 선택 -->
      <form name = "form1" action="reservation1.php" method = "post">
         <!-- <a href="popup.php" onclick="window.open(this.href,'선택창', width = 1920, height = 1080); return false;"><input type="text" name="datePick" class="datePick" placeholder ="날짜"/></a> -->
         <input type="text" class="datepicker" name="datepicker" placeholder="yyyy-mm-dd">
         <input type="text" name="men" class="datePick" placeholder ="인원수"/> <!-- onkeyup 적용하거나.. 클릭이벤트 적용해야할듯?-->
         <input type="submit" value="조회" class = "btnSearch"> 
         <hr>
      </form>
         <div class = "show_room">
            <?php
            $idx = 1;
            while ($row = mysqli_fetch_array($resultHouse)) { ?>
            <a href = "./room0<?= $idx ?>.php">
            <div class="sr_box">
               <div class = "sr_pic" width=214px; height=246px;>
                  <img src = "./room/view_room/0<?= $idx ?>.jpg">
               </div>
               <p class= "sr_title"><?= $row["house_name"] ?></p>
               <p class = "sr_content"><?= $row["contents"] ?></p>
               <p class ="sm-span sr_people"><?= $row["people"] ?> </p>
               <p class= "sr_pay"> <span class="sm-span">숙박</span> <?= $row["house_pay"] ?><span class="sm-span">원</span></p>
            </div>
            </a>
            <hr>
            <?php $idx++;}
            ?>
         </div>

      
	</div>
</div>

<script>
$.datepicker.setDefaults({
					dateFormat: 'yy-mm-dd',
					prevText: '이전 달',
					nextText: '다음 달',
					monthNames: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'],
					monthNamesShort: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'],
					dayNames: ['일', '월', '화', '수', '목', '금', '토'],
					dayNamesShort: ['일', '월', '화', '수', '목', '금', '토'],
					dayNamesMin: ['일', '월', '화', '수', '목', '금', '토'],
					showMonthAfterYear: true,
					yearSuffix: '년'
					});
					 $(function(){
							$('.datepicker').datepicker();
						})
</script>
</html>







