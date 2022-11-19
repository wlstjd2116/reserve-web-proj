<!doctype html>
<meta charset="utf-8">
<title>관광정보소개</title>
        <link rel="stylesheet" type="text/css" href = "./css/style_room1.css">
        <link rel="stylesheet" type="text/css" href = "./css/common.css">
        <script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=ea44ecb0969a18388ea307ad38863375&libraries=services"></script>
        <script src="js/jquery.min.js"></script>

<head>
</head>
<body><?php include "./header_other.php"; ?>
        <div class="content_wrap">
            <div class="top_box">
            <div class="tourlist_top"><b>주변 관광지</b></div>
                <div class="map_box">
                    <div id="map" style="width:60%;height:400px; display: inline-block"></div>
                    <div class="pic_box">
                        <img src="http://tong.visitkorea.or.kr/cms/resource/60/2876060_image2_1.jpg" width="100%" height="100%" alt="">
                        <div class="sub_img">
                            <ul>
                                <li><img src="" alt=""></li>
                                <li><img src="" alt=""></li>
                                <li><img src="" alt=""></li>
                            </ul>                                        
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="line"></div>
            <div class="place_box">
                <div class="tour_content"></div>
            </div>
        </div>
        <img src="" alt="" class="wow">
        <?php include "./footer.php"; ?>
<script>
// 마커 이미지의 이미지 주소입니다
var imageSrc = "https://t1.daumcdn.net/localimg/localimages/07/mapapidoc/markerStar.png"; 
var imgbox = [];
var tourinfo = [];

