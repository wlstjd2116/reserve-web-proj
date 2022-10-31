<?php
error_reporting(0);
ini_set("display_errors", 0);
$date = $_POST["datepicker"];
$men = $_POST["men"];

$con = mysqli_connect("localhost", "root", "", "test");

// $date의 값에 따라 쿼리문 구분.
if (empty($date)) {
  $sql = " select * from tb_house";
} else {
  $sql =
    "select * from tb_house where house_id 
    not in (select DISTINCT house_id from tb_house_reservation where rs_date = '" .
    $date .
    "');";
}
$result = mysqli_query($con, $sql);

$sSql =
  "select *
from tb_house
where (house_id in (select distinct house_id from tb_house_reservation where rs_date = '" .
  $date .
  "') );";
$sresult = mysqli_query($con, $sSql);

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
<link rel="stylesheet" href="./css/rs_common.css">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" integrity="sha512-aOG0c6nPNzGk+5zjwyJaoRUgCdOrfSDhmMID2u4+OIslr0GjpLKo7Xm0Ao3xmpM4T8AmIouRkqwj1nrdVsLKEQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdn.jsdelivr.net/combine/npm/fullcalendar@5.11.3,npm/fullcalendar@5.11.3/locales-all.min.js,npm/fullcalendar@5.11.3/locales-all.min.js,npm/fullcalendar@5.11.3/main.min.js"></script>
<script src="jquery.bpopup2.min.js" type="text/javascript"></script>
</head>
<body>
<?php include "./header_other.php"; ?>
<div class="wrap">
	<div class="rs_wrap">
      <div class = "dtTitle"><strong>T&R HOUSE</strong></div><br>
         <!-- 날짜 선택 -->
      <form name = "form1" action="reservation.php" method = "post">
         <!-- <a href="popup.php" onclick="window.open(this.href,'선택창', width = 1920, height = 1080); return false;"><input type="text" name="datePick" class="datePick" placeholder ="날짜"/></a> -->
         <input type="text" class="datepicker" name="datepicker">
         <input type="text" name="men" class="datePick" placeholder ="인원수"/>
         <input type="submit" value="조회" class = "btnSearch btn btn-dark btn-sm"> 
         <hr>
      </form>
         <div class = "show_room">
            <?php
            while ($row = mysqli_fetch_array($result)) {
              if ($row["max_people"] >= $men) { ?>
            <a onclick="javascript:execReservation('<?= $row["house_id"] ?>','<?= $row["house_name"] ?>');">
               <div class="sr_box">
                  <div class = "sr_pic" width=214px; height=246px;>
                  <img src = "./room/view_room/0<?= $row["house_id"] ?>.jpg">
                  </div>
                  <p class= "sr_title"><?= $row["house_name"] ?></p>
                  <p class = "sr_content"><?= $row["contents"] ?></p>
                  <p class ="sm-span sr_people"><?= $row["people"] ?> </p>
                  <p class= "sr_pay"> <span class="sm-span">숙박</span> <?= $row["house_pay"] ?><span class="sm-span">원</span></p>
               </div>
            </a>
            <hr>
                  <?php }
            }
            // 예약 불가능한 방
            while ($row1 = mysqli_fetch_array($sresult)) { ?>
                           <div class="non sr_box">
                           <div class = "sr_pic_non" width=214px; height=246px;>
                              <img src = "./room/view_room/0<?= $row1["house_id"] ?>.jpg">
                           </div>
                           <p class= "sr_title"><?= $row1["house_name"] ?></p>
                           <p class = "sr_content"><?= $row1["contents"] ?></p>
                           <p class ="sm-span sr_people"><?= $row1["people"] ?> </p>
                           <p class= "sr_pay"> <span class="sm-span">숙박</span> <?= $row1["house_pay"] ?><span class="sm-span">원</span></p>
                        </div>
                        <?php }
            ?>
         </div>

      
	</div>
</div>

<div class="box box-success box-after" id="winReservation">
		<form name=frm method="post" action="reservation_ok.php">		
		<input type="hidden" name="insert_houseid" id="insert_houseid" value="">
		<div style="width:100%; height:33px; margin-left:20px">
			<div style="width:30%;float:left; color:black">
				펜션이름:
			</div>
			<div style="width:70%;float:left; color:black" id="divHouseName">
			</div>
		</div>
		<div style="width:100%; height:33px; margin-left:20px; color:black">
			<div style="width:30%;float:left; color:black">
				예약날짜: <input class="datepicker1" name="datepicker1">
			</div>
		</div>
		<div style="width:100%; height:33px; margin-left:20px">
			<br><div style="float:left; color:black">
				숙박인원:
			</div>
			<div style="width:70%;float:left;color:black">
				<input type="text" name="total_man" id="total_man" style="width:50px;color:black">명
			</div>
		</div>
		</form>
		<div style="width:100%; height:33px; margin-top:30px; text-align:center">
			<button style="background-color:gray; color:white; border:1px solid #222222" onclick="javascript:saveReservation();">예약하기</button>
		</div>
	</div><!-- /.box -->
   <?php include "./footer.php"; ?>
<script>
   // datepicker 
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
});

$(function(){
   $('.datepicker1').datepicker();
});

// 예약실행 팝업 함수
function execReservation(houseID, houseName)
	{
		<?php if ($userid == "") { ?>
		alert("먼저 로그인을 해주세요."); return false;
		<?php } ?>
		$("#insert_houseid").val(houseID);
		$("#divHouseName").html(houseName);

		$('#winReservation').bPopup();
	}

   // 예약 db에 넣는 함수, 유효성검사
function saveReservation()
{
   if(!$.trim($('.datepicker1').val()))
   {
      alert("예약 날짜를 입력해주십시오asd");
      return false;
   }
   if(!$.trim($("#total_man").val()))
   {
      alert("숙박인원을 입력해주십시오");
      return false;
   }
   if(isNaN($("#total_man").val()))
   {
      alert("숙박인원을 숫자로 입력해주십시오");
      return false;
   }
   document.frm.submit();
}

let today = new Date();   

let year = today.getFullYear(); // 년도
let month = today.getMonth() + 1;  // 월
let date = today.getDate();  // 날짜
let day = today.getDay();  // 요일

let sumToday = year + "-" + month +"-"+ date;

$('.datepicker').val(sumToday);
</script>
</html>







