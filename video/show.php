<?php
    require "../frame.php";
	
	$id = $_REQUEST['id'];
	
	$table = new table_class('hoau_video');
	$table->find($id);
	show_video_player(400,300,$table->photo_url,$table->video_url,$autostart = "false")
?>
