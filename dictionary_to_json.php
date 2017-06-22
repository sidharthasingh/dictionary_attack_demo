<?php
	define("FILENAME","dictionary_words.txt");
	define("TOFILE", "dictionary.json");
	$file = fopen(FILENAME,"r") or die("Unable to open file");
	echo FILENAME." has been open successfully.\n";

	$tofile = fopen(TOFILE,"w")  or die("Unable to open file");
	echo TONAME." has been open successfully. Data Present has been removed\n";

	$jsonArr = array();
	$count=0;
	while(!feof($file))
	{
		$count++;
		$word = str_replace("\n", "", fgets($file));
		$word=str_replace("\r","",$word);
		$jsonArr[] = $word;
		echo "$count - $word\n";
	}
	$json=json_encode($jsonArr);

	echo "Now writing JSON in ".TOFILE."\n";
	fwrite($tofile, $json);
	echo "Write Complete. . .\n";
	fclose($file);
?>