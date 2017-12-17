<?php
 header("Content-Type: text/html; charset=UTF-8");
 session_start();
 // require 'database.php';
 $con = mysqli_connect("localhost", "wlstjd8445", "wjdgjswlswn1!", "wlstjd8445");
	mysqli_set_charset($con,"utf8"); 

// 설정
$uploads_dir = './';
$allowed_ext = array('jpg','jpeg','png','gif', 'txt');
$timeString = date( 'Y-m-d H:i:s', time() );
 
// 변수 정리
$error = $_FILES['myfile']['error'];
$name = $_FILES['myfile']['name'];
$ext = array_pop(explode('.', $name));
$pcname =$_POST['pcname'];

$pcname_encode = iconv("utf-8", "euc-kr", "$pcname");

// 오류 확인
if( $error != UPLOAD_ERR_OK ) {
   switch( $error ) {
      case UPLOAD_ERR_INI_SIZE:
      case UPLOAD_ERR_FORM_SIZE:
         echo "File is too big ($error)";
         break;
      case UPLOAD_ERR_NO_FILE:
         echo "No File ($error)";
         break;
      default:
         echo "Uncomplete ($error)";
   }
   exit;
}
 
// 확장자 확인
if( !in_array($ext, $allowed_ext) ) {
   echo "No ext";
   exit;
}
 
// 파일 이동
move_uploaded_file( $_FILES['myfile']['tmp_name'], "$uploads_dir/$name");

/*=======이름=======*/

   echo "PC Name : ".$pcname_encode."<br>";
   echo "PC Name : ".$pcname."<br>";

/*=======파싱=======*/

   $fp_count = file($name);
   $count_f = sizeof($fp_count);

   $fp = fopen($name, "r");
   $f_arr = array();

   while(!feof($fp)){
      $member = fgets($fp);
      array_push($f_arr, $member);
   }

   $ans_count = file("b.txt");   //비교 파일 크기
   $count_ans = sizeof($ans_count);

   $fp_ans = fopen("b.txt", "r");
   $ans_arr = array();
   
   while(!feof($fp_ans)){                     //비교파일 arr저장
      $member_a = fgets($fp_ans);
      array_push($ans_arr, $member_a);
   }
   
   $count = 0;
   $x = array();
   $y = array();

   $j = 0;
   $k = 0;

   for($i=0; $i<$count_f; $i++){
      if(strpos($f_arr[$i], $ans_arr[0]) !== false){
         $count++;
      }
      if($count === 1){
         $x[$j] = $x[$j].$f_arr[$i]."\n";
      }
      if($count === 3){
         $y[$k] = $y[$k].$f_arr[$i];
         $count = 0;
         $j++;
         $k++;
      }
   }


   $x_cnt = count($x);
   $y_cnt = count($y);

   for($j=0; $j<$x_cnt; $j++){
      echo "PC-".$j."<br>";
      echo nl2br(substr(iconv("euc-kr", "utf-8", "$x[$j]"), 7)."\n");
      $x[$j]=substr(iconv("euc-kr", "utf-8", "$x[$j]"), 7);
   }
   echo "<br>";

   for($k=0; $k<$y_cnt; $k++){
      echo substr($y[$k], 7).", ";
      $y[$k]=substr(iconv("euc-kr", "utf-8", "$y[$k]"), 7);
   }
   echo "session".$_SESSION['user_id']."<br>";
   echo $pcname."<br>";
   echo "time".$timeString."<br>";
   echo $x[0]."<br>";
   echo $y[1]."<br>";
   echo $y[2]."<br>";
   echo $x[19]."<br>";
   $session_id=$_SESSION['user_id'];
   echo "session id : ".$session_id."<br>";
    // $result = mysqli_query($con,  "INSERT INTO `advweb_result`( `user_id`, `pc_name`, `time`, `pc_1`, `pc_2`, `pc_3`, `pc_4`, `pc_5`, `pc_6`, `pc_7`, `pc_8`, `pc_9`, `pc_10`, `pc_11`, `pc_12`, `pc_13`, `pc_14`, `pc_15`, `pc_16`, `pc_17`, `pc_18`, `pc_19`, `pc_20`, `result_1`, `result_2`, `result_3`, `result_4`, `result_5`, `result_6`, `result_7`, `result_8`, `result_9`, `result_10`, `result_11`, `result_12`, `result_13`, `result_14`, `result_15`, `result_16`, `result_17`, `result_18`, `result_19`, `result_20`) VALUES ('$_SESSION['user_id']','$pcname','$timeString','$y[0]','$y[1]','$y[2]','$y[3]','$y[4]','$y[5]','$y[6]','$y[7]','$y[8]','$y[9]','$y[10]','$y[11]','$y[12]','$y[13]','$y[14]','$y[15]','$y[16]','$y[17]','$y[18]','$y[19]','$x[0]','$x[1]','$x[2]','$x[3]','$x[4]','$x[5]','$x[6]','$x[7]','$x[8]','$x[9]','$x[10]','$x[11]','$x[12]','$x[13]','$x[14]','$x[15]','$x[16]','$x[17]','$x[18]','$x[19]')");
   $result = mysqli_query($con,  "INSERT INTO `advweb_result`( `user_id`, `pc_name`, `time`, `pc_1`, `pc_2`, `pc_3`, `pc_4`, `pc_5`, `pc_6`, `pc_7`, `pc_8`, `pc_9`, `pc_10`, `pc_11`, `pc_12`, `pc_13`, `pc_14`, `pc_15`, `pc_16`, `pc_17`, `pc_18`, `pc_19`, `pc_20`, `result_1`, `result_2`, `result_3`, `result_4`, `result_5`, `result_6`, `result_7`, `result_8`, `result_9`, `result_10`, `result_11`, `result_12`, `result_13`, `result_14`, `result_15`, `result_16`, `result_17`, `result_18`, `result_19`, `result_20`) VALUES ('$session_id','$pcname','$timeString','$y[0]','$y[1]','$y[2]','$y[3]','$y[4]','$y[5]','$y[6]','$y[7]','$y[8]','$y[9]','$y[10]','$y[11]','$y[12]','$y[13]','$y[14]','$y[15]','$y[16]','$y[17]','$y[18]','$y[19]','$x[0]','$x[1]','$x[2]','$x[3]','$x[4]','$x[5]','$x[6]','$x[7]','$x[8]','$x[9]','$x[10]','$x[11]','$x[12]','$x[13]','$x[14]','$x[15]','$x[16]','$x[17]','$x[18]','$x[19]')");

   fclose($fp);
?>