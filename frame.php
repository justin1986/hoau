<?php	
	define(CURRENT_DIR, dirname(__FILE__) ."/");
	define(ROOT_DIR_NONE, dirname(__FILE__));	
	define(ROOT_DIR,CURRENT_DIR);
	require('config/config.php');
	require_once(CURRENT_DIR ."lib/pubfun.php");
	require_once(CURRENT_DIR ."lib/database_connection_mssql_class.php");
	require_once(CURRENT_DIR ."lib/table_class.php");
	require_once(CURRENT_DIR ."lib/upload_file_class.php");
	require_once CURRENT_DIR ."lib/image_handler_class.php";

	
	function get_config($var,$path=''){
		if(empty($path)){$path = LIB_PATH .'../config/config.php';}
		require_once($path);
		global $$var;
		return $$var;
	}	
	
	function &get_db() {
		global $g_db;
		if(!is_object($g_db)){
			$g_db = new database_connection_mssql_class();
		}
		if($g_db->connected) return $g_db;
		$servername = get_config('db_server_name');
		$dbname = get_config('db_database_name');
		$username = get_config('db_user_name');
		$password = get_config('db_password');
		$code = get_config('db_code');
		$note_emails = "chenlong@xun-ao.com, sunyoujie@xun-ao.com, shengzhifeng@xun-ao.com, zhanghao@xun-ao.com";
		if($g_db->connect($servername,$dbname,$username,$password,$code)===false){			
			$last_time = file_get_contents(dirname(__FILE__) .'/config/last_disconnect.txt');
			
			if($last_time == ''){				
				write_to_file(dirname(__FILE__) .'/config/last_disconnect.txt',now(),'w');
				@mail($note_emails,'数据库连接失败','主备数据库均无法连接，请立即检查'.$this->servername);
				
			}
			$servername = get_config('db_server_name_bak');
			$dbname = get_config('db_database_name_bak');
			$username = get_config('db_user_name_bak');
			$password = get_config('db_password_bak');
			$code = get_config('db_code_bak');
			if($g_db->connect($servername,$dbname,$username,$password,$code)===false){
				
			}
		};	
		return $g_db;	
	}
	
	function close_db() {
		$db = &get_db();
		$db->close();
	}
	
	function use_jquery(){
		js_include_once_tag('jquery-1.3.2.min');
	}
	
	function use_jquery_ui(){
		js_include_once_tag('jquery-1.3.2.min');
		js_include_once_tag('jquery-ui-1.7.2.custom.min');
	}
	
	function validate_form($form_name) {
		js_include_once_tag('jquery-1.3.2.min');
		js_include_once_tag('jquery.validate');
		?>
		<script>
			$(function(){
				$("#<?php echo $form_name;?>").validate();
			});
		</script>
		<?php
	}
	
	function show_fckeditor($name,$toolbarset='Admin',$expand_toolbar=true,$height="200",$value="",$width = null) {
		require_once(CURRENT_DIR . 'fckeditor/fckeditor.php');
		$editor = new FCKeditor($name);
		$editor->BasicPath = CURRENT_DIR . 'fckeditor';
		$editor->ToolbarSet = $toolbarset;	
		$editor->Config['ToolbarStartExpanded'] = $expand_toolbar;
		$editor->Value = $value;
		$editor->Height = $height;
		if($width){
			$editor->Width = $width;
		}
		$editor->Create();
	}

	
	function menu_show(){
		$url = $_SERVER['PHP_SELF'];  
		$arr = explode( '/' , $url );  
		$menu = $arr[1];  
		return $menu;
	}

	function province_update($table,$is_city,$value,$p_id=0){
		if($table=='hoau_company'){
			$type = 'is_company';
		}elseif($table=='hoau_drdnetstate'){
			$type = 'is_drd';
		}elseif($table=='hoau_drd_price'){
			$type = 'is_drd_price';
		}
		$type = 'is_drd_price';
		$db = get_db();
		if($is_city==0){
			$sql = "select is_drd_price,id from hoau_province where parent_id=0 and name='{$value}'";
		}else{
			$sql = "select is_drd_price,id from hoau_province where parent_id>0 and name='{$value}'";
		}
		$record = $db->query($sql);
		if(count($record)>0){
			if($record[0]->is_drd_price=='0'){
				$sql = "update hoau_province set is_drd_price=1 where id={$record[0]->id}";
				$db->execute($sql);
			}
			return $record[0]->id;
		}else{
			$sql2 = "insert into hoau_province (name,parent_id,priority,is_drd_price) values ('$value','$p_id','100','1')";
			$db->execute($sql2);
			$record = $db->query($sql);
			return $record[0]->id;
		}
		close_db();
	}
	
?>