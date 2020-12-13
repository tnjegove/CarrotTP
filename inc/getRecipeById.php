<!-- 2nd Post request to public API / Darragh O'Brien -->

<?php
	$searchRecipeId=$_POST['searchRecipeId'];
	$apiLink = "https://api.spoonacular.com/recipes/${searchRecipeId}/analyzedInstructions?apiKey=19b7bc50271f4b7f91e89b5aea652636";
	$data = file_get_contents($apiLink);
	
	$json_array = json_decode($data,true);

	$htmlToShow = '<div class="row container">
		
			<div class="col-lg-4">Number</div>
			<div class="col-lg-4">Step</div>
			<div class="col-lg-4">Igredient(s)</div>
		
	</div>';

	//$htmlToShow = $htmlToShow . '<tbody>';

	foreach($json_array as $receipe){
		$steps = $receipe['steps'];

		foreach($steps as $innersteps){

			$htmlToShow = $htmlToShow . '<div class="row container">'; 

			$htmlToShow = $htmlToShow . '<div class="col-lg-4">' . $innersteps['number'] .'</div>'; //steps.number
			$htmlToShow = $htmlToShow . '<div class="col-lg-4">' . $innersteps['step'] .'</div>'; //steps.number


			$ingredients = $innersteps['ingredients'];

			$htmlToShow = $htmlToShow . '<div class="col-lg-4">';
				foreach($ingredients as $smt){
					$htmlToShow = $htmlToShow . $smt['name'] . ',';
				}	
			$htmlToShow = $htmlToShow . '</div>';

			$htmlToShow = $htmlToShow . '</div>'; 
			
		}
	
	}
	$htmlToShow = $htmlToShow . '<div class="row container">'; 
	$htmlToShow = $htmlToShow . '<button class="btn_gobacktolist btn btn-outline-success my-2 my-sm-0" type="button">Go back</button>'; 
	$htmlToShow = $htmlToShow . '</div>'; 
	//$htmlToShow = $htmlToShow . '</tbody>';
	echo $htmlToShow;
?>
	