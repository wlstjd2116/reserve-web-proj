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
<link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.8.0/main.min.css' rel='stylesheet' />
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.8.0/main.min.js'></script>
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.8.0/locales-all.min.js'></script>
<script>
    // fullcalendar Start
document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
			selectable: true,// 달력 일자 드래그 설정가능
			navLinks: true, // 날짜를 선택하면 Day 캘린더나 Week 캘린더로 링크
			editable: true, // 수정 가능
			nowIndicator: true, // 현재 시간 마크
			dayMaxEvents: true, // 이벤트가 오버되면 높이 제한 (+ 몇 개식으로 표현)
			locale: 'ko', // 한국어 설정
			eventAdd: function(obj) { // 이벤트가 추가되면 발생하는 이벤트
				console.log('add');
			},
			eventChange: function(obj) { // 이벤트가 수정되면 발생하는 이벤트
				
				// GMT 시간은 9시간 빨라서 9시간 빼줘야됨
				var start = obj.event._instance.range.start;
				if(start.getHours() == 9) {
					start = moment(start).format('YYYY-MM-DD') + " 00:00";
				}
				else {
					start = start.setHours(start.getHours() - 9);
					start = moment(start).format('YYYY-MM-DD hh:mm');
				}
				
				
				var end = obj.event._instance.range.end;
				if(end.getHours() == 9) {
					end = moment(end).format('YYYY-MM-DD') + " 00:00";
				}
				else {
					end = end.setHours(end.getHours() - 9);
					end = moment(end).format('YYYY-MM-DD hh:mm');
				}
				
			},
			select: function(arg) {
                var moment = $('.callender_area').fullCalendar('getDate');
				var title = prompt('입력할 일정22:');
				if (title) {
					calendar.addEvent({
						title: title,
						start: arg.startStr,
						end: arg.endStr,
						allDay: arg.allDay
					})
				} 
				
				calendar.unselect()
			},
			droppable: true,
			eventBorderColor : '#82d1ff', // 이벤트 테두리색
			eventBackgroundColor : '#82d1ff' , // 이벤트 배경색
			headerToolbar: { // 툴바
				left: 'prev,next today',
				center: 'title',
				right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
			},
        });
		
        calendar.render(); // 캘린더 렌더링(화면 출력)
    });
	
	/* -------- 캘린더 끝 ----------*/

window.opener.document.myform.prop01 = document.mychildform.prop01;
</script>
</head>


<body>
<div id="calendar"></div>
</body>

<script>

</script>
</html>







