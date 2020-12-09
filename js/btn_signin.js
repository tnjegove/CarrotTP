$("#loginWindow").hide();
$("#registerWindow").hide();
$(document).ready(function(){
	$("#btn_signin").click(function(){
		if ($("#registerWindow").is(':visible')) {
			$("#registerWindow").hide();
		}
		$("#loginWindow").slideToggle(300, function() {
			if ($(this).is(':visible'))
				$(this).css('display','flex');
			
			
		});
		
		
		
	});
	
	$("#btn_register").click(function() {
		if ($("#loginWindow").is(':visible')) {
			$("#loginWindow").hide();
		}
		$("#registerWindow").slideToggle(300, function() {
			if ($(this).is(':visible'))
				$(this).css('display','flex');
			
			
		});
		
		
	});
	
	
	
	// Meal and ingredient button
	
	$("#btn_searchRecipeNameAndIngredient").click(function() {

		var $searchMeal = $('#searchMeal');
		var $searchIngredient = $('#searchIngredient');

		$.ajax({
			type: 'POST',
			url: 'inc/getRecipeByIngredient.php',
			data: {
				searchMeal: $searchMeal.val(),
				searchIngredient: $searchIngredient.val(),
			},
			success: function(results){
				alert('The package has been posted:'+results);
				var select1 = document.getElementById('results.image');
				var select1 = document.getElementById('results.title');
				var select1 = document.getElementById('results.id');
				$(select1).html('');
				$(select2).html('');
				$(select3).html('');
				for (var i in results) {
					$(select).append('<option value=' + data[i] + '>' + data[i] + '</option>'); // for every index create HTML as follows and append to #routes	
				}
			},
			error: function(){
				alert('The package has not been posted');
			}
		});
	});

	/*
	$("#btn_searchRecipeNameAndIngredient").click(function() {
		
		let searchMeal = $("#searchMeal").val();
		let searchIngredient = $("#searchIngredient").val();
		
		$.ajax({
			type: "GET",
			url: `https://api.spoonacular.com/recipes/complexSearch?apiKey=19b7bc50271f4b7f91e89b5aea652636&includeIngredients=${searchIngredient}&query=${searchMeal}`,
			headers: {
				'Content-Type': 'application/json'
			}
		}).done(function(data) {				  
			$('#totalResults').text(data.totalResults);
			$('#listResults tbody').html('');
			$(data.results).each(function(index, recipe){
				let tableRow = `<tr><td><img src=\"${recipe.image}\" /></td><td>${recipe.title}</td><td>Recipe ID,  (${recipe.id})</td></tr>`;
				$('#listResults tbody').append(tableRow);
			});
		});
	});
	*/
	
	// Recipe button
	
	$("#btn_searchRecipeId").click(function() {
		
		var searchRecipeId = $("#searchRecipeId").val();
		
		$.ajax({
			type: "GET",
			url: `https://api.spoonacular.com/recipes/${searchRecipeId}/analyzedInstructions?apiKey=19b7bc50271f4b7f91e89b5aea652636`,
			headers: {
				'Content-Type': 'application/json'
			}	
		}).done(function(data) {
			$(data).each(function(index, recipe){
				$(recipe.steps).each(function(index, step){
					let tableRow = `<tr><td>${step.number}</td><td>${step.step}</td><tr>`;
					$('#listRecipe tbody').append(tableRow);
				});
			});
		});
	});
});