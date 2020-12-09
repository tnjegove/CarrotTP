<?php
	session_start();
	
	$recipe_name = $_POST["rname"];
	$recipe_ingredients = $_POST["ringredients"];
	$recipe_steps = $_POST["rsteps"];
	$recipe_image = $_POST["rimage"];
	if (!isset($_SESSION["id"])) echo "You have to be signed in to submit a recipe";
	else {
		include_once "config.php";
		$dbconn = new mysqli(SERVER_NAME,USERNAME,PASSWORD,DATABASE);
		if($dbconn->connect_error){
			die("Database connection failed. ".$dbconn->connect_error);	
		}
		
		$prepStat = $dbconn->prepare("INSERT INTO `ff_recipes` (`recipe_id`, `api_id`, `recipe_name`, `recipe_ingredients`, `recipe_steps`, 
	`recipe_image`, `recipe_addedby_fk`) VALUES 
	(NULL, NULL, ?, ?, ?, ?, ?)");
		$prepStat->bind_param("sssss",$recipe_name,$recipe_ingredients,$recipe_steps,$recipe_image,$_SESSION["id"]);
		$prepStat->execute();
		$dbconn->close();
		
		echo "recipe added:".$recipe_name."+".$recipe_ingredients."+".$recipe_steps.$_SESSION["id"];
	}
	
	
	