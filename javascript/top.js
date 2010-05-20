$(function(){
	$('.menu_dom').hover(function(){
		var left = $('#2').offset().left;
		
		$('#menu_box').css('left',left);
		
		$(".menu_a1").show();
		$(".menu_a2").hide();
		$(this).children().hide();
		$(this).children().next().show();
		if($(this).attr('id')!='1'&&$(this).attr('id')!='9'){
			$("#menu_box").show();
			$(".mb").hide();
			$("#mb"+$(this).attr('id')).show();
		}else{
			$("#menu_box").hide();
			$(".mb").hide();
		}
		//var right = $('#menu_box').offset().left + $('#menu_box').css('width');
		//alert(right);
		
	})
	/*
	$("#menu_list").mouseleave(function(){
		if($("#menu_box").css('display')=='none'){
			$(".menu_a1").show();
			$(".menu_a2").hide();
		}
	})
	
	*/
	$("#menu_box").mouseleave(function(){
		$(".menu_a1").show();
		$(".menu_a2").hide();
		$("#menu_box").hide();
		$(".mb").hide();
	});
   $('#admin_login_a1,admin_login_a2').click(function(e){
   		e.preventDefault();
   })
	
	$("#1").mouseleave(function(){
		$(".menu_a1").show();
		$(".menu_a2").hide();
		$("#menu_box").hide();
		$(".mb").hide();
	})
	$("#9").mouseleave(function(){
		$(".menu_a1").show();
		$(".menu_a2").hide();
		$("#menu_box").hide();
		$(".mb").hide();
	})
	$('.menu_dom').mouseleave(function(e){
		if(e.pageY < 100){
			$(".menu_a1").show();
			$(".menu_a2").hide();
			$("#menu_box").hide();
			$(".mb").hide();
		};
	});
})

