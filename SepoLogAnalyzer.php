<?php

// The SepoLogAnalyzer object operates on the SepoLog object
namespace seporla;

class SepoLogAnalyzer{

	private $sepoLog;

	function __construct(SepoLog $sepoLog){

		$this->sepoLog = $sepoLog;

	}

	// This function returns an array with a list of serials, that requested the server the most,
	// limited by the int limit
	private function getMostRequestsBySerial($limit): Array{

		// functionality goes here

	}

}

?>