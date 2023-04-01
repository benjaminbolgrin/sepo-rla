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

				// functionality goes here

			}

		}

	}

}

?>