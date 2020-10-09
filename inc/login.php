<?php

	if(!isset($_POST['login'])||!isset($_POST['user_pass'])){
		die("Error:".var_dump($_POST));
	}

	session_start();
	include_once "config.php";
	$conn = new mysqli(SERVER_NAME,USERNAME,PASSWORD,DATABASE);

	if($conn->connect_error){
		die("Connection failed:".$conn->connect_error);
	}

	$stmt = $conn->prepare("SELECT `ID`,`user_name`,`user_pass` FROM `ff_users` WHERE `user_name` = ?");
	$stmt->bind_param("s",$_POST['login']);
	$stmt->execute();
	$stmt->bind_result($id,$name,$password);
	$stmt->fetch();
	
	
	if(password_verify($_POST['user_pass'],$password)){
		$_SESSION['id'] = $id;
		$_SESSION['login'] = $name;
		header("Location: ../index.php");
	}
	else{
		header("Location: ../index.php");
	}
	
	

	$conn->close();