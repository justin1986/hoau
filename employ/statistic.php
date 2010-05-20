<?php
	require_once('../frame.php');
	$db = get_db();
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>天地华宇-中国公路快运领导者</title><meta name="Keywords" content="天地华宇,天地华宇物流,天地华宇物流查询,华宇,华宇物流,华宇物流查询,天地华宇俱乐部,华宇俱乐部"/><meta name="Description" content="天地华宇-中国公路快运领导者"/>
	<?
		css_include_tag('admin','jquery_ui');
		use_jquery_ui();
	?>
</head>
<?php
	rights($_SESSION["hoaurights"],'5');
	validate_form("menu_form");
?>
<body>
	<table width="795" border="0" id="list">
		<tr class=tr1>
			<td colspan="2">　简历统计</td>
		</tr>
		<tr class=tr3>
			<td width=150>选择城市：</td>
			<td width=645 align="left">
				<select id="s_city">
					<option value=""></option>
					<?php 
						$record = $db->query("select * from S_Province");
						$count2 = count($record);
						for($i=0;$i<$count2;$i++){
					?>
						<option value="<?php echo $record[$i]->ProvinceID;?>"><?php echo $record[$i]->ProvinceName;?></option>
					<?php }?>
				</select>
				<span id="show_city">
					<span id="city_id"></span>
				</span>
			</td>
		</tr>
		<tr class=tr3>
			<td width=150>选择职位：</td>
			<td width=645 align="left">
				<select id="p_id">
					<option></option>
					<?php 
						$record = $db->query("select * from hoau_position");
						$count2 = count($record);
						for($i=0;$i<$count2;$i++){
					?>
						<option <?php if($record[$i]->id==$position){?>selected="selected"<?php }?> value="<?php echo $record[$i]->id;?>"><?php echo $record[$i]->name;?></option>
					<?php }?>
				</select>　
			</td>
		</tr>
		<tr class=tr3>
			<td width=150>开始日期：</td>
			<td width=645 align="left"><input type="text" value="<?php echo $date;?>" class="date_jquery" id="start_date"></td>
		</tr>
		<tr class=tr3>
			<td width=150>截止日期：</td>
			<td width=645 align="left"><input type="text" value="<?php echo $date;?>" class="date_jquery" id="end_date"></td>
		</tr>
		<tr class=tr3>
			<td width=150>统计结果：</td>
			<td width=645 align="left"><input type="text" id="result"></td>
		</tr>
		<tr class=tr3>
			<td colspan="2"><button type="button" id="submit">查询</button></td>
		</tr>
	</table>
</body>
</html>

<script>
	$(function(){
		
		$("#s_city").change(function(){
			$.post('/employ/show_city.php',{'id':$(this).val()},function(data){
				$("#show_city").html(data);
			});
		})
		
		$(".date_jquery").datepicker(
			{
				monthNames:['一月','二月','三月','四月','五月','六月','七月','八月','九月','十月','十一月','十二月'],
				dayNames:["星期日","星期一","星期二","星期三","星期四","星期五","星期六"],
				dayNamesMin:["日","一","二","三","四","五","六"],
				dayNamesShort:["星期日","星期一","星期二","星期三","星期四","星期五","星期六"],
				dateFormat: 'yy-mm-dd'
			}
		);
		
		$("#submit").click(function(){
			var province = $("#s_city").val();
			var city = $("#city_id").val();
			var position = $("#p_id").val();
			var start = $("#start_date").val();
			var end = $("#end_date").val();
			
			$.post('get_statistic.php',{"province":province,"city":city,"position":position,"start":start,"end":end},function(data){
				$("#result").attr('value',data);
			});
		})
	})
</script>