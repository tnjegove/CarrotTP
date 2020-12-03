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
	
	
	
	
	
	$("#btn_search-recipes").click(function() {
		var var_ingredients = $("#search-input").val();
		//alert(var_ingredients);
		$.ajax({
			type: "POST",
			url: "inc/getRecipeByIngredient.php",
			data: {ingredients: var_ingredients},
			dataType: "text",
			success: function(data) {
				alert("Success:"+data);
				
			},
			
			error: function(xhr, status, error){
				var errorMessage = xhr.status + ': ' + xhr.statusText
				alert('Error - ' + errorMessage);
			}

			
		});
		
	});
	
});