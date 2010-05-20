$(function(){
	$("#start_province").change(function(){
		$.post('/drd/show_city.php',{'type':'is_company','name':$(this).val()},function(data){
			$("#start_city").html(data);		
		})
	})
})