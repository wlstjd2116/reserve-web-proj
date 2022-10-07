  <html>
 <head>
  <title>설문조사 </title>
  <link rel="stylesheet" href="./css/survey.css" type="text/css">	
  <meta charset="utf-8">
  <script>
      function update()
      {
        var vote;
        var length = document.survey_form.composer.length; 

        for (var i=0; i<length; i++)
        {
           if (document.survey_form.composer[i].checked == true)
           {
                vote= document.survey_form.composer[i].value;
                break;
           }
        }

        if (i == length)
        {
           alert("문항을 선택하세요!");
           return;
        }

        window.open("survey_update.php?composer="+vote , "", 
              "left=200, top=200, width=160, height=250, status=no, scrollbars=no");
    }

  	  function result()
    {
         window.open("survey_result.php" , "", 
              "left=200, top=200, width=160, height=250, status=no, scrollbars=no");
    }
</script>

 </head> 
<body>
  <form name="survey_form" method="post"> 
    <table border=0 cellspacing=0 cellpdding=0 width='200' align='center'>
      <input type=hidden name=kkk value=100>
        <tr height=40>
          <td><img src="img/bbs_poll.png"></td>
        </tr>
        <tr height=1 bgcolor=#cccccc><td></td></tr>
       <tr height=7><td></td></tr>
       <tr><td><b> 가장 좋아하는 숙박 유형은?</b></td></tr>
       <tr><td><input type=radio name='composer' value='ans1' >1. 글램핑</td></tr>
       <tr height=5><td></td></tr>
       <tr><td><input type=radio name='composer' value='ans2' >2. 호텔</td></tr>
       <tr height=5><td></td></tr>
       <tr><td><input type=radio name='composer' value='ans3' >3. 캠핑</td></tr>
       <tr height=5><td></td></tr>
       <tr><td><input type=radio name='composer' value='ans4' >4. 펜션</td></tr>
       <tr height=7><td></td></tr>
       <tr height=1 bgcolor=#cccccc><td></td></tr>
       <tr>
       <tr height=7><td></td></tr>
       <tr>
         <td align=middle><a style='cursor:hand' onclick="update()">투표하기 &nbsp</a>
           <a style='cursor:hand' onclick="result()">&nbsp 결과보기</a></td></tr>
    </table>
  </form>
</body>
</html>
