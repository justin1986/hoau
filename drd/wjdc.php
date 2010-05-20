<?php
    require_once('../frame.php');
	$db = get_db();
	$id = intval($_REQUEST['id']);
	
	$sql = "select * from hoau_question where problem_id={$id} order by priority asc";
	$record = $db->query($sql);
	$item = $db->query("select t2.* from hoau_question t1 join hoau_question_item t2 on t1.id=t2.question_id where t1.problem_id={$id} order by priority asc");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>天地华宇-中国公路快运领导者</title><meta name="Keywords" content="天地华宇,天地华宇物流,天地华宇物流查询,华宇,华宇物流,华宇物流查询,天地华宇俱乐部,华宇俱乐部"/><meta name="Description" content="天地华宇-中国公路快运领导者"/>
	<?php
		css_include_tag('drd/wjdc','breadcom');
		use_jquery();
		js_include_tag('top');
	?>
</head>
<body>
	<div id="title">
		<div style="float:left">问卷调查</div>
		<div class="breadcum"><a href="/" target="_parent">首页</a> > <a href="/drd/" target="_parent">定日达</a> > <a href="/drd/index.php?id=5" target="_parent">问卷调查</a></div>
	</div>
	<form id="wjdc" action="wjdc.post.php" method="post" style="padding-bottom:20px;">
	<div id="list">
		<?php for($i=0;$i<count($record);$i++){
		?>
		<div class=list_line>
			<div class="num"><?php echo $i+1;?>.</div>
			<div class=title>
				<?php echo $record[$i]->name;?>
			</div>
			<?php
				for($j=0;$j<count($item);$j++){
					if($item[$j]->question_id==$record[$i]->id){
			?>
			<div class="item_box">
				<div class="item"><input type="radio" name="item<?php echo $i?>" style="float:left;display:inline;" value="<?php echo $item[$j]->id?>"><div style="width:550px;float:left;display:inline"><?php echo $item[$j]->name;?></div></div>
			</div>
			<?php
					}
				}
			?>
			<input type="hidden" name="id[]" value="<?php echo $record[$i]->id;?>">
		</div>
		<?php
		} ?>
	</div>
	<button type="button" id="tj">提交</button>
	<input type="hidden" name="p_id" value="<?php echo $id;?>">
	</form>
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
<script>
	$(function(){
		$("#tj").click(function(){
			var flag = true;
			$('input').each(function(){
				if (!radio_dom(this)) {
					flag = false;
					return false;
				}
			});
			if(flag){
				$("#wjdc").submit();
			}
		});
	});
	
	function radio_dom(ob){
		if($(ob).attr('type')!='radio'){
			return true;
		}else{
			var check = false;
			$('[name='+$(ob).attr('name')+']').each(function(){
				if($(this).attr('checked')){
					check = true;
				}
			})
			if(check){
				return true;
			}else{
				alert('请选择一个选项！');
				$(ob).focus();
				return false;
			}
		}
	}
</script>
