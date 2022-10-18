<?php
session_start();
if (isset($_SESSION["userid"])) {
  $userid = $_SESSION["userid"];
} else {
  $userid = "";
}
?>
<!doctype html>
<meta charset="utf-8">
<title>자연룸</title>
		<link rel="stylesheet" type="text/css" href = "./css/style_room.css">
		<script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=ea44ecb0969a18388ea307ad38863375&libraries=services"></script>
<head>
</head>
<body>
	<div class ="wrap">
		<div class = "intro_bg">
			<div class="header">
				<ul class="nav">
					<li><a href="pensionHome.php">HOME</a></li>
					<li><a href="reservation.php">RESERVE</a></li>
					<li><a href="reservation_status.php">RESERVATION STATUS</a></li>
					<li><a href="board_list.php">BOARD</a></li>
					<li><a href="notice_list.php">NOTICE</a></li>
					<li><a href="qna_list.php">QNA</a></li>
					
					<?php if (!$userid) { ?>                
                			<li><a href="member_form.php">회원 가입</a> </li>
   					 <?php } else {$logged = $userid . "님"; ?>
                
						<li><a onclick="window.open('./survey.php','설문조사','left=200,top=200, scrollbars=no, toolbars=no, width=180, height=230')"border="0">SURVEY</a></li>
						<li><?= $logged ?> </li>
                <li><a href="member_modify_form.php">정보수정</a></li>
                <li><a href="logout.php">로그아웃</a> </li>
<?php } ?>
				<li><?php if (!$userid) { ?>
					</ul>
						<form id="frm" name="frm" method="post" action="login.php">
							<div class="whitefont">
							ID:<input type="textbox" name="id" placeholder="ID">
							PW:<input type="password" name="pass" placeholder="PW">
							<button style ="color: black;" onclick="javascript:document.frm.submit();">로그인</button>
							</div>
						</form>
					</li>	
					                
   					 <?php } ?>
   					</ul>

   				</div>
   			</div>
   			<center>
   			 <div class="room_name">				   					
   				프라이빗한 휴식은 자연룸에서
   			</div></center>

   			<center><div class="room_rs"><h2><b style="color:black;">위치확인</b></h2></div>
				   <div id="map" style="width:500px;height:350px;"></div></center>

	   			<center><img src="./room/na1.jpg" width="1000px" height="600px"></center>
	   			<center><img src="./room/na2.jpg" width="1000px" height="600px"></center>
	   			<center><img src="./room/na3.jpg" width="1000px" height="600px"></center>
	   			<center><img src="./room/na4.jpg" width="1000px" height="600px"></center>
	   			<center><img src="./room/na5.jpg" width="1000px" height="600px"></center>
   			<center><div class="room_rs">
   				<a href="reservation.php">예약하러 가기</a></div></center>
   		<div class = "amount" style="border: 2px solid #f2f2f2;">
            <li>
                <div>
                    <div class="contents1"> <a href="room01.php">자연룸</a></div>
                    <div class="result">자연과 함께하는 자연룸</div>
                </div>
            </li>
            <li>
                <div>
                    <div class="contents1" ><a href="room02.php">마운틴룸</a></div>
                    <div class="result">산과 가까이, 마운틴룸</div>
                </div>
            </li>
            <li>
                <div>
                    <div class="contents1"> <a href="room03.php">바다룸</a></div>
                    <div class="result">바다향 느낄 수 있는 바다룸</div>
                </div>
            </li>
            <li>
                <div>
                    <div class="contents1"> <a href="room04.php">냇가룸</a></div>
                    <div class="result">계곡과 함께 즐기는 냇가룸</div>
                </div>
            </li>
    </div>
   		</div>
		   <script>
var mapContainer = document.getElementById('map'), // 지도를 표시할 div 
    mapOption = {
        center: new kakao.maps.LatLng(33.450701, 126.570667), // 지도의 중심좌표
        level: 3 // 지도의 확대 레벨
    };  

// 지도를 생성합니다    
var map = new kakao.maps.Map(mapContainer, mapOption); 

// 주소-좌표 변환 객체를 생성합니다
var geocoder = new kakao.maps.services.Geocoder();

// 주소로 좌표를 검색합니다
geocoder.addressSearch('안동시 송천길 135', function(result, status) {

    // 정상적으로 검색이 완료됐으면 
     if (status === kakao.maps.services.Status.OK) {

        var coords = new kakao.maps.LatLng(result[0].y, result[0].x);

        // 결과값으로 받은 위치를 마커로 표시합니다
        var marker = new kakao.maps.Marker({
            map: map,
            position: coords
        });

        // 인포윈도우로 장소에 대한 설명을 표시합니다
        var infowindow = new kakao.maps.InfoWindow({
            content: '<div style="width:150px;text-align:center;padding:6px 0;color:black;">자연룸</div>'
        });
        infowindow.open(map, marker);

        // 지도의 중심을 결과값으로 받은 위치로 이동시킵니다
        map.setCenter(coords);
    } 
});    
</script>
   	</body>