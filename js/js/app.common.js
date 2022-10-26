
// 페이지 타이틀
var docTitle   = "안동버스정보";

document.title = docTitle;
$('#docTitle').html(docTitle);

var ApiUrl = "http://bus.andong.go.kr:8080";
var govCd  = "354";

// url 호출
var get      = getRequest();

var menu     = get['menu'];
var routeid  = get['routeid'];

//if(!routeid) routeid = "";

if(!menu) menu = "0";
$('#menuOn_'+menu).attr('class','on');


// Funtion
function getRequest() {
	if (location.search.length > 1) {
		var get = new Object();
		var ret = location.search.substr(1).split('&');
		for (var i = 0; i < ret.length; i++) {
			var r = ret[i].split('=');
			get[r[0]] = r[1];
		}
		return get;
	} else {
		return false;
	}
}


var favrouteId = JSON.parse(localStorage.getItem("favrouteId"));
if(favrouteId == null) favrouteId = [];
console.log("favrouteId: ", favrouteId);

function addFaviconNm(routeId) {
	favrouteId.push(routeId);
	localStorage.setItem("favrouteId", JSON.stringify(favrouteId));

	$('#addfavo').attr("style", "display:none");
	$('#delfavo').attr("style", "display:inline-block");
}

function delFaviconNm(routeId) {
	const idx = favrouteId.indexOf(routeId);
	favrouteId.splice(idx, 1);
	localStorage.setItem("favrouteId", JSON.stringify(favrouteId));

	$('#addfavo').attr("style", "display:inline-block");
	$('#delfavo').attr("style", "display:none");
}