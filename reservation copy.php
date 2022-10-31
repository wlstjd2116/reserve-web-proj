<?php
$con = mysqli_connect("localhost", "root", "", "test");
/*$sql = "select A.house_id, max(A.house_name) as house_name, max(A.house_address) as
   house_address, max(A.contents) as contents, count(B.rs_id) as rsCount
   FROM tb_house A left outer join tb_house_reservation B
   on A.house_id = B.house_id
   group by A.house_id
   ORDER BY A.house_id asc;";*/
$sql = "select A.house_id, A.house_name, A.house_address, A.contents, count(B.rs_id) as rsCount
   FROM tb_house A left outer join tb_house_reservation B
   on A.house_id = B.house_id
   group by A.house_id
   ORDER BY A.house_id asc";
$resultHouse = mysqli_query($con, $sql);

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
		<link rel="stylesheet" type="text/css" href = "./css/member.css">
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

</head>
<body>
<body>
<?php include "./header_other.php"; ?>
		<div style="width:1000px; margin:0px auto;  background-color:rgba(0, 0, 0, 0.5);
		margin-top:60px; padding: 30px 30px; border-radius: 30px;">
		<table style="width: 100%;">
			<tr style="height: 33px; background-color:rgba(0, 0, 0,0.4); color:white; text-align: center;">
				<td>
					No.
				</td>
				<td>
					펜션 이름
				</td>
				<td>
					주소
				</td>
				<td>
					설명
				</td>
				<td>
					예약
				</td>
			</tr>
			<?php
   $idx = 1;
   while ($row = mysqli_fetch_array($resultHouse)) {

     $isReservation = false;
     if ($row["rsCount"] < 0) {
       $isReservation = true;
     }
     ?>		
						<tr style="height: 33px; text-align:center">
							<td>
							<a href="./room0<?= $idx ?>.php" style="color:white;"><?= $row["house_id"] ?></a>
							</td>
							<td>
							<a href="./room0<?= $idx ?>.php" style="color:white;"><?= $row["house_name"] ?></a>
							</td>
							<td>
							<a href="./room0<?= $idx ?>.php" style="color:white;"><?= $row["house_address"] ?></a>
							</td>
							<td>
							<a href="./room0<?= $idx ?>.php" style="color:white;"><?= $row["contents"] ?></a>
							</td>
							<td>
								<?php if ($isReservation) { ?><div style="color: black;">이미 예약됨</div>
									<?php } else { ?>
									<a style="cursor:pointer; color:white;font-weight: bold; 
									text-decoration:underline"
									 onclick="javascript:execReservation('<?= $row["house_id"] ?>',
									 '<?= $row["house_name"] ?>');">예약하기</a>
									<?php $idx++;} ?>
							</td>
						</tr>
						<tr style ="height: 0px; text-align:center;">
							<td colspan="5" style="border-bottom: 1px solid #dddddd;"></td>
						</tr>				
						<?php
   }
   ?>
			</table>
	</div>
	<div class="box box-success" style="width:300px; display:none; background-color:white;
	 padding-top:15px; padding-bottom:15px" id="winReservation">
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
				예약날짜: <input class="datepicker" name="datepicker">
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
				<!-- <input type="text" name="reservation_year" id="reservation_year" style="width:80px; color:black;">년 
				<input type="text" name="reservation_month" id="reservation_month" style="width:80px; color:black;">월 
				<input type="text" name="reservation_day" id="reservation_day" style="width:80px; color:black;">일 -->
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
	</div>
</body>
<script src="jquery.bpopup2.min.js" type="text/javascript"></script>
<script>
	
	function execReservation(houseID, houseName)
	{
		<?php if ($userid == "") { ?>
		alert("먼저 로그인을 해주세요."); return false;
		<?php } ?>
		$("#insert_houseid").val(houseID);
		$("#divHouseName").html(houseName);

		$('#winReservation').bPopup();
	}

	function saveReservation()
	{
		if(!$.trim($('.datepicker').val()))
		{
			alert("예약 날짜를 입력해주십시오");
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