$(function(){
	$("#ydcx").click(function(){
		if($("#yd_info").val()!=''){
			$.post('show_yd.php',{'ydh':$("#yd_info").val(),'dkh':$('#dkh_login').val()},function(data){
				if(data.indexOf('找不到相关记录')>0){
					alert('未找到您要查询的运单记录，请重新输入！');
				}
				$("#result").html(data);
				parent.resize_iframe();
			});
		}else{
			alert("请输入运单号！");
		}
	});
	
	$("#hhcx").click(function(){
		//alert('ok');
		//return;
		if($("#hy_info1").val()!='' && $("#hy_date").val()!=''){
			$.post('show_yd.php',{'hh':$("#hy_info1").val(),'cdate':$("#hy_date").val(),'dkh':$('#dkh_login').val()},function(data){
				if(data.indexOf('找不到相关记录')>0){
					alert('未找到您要查询的运单记录，请重新输入！');
				}
				$("#result").html(data);
				parent.resize_iframe();
			});
		}else{
			alert("请输入运单号！");
		}
	});
	
	
	
})
