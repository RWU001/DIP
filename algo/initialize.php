<?php

	/*write the input to matlab into "matlab_input.txt", e.g.:
	6 16 99
	The first value indicates datasetID.
	The second value indicates the number of types (classes) in this dataset. (not the number of images!!!)
	The third value is the budget (currently we don't use it, please put a random integer temporarily).
	*/
	$fin = fopen("matlab_input.txt", "w") or die("Unable to open file!");
	fwrite($fin, "6 16 99");
	fclose($fin);

	
	$command = "Initialize";
	system($command);
	echo "DatasetID = 6, initialization success";
?>