$("#loginWindow").hide();
$(document).ready(function(){
	$("#btn_signin").click(function(){
		$("#loginWindow").slideToggle(300, function() {
			if ($(this).is(':visible'))
				$(this).css('display','flex');
			
			
		});
		
		
		
	});
	
});