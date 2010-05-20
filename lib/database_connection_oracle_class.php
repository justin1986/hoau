<?php
include_once dirname(__FILE__) . '/database_row_item_class.php';
class database_connection_oracle_class
{
	var $_db=NULL;//the link resource
	var $_qresult = NULL;//the query result
	var $_aresult = array();
  	var $servername='localhost';
  	var $databasename = 'mysql';
  	var $username = 'root';
  	var $password = 'xunao';
	var $code = 'UTF-8';
	var $connected = false;
	var $affect_count = 0;
	public $echo_sql = false;
	public $record_count = 0;
	public $last_insert_id = 0;
	private $data_set = array();
	private $data_set_pointer = 0;
	
	private function _connect()
	{		
		$result = ocilogon($this->username, $this->password,$this->servername);
		if (is_resource($result))
		{
			$this->_db = $result;
		}
		return $result;
	}
	
	private function reset_vars()
	 {
	 	unset($this->_aresult);
		unset($this->_qresult);
		$this->data_set = array();
		$this->data_set_pointer = 0;		
		$this->record_count = 0;
	 } 
	public function connect($username,$password,$servername=null)
  	{
  		
  		$resutl = $this->_connect($username,$password,$servername);
  		if ($resutl !== false) {
  			$this->connected = true;
  		}
  		return $resutl;
  	}  
	
	public function close(){
		ocilogoff($this->_db);
		//sqlsrv_close($this->_db);
		$this->reset_vars();
		$this->connected = false;	
	} 
	
	public function &query($sql)
  	{
  		if($this->echo_sql) echo $sql;
		$this->reset_vars();
  		if ($this->connected === false) {
  			$this->_debug_info('database connection has not been established!');
  			return  false;
  		}
		global $g_db_log_file;
		if($g_db_log_file){
			$f_start = get_microtime();
		}			
		$this->_qresult = ociparse($this->_db, $sql);
  		ociexecute($this->_qresult, OCI_DEFAULT);
  		$this->_qresult = oci_fetch_array($stmt);
		if($g_db_log_file){
			$f_length = get_microtime() - $f_start;
			$str = chr(13).chr(10). now() ." ".$_SERVER['SCRIPT_NAME'] ." execute sql: ({$f_length}ms)"  .$sql;
			write_to_file($g_db_log_file,$str);
		}			
  		if ($this->_qresult===FALSE)
  		{
  			$this->_debug_info('fail to query db!' . $this->get_error() .";query string = " .$sql);
  		  	return FALSE;
  		}
  		else
  		{  	
		  //get the recrod count		
		  $this->record_count = 0;
		  while( $this->_aresult = sqlsrv_fetch_array( $this->_qresult, SQLSRV_FETCH_ASSOC))
		  {
		  	$item = new database_row_item_class($this);
			$item->load_from_dataset($this->_db);
			$this->record_count++;
			$this->data_set[] = $item;
		  }
		  sqlsrv_free_stmt($this->_qresult);
		  return $this->data_set;
		
  		}  		  
  	}	
	
	public function move_first(){
		if($this->record_count <=0 ){
			return false;
		}
		$this->data_set_pointer = 0;
		return true;
	}  	
	
	public function move_next(){
		if($this->data_set_pointer + 1 >= $this->record_count) return false;
		$this->data_set_pointer += 1;
		
		return true;
	}
		
	public function field_by_index($index)
	{
		return $this->data_set[$this->data_set_pointer]->field_by_index($index);
	}
	
	public function field_by_name($name)
	{
		return $this->data_set[$this->data_set_pointer]->$name;
	}
	
	public function get_field_name($index)
	{
		return mysql_field_name($this->_qresult, $index);
	}
	
	
	
