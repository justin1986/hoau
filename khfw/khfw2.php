<?php
    require_once('../frame.php');
	$db = get_db();
	$type = intval($_GET['type']);
	$date = $_GET['date'];
	if(strlen($date)!=10){
		$date = '';
	}
	$status = intval($_GET['status']);
	$key = $_GET['key'];
	if(strlen($key)>30){
		$key = '';
	}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>天地华宇-中国公路快运领导者</title><meta name="Keywords" content="天地华宇,天地华宇物流,天地华宇物流查询,华宇,华宇物流,华宇物流查询,天地华宇俱乐部,华宇俱乐部"/><meta name="Description" content="天地华宇-中国公路快运领导者"/>
	<?php
		css_include_tag('khfw/khfw4','breadcom','jquery_ui');
		use_jquery_ui();
		js_include_tag('top','khfw/khfw4');
	?>
</head>
<body>
	<div id="title"><div style="float:left">客户留言</div>
		<div class="breadcum"><a href="/" target="_parent">首页</a> > <a href="/khfw/" target="_parent">客户服务</a> > <a href="khfw2.php" class="a2">客户留言</a></div>
	</div>
	<div id="search">
		<div>
		类型 <select id="type"><option value=""></option><option value="1" <?php if($type==1)echo 'selected="selected"'?>>留言</option><option value="2" <?php if($type==2)echo 'selected="selected"'?>>建议</option><option value="3" <?php if($type==3)echo 'selected="selected"'?>>投诉</option></select>
		日期 <input type="text" id="date" maxlength="10" value="<?php echo $date?>">
		状态 <select id="status"><option value=""></option><option value="1" <?php if($status==1)echo 'selected="selected"'?>>未处理</option><option value="2" <?php if($status==2)echo 'selected="selected"'?>>已处理</option><option value="3" <?php if($status==3)echo 'selected="selected"'?>>处理中</option></select>
		关键字 <input type="text" id="key" maxlength="10" value="<?php echo $key?>">
		</div>
		<button id="cxtj"></button>
	</div>
	<?php
		$sql = "select * from hoau_comment where 1=1 and is_adopt=1";
		if($type){
			$sql .= " and type=$type";
		}
		if($date){
			$sql .= " and time>'$date 00:00:00' and time<'$date 23:59:59'";
		}
		if($status){
			$sql .= " and status=$status";
		}
		if($key){
			$sql .= " and (name like '%$key%' or wbnum like '%$key%' or topic like '%$key%' or message like '%$key%' or reply like '%$key%')";
		}
		$sql .= " order by time desc";
		$record = $db->paginate($sql,5);
		if(count($record)){
		for($i=0;$i<count($record);$i++){
	?>
	<div class="comment_box">
		<div class="comment_top">
			<div class="info">
				<div>姓名：<?php echo $record[$i]->name;?></div>
				<div>运单号：<?php echo $record[$i]->wbnum;?></div>
				<div>IP：<?php echo $record[$i]->ip;?></div>
			</div>
			<div class="comment">
				<div class="c_info">
					<div style="width:70px;">类型：
					<?php 
						if($record[$i]->type==1){
							echo "留言";
						}elseif($record[$i]->type==2){
							echo "建议";
						}else{
							echo "投诉";
						}
					?>
					</div>
					<div title="<?php echo htmlspecialchars($record[$i]->topic);?>" style="width:130px;">标题：<?php echo htmlspecialchars($record[$i]->topic);?></div>
					<div>日期：<?php echo date_format($record[$i]->time,"Y-m-d");?></div>
					<div>状态：<?php  if($record[$i]->status==1)echo "未处理";elseif($record[$i]->status==2)echo "已处理";else echo "处理中";?></div>
				</div>
				<div class="c_cont"><?php echo htmlspecialchars($record[$i]->message);?></div>
			</div>
		</div>
		<?php if($record[$i]->replytime){?>
		<div class="reply_box">
			<div class="date">回复日期：<?php echo date_format($record[$i]->replytime,"Y-m-d");?></div>
			<div class="reply">回复：<?php echo htmlspecialchars($record[$i]->reply);?></div>
		</div>
		<?php }?>
	</div>
	<?php }?>
	<div id="paginate"><?php paginate();?></div>
	<?php 
		}else{
			if(!empty($type)||!empty($date)||!empty($status)||!empty($key)){
				alert('没有和搜索条件匹配的内容！');
			}
		}
	?>
	<div id="message">
		<div id="top_line">留言华宇（*为必填内容）</div>
		<form method="post" id="com_form" action="khfw4.post.php">
		<div class="line">
			<div class="box1">*主题</div>
			<div class="box2"><input id="zt" type="text" name="post[topic]"></div>
		</div>
		<div class="line">
			<div class="box1">*运单号</div>
			<div class="box2"><input id="ydh" type="text" name="post[wbnum]"></div>
		</div>
		<div class="line">
			<div class="box1">*姓名</div>
			<div class="box2"><input id="xm" type="text" name="post[name]"></div>
		</div>
		<div class="line">
			<div class="box1">*电话</div>
			<div class="box2"><input id="dh" type="text" name="post[tel]"></div>
		</div>
		<div class="line">
			<div class="box1">*电子邮箱</div>
			<div class="box2"><input id="dzyj" type="text" name="post[email]"></div>
		</div>
		<div class="line">
			<div class="box1">*留言类型</div>
			<div class="box2"><select id="lylx" name="post[type]"><option value="1">留言</option><option value="2">建议</option><option value="3">投诉</option></select></div>
		</div>
		<div class="line" style="height:120px;">
			<div class="box1" style="height:120px;">*留言</div>
			<div class="box2" style="height:120px;"><textarea id="ly" name="post[message]"></textarea></div>
		</div>
		<div class="line">
			<div class="box1">*验证码</div>
			<div class="box2"><input id="yz" type="text" name="yz"><img id="pic" src="yz.php"><div id="chang_pic">看不清楚？换张图片</div></div>
		</div>
		<div class="line" style="border:0;">
			<button type="button" id="tijiao">提交</button>
			<div id="admin"><input type="checkbox" name="admin" id="admin_input"><label for="admin_input">仅管理员可见</label></div>
		</div>
		</form>
	</div>
	<div id="description">
		<li>填写留言信息，确认按钮提交你的留言；</li>
		<li>运单编号为8位数字；</li>
		<li>同一运单编号每天只能留言一次； </li>
		<li>我们会有专员处理您的留言信息，对于留言内容，我们会及时通过电话与您联系，请您务必填写正确的电话号码。</li>
	</div>
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

