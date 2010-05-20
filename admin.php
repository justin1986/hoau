<?php
	require_once('frame.php');
	session_start();
	if($_SESSION["hoauadmin"]==""){redirect("/login/");}
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
		js_include_tag('admin_pub');
  ?>
</head>
<body style="background:url(/images/bg.jpg) repeat-x;">
<div id=admin_body>
		<div id=part1>
			<div id=nav style="width:200px;">欢迎  <?php  echo $_SESSION["hoauadmin"] ?>　<a href="/login/">重新登录</a>　<a href="/">返回网站</a></div>
			<div id=title><title>天地华宇-中国公路快运领导者</title><meta name="Keywords" content="天地华宇俱乐部"/><meta name="Description" content="天地华宇-中国公路快运领导者"/>网站后台管理</div>
		</div>
		<div id=part2>
				<?php
					$db = get_db();
					$main_menu = $db->query('select * from hoau_menu order by parent_id,priority desc');
					$main_menu2 = $main_menu;
					//--------------------				
					for($i=count($main_menu)-1;$i>=0;$i--)
					{

						//--------------				
						if(0==$main_menu[$i]->parent_id){ 
				?>
						<div class="menu1" style="overflow:hidden"><a href="<?php echo $main_menu[$i]->href;?>" target="<?php echo $main_menu[$i]->target;?>" list="<?php echo $i;?>"><?php echo $main_menu[$i]->name;?></a></div>
						<? 
							 //-----
							 for($j=count($main_menu2)-1;$j>=0;$j--)
							 {	
							 		if($main_menu[$i]->id==$main_menu2[$j]->parent_id)
							 		{
						 ?>	 			
						 			<? if($main_menu2[$j]->target<>"_blank"){?>
						 			<div class="menu2 list2_<?php echo $i;?> blank" name="<?php echo $main_menu2[$j]->href.'?reload='.rand_str(6);?>" style="overflow:hidden">.<?php echo $main_menu2[$j]->name ?></div>
						 			<? }else{?>
						 			<a class="menu2 list2_<?php echo $i;?>" href="<?php echo $main_menu2[$j]->href; ?>") target=_blank>.<?php echo $main_menu2[$j]->name ?></a>
						 			<? }?>
						 <?	 			
							 		}
						   }
						   //-----
						?>
				<?php 
						}
						//--------------				
					}
				  //--------------------				
				?>
		</div>
		
		<div id=part3>
		  <iframe id=admin_iframe name="admin_iframe" scrolling="yes" frameborder="0" src="/sys/menu_list.php?reload=<?php echo rand_str(6);?>" width="99%" height="700"></iframe>
		</div>
		<div id=part4></div>	
</div>
</body>
</html>
<script>
$(function(){
	$(".menu1 a").click(function(e){
		$(".menu1 a").css('color','#333333');
		$(this).css('color','#ff0000');
		if($(this).attr("target")=="#")
		{
		   e.preventDefault();
		   if($(".list2_"+$(this).attr("list")).is(":hidden")){
		   	$(".menu2").hide();
		   	$(".list2_"+$(this).attr("list")).show();
		   }else{
		   	$(".list2_"+$(this).attr("list")).hide();
			$(".menu1 a").css('color','#333333');
		   }
		   
		}
	});
	
	$(".blank").click(function(){
		$("#admin_iframe").attr("src",$(this).attr('name'));
	})
	

});
</script>



