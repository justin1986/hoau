<?php
	session_start();
    require_once('../frame.php');
	$db = get_db();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>天地华宇-中国公路快运领导者</title><meta name="Keywords" content="天地华宇,天地华宇物流,天地华宇物流查询,华宇,华宇物流,华宇物流查询,天地华宇俱乐部,华宇俱乐部"/><meta name="Description" content="天地华宇-中国公路快运领导者"/>
	<?php
		css_include_tag('thickbox','drd/drd1');
		use_jquery();
		js_include_tag('top','drd/drd1','thickbox');
	?>
</head>
<body>
	<div id="title">货物追踪</div>
	<div id=select>
		<?php if(false){?><div id="dkh_an" style="margin-bottom:10px;"><a href="dkh_login.php?height=160&width=250" class="thickbox"><img border=0 src="/images/anniu.gif"></a></div><?php }?>
		<div id=start>
			<div class=word>按运单编号查询：</div>
			<div class=div>
				<input type="text" id="yd_info" style="width:250px;" value="<?php echo $_GET['hwbh'];?>" />
			</div>
			<div class=div><button class=cx id="ydcx" type="button"></button></div>
			<div class="bz">注：多运单间用逗号分隔，最多可以查询5个运单.</div>
		</div>
		<div id=end>
			<div class=word>按货号查询：</div>
			<div class=div>
				货号：
			</div>
			<div class=div><input type="text" id="hy_info1"></div>
			<div class=div>+</div>
			<div class=div>日期：</div>
			<div class=div><input type="text" id="hy_date"></div>
			<div class=div><button class=cx id="hhcx" type="button"></button></div>
		</div>
		<div class="bz">注：输入货号格式为：45678-11，45678为运单号后5位，11为货物件数；托运日期格式2006-01-01.</div>
		<div id="tishi" style="float:left; display:inline"><img src="/images/yundandemo.jpg"></div>
	</div>
	<input id="dkh_login" type="hidden" value="<?php if($_SESSION['kh_role']) echo 1; else echo 0; ?>">
	<div id="result"></div>
	<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-9272044-1");
pageTracker._trackPageview();
} catch(err) {}</script> 
</body>
</html>
<?php
  if($_GET['hwbh']){
?>  	
<script>
	$.post('show_yd.php',{'ydh':$("#yd_info").val(),'dkh':$('#dkh_login').val()},function(data){
		if(data.indexOf('找不到相关记录')>0){
			alert('有1个或多个运单未找到记录，请重新输入！');
		}
		$("#result").html(data);
		parent.resize_iframe();
	});
</script>
<?php  }
?>
<script>
	$(function(){
		$(window.parent.document).find("#logo_img").css('background','url(/images/logo.jpg) no-repeat');
		$(window.parent.document).find("#hd").show();
	});
</script>

