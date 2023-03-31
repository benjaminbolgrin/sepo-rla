<?php

// The SepoLog object is the handler for the log file

namespace seporla;

class SepoLog{

	private $filePath;
	private $logArray;

	// The constructor gets a file path as a String argument
	function __construct($filePath){

		$this->filePath = $filePath;
		createLogArray($this->filePath);

	}

	// This function returns an array with relevant information
	public function getLogArray(): Array{

		return $this->logArray;

	}

	// This function reads the log file and creates the logArray
	private function createLogArray($filePath){

		// functionality goes here

	}

}

?>