	function execute($sqlstr){
  		$this->affect_count = 0;
		
		
		//$sqlstr .= ' select @@IDENTITY AS last_id';
		//$sqlstr = 'begin ' .$sqlstr .' end';
		if($this->echo_sql) echo $sqlstr;
		if ($this->connected === false) {
  			$this->_debug_info('database connection has not been established!');
  			return  false;
  		}
		global $g_db_log_file;
		if($g_db_log_file){
			$f_start = get_microtime();
		}			
  		$this->_qresult = sqlsrv_query($this->_db, $sqlstr);
		if($g_db_log_file){
			$f_length = get_microtime() - $f_start;
			$str = chr(13).chr(10). now()." ".$_SERVER['SCRIPT_NAME'] ." execute sql: ({$f_length}ms)"  .$sqlstr;
			write_to_file($g_db_log_file,$str);
		}	

  		if ($this->_qresult===FALSE)
  		{
  			$this->_debug_info('fail to execute sql!' . $this->get_error() .";query string = " .$sqlstr);
  		  	return FALSE;
  		}
  		else
  		{  		
		  $this->affect_count = sqlsrv_rows_affected($this->_qresult);
		  $q  = sqlsrv_query($this->_db,'SELECT @@IDENTITY AS last_id');
		  $tmp = sqlsrv_fetch_array( $q, SQLSRV_FETCH_ASSOC);
		  //var_dump(sqlsrv_errors());

		  $this->last_insert_id = $tmp['last_id'];	
  		  return true;
  		}   		  		
  	}
	
	  private function __get($var){
  		if (strtolower($var) == "affect_count"){
  			return $this->$affect_count;
  		}  		
  	}
	
  	private function _debug_info($msg){
  		global $debug_tag;
  		if ($debug_tag === true) {
  			if(function_exists('debug_info')){
  				debug_info($msg);	
  			}  			
  		}
  	}
	
	public function get_error()
	{
		return sqlsrv_errors();
	}		
		
  	function paginate($sql, $per_page=10,$page_var='page') {
		$page_count_var  = $page_var ."_count";
		$record_count_var = $page_var ."_record_count";
		global $$page_count_var;
		global $$record_count_var;
		$page = isset($_REQUEST[$page_var]) ? $_REQUEST[$page_var] : 1;
		$select = substr($sql,0,6);
		if(strtoupper($select) != 'SELECT'){
			$this->_debug_info('sql in function painate must be started with SELECT; sql=' .$sql);
			return false;			
		}
		$flag = 0;
		$id = 'id';
		if(stripos($sql,' * ')>0){
			$sql2 = substr_replace($sql," top ".($per_page*($page - 1))." id ",7,(stripos($sql,' ',7)-7));
			$sql3 = substr_replace($sql," count(id) as cou ",7,(stripos($sql,' ',7)-7));
			if(stripos($sql3,'order',0)>0){
				$order = strripos($sql3,'desc',0)>0?(strripos($sql3,'desc',0)-stripos($sql3,'order',0)+4):(strripos($sql3,'asc',0)-stripos($sql3,'order',0)+3);
				$sql3 = substr_replace($sql3,"",stripos($sql3,'order',0),$order);
			}
			$ret = $this->query($sql3);
			$count = $this->data_set[0]->cou;
			$flag = 0;
		}else{
			$id = substr($sql,7,(stripos($sql,',',7)-7));
			if(strlen($id)>20||$id<0){
				$id = substr($sql,7,(stripos($sql,' ',7)-7));
			}
			if(stripos($id,'*')>0){
				$id = str_replace("*","id",$id);
			}
			$sql2 = substr_replace($sql," top ".($per_page*($page - 1))." ".$id." ",7,(stripos($sql,'from',7)-7));
			$sql3 = substr_replace($sql," count(".$id.") as cou ",7,(stripos($sql,'from',7)-7));
			if(stripos($sql3,'order',0)>0){
				$order = strripos($sql3,'desc',0)>0?(strripos($sql3,'desc',0)-stripos($sql3,'order',0)+4):(strripos($sql3,'asc',0)-stripos($sql3,'order',0)+3);
				$sql3 = substr_replace($sql3,"",stripos($sql3,'order',0),$order);
			}
			$ret = $this->query($sql3);
			$count = $this->data_set[0]->cou;
			$flag = 1;
		}
		$sql = substr_replace($sql," top ".$per_page." ",7, 0);
		if($flag==0){
			$sql = substr_replace($sql," id not in (".$sql2.") and",(stripos($sql,'where')+5), 0);
		}else{
			$sql = substr_replace($sql," ".$id." not in (".$sql2.") and",(stripos($sql,'where')+5), 0);
		}
		$ret = $this->query($sql);
		if($ret === false){
			return false;
		}
		$$page_count_var = ceil($count / $per_page);
		$$record_count_var = $count;
		
		return $this->data_set;
	}
}

?>