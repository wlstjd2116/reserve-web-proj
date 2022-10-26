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
             <center><div class="tourist_top"><b>주변 관광지</b></div></center>
             <div id="map" style="width:500px;height:350px;"></div>
             <div class="tour_content">

   			</div></center>
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

// 지도를 생성합니다    
var map = new kakao.maps.Map(mapContainer, mapOption); 

// 주소-좌표 변환 객체를 생성합니다
var geocoder = new kakao.maps.services.Geocoder();

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
        var addrList = [];
        if(num > 0){
            var tour_content = ``;
            for(var i=0; i<num; i++){
                var dir = data.response.body.items.item[i];
                var addr = dir.addr1;
                var img1 = dir.firstimage;
                var title = dir.title;
                
                
                addrList.push(addr);
         
                tour_content += `
                <table>
                <tr>
                    <td><center><img src=`+ img1 +` width="500px" height="300px"></center>
                    
                 </tr>
                 <br><br><br><br><br><br>
                 <tr>
                    <td>
                        <span class = "rm_name" ><b>`+title+`</b>
                   </td>
                 </tr>
                </table>`;
            }

            $('.tour_content').html('');
            $('.tour_content').html(tour_content);
        }
        console.log(addrList);
	},
	error: function (request, status, error) {
		console.log("error: ", error);
	}

});  

</script>
   	</body>