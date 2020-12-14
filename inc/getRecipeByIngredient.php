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
		
	include_once "config.php";
	$dbconn = new mysqli(SERVER_NAME,USERNAME,PASSWORD,DATABASE);
	if($dbconn->connect_error){
		die("Server connection error.");
	}
	
	
				
	
	if ($searchType == 0) {
		
		$stmt3 = $dbconn->prepare("SELECT COUNT(`recipe_id`) FROM `ff_recipes` WHERE `recipe_name` LIKE ? ");
		$param = '%'.$searchTerm.'%';
		
		$stmt3->bind_param("s",$param);
		$stmt3->execute();
		$stmt3->bind_result($count2);
		$stmt3->fetch();
		$stmt3->close();
		if ($count2>9) {
				$stmt3 = $dbconn->prepare("SELECT `api_id`,`recipe_name`,`recipe_image` FROM `ff_recipes` WHERE `recipe_name` LIKE ?  ");
				$param = '%'.$searchTerm.'%';
				
				$stmt3->bind_param("s",$param);
				$stmt3->execute();
				$stmt3->bind_result($api_id,$recipe_name,$recipe_image);
				while ($stmt3->fetch()) {
					$htmlToShow = $htmlToShow . '<div id='.$api_id.' class="row resultrow">'; 

					$htmlToShow = $htmlToShow . '<div class="col-lg-4">' . '<img src="' . $recipe_image . '"/>'. '</div>';
					$htmlToShow = $htmlToShow . '<div class="col-lg-4">' . $recipe_name . '</div>';
					

					$htmlToShow = $htmlToShow . '</div>'; 
					
				}										
				$stmt3->close();
				
				
			
			
		}
		
		else {
		
		
	
			//$apiLink = "https://api.spoonacular.com/recipes/complexSearch?apiKey=19b7bc50271f4b7f91e89b5aea652636&includeIngredients=${searchIngredient}&query=${searchMeal}";
			$apiLink = "https://api.spoonacular.com/recipes/complexSearch?apiKey=19b7bc50271f4b7f91e89b5aea652636&query=".$searchTerm."&instructionsRequired=true";
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
			//INSERT INTO `ff_recipes` (`recipe_id`, `api_id`, `recipe_name`, `recipe_ingredients`, `recipe_steps`, `recipe_image`, `recipe_addedby_fk`) 
			//VALUES (NULL, '646982', 'Meatless Eggs Benedict', '', '', 'https://spoonacular.com/recipeImages/646982-312x231.jpg', '8')
			
			//use for loop here
			for ($i=0;$i<count($json["results"]);$i++) {
				
				$num = (int)$json["results"][$i]["id"];

				$htmlToShow = $htmlToShow . '<div id='.$num.' class="row resultrow">'; 

				$htmlToShow = $htmlToShow . '<div class="col-lg-4">' . '<img src="' . $json["results"][$i]["image"] . '"/>'. '</div>';
				$htmlToShow = $htmlToShow . '<div class="col-lg-4">' . $json["results"][$i]["title"] . '</div>';
				//$htmlToShow = $htmlToShow . '<td>' . $json["results"][$i]["id"] . '</td>';

				$htmlToShow = $htmlToShow . '</div>'; 
				$stmt = $dbconn->prepare("SELECT COUNT(`recipe_id`) FROM `ff_recipes` WHERE `api_id` = ?");
				//$param = 632928;
				$stmt->bind_param("i",$num);
				$stmt->execute();
				$stmt->bind_result($count);
				$stmt->fetch();
				$stmt->close();
				if ($count==0) {
					$stmt2 = $dbconn->prepare("INSERT INTO `ff_recipes` (`recipe_id`, `api_id`, `recipe_name`, `recipe_ingredients`, `recipe_steps`, `recipe_image`, `recipe_addedby_fk`) VALUES (NULL, ?, ?, '', '', ?, '10')");
					$stmt2->bind_param("iss",$num,$json["results"][$i]["title"],$json["results"][$i]["image"]);
					$stmt2->execute();				
					$stmt2->close();
				}
				
				
				
				
				
				
				
			}
		}

		//$htmlToShow = $htmlToShow . '</tbody>';
		$dbconn->close();
		echo $htmlToShow;
	}
	
	if ($searchType == 1) {
		$stmt3 = $dbconn->prepare("SELECT COUNT(`recipe_id`) FROM `ff_recipes` WHERE `recipe_ingredients` LIKE ?");
		$param = '%'.$searchTerm.'%';
		
		$stmt3->bind_param("s",$param);
		$stmt3->execute();
		$stmt3->bind_result($count2);
		$stmt3->fetch();
		$stmt3->close();
		if ($count2>9) {
				$stmt3 = $dbconn->prepare("SELECT `api_id`,`recipe_name`,`recipe_image` FROM `ff_recipes` WHERE `recipe_ingredients` LIKE ?  ");
				$param = '%'.$searchTerm.'%';
				
				$stmt3->bind_param("s",$param);
				$stmt3->execute();
				$stmt3->bind_result($api_id,$recipe_name,$recipe_image);
				while ($stmt3->fetch()) {
					$htmlToShow = $htmlToShow . '<div id='.$api_id.' class="row resultrow">'; 

					$htmlToShow = $htmlToShow . '<div class="col-lg-4">' . '<img src="' . $recipe_image . '"/>'. '</div>';
					$htmlToShow = $htmlToShow . '<div class="col-lg-4">' . $recipe_name . '</div>';
					

					$htmlToShow = $htmlToShow . '</div>'; 
					
				}										
				$stmt3->close();
				
				
			
			
		}
		else {
			$apiLink = "https://api.spoonacular.com/recipes/complexSearch?apiKey=19b7bc50271f4b7f91e89b5aea652636&includeIngredients=".$searchTerm."&instructionsRequired=true";
			$data = file_get_contents($apiLink);
			$json = json_decode($data,true);

			

			//use for loop here
			for ($i=0;$i<count($json["results"]);$i++) {
				

				$htmlToShow = $htmlToShow . '<div id='.$json["results"][$i]["id"].' class="row resultrow">'; 

				$htmlToShow = $htmlToShow . '<div class="col-lg-4">' . '<img src="' . $json["results"][$i]["image"] . '"/>'. '</div>';
				$htmlToShow = $htmlToShow . '<div class="col-lg-4">' . $json["results"][$i]["title"] . '</div>';
				//$htmlToShow = $htmlToShow . '<td>' . $json["results"][$i]["id"] . '</td>';

				$htmlToShow = $htmlToShow . '</div>'; 
			}
		}

		
		$dbconn->close();
		echo $htmlToShow;
		
	}
	
	
		
		
	
	
	
	?>
	