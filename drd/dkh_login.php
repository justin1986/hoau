<?php
    require_once('../frame.php');
?>
<div id="d_title">大客户、签约用户登录</div>
<div class="box1">用户名:</div>
<div class="box2"><input id="yhm" type="text"></div>
<div class="box1">密码:</div>
<div class="box2"><input id="mm" type="password"></div>
<button id="dl">登录</button>

<script>
	$(function(){
		
				
		$("#dl").click(function(){
			$.post('/drd/login.post.php',{'yhm':$("#yhm").val(),'mm':$("#mm").val()},function(data){
				if(data!='ok'){
					$('#dkh_login').val('1')
					alert('用户名或密码错误');
				}else{
					alert('登录成功');
					tb_remove();
					$('#dkh_login').val('0')
					window.location.reload();
				}
			});
		})
		
		setTimeout(function(){
			$("#yhm").focus();
		},100);
	})
</script>