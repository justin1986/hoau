$(function(){
	$("#button").live('click',function(){
		var html = $("#left").html();
		var name = $("#name").val();
		var password = $("#password").val();
		$("#left").html('<tr><td><br>登录中。。。</td></tr>');
		$.post('login.php',{'name':name,'password':password},function(data){
			if(data=='wrong'){
				alert('用户名或密码错误，请重新输入');
				$("#left").html(html)
			}else{
				$("#left").html(data);
			}
		});
	});
	
	$("#reset").live('click',function(){
		$("#queryId").attr('value','');
	});
	
	$("#search").live('click',function(){
		$("#search_box").html('<tr><td><br>查询中。。。</td></tr>');
		var type;
		if($("#RadioButton1").attr('checked')){
			type = 'yd';
		}else{
			type = 'dd';
		}
		$.post('search.php',{'type':type,'order':encodeURI($("#queryId").val())},function(data){
			$("#search_box").html(data);
		});
	});
	
	$("#logout").live('click',function(){
		$.post('logout.php',function(){
			window.location.reload();
		});
	});
});