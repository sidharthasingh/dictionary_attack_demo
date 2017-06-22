<?php
	error_reporting(0);

	define("HOST","HOST_NAME");
	define("USER","USER_NAME");
	define("DATABASE","DB_NAME");
	define("PORT",3306);

	require("mysql_database.php");
	require("combination.php");

	$max_combo_length=1; // Set the number of words to make a combination
	initiate_combination(1); // Initiates the combination variables with fresh values, words, combo_length

	$str=nextCombination();	// get the next dictionary combination
	$count=0;
	while($str)
	{
		$count++;
		if(check($str))
		{
			echo "PASS : $str\n";
			break;
		}
		else
			echo "FAIL : $str\n";
		$str=nextCombination();

	}

?>