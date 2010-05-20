<?php
	require_once('../frame.php');
	rights($_SESSION["hoaurights"],'7');
    $type = $_REQUEST['post_type'];
	$id = $_REQUEST['del_id'];
	
	$db = get_db();
	if($type=='problem'){
		$db->execute("delete from hoau_problem where id=$id");
		$question = $db->query("select * from hoau_question where problem_id=$id");
		for($i=0;$i<count($question);$i++){
			$db->execute("delete from hoau_question_item where question_id={$question[$i]->id}");
		}
		$db->execute("delete from hoau_question where problem_id=$id");
	}else{
		$db->execute("delete from hoau_question where id=$id");
		$db->execute("delete from hoau_question_item where question_id=$id");
	}
	echo $id;
?>