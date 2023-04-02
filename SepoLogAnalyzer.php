<?php

// The SepoLogAnalyzer object operates on the SepoLog object
namespace seporla;

class SepoLogAnalyzer{

	private $sepoLog;

	function __construct(SepoLog $sepoLog){

		$this->sepoLog = $sepoLog->getLogArray();

	}

	// This function returns an array with a list of serials, that requested the server the most,
	// limited by the int limit
	public function getMostRequestsBySerial($limit): Array{

		$serialArray = array();
		
		echo "\nCounting serials...\n";

		for($i = 0; $i < count($this->sepoLog); $i++){

			$serial = $this->sepoLog[$i]["serial"];


			if(array_key_exists($serial, $serialArray)){

				$serialArray[$serial] += 1;

			}

			else{

				$serialArray[$serial] = 1;

			}

		}

		arsort($serialArray);

		$i = 0;
		$top = array();

		foreach($serialArray as $key => $value){

			$top[$key] = $value;
			if(++$i == $limit) break;

		}

		return $top;

	}

	// This function returns an array with a top list of serials,
	// that are installed on multiple devices
	public function getMostUsedSerials($limit): Array{

		echo "\nCounting devices...\n";

		$serialDeviceArray = [];

		for($i = 0; $i < count($this->sepoLog); $i++){

			$serial = $this->sepoLog[$i]["serial"];
			$mac = $this->sepoLog[$i]["mac"];

			if(array_key_exists($serial, $serialDeviceArray)){

				if(!in_array($mac, $serialDeviceArray[$serial])){
					$serialDeviceArray[$serial][] = $mac;
				}

			}

			else{
			
				$serialDeviceArray[$serial] = array();
				$serialDeviceArray[$serial][] = $mac;

			}

		}

		arsort($serialDeviceArray);

		$i = 0;
		$top = array();

		foreach($serialDeviceArray as $key => $value){

			$top[$key] = $value;
			if(++$i == $limit) break;

		}

		return $top;

	}

	// This function returns an array with a "cpu, mem" key and the number of devices in use
	// with that combination
	public function getDevicesByHardware(): Array{

		//functionality goes here

	}

}

?>