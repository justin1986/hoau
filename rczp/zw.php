<?php
    require_once('../frame.php');
	$id = intval($_GET['id']);
	$zw = new table_class('hoau_position');
	$zw->find($id);
	$db = get_db();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>天地华宇-中国公路快运领导者</title><meta name="Keywords" content="天地华宇,天地华宇物流,天地华宇物流查询,华宇,华宇物流,华宇物流查询,天地华宇俱乐部,华宇俱乐部"/><meta name="Description" content="天地华宇-中国公路快运领导者"/>
	<?php
		use_jquery();
		css_include_tag('rczp/rczp','breadcom');
	?>
</head>
<body>
<div id="title"><div style="float:left">社会招聘</div>
	<div class="breadcum"><a href="/" target="_parent">首页</a> > <a href="/rczp/" target="_parent">人才招聘</a> > <a href="zw.php?id=<?php echo $id;?>" class="a2">社会招聘</a></div>
</div>

<div id="a_title"><img src="/images/icon/rc1.gif"><span style="margin-left:5px;">招聘职位</span></div>
<div class="line3"><?php echo $zw->name;?></div>
<div id="zw_box"><?php echo $zw->jieshao;?></div>
<div class="line5" style="margin-top:10px;">
<?php
	$sql = "select id,name from hoau_position where 1=1 order by priority asc";
	$zw = $db->query($sql);
	$count = count($zw);
	for($i=0;$i<$count;$i++){
		if($zw[$i]->id==$id){
			if($i>0){
				$prev = $zw[$i-1]->id;
			}
			if($i!=$count-1){
				$next = $zw[$i+1]->id;
			}
			break;
		}
	}
	if($prev){
?>
<a href="zw.php?id=<?php echo $prev;?>" class="line_link">上一个职位</a>
<?php
	}
?>
<a href="/rczp/" target="_parent" class="line_link">返回列表</a>
<?php
	if($next){
?>
<a href="zw.php?id=<?php echo $next;?>" class="line_link">下一个职位</a>
<?php
	}
?>
	<input type="button" id="sq">
</div>
<form action="zw.post.php" method="post" enctype="multipart/form-data">
<div class="line4 sc" style="display:none">
	省份<select id="province">
		<option value="">请选择</option>
		<?php
			$sql = "select * from S_Province";
			$records = $db->query($sql);
			$close_db();
			for($i=0;$i<count($records);$i++){
		?>
		<option value="<?php echo $records[$i]->ProvinceID;?>"><?php echo $records[$i]->ProvinceName;?></option>
		<?php
			}
		?>
	</select>
	城市<select name="city_id" id="city">
		<option value="0">请选择</option>
	</select>
</div>
<div class="line5 sc" style="display:none">
	<span style="float:left;">上传简历:<input type="file" id="zw" name="zw"></span>
	<button type="submit" id="tj"></button>
</div>
<input type="hidden" name="position_id" value="<?php echo $id;?>">
</form>
<div id="shuom" class="sc" style="display:none">上传简历大小不能超过1M，格式限定doc、docx、txt、rar</div>
<div id="bottom"></div>


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

<script>
	$(function(){
		
		$("#province").change(function(){
			$.post('show_city.php',{'p_id':$("#province").val()},function(data){
				$("#city").html(data);
			})
		})
		
		$("#sq").click(function(){
			$(".sc").css('display','inline');
		});
		
		$("#tj").click(function(){
			if($("#city").val()==0){
				alert('城市不能为空！');
				return false;
			}
			if($("#zw").val()==''){
				alert('简历不能为空！');
				return false;
			}
		})
	})
</script>
