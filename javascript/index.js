/**
 * @author Loong
 */
$(function(){
		$('#flash_pop').css('left',$('#flash').offset().left + 40);
	
	$('#pop_title1').css('left',$('#flash').offset().left + 40);
	$('#pop_title1').css('top',$('#flash_pop').offset().top);
	
	$('#p_left1').css('top',$('#flash_pop').offset().top);
	$('#p_left1').css('left',$('#flash').offset().left+40);
	
	$('#p_right1').css('top',$('#flash_pop').offset().top);
	$('#p_right1').css('left',$('#flash').offset().left+52);
	
	$('#pop_label1').css('left',$('#flash').offset().left + 40);
	$('#pop_label1').css('top',$('#flash_pop').offset().top + 25);
	
	$("#pop_text").css('top',$('#pop_label1').offset().top+25);
	$("#pop_text").css('left',$('#flash').offset().left+40);
	
	$("#hwgz_submit").css('top',$('#pop_text').offset().top+65);
	$("#hwgz_submit").css('left',$('#flash').offset().left+180);
	
	$('#p_left2').css('top',$('#flash_pop').offset().top+140);
	$('#p_left2').css('left',$('#flash_pop').offset().left);
	
	$('#p_right2').css('top',$('#flash_pop').offset().top+140);
	$('#p_right2').css('left',$('#flash_pop').offset().left+12);
	
	$('#p_select1').css('top',$('#p_right2').offset().top+30);
	$('#p_select1').css('left',$('#flash_pop').offset().left+22);
	
	$('#p_select2').css('top',$('#p_right2').offset().top+30);
	$('#p_select2').css('left',$('#flash_pop').offset().left+122);
	
	$('#pop_label2').css('left',$('#flash').offset().left + 40);
	$('#pop_label2').css('top',$('#p_select1').offset().top + 30);
	
	$("#pop_text2").css('top',$('#p_select1').offset().top+50);
	$("#pop_text2").css('left',$('#flash').offset().left+40);
	
	$("#hwgz_submit2").css('top',$('#pop_text2').offset().top+65);
	$("#hwgz_submit2").css('left',$('#flash').offset().left+188);
	
	$('#hwgz_submit').click(function(){
		if($('#hwbh').val() == ''){
			alert('请输入货物编号');	
		}else{
			window.location.href ="/khfw/?load=/drd/drd2.bak.php&hwbh=" + encodeURI($('#hwbh').val());
		}
	});
	
	$("#hwbh").keydown(function(e){
		if(e.keyCode == 13){
			if($('#hwbh').val() == ''){
				alert('请输入货物编号');	
			}else{
				window.location.href ="/khfw/?load=/drd/drd2.bak.php&hwbh=" + encodeURI($('#hwbh').val());
			}
		}
	});
	
	$(".index_wd").click(function(){
		var url = "/khfw/?load=/khfw/khfw1.php";
		url = url+"?wdbh=" + encodeURI($(this).attr('id'));
		window.location.href = url;
	})
	
	
	$('#hwgz_submit2').click(function(){
			var url = "/khfw/?load=/khfw/khfw1.php";
			if($('#province').val()!=''){
				url = url+"&province=" + encodeURI($('#province').val());
			}
			if($('#city').val()!=''){
				url = url+"&city=" + encodeURI($('#city').val());
			}
			if($('#hwbh2').val()!=''){
				url = url+"&wdbh=" + encodeURI($('#hwbh2').val());
			}
			window.location.href = url;
	})
	
	$("#hwbh2").keydown(function(e){
		if(e.keyCode == 13){
			var url = "/khfw/?load=/khfw/khfw1.php";
			if($('#province').val()!=''){
				url = url+"&province=" + encodeURI($('#province').val());
			}
			if($('#city').val()!=''){
				url = url+"&city=" + encodeURI($('#city').val());
			}
			if($('#hwbh2').val()!=''){
				url = url+"&wdbh=" + encodeURI($('#hwbh2').val());
			}
			window.location.href = url;
		}
	});
	
	$("#province").change(function(){
		$.post('/branch/show_index_city.php',{'p_id':$(this).val()},function(data){
			$("#city").html(data);		
		})
	})
	
	$('#index_close').click(function(){
		$('.index_pop').hide();
	});
	
});

function resize(){
	$('#flash_pop').css('left',$('#flash').offset().left + 40);
	
	$('#pop_title1').css('left',$('#flash').offset().left + 40);
	$('#pop_title1').css('top',$('#flash_pop').offset().top);
	
	$('#p_left1').css('top',$('#flash_pop').offset().top);
	$('#p_left1').css('left',$('#flash').offset().left+40);
	
	$('#p_right1').css('top',$('#flash_pop').offset().top);
	$('#p_right1').css('left',$('#flash').offset().left+52);
	
	$('#pop_label1').css('left',$('#flash').offset().left + 40);
	$('#pop_label1').css('top',$('#flash_pop').offset().top + 25);
	
	$("#pop_text").css('top',$('#pop_label1').offset().top+25);
	$("#pop_text").css('left',$('#flash').offset().left+40);
	
	$("#hwgz_submit").css('top',$('#pop_text').offset().top+65);
	$("#hwgz_submit").css('left',$('#flash').offset().left+180);
	
	$('#p_left2').css('top',$('#flash_pop').offset().top+140);
	$('#p_left2').css('left',$('#flash_pop').offset().left);
	
	$('#p_right2').css('top',$('#flash_pop').offset().top+140);
	$('#p_right2').css('left',$('#flash_pop').offset().left+12);
	
	$('#p_select1').css('top',$('#p_right2').offset().top+30);
	$('#p_select1').css('left',$('#flash_pop').offset().left+22);
	
	$('#p_select2').css('top',$('#p_right2').offset().top+30);
	$('#p_select2').css('left',$('#flash_pop').offset().left+122);
	
	$('#pop_label2').css('left',$('#flash').offset().left + 40);
	$('#pop_label2').css('top',$('#p_select1').offset().top + 30);
	
	$("#pop_text2").css('top',$('#p_select1').offset().top+50);
	$("#pop_text2").css('left',$('#flash').offset().left+40);
	
	$("#hwgz_submit2").css('top',$('#pop_text2').offset().top+65);
	$("#hwgz_submit2").css('left',$('#flash').offset().left+188);
}


