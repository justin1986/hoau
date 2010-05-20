<?php
	require_once('../frame.php');
  	$post_url=$_SERVER['HTTP_REFERER'].'?reload='.rand_str(5);
	$id = $_REQUEST['id'];
	$yywd = new table_class('hoau_yywd');
	if($id!=''){
		$yywd->find($id);
	}
	rights($_SESSION["hoaurights"],'3');
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
	validate_form("menu_form");
?>
<body>
	<table width="795" border="0" id="list">
	<form id="menu_form" method="post" action="yywd.post.php">
		<tr class=tr1>
			<td colspan="2">　添加运营点</td>
		</tr>
		<tr class=tr3>
			<td width=150>区域编号：</td>
			<td width=645 align="left"><input type="text" value="<?php echo $yywd->QYBH;?>" id="name" name="post[QYBH]"></td>
		</tr>
		<tr class=tr3>
			<td width=150>公司编号：</td>
			<td width=645 align="left"><input type="text" value="<?php echo $yywd->GSBH;?>" name="post[GSBH]" class="required"></td>
		</tr>
		<tr class=tr3>
			<td width=150>公司简称：</td>
			<td width=645 align="left"><input type="text" value="<?php echo $yywd->GSJC;?>" name="post[GSJC]" class="required"></td>
		</tr>
		<tr class=tr3>
			<td width=150>公司类型：</td>
			<td width=645 align="left">
				<select  name="post[GSLX]" >
					<option <?php if(0==$yywd->GSLX)echo 'selected="selected"';?> value="0">一级公司</option>
					<option <?php if(1==$yywd->GSLX)echo 'selected="selected"';?> value="1">二级公司</option>
					<option <?php if(2==$yywd->GSLX)echo 'selected="selected"';?> value="2">三级公司</option>
				</select>	
			</td>
		</tr>
		<tr class=tr3>
			<td width=150>企业名称：</td>
			<td width=645 align="left"><input type="text" value="<?php echo $yywd->QYMC;?>" name="post[QYMC]" class="required"></td>
		</tr>
		<tr class=tr3>
			<td width=150>名称核准编号：</td>
			<td width=645 align="left"><input type="text" value="<?php echo $yywd->MCHZBH;?>" name="post[MCHZBH]" ></td>
		</tr>
		<tr class=tr3>
			<td width=150>法定代表人：</td>
			<td width=645 align="left"><input type="text" value="<?php echo $yywd->FDDBR;?>" name="post[FDDBR]" ></td>
		</tr>
		<tr class=tr3>
			<td width=150>经营范围：</td>
			<td width=645 align="left"><input type="text" value="<?php echo $yywd->JYFW;?>" name="post[JYFW]" ></td>
		</tr>
		<tr class=tr3>
			<td width=150>企业类型：</td>
			<td width=645 align="left"><input type="text" value="<?php echo $yywd->QYLX;?>" name="post[QYLX]" ></td>
		</tr>
		<tr class=tr3>
			<td width=150>执照副本数：</td>
			<td width=645 align="left"><input type="text" value="<?php echo $yywd->ZZFBS;?>" name="post[ZZFBS]" ></td>
		</tr>
		<tr class=tr3>
			<td width=150>经营方式：</td>
			<td width=645 align="left"><input type="text" value="<?php echo $yywd->JYFS;?>" name="post[JYFS]" ></td>
		</tr>
		<tr class=tr3>
			<td width=150>经营期限：</td>
			<td width=645 align="left"><input type="text" value="<?php echo $yywd->JYQX;?>" name="post[JYQX]" ></td>
		</tr>
			<tr class=tr3>
			<td width=150>省份|城市：</td>
			<td width=645 align="left">
				<select name="post[SF]" id="province" class="required">
					<option value="">--请选择--</option>
					<?php
						$db = get_db();
						$record = $db->query("select * from hoau_new_province");
						for($i=0;$i<count($record);$i++){
					?>
					<option <?php if($record[$i]->PID==$yywd->SF){echo 'selected="selected"';}?> value="<?php echo $record[$i]->PID?>"><?php echo $record[$i]->PMC;?></option>
					<?php
						}
					?>
				</select>
				<select id="city" name="post[CS]" class="required">
					<?php if($id!=''){?>
					<option <?php if(''==$yywd->CS)echo 'selected="selected"';?> value=""></option>
					<?php 
						$db = get_db();
						$record = $db->query("select * from hoau_new_city where PID='".$yywd->SF."'");
						for($i=0;$i<count($record);$i++){
					?>
					<option <?php if($record[$i]->CITYID==$yywd->CS)echo 'selected="selected"';?> value="<?php echo $record[$i]->CITYID?>"><?php echo $record[$i]->CITYNAME;?></option>
					<?php }}else{?>
					<option value="">--请选择--</option>
					<?php }?>
				</select>
			</td>
		</tr>
		<tr class=tr3>
			<td width=150>区划/区县：</td>
			<td width=645 align="left"><input type="text" value="<?php echo $yywd->QH;?>" name="post[QH]" ></td>
		</tr>
		<tr class=tr3>
			<td width=150>街道：</td>
			<td width=645 align="left"><input type="text" value="<?php echo $yywd->JD;?>" name="post[JD]" ></td>
		</tr>
		<tr class=tr3>
			<td width=150>住所：</td>
			<td width=645 align="left"><input type="text" value="<?php echo $yywd->ZS;?>" name="post[ZS]" ></td>
		</tr>
		<tr class=tr3>
			<td width=150>电话：</td>
			<td width=645 align="left"><input type="text" value="<?php echo $yywd->DH;?>" name="post[DH]" id="address" ></td>
		</tr>
		<tr class=tr3>
			<td width=150>传真：</td>
			<td width=645 align="left"><input type="text" value="<?php echo $yywd->CZ;?>" name="post[CZ]" ></td>
		</tr>
		<tr class=tr3>
			<td width=150>邮编：</td>
			<td width=645 align="left"><input type="text" value="<?php echo $yywd->YB;?>" name="post[YB]" ></td>
		</tr>
		<tr class=tr3>
			<td width=150>注册资本：</td>
			<td width=645 align="left"><input type="text" value="<?php echo $yywd->ZCZB;?>" name="post[ZCZB]"></td>
		</tr>
		<tr class=tr3>
			<td width=150>验资单位：</td>
			<td width=645 align="left"><input type="text" value="<?php echo $yywd->YZDW;?>" name="post[YZDW]"></td>
		</tr>
		<tr class=tr3>
			<td width=150>是否虚拟公司：</td>
			<td width=645 align="left"><select name="post[SFXNGS]"><option <?php if(0==$yywd->SFXNGS)echo 'selected="selected"';?> value="0">否</option><option <?php if(1==$yywd->SFXNGS)echo 'selected="selected"';?> value="1">是</option></select></td>
		</tr>
		<tr class=tr3>
			<td width=150>所属一级公司：</td>
			<td width=645 align="left"><input type="text" value="<?php echo $yywd->SSYJGS;?>" name="post[SSYJGS]"></td>
		</tr>
		<tr class=tr3>
			<td width=150>备注：</td>
			<td width=645 align="left"><input type="text" value="<?php echo $yywd->BZ;?>" name="post[BZ]"></td>
		</tr>
		<tr class=tr3>
			<td width=150>是否有效：</td>
			<td width=645 align="left">
				<select name="post[SFYX]"><option <?php if(1==$yywd->SFYX)echo 'selected="selected"';?> value="1">是</option><option <?php if(0==$yywd->SFYX)echo 'selected="selected"';?> value="0">否</option></select>
				</td>
		</tr>
		<tr class=tr3>
			<td width=150>是否受控：</td>
			<td width=645 align="left">
				<select name="post[SFSK]"><option <?php if(1==$yywd->SFSK)echo 'selected="selected"';?> value="1">是</option><option <?php if(0==$yywd->SFSK)echo 'selected="selected"';?> value="0">否</option></select>
			</td>
		</tr>
		<tr class=tr3>
			<td width=150>标准代码：</td>
			<td width=645 align="left"><input type="text" value="<?php echo $yywd->BZDM;?>" name="post[BZDM]" ></td>
		</tr>
		<tr class=tr3>
			<td width=150>扩展代码：</td>
			<td width=645 align="left"><input type="text" value="<?php echo $yywd->KZDM;?>" name="post[KZDM]"></td>
		</tr>
		<tr class=tr3>
			<td width=150>距离标识：</td>
			<td width=645 align="left"><input type="text" value="<?php echo $yywd->JLBS;?>" name="post[JLBS]"></td>
		</tr>
		<tr class=tr3>
			<td width=150>是否提供定日达服务：</td>
			<td width=645 align="left"><select name="post[SFTGDRDFW]"><option <?php if(1==$yywd->SFTGDRDFW)echo 'selected="selected"';?> value="1">是</option><option <?php if(0==$yywd->SFTGDRDFW)echo 'selected="selected"';?> value="0">否</option></select></td>
		</tr>
		<tr class=tr3>
			<td colspan="2"><button type="submit">提 交</button></td>
		</tr>
		<input type="hidden" name="url" value="<?php echo $post_url;?>">
		<input type="hidden" value="<?php echo $id?>" name="id">
	</form>
	</table>
</body>
</html>

<script>
	$(function(){
		$("#name").focus();
		$("#province").change(function(){
			$.post('show_city.php',{'p_id':$('#province').val()},function(data){
				$("#city").html(data);
			})
		})
	});
</script>
