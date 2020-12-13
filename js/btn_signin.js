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
	
	
	
	// Meal and Ingredient Button / Darragh O'Brien 
	
	$("#btn_searchRecipeNameAndIngredient").click(function() {
		
		if ($('#radio-meal-name').is(':checked')) var searchType = 0;
		if ($('#radio-ingredient-name').is(':checked')) var searchType = 1;
		if ($('#radio-recipe-id').is(':checked')) var searchType = 2;
		var searchTerm = $('#searchMeal').val();
		$.ajax ({
			type: 'POST',
			url: 'inc/getRecipeByIngredient.php',
			data: {
				searchTerm: searchTerm,
				searchType: searchType
			},
			success: function(results){
				
				$('#listResults2').html("");
				$('#listResults').html(results);
			},
			error: function(){
				alert('Something has gone wrong');
			}
			
		});
		
		

		/*var $searchMeal = $('#searchMeal');
		var $searchIngredient = $('#searchIngredient');

		$.ajax({
			type: 'POST',
			url: 'inc/getRecipeByIngredient.php',
			data: {
				searchMeal: $searchMeal.val(),
				searchIngredient: $searchIngredient.val(),
			},
			success: function(results){
				$('#listResults2').html("");
				$('#listResults').html(results);
			},
			error: function(){
				alert('Something has gone wrong');
			}
		});*/
	});
	
	// RecipeId button / Darragh O'Brien 
	
	$("#btn_searchRecipeId").click(function() {

		var $searchRecipeId = $('#searchRecipeId');

		$.ajax({
			type: 'POST',
			url: 'inc/getRecipeById.php',
			data: {
				searchRecipeId: $searchRecipeId.val(),
			},
			success: function(results){
				$('#listResults').html("");
				$('#listResults2').html(results);
			},
			error: function(){
				alert('Something has gone wrong');
			}
		});
	});



	$("#btn_write-recipe").on("click",function() {
		$.ajax({
			type: "GET",
			url: "inc/writerecipetemplate.php",
			
			dataType: "html",
			success: function(data) {
				$("#results").html("");
				$("#results").append(data);
				
				
			},
			
			error: function(xhr, status, error){
				var errorMessage = xhr.status + ': ' + xhr.statusText
				alert('Error - ' + errorMessage);
			}

			
		});
	});
		
		
	$("#results").on("click",".btn-rsubmit",function() {
		
		var recipe_name = $("#recipe-name").val();
		var recipe_ingredients = $("#recipe-ingredients").val();
		var recipe_steps = $("#recipe-steps").val();
		var recipe_image = $("#recipe-image").val();
		
		$.ajax({
			type: "POST",
			url: "inc/submitrecipe.php",
			data: {rname:recipe_name,ringredients:recipe_ingredients,rsteps:recipe_steps,rimage:recipe_image},
			dataType: "text",
			success: function(data) {
				$("#recipe-steps").val("");
				$("#recipe-ingredients").val("");
				$("#recipe-name").val("");
				$("#recipe-image").val("");
				
				alert(data);
				
				
			},
			
			error: function(xhr, status, error){
				var errorMessage = xhr.status + ': ' + xhr.statusText
				alert('Error - ' + errorMessage);
			}

			
		});
		
		
	});
	
});