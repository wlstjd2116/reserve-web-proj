<?php
 	$composer   = $_REQUEST["composer"];
   $con = mysqli_connect("localhost", "root", "", "test");
   try{
      $sql ="update survey set $composer = $composer + 1;";
      $result = mysqli_query($con, $sql);
   }

   catch (PDOException $Exception){
      $pdo->rollback();
      print "오류: ".$Exception->getMessage();
   }
   ?>
   
   
   <script>
      location.replace('survey_result.php');
   </script>	