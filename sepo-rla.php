<?php

// This is the main program file

namespace seporla;

require('SepoLog.php');
require('SepoLogAnalyzer.php');

function main(){

	// A file path has to be given as an argument
	$shortOpt = 'p:';

	$longOpt = array(
		'help');

	$options = getopt($shortOpt, $longOpt);


	// Help argument was given
	if (isset($options['help'])){
		echo "\nPlease provide a file path to a log file by using the -p parameter followed by a file path like this:\nsepo-rla.php -p '/path/to/your/file.log'\n";
		exit();
	}


	// Path argument was given
	if(isset($options['p'])){

		$filePath = $options['p'];

		// Validate path
		if(file_exists($filePath)){

			// functionality goes here

		}

		else{

			echo "\nThe file path you provided, wasn't valid.\n";
			exit();

		}

	}

}

main();

?>