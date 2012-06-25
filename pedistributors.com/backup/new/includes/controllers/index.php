<?php
class Index extends Functions{

	var $inputQueueDir = "/mnt/web_in/";
	var $outputQueueDir = "/mnt/web_out/";
	var $timeout = 15;
	var $waitTime = 5;
	
function Index(){
		$this->id = md5(rand() + time());
		
		//Check for inactive users and logs out if applicable
		if($this->userdata->inactive >= 5){
			echo "ACCOUNT TIMEOUT";
			}

		$this->queryText = $this->formatQueryLine(array('TYPE', 'STATUS'));
		if (!(file_exists($this->inputQueueDir) &&
			is_writable($this->inputQueueDir) &&
			is_readable($this->inputQueueDir))) {
			$this->log("Can't write to input queue directory: {$this->inputQueueDir}");
			$this->error = "Can't write to input queue directory: {$this->inputQueueDir}";
			exit;
		}
		if (!(file_exists($this->outputQueueDir) &&
			is_writable($this->outputQueueDir) &&
			is_readable($this->outputQueueDir))) {
			$this->log("Can't write to output queue directory: {$this->outputQueueDir}");
			$this->error = "Can't write to output queue directory: {$this->inputQueueDir}";
			exit;
		}
	}


function formatQueryLine($parts) {
		if (!isset($parts) || empty($parts)) {
			return 0;
		}
		// The UNIX box we're communicating with is uppercase-only, so Make sure
		// everything is upper case:
		foreach($parts as $k=>$v){
			$parts[$k] = strtoupper($v);
		}
		
		return implode("|", $parts) . "\n";
	}
	


function SubmitQuery(){
		$filename = $this->inputQueueDir.$this->id;
		if (!$fh = fopen($filename, "w")) {
			echo "Error opening $filename for writing.";
			exit;
		}

		if (!fwrite($fh, $this->queryText)) {
			echo "Error while writing to $filename";
		}
		fclose($fh);

	}		
		
	function pollForResponse() {
		$incomingFilename = $this->outputQueueDir . "{$this->id}";
		$outgoingFilename = $this->inputQueueDir . "{$this->id}";
		$started = time();
		while (time() - $started <= $this->timeout) {
			if (file_exists($incomingFilename)) {
				if (!$responseText = file_get_contents($incomingFilename)) {
					$this->error = "Unable to read from $incomingFilename!";
					return $this->pollForResponse();
				} else {
					$responseText = file_get_contents($incomingFilename);
					unlink($incomingFilename);
					$lines = explode("\n", $responseText);
					$firstlinearray = array_splice($lines, 0, 1);
					$firstline = explode("|", $firstlinearray[0]);
					if ($firstline[0] != "TYPE") {
						//echo "Bogus response received in response (first line not TYPE)";						
						$this->error = "Invalid reply received!";
						return 0;
					}
					$this->responseType = $firstline[1];
					$this->responseStatus = $firstline[4] == "SUCCESS" ? 1 : 0;
					// This will contain everything but the first line:
					$this->responseLines = $lines;
					//echo "Dump of the transaction object immediately after response was received:";
					//$this->logger->log($this, PEAR_LOG_DEBUG);
					// Clean up the response file
					if (file_exists($outgoingFilename)) {
						fclose($outgoingFilename);
						unlink($outgoingFilename);
					}
					return 1;
				}
			}
			usleep($this->waitTime);
		}
		//$this->log("Timed out waiting for a response in $incomingFilename");
		$this->error = "Timed out waiting for a response in $incomingFilename";
		// No response, so make sure we clean up:
		if (file_exists($outgoingFilename)) {
			fclose($outgoingFilename);
			unlink($outgoingFilename);
		}
		return 0;
	}

	
	
}

$index = new Index;



?>