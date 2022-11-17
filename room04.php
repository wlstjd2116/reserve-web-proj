<?php
$con = mysqli_connect("localhost", "root", "", "test");
$sql = "select * from tb_house where house_id = 4";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);

$con = "";
$sql = "";
?>
<!doctype html>
<meta charset="utf-8">
<title>베르데(Verde)</title>
<head>
<link rel="stylesheet" type="text/css" href = "./css/common.css">
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
<div class ="wrap">
	<?php include "./header_other.php"; ?>
<div class="r_wrap">
	<div class = "rm_wrap">
		<div class = "rm_title">
			<span>베르데(Verde)</span>
		</div>
		
		
		<center><img src="./room/ve1.jpg" width="600px" height="320px"></center>
		<div class="rm_explain">
		베르데(Verde)는<br>

		이탈리아어로 녹색을 의미합니다<br>
		<br><br>
		자연친화적인 인테리어와 조용한 분위기,<br>
		프라이빗한 실내바비큐장과 스파(Spa)는<br>
		고객들의 프라이버시를 더욱 더 안전하게 지켜주는 <br>
		매력적인 룸입니다<br>
		<br>

		베르데(Verde)에서<br>
		사랑하는 사람과 매력적인 아침을 맞이하세요!<br>
		<br><br>
		<a class="btn btn-dark"onclick="javascript:execReservation('<?= $row["house_id"] ?>','<?= $row["house_name"] ?>');">실시간 예약</a>
		<br>
		<br><br><br>
		<strong>객실정보</strong><br>

		원룸, 스파, 개별바비큐<br>
		<strong>가능인원</strong><br>

		기준 2명 / 최대 4명<br>
		<strong>입실안내</strong><br>

		오후3시 이후 입실 / 오전 11시 이전 퇴실<br>

		<strong>구비시설</strong><br>

		<strong>VILLA</strong><br>

		침대Q 1개, 호텔식침구, 스파, LED TV, 에어컨, 와이파이, 소화기<br>

		<strong>KITCHEN </strong><br>

		아일랜드식탁, 냉장고, 전자렌지, 전기밥솥, 인덕션, 식기류, 조리기구<br>

		<strong>BATHROOM</strong><br>

		헤어샴푸, 린스, 헤어드라이기, 타올, 휴지,각티슈
		</div> 
		<div class ="show_img">
		<center><img src="./room/ve2.jpg" width="1000px" height="600px"></center>
	   			<center><img src="./room/ve3.jpg" width="1000px" height="600px"></center>
	   			<center><img src="./room/ve4.jpg" width="1000px" height="600px"></center>
	   			<center><img src="./room/ve5.jpg" width="1000px" height="600px"></center>
	   			<center><img src="./room/ve6.jpg" width="1000px" height="600px"></center>
   			<center><div class="room_rs">
		</div>
	</div>
</div> <!-- wrap end -->
	   			
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
   		</div>
   	</body>
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
let today = new Date();   

let year = today.getFullYear(); // 년도
let month = today.getMonth() + 1;  // 월
let date = today.getDate();  // 날짜
let day = today.getDay();  // 요일

let sumToday = year + "-" + month +"-"+ date;
$('.datepicker1').val(sumToday);
$(function(){
   $('.datepicker1').datepicker();
});
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
	</script>
</html>