<?php
	$searchMeal=$_POST['searchMeal'];
	$searchIngredient=$_POST['searchIngredient'];
	$apiLink = "https://api.spoonacular.com/recipes/complexSearch?apiKey=19b7bc50271f4b7f91e89b5aea652636&includeIngredients=${searchIngredient}&query=${searchMeal}";
	$data = file_get_contents($apiLink);
	$json = json_decode($data,true);
	$result_array = array();
	for ($i=0;$i<count($json["results"]);$i++) {
		$result_array[$i][0]=$json["results"][$i]["image"];
		$result_array[$i][1]=$json["results"][$i]["title"];
		$result_array[$i][2]=$json["results"][$i]["id"];
	}

	for ($i=0;$i<count($json["results"]);$i++) {
		echo ''.$result_array[$i][0].''.$result_array[$i][1].''.$result_array[$i][2].'';
		echo '<div class="row">

		</div>'
	}	
?>
	