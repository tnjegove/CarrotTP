<!-- 2nd Post request to public API / Darragh O'Brien -->

<?php
	$searchRecipeId=$_POST['searchRecipeId'];
	$apiLink = "https://api.spoonacular.com/recipes/${searchRecipeId}/analyzedInstructions?apiKey=19b7bc50271f4b7f91e89b5aea652636";
	$data = file_get_contents($apiLink);
	
	$json_array = json_decode($data,true);

	$htmlToShow = "<thead>
		<tr>
			<th>Number</th>
			<th>Step</th>
			<th>Igredient(s)</th>
		<tr>
	</thead>";

	$htmlToShow = $htmlToShow . '<tbody>';

	foreach($json_array as $receipe){
		$steps = $receipe['steps'];

		foreach($steps as $innersteps){

			$htmlToShow = $htmlToShow . '<tr>'; 

			$htmlToShow = $htmlToShow . '<td>' . $innersteps['number'] .'</td>'; //steps.number
			$htmlToShow = $htmlToShow . '<td>' . $innersteps['step'] .'</td>'; //steps.number


			$ingredients = $innersteps['ingredients'];

			$htmlToShow = $htmlToShow . '<td>';
				foreach($ingredients as $smt){
					$htmlToShow = $htmlToShow . $smt['name'] . ',';
				}	
			$htmlToShow = $htmlToShow . '</td>';

			$htmlToShow = $htmlToShow . '</tr>'; 
		}
	
	}
	
	$htmlToShow = $htmlToShow . '</tbody>';
	echo $htmlToShow;
?>
	