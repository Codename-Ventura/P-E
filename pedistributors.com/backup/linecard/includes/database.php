<?php
// first step, get the database open
class Database{
	
	// constructor function to connect
	function Database($var1, $var2, $var3, $var4){
		$this->cnx = mysql_connect($var1, $var2, $var3) or die(mysql_error());
		$this->db2 = $var4;
	}
	
	// create a recordset
	function execute($sql, $silent = 0){
		if ($silent == 1){
			@mysql_select_db($this->db2, $this->cnx);
			$recordset = @mysql_query($sql, $this->cnx);
		} else {
			mysql_select_db($this->db2, $this->cnx);
			$recordset = mysql_query($sql, $this->cnx) or die(mysql_error());
		}
		$this->insertid = mysql_insert_id();
		if (strpos($sql, "SELECT") === 0 && ($recordset)){
		return new Result($recordset); }
	}
	
}

// ok, that is all done, now let's build the result class
class Result{
	
	// build constructor class
	function Result($resultid){
        $this->res = $resultid;
        $this->fields = mysql_fetch_assoc($resultid);
        $this->rows = mysql_num_rows($resultid);
    }
    
    // loop through each record
	function loop(){
		$this->fields = mysql_fetch_array($this->res);
		return $this->fields;
	}
	
	// send pointer back to start
	function start(){
		mysql_data_seek($this->res, 0);
		$this->loop();
	}
	
	// free result memory
	function clear(){
		mysql_free_result($this->res);
	}
}
?>