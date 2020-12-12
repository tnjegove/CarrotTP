<!-- 1st Post request to public API / Darragh O'Brien -->

<?php
	$searchMeal=$_POST['searchMeal'];
	$searchIngredient=$_POST['searchIngredient'];
	$apiLink = "https://api.spoonacular.com/recipes/complexSearch?apiKey=19b7bc50271f4b7f91e89b5aea652636&includeIngredients=${searchIngredient}&query=${searchMeal}";
	$data = file_get_contents($apiLink);
	$json = json_decode($data,true);

	$htmlToShow = "<thead>
	<tr>
		<th>Image</th>
		<th>Title</th>
		<th>Recipe Id</th>
	<tr>
	</thead>";
	$htmlToShow = $htmlToShow . '<tbody>';

	//use for loop here
	for ($i=0;$i<count($json["results"]);$i++) {

		$htmlToShow = $htmlToShow . '<tr>'; 

		$htmlToShow = $htmlToShow . '<td>' . '<img src="' . $json["results"][$i]["image"] . '"/>'. '</td>';
		$htmlToShow = $htmlToShow . '<td>' . $json["results"][$i]["title"] . '</td>';
		$htmlToShow = $htmlToShow . '<td>' . $json["results"][$i]["id"] . '</td>';

		$htmlToShow = $htmlToShow . '</tr>'; 
	}

	$htmlToShow = $htmlToShow . '</tbody>';

	echo $htmlToShow;
?>
	