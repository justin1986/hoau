<?php
	require_once('../frame.php');
	$id = intval($_GET['id']);
	$video = new table_class('hoau_video');
	if($id!=''){
		$video->find($id);
	}
	$post_url='video_list.php?reload='.rand_str(5);
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title></title>
	<?php 
		css_include_tag('admin');
		use_jquery();
		rights($_SESSION["hoaurights"],'8');
	?>
</head>
<body style="background:#E1F0F7">
	<form id="video_add" enctype="multipart/form-data" action="video.post.php" method="post"> 
	<table width="795" border="0">
		<tr bgcolor="#f9f9f9" height="25px;" style="font-weight:bold; font-size:13px;">
			<td colspan="2" width="795">　　编辑视频</td>
		</tr>
		<tr align="center" bgcolor="#f9f9f9" height="25px;">
			<td width="100">标　题</td><td width="695" align="left"><input type="text" id="title" value="<?php echo $video->title;?>" name="video[title]"></td>
		</tr>
		<!--
		<tr align="center" bgcolor="#f9f9f9" height="25px;">
			<td>优先级</td><td align="left"><input type="text" size="10" id="priority" name="video[<?php if($role=='dept_admin'){echo 'dept_';}?>priority]" class="number">(1-100)</td>
		</tr>
		-->
		<tr align="center" bgcolor="#f9f9f9" height="25px;" id=newsshow3 >
			<td>选择图片</td><td align="left"><input name="image" id="image" type="file">(请上传小于2M的图片，格式支持jpg、gif、png,只有当视频格式为flv时才可显示图片)</td>
		</tr>
		<tr align="center" bgcolor="#f9f9f9" height="25px;" id=newsshow3 >
			<td>选择视频</td><td align="left"><input name="video" id="video" type="file">(请上传视频，并且不要大于20M，格式支持flv,wma,wav,mp3,mp4,avi,rm)</td>
		</tr>
		<tr align="center" bgcolor="#f9f9f9" height="150px;" id=newsshow1>
			<td>简短描述</td><td align="left"><textarea cols="80" rows="8" name="video[description]" id="description"><?php echo $video->description;?></textarea></td>
		</tr>

		<tr bgcolor="#f9f9f9" height="30px;">
			<td colspan="2" width="795" align="center"><input id="submit" type="submit" value="发布视频"></td>
		</tr>	
	</table>
	<input type="hidden" name="url" value="<?php echo $post_url;?>">
	<input type="hidden" name="id" value="<?php echo $id;?>">
	</form>
</body>
</html>

<script>
	$("#submit").click(function(){
		var title = $("#title").val();
		if(title==""){
			alert("请输入标题！");
			return false;
		}
		if($("#image").val()!=''){
			var upfile1 = $("#image").val();
			var upload_file_extension=upfile1.substring(upfile1.length-4,upfile1.length);
			if(upload_file_extension.toLowerCase()!=".png"&&upload_file_extension.toLowerCase()!=".jpg"&&upload_file_extension.toLowerCase()!=".gif"){
				alert("上传图片类型错误");
				return false;
			}
		}
		if($("#video").val()!=''){
			var upfile2 = $("#video").val();
			upload_file_extension=upfile2.substring(upfile2.length-4,upfile2.length);
			if(upload_file_extension.toLowerCase()!=".flv"&&upload_file_extension.toLowerCase()!=".wmv"&&upload_file_extension.toLowerCase()!=".wav"&&upload_file_extension.toLowerCase()!=".mp3"&&upload_file_extension.toLowerCase()!=".mp4"&&upload_file_extension.toLowerCase()!=".avi"&&upload_file_extension.toLowerCase()!=".wma"){
				upload_file_extension=upfile2.substring(upfile2.length-3,upfile2.length);
				if(upload_file_extension.toLowerCase()!=".rm"){
					alert("上传视频类型错误");
					return false;
				}
			}
		}else{
			<?php if(empty($id)){?>
			alert('请上传一个视频！');
			return false;
			<?php }?>
		}
		
		if($("#description").val()==''){
			alert('请输入简短描述！');
			return false;
		}
	}); 	
</script>