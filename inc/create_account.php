<?php
if(!isset($_POST['login'])||!isset($_POST['user_pass'])){
	die("Data error");
}


include_once "config.php";

$conn = new mysqli(SERVER_NAME,USERNAME,PASSWORD,DATABASE);
if($conn->connect_error){
	die("Connection failed: ".$conn->connect_error);
}

$username = $_POST['login'];

$stmt = $conn->prepare("SELECT count(*) FROM `ff_users` WHERE `user_name` = ?");
$stmt->bind_param("s",$username);
$stmt->execute();
$stmt->bind_result($count);
$stmt->fetch();
if($count>0){
	die("Error, username already exists.");
}
$stmt->close();


$password = password_hash($_POST['user_pass'],PASSWORD_BCRYPT);


$stmt2 = $conn->prepare("INSERT INTO `ff_users` (`user_name`,`user_pass`) VALUES (?,?)");
echo $conn->connect_error;
var_dump($stmt2);
$stmt2->bind_param("ss",$username,$password);
$stmt2->execute();

$conn->close();
header("Location: ../index.php");