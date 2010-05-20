

$(function(){
	$("#chang_pic").click(function(){
		$("#pic").attr('src','yz.php?reload='+Math.round(Math.random()*10000));
	});
	
	$("#cxtj").click(function(){
		window.location.href='?type='+$("#type").val()+'&date='+$("#date").val()+'&status='+$("#status").val()+'&key='+encodeURI($("#key").val());
	});
	
	$("#key").keypress(function(event){
		if (event.keyCode == 13) {
			window.location.href='?type='+$("#type").val()+'&date='+$("#date").val()+'&status='+$("#status").val()+'&key='+encodeURI($("#key").val());
		}
	});
	
	$("#date").datepicker(
	{
		changeMonth: true,
		changeYear: true,
		monthNamesShort:['1月','2月','3月','4月','5月','6月','7月','8月','9月','10月','11月','12月'],
		dayNames:["星期日","星期一","星期二","星期三","星期四","星期五","星期六"],
		dayNamesMin:["日","一","二","三","四","五","六"],
		dayNamesShort:["星期日","星期一","星期二","星期三","星期四","星期五","星期六"],
		dateFormat: 'yy-mm-dd'
	});
	
	
	
	$("#tijiao").click(function(){
		if($("#zt").val()==''){
			alert('请输入主题！');
			$("#zt").focus();
			return false;
		}else{
			if($("#zt").val().length>50){
				alert('主题太长');
				return false;
			}
		}
		if($("#lylx").val()==3||$("#ydh").val()!=''){
			if($("#ydh").val()==''){
				alert('请输入运单号！');
				$("#ydh").focus();
				return false;
			}else{
				if(isNaN($("#ydh").val())||$("#ydh").val().length!=8){
					alert("运单号必须是8位数字！");
					$("#ydh").focus();
					return false;
				}
			}
		}
		
		if($("#xm").val()==''){
			alert('请输入姓名！');
			$("#xm").focus();
			return false;
		}else{
			if($("#xm").val().length>10){
				alert('姓名太长');
				return false;
			}
		}
		if($("#dh").val()==''){
			alert('请输入电话！');
			$("#dh").focus();
			return false;
		}else{
			if($("#dh").val().length>20){
				alert('电话太长');
				return false;
			}
		}
		if($("#dzyj").val()==''){
			alert('请输入电子邮件！');
			$("#dzyj").focus();
			return false;
		}else{
			if(!isEmail($("#dzyj").val())){
				alert('请注意邮件格式！');
				$("#dzyj").focus();
				return false;
			}else{
				if($("#dzyj").val().length>40){
					alert('电子邮件太长');
					return false;
				}
			}
		}
		if($("#ly").val()==''){
			alert('请输入留言内容！');
			$("#ly").focus();
			return false;
		}else{
			if($("#ly").val().length>500){
				alert('留言内容太长');
				return false;
			}
		}
		if ($("#lylx").val() == 3) {
			$.post('test_comment.php', {
				'ydh': $("#ydh").val()
			}, function(data){
				if (data == 'ok') {
					alert('同一个运单号每天只能提交一遍！');
					$("#ydh").focus();
					return false;
				}
				else {
					$.post('check_yz.php', {
						'yz': $("#yz").val()
					}, function(date){
						if (date == 'ok') {
							$('#com_form').submit();
						}
						else {
							$("#pic").attr('src','yz.php?reload='+Math.round(Math.random()*10000));
							alert('验证码错误，请重新输入！');
							$("#yz").focus();
							return false;
						}
					});
				}
			});
		}else{
			$.post('check_yz.php', {
				'yz': $("#yz").val()
			}, function(date){
				if (date == 'ok') {
					$('#com_form').submit();
				}
				else {
					$("#pic").attr('src','yz.php?reload='+Math.round(Math.random()*10000));
					alert('验证码错误，请重新输入！');
					$("#yz").focus();
					return false;
				}
			});
		}
	});
});

function isEmail( str ){ 
	var myReg = /^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/; 
	if(myReg.test(str)) return true; 
	return false; 
} 