<!doctype html>
<meta charset="utf-8">
<title>관광정보소개</title>
		<link rel="stylesheet" type="text/css" href = "./css/style_room.css">
        <link rel="stylesheet" type="text/css" href = "./css/common.css">
		<script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=ea44ecb0969a18388ea307ad38863375&libraries=services"></script>
        <script src="js/jquery.min.js"></script>

<head>
</head>
<body><?php include "./header_other.php"; ?>
   			<center>
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
                    <td>
                        <span class = "rm_name" ><b>네이처</b></span><span class="sm_rm_name">(Nature)</span><br>
                        <span class = "explain">커플스파, 프라이빗 개별 바비큐<br>기준인원2명/최대2명</span>
                    </td>
                    <td><span class = "rm_name" ><b>마운틴</b></span><span class="sm_rm_name">(Mountain)</span><br>
                        <span class = "explain">커플스파, 프라이빗 개별 바비큐<br>기준인원2명/최대2명</span>
                    </td>
                    <td><span class = "rm_name" ><b>오션</b></span><span class="sm_rm_name">(Ocean)</span><br>
                        <span class = "explain">커플스파, 프라이빗 개별 바비큐<br>기준인원2명/최대2명</span>
                    </td>
                 </tr>
                 <tr>
                    <td><a href="./room01.php">View More</a></td>
                    <td><a href="./room02.php">View More</a></td>
                    <td><a href="./room03.php">View More</a></td>
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
                        <span class = "rm_name" ><b>베르데</b></span><span class="sm_rm_name">(Verde)</span><br>
                        <span class = "explain">커플스파, 프라이빗 개별 바비큐<br>기준인원2명/최대4명</span>
                    </td>
                    <td><span class = "rm_name" ><b>허니블루</b></span><span class="sm_rm_name">(Honey Blue)</span><br>
                        <span class = "explain">커플스파, 프라이빗 개별 바비큐<br>기준인원2명/최대4명</span>
                    </td>
                    <td><span class = "rm_name" ><b>아마빌레</b></span><span class="sm_rm_name">(Amabille)</span><br>
                        <span class = "explain">커플스파, 프라이빗 개별 바비큐<br>기준인원2명/최대4명</span>
                    </td>
                 </tr>
                 <tr>
                    <td><a href="./room01.php">View More</a></td>
                    <td><a href="./room02.php">View More</a></td>
                    <td><a href="./room03.php">View More</a></td>
                 </tr>
                 
                </table> 
                <br><br><br><br><br><br>
   			</div></center>

   			<!-- <center><div class="room_rs"><h2><b style="color:black;">위치확인</b></h2></div>
				   <div id="map" style="width:500px;height:350px;"></div></center> -->
<script>
    $.ajax({
	url: "https://apis.data.go.kr/B551011/KorService/areaBasedList?MobileOS=WEB&MobileApp=webp&serviceKey=yUEUsLFTDX6iYs09QHj2GDFRUCYvs9%2BWVZOQzeTsZZh%2B4iNC%2F3Noxf0y0dI10Q6wYD0O0y0BYFH9nsFvRuFZaQ%3D%3D&_type=json&areaCode=35&sigunguCode=2",
	dataType: "json",
    type : 'GET',
    // beforeSend : function (request) {
    //     request.setRequestHeader("AJAX", "true");
    // },
	success : function(data) {
		console.log("success: ", data);
        var num = data.response.body.items.item.length;
        var jsonData = data.response.body.items.item[0].mapx;
        
        console.log(jsonData + "num : " + num);
	},
	error: function (request, status, error) {
		console.log("error: ", error);
        console.log("status: ", status);
        console.log("request: ", request);
	}

});

// var mapContainer = document.getElementById('map'), // 지도를 표시할 div 
//     mapOption = {
//         center: new kakao.maps.LatLng(33.450701, 126.570667), // 지도의 중심좌표
//         level: 3 // 지도의 확대 레벨
//     };  

// // 지도를 생성합니다    
// var map = new kakao.maps.Map(mapContainer, mapOption); 

// // 주소-좌표 변환 객체를 생성합니다
// var geocoder = new kakao.maps.services.Geocoder();

// // 주소로 좌표를 검색합니다
// geocoder.addressSearch('안동시 송천길 135', function(result, status) {

//     // 정상적으로 검색이 완료됐으면 
//      if (status === kakao.maps.services.Status.OK) {

//         var coords = new kakao.maps.LatLng(result[0].y, result[0].x);

//         // 결과값으로 받은 위치를 마커로 표시합니다
//         var marker = new kakao.maps.Marker({
//             map: map,
//             position: coords
//         });

//         // 인포윈도우로 장소에 대한 설명을 표시합니다
//         var infowindow = new kakao.maps.InfoWindow({
//             content: '<div style="width:150px;text-align:center;padding:6px 0;color:black;">자연룸</div>'
//         });
//         infowindow.open(map, marker);

//         // 지도의 중심을 결과값으로 받은 위치로 이동시킵니다
//         map.setCenter(coords);
//     } 
// });    

</script>
   	</body>