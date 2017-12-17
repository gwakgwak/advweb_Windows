<?php
$server = 'localhost';
$username = 'wlstjd8445';
$password = 'wjdgjswlswn1!';
$database = 'wlstjd8445';
try{
	$conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
} catch(PDOException $e){
	die( "Connection failed: " . $e->getMessage());
}