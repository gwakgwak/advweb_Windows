<?php
session_start();
if( isset($_SESSION['user_id']) ){
	header("Location: /advweb/index.php");
}
require 'database.php';
if(!empty($_POST['user_id']) && !empty($_POST['user_pw'])):
	
	$records = $conn->prepare('SELECT user_id, user_name, user_pw FROM adweb_user WHERE user_id = :user_id');
	$records->bindParam(':user_id', $_POST['user_id']);
	$records->execute();
	$results = $records->fetch(PDO::FETCH_ASSOC);
	$message = '';
	echo $_POST['user_pw']." : ".$results['user_pw']; 
	echo $_POST['user_pw']." : ".$results['user_pw']; 

	echo (password_verify($_POST['user_pw'], $results['user_pw']." : as"));

	if(count($results) > 0 && password_verify($_POST['user_pw'], $results['user_pw']) ){
		echo "asdfsdafsd";
		$_SESSION['user_id'] = $results['user_id'];
		header("Location: /advweb/main.php");
	} else {
		$message = 'Sorry, those credentials do not match';
	}
endif;
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Windows PC 취약점 진단</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="css/style.css" />
    </head>
    <div class="body1"></div>
    <div class="grad1"></div>
    <div class="header1">
        <div>Windows<br><span>취약점 진단</span></div>
    </div>
    <br>
    <div class="login">
        
    
    <form name="login" action="login1.php" method="post">
      <input type="text" placeholder="username" name="user_id"><br>
      <input type="password" placeholder="password" name="user_pw"><br>

      <input type="submit" value="login"/>
      <input type="reset" value="cancle"/>
      <a href="register.php">Register</a>
  </form></div>


</body>
</html>