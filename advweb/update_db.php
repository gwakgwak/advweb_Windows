<?php
	session_start();
	header("Content-Type: text/html; charset=UTF-8");
	$con = mysqli_connect("localhost", "wlstjd8445", "wjdgjswlswn1!", "wlstjd8445");
    mysqli_set_charset($con,"utf8"); 
    $pcname=$_POST['pc_name'];
	 $result = $_POST['check_res'];
	 echo "<br>".$result."<br>";
	$no=$_POST['no'];
	$man=$_POST['manual'];
	

	$result_q = mysqli_query($con, "UPDATE `advweb_result` SET `pc_".$man."`='$result' WHERE No='$no'");



	if($result === 'GOOD'){
		
		echo "change 'PC_".$man."' of (".$pcname.") result to 'good'";

	}
	elseif($result === 'BAD'){
		
		echo "change 'PC_".$man."' of (".$pcname.") result to 'bad'";
	}
?>