<?php
	define("FILENAME","dictionary.json");
	define("TOFILE", "dictionary_words.txt");
	$file = fopen(FILENAME,"r") or die("Unable to open file");
	echo FILENAME." has been open successfully.\n";

	$tofile = fopen(TOFILE,"w") or die("Unable to open file");
	echo TOFILE." has been open successfully. Data Present has been removed\n";
	$json = fread($file,filesize(FILENAME));
	$jsonArr = json_decode($json);
	$dictText = "";
	$total = count($jsonArr);
	$count = 0;
	foreach ($jsonArr as $word) 
	{
		$count++;
		echo "$word\n";
		$dictText.="$word";
		if($count!=$total)
			$dictText.="\n";
	}

	echo "Now writing TEXT in ".TOFILE."\n";
	fwrite($tofile, $dictText);
	echo "Write Complete. . .\n";
	fclose($file);
?>