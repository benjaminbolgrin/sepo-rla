<?php

// This is the main program file

namespace seporla;

require('SepoLog.php');
require('SepoLogAnalyzer.php');

function main(){

	// A file path has to be given as an argument
	$shortOpt = 'p:';
	$shortOpt .= 's::';
	$shortOpt .= 'm::';
	$shortOpt .= 'd';

	$longOpt = array(
		'help');

	$options = getopt($shortOpt, $longOpt);


	// Help argument was given
	if (isset($options['help'])){
		echo "\n-p\t\tPlease provide a file path to a log file by using\n
		the -p parameter followed by a file path like this:\n
		sepo-rla.php -p '/path/to/your/file.log'\n\n
		\n-s\t\tOptional Parameter to display the top requests by serial\n
		Use -s10 to display the top ten entries\n\n
		\n-m\t\tOptional parameter to display an array with top serials used on multiple devices\n
		Use -m10 to display the top ten entries\n\n
		\n-d\t\tOptional parameter to display information about hardware in use
		\n\n";
		exit();
	}


	// Path argument was given
	if(isset($options['p'])){

		$filePath = $options['p'];

		// Validate path
		if(file_exists($filePath)){

			$logArray = new SepoLog($filePath);
			$logAnalyzer = new SepoLogAnalyzer($logArray);

			// If the program has been started with the s argument, display an array with top requests by serial numbers
			if(isset($options['s'])){

				$optS = (int)$options['s'];

				if(is_int($optS)){

					$sLimit = $optS;

					var_dump($logAnalyzer->getMostRequestsBySerial($sLimit));

				}

			}

			// If the program has been started with the m argument, display an array with top serials used on multiple devices
			if(isset($options['m'])){

				$optM = (int)$options['m'];

				if(is_int($optM)){

					$mLimit = $optM;

					var_dump($logAnalyzer->getMostUsedSerials($mLimit));

				}

			}

			// If the program has been started with die d argument,
			// display information about hardware in use
			if(isset($options['d'])){

				var_dump($logAnalyzer->getDevicesByHardware());

			}

		}

		else{

			echo "\nThe file path you provided, wasn't valid.\n";
			exit();

		}

	}

}

main();

?>