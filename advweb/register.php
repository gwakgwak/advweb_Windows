<?php
session_start();
if( isset($_SESSION['user_id']) ){
	header("Location: /advweb/index.php");
}
require 'database.php';
$message = '';
if(!empty($_POST['user_name']) && !empty($_POST['user_pw'])):
	
	// Enter the new user in the database
	$sql = "INSERT INTO adweb_user (user_id, user_name, user_pw, user_belong) VALUES (:user_id,:user_name, :user_pw, :user_belong)";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':user_id', $_POST['user_id']);
	$stmt->bindParam(':user_name', $_POST['user_name']);
	// $stmt->bindParam(':user_pw', $_POST['user_pw']);
	$stmt->bindParam(':user_belong', $_POST['user_belong']);

	$stmt->bindParam(':user_pw', password_hash($_POST['user_pw'], PASSWORD_BCRYPT));
	if( $stmt->execute() ):
		$message = 'Successfully created new user';
	else:
		$message = 'Sorry there must have been an issue creating your account';
	endif;
endif;
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Register Below</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link href='http://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet' type='text/css'>
</head>
<body>

	<div class="header">
		<a href="/">Your App Name</a>
	</div>

	<?php if(!empty($message)): ?>
		<p><?= $message ?></p>
	<?php endif; ?>

	<h1>Register</h1>
	<span>or <a href="login1.php">login here</a></span>

	<form action="register.php" method="POST">
		<input type="text" placeholder="Enter your id" name="user_id">
		<input type="text" placeholder="Enter your name" name="user_name">
		<input type="password" placeholder="and password" name="user_pw">
		<input type="password" placeholder="confirm password" name="confirm_password">
		<input type="text" placeholder="Enter your school/company" name="user_belong">
		<input type="submit">

	</form>

</body>
</html>