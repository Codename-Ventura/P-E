<?php


class Login extends Index{
	
	function Login(){
		parent::Index();
		$this->id = "auth_" . $this->id;
		$this->queryText = $this->formatQueryLine(array('TYPE', 'STATUS'));
	}

	
	function checkuser($username, $password) {
		$this->queryText .= $this->formatQueryLine(array('BS',$username, $password));
		$this->submitQuery();
		if (!$this->pollForResponse()) {
			$this->pageResponse("error");
			return 0;
		}
		
		if ($this->responseType != "STATUS") {
			$this->log("Received a bogus type (\"{$this->responseType}\") to an authentication query.");
			$this->error = "Received a bogus type (\"{$this->responseType}\") to an authentication query.";
			return 0;
		}
		// Iterate over the responses (there should only be one, so we'll just take
		// the first that matches) and check status:
		foreach ($this->responseLines as $line) {
			$parts = explode("|", $line);
			if ($parts[0] == "BS") {
				// Here's our response
				if ($parts[4] == "SUCCESS") {
					// Success
					return 1;
				} else {
					$this->error = "Invalid authentication credentials.";
					$this->pageResponse("login_error");
					return 0;
				}
			}
		}
		return 1;
	}




}

$login = new Login;


	if(!empty($_POST['username']) && !empty($_POST['password']) && $login->checkuser($_POST['username'],$_POST['password'])){
		if(isset($_POST['form_action'])){

foreach ($login->responseLines as $responseLine) {
		//pr(get_defined_vars());
			$parts = explode("|", $responseLine);
			switch ($parts[0]) {
				case 'BS':
					$_SESSION['customer']['login'] = $parts[1];
					break;
				case 'A1':
					$_SESSION['customer'][streetAddress] = $parts[1];
					break;
				case 'A2':
					$_SESSION['customer'][streetAddress2] = $parts[1];
					break;
				case 'A3':
					$_SESSION['customer'][city] = $parts[1];
					$_SESSION['customer'][state] = $parts[2];
					$_SESSION['customer'][zip] = $parts[3];
					break;
				case 'A4':
					$_SESSION['customer'][contactName] = $parts[1];
					break;
				case 'A5':
					$_SESSION['customer'][contactPhone] = $parts[1];
					break;
				case 'A6':
					$_SESSION['customer'][accountNumber] = $parts[1];
					break;
				case 'BT':
					$_SESSION['customer'][name] = $parts[1];
					break;
				case 'SM':
					$_SESSION['customer'][salesman] = $parts[1];
					break;
				case 'TM':
					$_SESSION['customer'][terms] = $parts[1];
					break;
				case 'CL':
					$_SESSION['customer'][cred_limit] = $parts[1];
					break;
				case 'AR':
					$_SESSION['customer'][balance] = $parts[1];
					break;
				case 'OV':
					$_SESSION['customer'][over] = $parts[1];
					break;
				case 'BA':
					$_SESSION['customer'][order_balance] = $parts[1];
						if (empty($_SESSION['customer'][order_balance] )){
							$_SESSION['customer'][order_balance] = "0.00";
							}
					break;
				case 'CR':
					$_SESSION['customer'][credit] = $parts[1];
					$_SESSION['customer'][creditavailable] = $_SESSION['customer'][credit] - $_SESSION['customer'][order_balance]; 
			        $_SESSION['customer'][credit] = sprintf('%01.2f', $creditavailable);
					break;
  			// JTM - this is for the new drop shipping permission. uncomment to enable this feature for real. 

			  case 'DS':
			  		if ($parts[1] == "1"){
					$_SESSION['customer'][can_drop_ship] = "1";//$parts[1];
					}
					else {
					$_SESSION['customer'][can_drop_ship] = "0";
					}
					//pr(get_defined_vars());
					break;
					}
}
		$_SESSION['customer']['pw'] = $_POST['password'];
		$_SESSION['loggedin'] = $_SESSION['customer'][name];

		if(isset($_SESSION['returnu'])){
			header('Location: index.php?p='.$_SESSION['returnu'].'');
			}else{
			header('Location: index.php?p=account');
			}
	}else{
		$funcs->pageResponse("login_error");
	}
	

}

if(isset($_SESSION['loggedin'])){
	header('Location: index.php?p=account');
}

?>