$(function(){
	$("#start_province").change(function(){
		$.post('/drd/show_city.php',{'type':'is_drd_price','name':$(this).val()},function(data){
			$("#start_city").html(data);		
		})
	})
	
	$("#end_province").change(function(){
		$.post('/drd/show_city.php',{'type':'is_drd_price','name':$(this).val()},function(data){
			$("#end_city").html(data);		
		})
	})
	$("#cx").click(function(){
		$.post(
				'show_price.php',
				{'start_province':$('#start_province').val(),
				 'end_province':$('#end_province').val(),
				 'start_city':$('#start_city').val(),
				 'end_city':$('#end_city').val()},
				 function(data){
				 	$("#main").html(data);
				 }
			   )
	})
})