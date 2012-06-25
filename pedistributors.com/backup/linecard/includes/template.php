<?php
Class Template{

	// variables that need to be defined
	var $unknowns = "remove";
	
	// select the skinset
	function Template($skin = 1){
		global $db, $dbprefix;
		
		// select the skin from the database
		$sql = "SELECT * FROM " . $dbprefix . "skinsets WHERE skinid = " . dbSecure($skin);
		$skn = $db->execute($sql);
		if ($skn->rows < 1){ $this->skin = 1; } else { $this->skin = $skn->fields["skinid"]; }
		
		// record variables
		$this->css = $skn->fields["css"];
		$this->imagesdir = $skn->fields["imagesdir"];
		$this->files = Array();
		
		// write in all the base templates
		$sql = "SELECT * FROM " . $dbprefix . "skinbase";
		$fil = $db->execute($sql);
		if ($fil->rows > 0){ do {
			$this->files[$fil->fields["filename"]] = $fil->fields["code"];
		} while ($fil->loop()); }
		
		// now full all the relevant files
		$sql = "SELECT * FROM " . $dbprefix . "skinfiles WHERE skinid = " . $this->skin;
		$fil = $db->execute($sql);
		if ($fil->rows > 0){ do {
			$this->files[$fil->fields["filename"]] = $fil->fields["code"];
		} while ($fil->loop()); }
	}
	
	// this makes sure the requested template page exists
	function set_file($varname, $filename){
		if (!array_key_exists($filename, $this->files)){
			$this->halt("The skin file '" . $filename . "' does not exist");
		} else {
			$this->varvals[$varname] = $this->files[$filename];
		}
	}
	
	// this allows you to define the {THINGS} sections dealies
	function set_var($varname, $value = "", $append = false){
		$this->varkeys[$varname] = "/".$this->varname($varname)."/";
		
		if ($append){
			$this->varvals[$varname] .= $value;
		} else {
			$this->varvals[$varname] = $value;
		}
	}
	
	// this is for grabbing the variable information
	function get_var($varname){
		if (isset($this->varvals[$varname])){
			$str = $this->varvals[$varname];
		} else {
			$str = "";
		}
		
		return $str;
	}
	
	// this is for processing and putting it all together
	function parse($target, $varname, $append = false) {
		$str = $this->subst($varname);
		
		if ($append){
			$this->set_var($target, $this->get_var($target) . $str);
		} else {
			$this->set_var($target, $str);
		}
		
		return $str;
    }
    
    // this is parsing the string in with replacements
    function subst($varname){
    	$varvals_quoted = array();
    	
    	if (!isset($this->varvals[$varname])){
    		$this->halt("Unable to load content for parse");
    	}
    	
    	// quote the replacement strings to prevent bogus stripping of special chars
	    reset($this->varvals);
	    while(list($k, $v) = each($this->varvals)) {
			$varvals_quoted[$k] = preg_replace(array('/\\\\/', '/\$/'), array('\\\\\\\\', '\\\\$'), $v);
	    	//echo("### " . $k . " ### " . $v . " ###<br /><br />");
	    }
		
	    $str = $this->get_var($varname);
	    
	    $tmp_array = $this->varkeys;
	    ksort($tmp_array);
	    ksort($varvals_quoted);
	    $str = preg_replace($tmp_array, $varvals_quoted, $str);
	    //$str = preg_replace($this->varkeys, $varvals_quoted, $str);
	    return $str;
    }
    
    // this is for ouputing the end result
    function p($varname){
		print $this->finish($this->get_var($varname));
	}
	
	// this is for dealing with undefined {SECTIONS}
	function finish($str) {
    	switch ($this->unknowns) {
			case "keep":
			break;
			
			case "remove":
				$str = preg_replace('/{[^ \t\r\n}]+}/', "", $str);
			break;
			
			case "comment":
				$str = preg_replace('/{([^ \t\r\n}]+)}/', "<!-- Template variable \\1 undefined -->", $str);
			break;
		}
		
		return $str;
	}
	
	// this is just for working out what the string looks like
	function varname($varname){
		return preg_quote("{".$varname."}");
	}
	
	// in case the script crashes and burns
	function halt($msg){
		echo("<strong>Template:</strong> " . $msg); die();
	}
	
	// this prepares the CSS code for inclusion
	function csscode(){
		$css = $this->css;
		$css = str_replace("\n", " ", $css);
		$css = str_replace("\r", "", $css);
		$css = str_replace("	", "", $css);
		$css = str_replace("} ", "}\n", $css);
		return $css;
	}
}
?>