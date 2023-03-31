<?php

// The SepoLogAnalyzer object operates on the SepoLog object
namespace seporla;

class SepoLogAnalyzer{

	private $sepoLog;

	function __construct(SepoLog $sepoLog){

		$this->sepoLog = $sepoLog;

	}

}

?>