<?php
	$selected_ingredients=$_POST['ingredients'];
	$apiLink = "https://api.spoonacular.com/recipes/findByIngredients?apiKey=5132291ec6df4d7a861867bdb9e3d62a&ingredients=".$selected_ingredients."&number=5";
	$data = file_get_contents($apiLink);
	echo $apiLink;
	