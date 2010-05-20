<?php
	require_once('../frame.php');
	$id = $_REQUEST['id'];
	$comment = new table_class('hoau_comment');
	$comment->find($id);
	$post_table='hoau_comment'; 
	if(stripos($_SERVER['HTTP_REFERER'],'title')>0){
		$post_url=$_SERVER['HTTP_REFERER'].'&reload='.rand_str(5);
	}else{
		$post_url=$_SERVER['HTTP_REFERER'].'?reload='.rand_str(5);
	}
	rights($_SESSION["hoaurights"],'2');
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>天地华宇-中国公路快运领导者</title><meta name="Keywords" content="天地华宇,天地华宇物流,天地华宇物流查询,华宇,华宇物流,华宇物流查询,天地华宇俱乐部,华宇俱乐部"/><meta name="Description" content="天地华宇-中国公路快运领导者"/>
	<?php
		css_include_tag('admin');
	 	use_jquery();
	?>
</head>
<?php
	validate_form("user_form");
?>
<body>
	<table width="795" border="0" id="list">
	<form id="user_form" method="post" action="comment.post.php">
		<tr class=tr1>
			<td colspan="2">　查看留言　<a href="<?php echo $_SERVER['HTTP_REFERER'];?>">返回</a></td>
		</tr>
		<tr class=tr3>
			<td width=150>用户名：</td>
			<td width=645 align="left"><?php echo $comment->name;?></td>
		</tr>
		<tr class=tr3>
			<td>标题：</td>
			<td align="left"><?php echo htmlspecialchars($comment->topic);?></td>
		</tr>
		<tr class=tr3>
			<td>运单号：</td>
			<td align="left"><?php echo $comment->wbnum;?></td>
		</tr>
		<tr class=tr3>
			<td>邮箱：</td>
			<td align="left"><?php echo htmlspecialchars($comment->email);?></td>
		</tr>
		<tr class=tr3>
			<td>电话：</td>
			<td align="left"><?php echo htmlspecialchars($comment->tel);?></td>
		</tr>
		<tr class=tr3>
			<td>IP：</td>
			<td align="left"><?php echo $comment->ip;?></td>
		</tr>
		<tr class=tr3>
			<td>内容：</td>
			<td align="left"><?php echo htmlspecialchars($comment->message);?></td>
		</tr>
		<tr class=tr3>
			<td>留言类型：</td>
			<td align="left">
				<?php 
					if($comment->type==1){
						echo "留言";
					}elseif($comment->type==2){
						echo "建议";
					}else{
						echo "投诉";
					}
				?>
			</td>
		</tr>
		<tr class=tr3>
			<td>回复时间：</td>
			<td align="left"><?php echo date_format($comment->replytime,"Y-m-d");?></td>
		</tr>
		<tr class=tr3>
			<td>回复内容：</td>
			<td align="left"><textarea name="post[reply]" id="name" style="width:300px; height:100px;"><?php echo $comment->reply;?></textarea></td>
		</tr>
		<tr class=tr3>
			<td>受理状态：</td>
			<td align="left">
				<select name="post[status]">
					<option value="2" <?php if($comment->status==2){?>selected="selected"<?php }?>>已受理</option>
					<option value="3" <?php if($comment->status==3){?>selected="selected"<?php }?>>处理中</option>
					<option value="1" <?php if($comment->status==1){?>selected="selected"<?php }?>>未受理</option>
				</select>
			</td>
		</tr>
		<tr class=tr3>
			<td colspan="2"><button type="submit">提交</button></a></td>
		</tr>
		<input type="hidden" name="id" value="<?php echo $id;?>"> 
		<input type="hidden" name="url" value="<?php echo $post_url;?>">
		<input type="hidden" name="post_type" value="edit">
	</form>
	<table>
</body>
</html>
<script>
	$(function(){
		$("#name").focus();
	})
</script>