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
        center: new kakao.maps.LatLng(35.841227504921, 129.29053241115), // 지도의 중심좌표
        level: 5 // 지도의 확대 레벨
    };  

// 지도를 생성합니다    
var map = new kakao.maps.Map(mapContainer, mapOption); 

// var markerPosition  = new kakao.maps.LatLng(35.841227504921, 129.29053241115); 


// 마커 이미지의 이미지 주소입니다
var imageSrc = "https://t1.daumcdn.net/localimg/localimages/07/mapapidoc/markerStar.png"; 

$.ajax({
    url: "https://apis.data.go.kr/B551011/KorService/areaBasedList?numOfRows=20&MobileOS=WEB&MobileApp=webp&serviceKey=yUEUsLFTDX6iYs09QHj2GDFRUCYvs9%2BWVZOQzeTsZZh%2B4iNC%2F3Noxf0y0dI10Q6wYD0O0y0BYFH9nsFvRuFZaQ%3D%3D&_type=json&areaCode=35&sigunguCode=2",
    dataType: "json",
    type : 'GET',
    // beforeSend : function (request) {
    //     request.setRequestHeader("AJAX", "true");
    // },
    success : function(data) {
        var num = data.response.body.items.item.length;
        var positions = [];
        console.log("첫 실행");
        if(num > 0){
            var tour_content = ``;
            for(var i=0; i<num; i++){
                var dir = data.response.body.items.item[i];
                var addr = dir.addr1;
                var mapx = dir.mapx;
                var mapy = dir.mapy;
                var img1 = dir.firstimage;
                var title = dir.title;
                
                positions.push(
                    {titles: title, latlng: new kakao.maps.LatLng(mapx, mapy)} 
                    );
                console.log(positions);
        
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
    },
    error: function (request, status, error) {
        console.log("error: ", error);
    }, success : function (json){
        console.log("두 번째 실행");
        for (var i = 0; i < positions.length; i ++) {
            var imageSize = new kakao.maps.Size(24, 35); 
            var markerImage = new kakao.maps.MarkerImage(imageSrc, imageSize); 
            console.log("position : " + positions[i].latlng+ ", title: " + positions[i].title);
            // 마커를 생성합니다
            var marker = new kakao.maps.Marker({
                map: map, // 마커를 표시할 지도
                position: positions[i].latlng, // 마커를 표시할 위치
                title : positions[i].title, // 마커의 타이틀, 마커에 마우스를 올리면 타이틀이 표시됩니다
                image : markerImage // 마커 이미지  
            });
        
        }
    }
});   // ajax end -->

    
</script>
   	</body>