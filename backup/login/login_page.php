
<html>
<meta charset="utf-8">
<head>
	<link rel="stylesheet" type="text/css" href = "../css/style.css">
</head>
<body>
	<div class ="wrap">
		<div class = "intro_bg">
			<div class="header">
				<div class="searchArea">
					<form>
						<input type="search" placeholder="Search">
						<span>검색</span>
					</form>
				</div>
				<ul class="nav">
					<li><a href="#">HOME</a></li>
					<li><a href="#">RESERVE</a></li>
					<li><a href="#">BOARD</a></li>	
					<li>	
							<div class="nick"> 
								<?php
									session_start();
									$_SESSION["sess_id"] = $_POST["id"];
									echo "".$_SESSION["sess_id"]?>님</div>
					</li>	
					</ul>	
			</div>
			<div class = "intro_text">
				<h1>T&R</h1>
				<div class="contents1">프라이빗한 힐링, T&R에서</h4>
			</div>
		</div>
		<!-- intro end -->

		<div class = "amount">
			<li>
				<div>
					<div class="contents1">ㅇㅇ</div>
					<div class="result">와사비간장</div>
				</div>
			</li>
			<li>
				<div>
					<div class="contents1">그래그래</div>
					<div class="result">대마왕</div>
				</div>
			</li>
			<li>
				<div>
					<div class="contents1">너의새끼오징어</div>
					<div class="result">내가붙잡고있다</div>
				</div>
			</li>
			<li>
				<div>
					<div class="contents1">ㅈㅈ거을겅벗어</div>
					<div class="result">적을 게 없d다고</div>
				</div>
			</li>
	</div>

	<table class = "table_center">
		<tr>
			<td><image src="image/01.jpg" width="180" height="180"></td>
			<td><image src="image/02.jpg" width="180" height="180"></td>
			<td><image src="image/03.jpg" width="180" height="180"></td>
			<td><image src="image/04.jpg" width="180" height="180"></td>
		</tr>
		<tr class = "table_text">
			<td><h5>영덕대덕펜션<br/>평점 4.5/5</td>
			<td><h5>영덕향기펜션<br/>평점 4.3/5</td>
			<td><h5>영덕영덕펜션<br/>평점 4.9/5</td>
			<td><h5>영덕대게펜션<br/>평점 4.5/5</td>
		</tr>

	</table>
	<table class = "table_center">
		<tr>
			<td><image src="image/08.jpg" width="180" height="180"></td>
			<td><image src="image/07.jpg" width="180" height="180"></td>
			<td><image src="image/06.jpg" width="180" height="180"></td>
			<td><image src="image/05.jpg" width="180" height="180"></td>
		</tr>
		<tr class = "table_text">
			<td><h5>영덕금산펜션<br/>평점 3.8/5</td>
			<td><h5>영덕대구펜션<br/>평점 4.2/5</td>
			<td><h5>영덕진성펜션<br/>평점 2.1/5</td>
			<td><h5>영덕주아펜션<br/>평점 5.0/5</td>
		</tr>

	</table>
</body>
</html>
?>