function getData(callback){
        return new Promise(function (resolve, reject){
            setTimeout(function (){
                $.get(`https://apis.data.go.kr/B551011/KorService/areaBasedList?numOfRows=100&MobileOS=WEB&MobileApp=webp&serviceKey=yUEUsLFTDX6iYs09QHj2GDFRUCYvs9%2BWVZOQzeTsZZh%2B4iNC%2F3Noxf0y0dI10Q6wYD0O0y0BYFH9nsFvRuFZaQ%3D%3D&_type=json&areaCode=35&sigunguCode=2`, 
                function (data) {
                    if(data){
                        var tour_content = ``;
                        positions = [];
                        for(var i=0; i<data.response.body.items.item.length; i++){
                            var dir = data.response.body.items.item[i];
                            var addr = dir.addr1;
                            var mapx = dir.mapx;
                            var mapy = dir.mapy;
                            var img1 = dir.firstimage;
                            var title = dir.title;
                            var content_Id = dir.contentid;
                            var content_Type_Id = dir.contenttypeid;
                            imgbox.push(img1);
                            positions.push(
                                {title: title, latlng: new kakao.maps.LatLng(mapy, mapx), addr: addr, id: content_Id, type_id: content_Type_Id}
                                );
                        }
                        
                        resolve(data);
                    }
                    reject(new Error("Request is failed"));
                })
            });
        }).then(function (tabledata){
            var mapContainer = document.getElementById('map'), // 지도를 표시할 div  
    mapOption = { 
        center: new kakao.maps.LatLng(35.8359259, 129.2203782), // 지도의 중심좌표
        level: 8, // 지도의 확대 레벨
        clickable: true
    };

var map = new kakao.maps.Map(mapContainer, mapOption); // 지도를 생성합니다
 var imageSrc = "https://t1.daumcdn.net/localimg/localimages/07/mapapidoc/markerStar.png"; 
var test = [];
// infowindow를 담는 배열
var popup = [];
var marker = new kakao.maps.Marker({
        map: map, // 마커를 표시할 지도
        position: new kakao.maps.LatLng(35.8359259, 129.2203782), // 마커를 표시할 위치
        title : "T&R 펜션", // 마커의 타이틀, 마커에 마우스를 올리면 타이틀이 표시됩니다
        image : markerImage, // 마커 이미지 
        clickable: true
    });
    var infowindow = new kakao.maps.InfoWindow({
        position: new kakao.maps.LatLng(35.8359259, 129.2203782), 
    content : "T&R펜션 " 
});
for (var i = 0; i < positions.length; i ++) {
    test.push(positions[i].title);
    // 마커 이미지의 이미지 크기 입니다
    var imageSize = new kakao.maps.Size(24, 35); 
    
    // 마커 이미지를 생성합니다    
    var markerImage = new kakao.maps.MarkerImage(imageSrc, imageSize); 
    
    // 마커를 생성합니다
    var marker = new kakao.maps.Marker({
        map: map, // 마커를 표시할 지도
        position: positions[i].latlng, // 마커를 표시할 위치
        title : positions[i].title, // 마커의 타이틀, 마커에 마우스를 올리면 타이틀이 표시됩니다
        image : markerImage, // 마커 이미지 
        // clickable: true
    });

    var infowindow = new kakao.maps.InfoWindow({
    position : positions[i].latlng, 
    content: '<div class="customoverlay"><span class="info-title">'+ positions[i].title + '</span></div>', 
    });
    var customOverlay = new kakao.maps.CustomOverlay({
    position : positions[i].latlng, 
    content: '<div class="popup">' + 
            '    <div class="popup_info">' + 
            '        <div class="popup_title">' + positions[i].title  + 
            '            <div class="close" title="닫기"></div>' + 
            '        </div>' + 
            '        <div class="body">' + 
            '            <div class="img">' +
            '                <img class="info_img" src="" width="73" height="70">' +
            '           </div>' + 
            '            <div class="desc">' + 
            '                <div class="ellipsis">' + positions[i].addr + '</div>' + 
            '                <div class="jibun ellipsis">(우) 63309 (지번) 영평동 2181</div>' + 
            '                <div><a href="https://www.kakaocorp.com/main" target="_blank" class="link">홈페이지</a></div>' + 
            '            </div>' + 
            '        </div>' + 
            '    </div>' +    
            '</div>'
    });

    kakao.maps.event.addListener(marker, 'click', CreatePopUp(map, marker, i, customOverlay));

}

function CreatePopUp(map, marker, i, customOverlay) {
    return function() {
        // popup 배열에 추가
        popup.push(customOverlay)
        // infowindow 지도에 표시
        // infowindow.open(map, marker)
        customOverlay.setMap(map)
        getInfo(i);
        slideImg(i);
        $('.close').click(function() {
            customOverlay.setMap(null)
        })
        tour_info(i);
        // 사진 변경

        if(i !== 0 && (imgbox[i] === imgbox[0] | imgbox[i] === '')) {
            $('.pic_box > img').attr("src", './image/no_pic.png');
            $('.info_img').attr("src", './image/no_pic.png');
        }
        else {
            $('.pic_box > img').attr("src", imgbox[i]);
            $('.info_img').attr("src", imgbox[i]);
        } 

        if(popup.length === 2) {
            // 첫번째 popup infowindow2에 담음
            var customOverlay2 = popup[0];

            // 0번째 1번째가 같을때
            if(popup[0].cc === popup[1].cc) {
                // 인포윈도우 종료
                // infowindow.close();
                customOverlay.setMap(null)
                // 마지막 요소 제거
                popup = [];
            }
            // 0번째 1번째가 다를때
            if(popup[0].cc !== popup[1].cc) {
                // 인포윈도우 생성
                customOverlay2.setMap(null);
                // 첫번째 요소 제거
                popup.shift();
            }
        }
    };
}
function getInfo(i) {
    $.get(`https://apis.data.go.kr/B551011/KorService/detailIntro?MobileOS=WIN&MobileApp=WEBP&serviceKey=yUEUsLFTDX6iYs09QHj2GDFRUCYvs9%2BWVZOQzeTsZZh%2B4iNC%2F3Noxf0y0dI10Q6wYD0O0y0BYFH9nsFvRuFZaQ%3D%3D&_type=json&contentId=` + positions[i].id + `&contentTypeId=` + positions[i].type_id, 
    function (data) {
        var dir2 = data.response.body.items.item[0]

        var tour_content = ``;

        switch(dir2.contenttypeid) {
            case "12":
                tour_content    +=  '<div class=info_wrap>'
                                +   '   <div class=info_default>'
                                +   '       <p>장소명  </p>'+'<p>'+ positions[i].title +'</p>'
                                +   '   </div>'
                                +   '   <div class=info_default>'
                                +   '       <p>주소  </p>'+'<p>'+ positions[i].addr +'</p>'
                                +   '   </div>'
                                +   '   <div class=info_default>'
                                +   '       <p>전화번호  </p>'+'<p>'+ dir2.infocenter +'</p>'
                                +   '   </div>'
                                +   '   <div class=service>'
                                +   '       <span>서비스</span>'
                                +   '       <ul>'
                                +   '           <li>유모차대여: '+ dir2.chkbabycarriage +'</li>'
                                +   '           <li>결제수단: '+ dir2.chkcreditcard +'</li>'
                                +   '           <li>반려동물동반입장: '+ dir2.chkpet +'</li>'
                                +   '        </ul>'
                                +   '    </div>'
                                +   '</div>';
                break;
            case "15":
                tour_content    +=  '<div class=info_wrap>'
                                +   '   <div class=info_default>'
                                +   '       <p>장소명  </p>'+'<p>'+ positions[i].title +'</p>'
                                +   '   </div>'
                                +   '   <div class=info_default>'
                                +   '       <p>주소  </p>'+'<p>'+ positions[i].addr +'</p>'
                                +   '   </div>'
                                +   '   <div class=info_default>'
                                +   '       <p>전화번호  </p>'+'<p>'+ dir2.sponsor1tel +'</p>'
                                +   '   </div>'
                                +   '   <div class=info_default>'
                                +   '       <p>행사명  </p>'+'<p>'+ dir2.eventplace +'</p><br>'
                                +   '   </div>'
                                +   '   <div class=service>'
                                +   '       <span>정보</span>'
                                +   '       <ul>'
                                +   '           <li>이벤트 기간: '+ dir2.eventstartdate.substring(0,4) +'년'+ dir2.eventstartdate.substring(4,6) +'월'+ dir2.eventstartdate.substring(6,8) +'일 - '+ dir2.eventenddate.substring(0,4) +'년'+ dir2.eventenddate.substring(4,6) +'월'+ dir2.eventenddate.substring(6,8) +'일</li>'
                                +   '           <li>운영시간: '+ dir2.playtime +'</li>'
                                +   '           <li>관련홈페이지: '+ dir2.eventhomepage +'</li>'
                                +   '        </ul>'
                                +   '    </div>'
                                +   '</div>';
                break;
            case "28":
                tour_content    +=  '<div class=info_wrap>'
                                +   '   <div class=info_default>'
                                +   '       <p>장소명  </p>'+'<p>'+ positions[i].title +'</p>'
                                +   '   </div>'
                                +   '   <div class=info_default>'
                                +   '       <p>주소  </p>'+'<p>'+ positions[i].addr +'</p>'
                                +   '   </div>'
                                +   '   <div class=info_default>'
                                +   '       <p>전화번호  </p>'+'<p>'+ dir2.infocenterleports +'</p>'
                                +   '   </div>'
                                +   '   <div class=service>'
                                +   '       <span>정보</span>'
                                +   '       <ul>'
                                +   '           <li>유모차대여: '+ dir2.chkbabycarriageleports +'</li>'
                                +   '           <li>결제수단: '+ dir2.chkcreditcardleports +'</li>'
                                +   '           <li>반려동물동반입장: '+ dir2.chkpetleports +'</li>'
                                +   '        </ul>'
                                +   '    </div>'
                                +   '</div>';
                break;
            case "32":
                tour_content    +=  '<div class=info_wrap>'
                                +   '   <div class=info_default>'
                                +   '       <p>장소명  </p>'+'<p>'+ positions[i].title +'</p>'
                                +   '   </div>'
                                +   '   <div class=info_default>'
                                +   '       <p>주소  </p>'+'<p>'+ positions[i].addr +'</p>'
                                +   '   </div>'
                                +   '   <div class=info_default>'
                                +   '       <p>전화번호  </p>'+'<p>'+ dir2.infocenterlodging +'</p>'
                                +   '   </div>'
                                +   '   <div class=service>'
                                +   '       <span>정보</span>'
                                +   '       <ul>'
                                +   '           <li>최대수용인원: '+ dir2.accomcountlodging +'명</li>'
                                +   '           <li>체크인/ 체크아웃: '+ dir2.checkintime + "/" + dir2.checkouttime +'</li>'
                                +   '           <li>주차공간: '+ dir2.parkinglodging.substring(3,6) +'</li>'
                                +   '           <li>픽업서비스: '+ dir2.pickup +'</li>'
                                +   '           <li>방갯수: '+ dir2.roomcount +'</li>'
                                +   '           <li>규모: '+ dir2.scalelodging +'</li>'
                                +   '        </ul>'
                                +   '    </div>'
                                +   '   <div class=service>'
                                +   '       <span>서비스</span>'
                                +   '       <ul>'
                                +   '           <li>환불규정: '+ dir2.refundregulation +'</li>'
                                +   '           <li>공식 홈페이지: '+ dir2.reservationurl +'</li>'
                                +   '        </ul>'
                                +   '    </div>'
                                +   '</div>';
                break;
            case "38":
                tour_content    +=  '<div class=info_wrap>'
                                +   '   <div class=info_default>'
                                +   '       <p>장소명  </p>'+'<p>'+ positions[i].title +'</p>'
                                +   '   </div>'
                                +   '   <div class=info_default>'
                                +   '       <p>주소  </p>'+'<p>'+ positions[i].addr +'</p>'
                                +   '   </div>'
                                +   '   <div class=info_default>'
                                +   '       <p>전화번호  </p>'+'<p>'+ dir2.infocentershopping +'</p>'
                                +   '   </div>'
                                +   '   <div class=service>'
                                +   '       <span>정보</span>'
                                +   '       <ul>'
                                +   '           <li>판매물품: '+ dir2.saleitem +'</li>'
                                +   '           <li>운영시간: '+ dir2.opentime +'</li>'
                                +   '        </ul>'
                                +   '    </div>'
                                +   '   <div class=service>'
                                +   '       <span>서비스</span>'
                                +   '       <ul>'
                                +   '           <li>쇼핑카트: '+ dir2.chkbabycarriageshopping +'</li>'
                                +   '           <li>카드결제: '+ dir2.chkcreditcardshopping +'</li>'
                                +   '           <li>반려동물동반입장: '+ dir2.chkpetshopping +'</li>'
                                +   '        </ul>'
                                +   '    </div>'
                                +   '</div>';
                break;
            case "39":
                tour_content    +=  '<div class=info_wrap>'
                                +   '   <div class=info_default>'
                                +   '       <p>장소명  </p>'+'<p>'+ positions[i].title +'</p>'
                                +   '   </div>'
                                +   '   <div class=info_default>'
                                +   '       <p>주소  </p>'+'<p>'+ positions[i].addr +'</p>'
                                +   '   </div>'
                                +   '   <div class=info_default>'
                                +   '       <p>전화번호  </p>'+'<p>'+ dir2.infocenterfood +'</p>'
                                +   '   </div>'
                                +   '   <div class=service>'
                                +   '       <span>정보</span>'
                                +   '       <ul>'
                                +   '           <li>대표메뉴: '+ dir2.firstmenu +'</li>'
                                +   '           <li>메인메뉴: '+ dir2.treatmenu +'</li>'
                                +   '           <li>운영시간: '+ dir2.opentimefood +' / '+ dir2.restdatefood +'</li>'
                                +   '           <li>사업자번호: '+ dir2.lcnsno +'</li>'
                                +   '        </ul>'
                                +   '    </div>'
                                +   '   <div class=service>'
                                +   '       <span>서비스</span>'
                                +   '       <ul>'
                                +   '           <li>카드결제: '+ dir2.chkcreditcardfood +'</li>'
                                +   '           <li>포장: '+ dir2.packing +'</li>'
                                +   '           <li>주차공간/요금: '+ dir2.parkingfood +'</li>'
                                +   '        </ul>'
                                +   '    </div>'
                                +   '</div>';
                break;
            default:
                tour_content += ``;
                break;
        }
        $('.tour_content').html(tour_content);
    })
}

function slideImg(i) {
    $.get('https://apis.data.go.kr/B551011/KorService/detailImage?MobileOS=WIN&MobileApp=WEB&serviceKey=yUEUsLFTDX6iYs09QHj2GDFRUCYvs9%2BWVZOQzeTsZZh%2B4iNC%2F3Noxf0y0dI10Q6wYD0O0y0BYFH9nsFvRuFZaQ%3D%3D&_type=json&contentId='+ positions[i].id +'&imageYN=Y&subImageYN=Y',
    function (data) {
        var dir3 = data.response.body.items.item;
        var ul = '';
        var li_component = [];

        for(var k = 0; k < 3; k++) {
            
            li_component.push(this);

            if(!(dir3)) {
                ul += `<li><img src="./image/no_pic.png" alt=""></li>`
                
            }
            else {
                ul += `<li><img src="${dir3[k].originimgurl}" alt=""></li>`
            }
            $('.sub_img > ul').html(ul);
            if(li_component.length === 2) {
                    $('.sub_img > ul > li').css('width', '48%')
                }
            $('.sub_img > ul > li > img').click(function() {
                var pre_img = $('.pic_box > img')[0].currentSrc
                var next_img = this.src;

                $('.pic_box > img').attr('src', this.src);
                this.src = pre_img
            })
        }
        
    })
}

function tour_info(i) {
    $('.place_name').html(`${positions[i].title}`)
    $('.place_addr').html(`${positions[i].addr}`)
}

function closeOverlay() {
    overlay.setMap(null);     
}
        }).catch(function (err){
            console.log(err);
        });
    }
    getData();

</script>
</body>