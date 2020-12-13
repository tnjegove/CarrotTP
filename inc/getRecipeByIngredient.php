<!-- 1st Post request to public API / Darragh O'Brien -->

<?php
	$searchType=$_POST['searchType'];
	$searchTerm=$_POST['searchTerm'];
	$htmlToShow = '
			<div class="row">
				<div class="col-lg-4">Image</div>
				<div class="col-lg-4">Title</div>
				
			
			</div>
		
		';
	
	if ($searchType == 0) {
	
		//$apiLink = "https://api.spoonacular.com/recipes/complexSearch?apiKey=19b7bc50271f4b7f91e89b5aea652636&includeIngredients=${searchIngredient}&query=${searchMeal}";
		$apiLink = "https://api.spoonacular.com/recipes/complexSearch?apiKey=19b7bc50271f4b7f91e89b5aea652636&query=".$searchTerm;
		$data = file_get_contents($apiLink);
		$json = json_decode($data,true);

		/*$htmlToShow = "<thead>
		<tr>
			<th>Image</th>
			<th>Title</th>
			<th>Recipe Id</th>
		<tr>
		</thead>";
		$htmlToShow = $htmlToShow . '<tbody>';*/
		

		//use for loop here
		for ($i=0;$i<count($json["results"]);$i++) {

			$htmlToShow = $htmlToShow . '<div id='.$json["results"][$i]["id"].' class="row">'; 

			$htmlToShow = $htmlToShow . '<div class="col-lg-4">' . '<img src="' . $json["results"][$i]["image"] . '"/>'. '</div>';
			$htmlToShow = $htmlToShow . '<div class="col-lg-4">' . $json["results"][$i]["title"] . '</div>';
			//$htmlToShow = $htmlToShow . '<td>' . $json["results"][$i]["id"] . '</td>';

			$htmlToShow = $htmlToShow . '</div>'; 
		}

		//$htmlToShow = $htmlToShow . '</tbody>';

		echo $htmlToShow;
	}
	
	if ($searchType == 1) {
		$apiLink = "https://api.spoonacular.com/recipes/complexSearch?apiKey=19b7bc50271f4b7f91e89b5aea652636&includeIngredients=".$searchTerm;
		$data = file_get_contents($apiLink);
		$json = json_decode($data,true);

		

		//use for loop here
		for ($i=0;$i<count($json["results"]);$i++) {

			$htmlToShow = $htmlToShow . '<div id='.$json["results"][$i]["id"].' class="row">'; 

			$htmlToShow = $htmlToShow . '<div class="col-lg-4">' . '<img src="' . $json["results"][$i]["image"] . '"/>'. '</div>';
			$htmlToShow = $htmlToShow . '<div class="col-lg-4">' . $json["results"][$i]["title"] . '</div>';
			//$htmlToShow = $htmlToShow . '<td>' . $json["results"][$i]["id"] . '</td>';

			$htmlToShow = $htmlToShow . '</div>'; 
		}

		

		echo $htmlToShow;
		
	}
	
	
		
		
	
	
	
	?>
	