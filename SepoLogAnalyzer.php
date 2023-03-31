<?php

// The SepoLogAnalyzer object operates on the SepoLog object

class SepoLogAnalyzer{

	final private $sepoLog;

	function __construct(SepoLog $sepoLog){

		$this->sepoLog = $sepoLog;

	}

}

?>