<?php
	$file=fopen("dictionary.json","r");
	$arr=json_decode(fread($file,filesize("dictionary.json")));
	foreach($arr as $key)
	{
		echo $key."\n";
		if($key=="police")
			break;
	}

?>