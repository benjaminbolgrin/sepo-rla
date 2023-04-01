<?php

// The SepoLog object is the handler for the log file

namespace seporla;

class SepoLog{

	private $filePath;
	private $logArray;

	// The constructor gets a file path as a String argument
	function __construct($filePath){

		$this->filePath = $filePath;
		$this->createLogArray();

	}

	// This function returns an array with relevant information
	public function getLogArray(): Array{

		return $this->logArray;

	}

	// This function reads the log file and initializes the logArray
	private function createLogArray(){

		try{

			$logFile = fopen($this->filePath, "r");

		}

		catch(Exception $e){

			echo "\nFile couldn't be read. \n";

			exit();

		}

		if($logFile){

			while (($line = fgets($logFile)) !== false){

				$jSonObject = $this->getDecodedJson($this->getEncodedJson($line));

				$this->logArray[] = array(

					"serial" => $this->getSerial($line),
					"mac" => $this->getJsonData($jSonObject, "mac"),
					"nic" => $this->getJsonData($jSonObject, "nic"),
					"mem" => $this->getJsonData($jSonObject, "mem"),
					"cpu" => $this->getJsonData($jSonObject, "cpu"),
					"httpaveng" => $this->getJsonData($jSonObject, "httpaveng"),
					"spcf" => $this->getJsonData($jSonObject, "spcf"),
					"httpssl" => $this->getJsonData($jSonObject, "httpssl")

				)

			}

		}

	}

	// This function retrieves the serial number from a line of log
	private function getSerial($logLine): String{

		$serial = strtok(substr($logLine, strpos($logLine, "serial=") + 7), " ");
	
		return $serial;

	}

	// This function retrieves the encoded JSON string from a line of log
	private function getEncodedJson($logLine): String{

		$encodedJson = strtok(substr($logLine, strpos($logLine, "specs=") +6), " ");

		return $encodedJson;

	}

	// This function returns a decoded JSON string
	private function getDecodedJson($encodedJson): String{

		$decodedJson = gzdecode(base64_decode($encodedJson, true));

		return $decodedJson;

	}

	// This function returns a specific value from a JSON object
	private function getJsonData($json, $key): String{

		$jSon = json_decode($json);

		return $jSon->$key;

	}

}

?>