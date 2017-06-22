<?php
	define("FILENAME", "dictionary.json");
	$max_combo_length=0;
	$jsonData="";
	$words=array();
	$totalWords=0;
	$counter=array();

	function initiate_combination()
	{
		global $totalWords,$counter,$words,$max_combo_length;
		$file=fopen(FILENAME,"r");
		if($file == NULL)
		{
			echo "\n> Dictionary not found . WILL EXIT <\n\n";
			exit;
		}
		$jsonData=fread($file, filesize(FILENAME));
		$words=json_decode($jsonData);
		$totalWords=count($words);
		$counter=array();
		for($i=0;$i<$max_combo_length;$i++)
			$counter[$i]=0;
		$counter[$max_combo_length-1]=-1;
		fclose($file);
	}

	function nextCombination()
	{
		global $totalWords,$counter,$words,$max_combo_length;
		for($i=$max_combo_length-1;$i>=0;$i--)
		{
			if($counter[$i]==$totalWords-1)
			{
				if($i==0)
					return false;
				else
					$counter[$i]=0;
			}
			else
			{
				$counter[$i]++;
				break;
			}
		}
		$str="";
		for($i=0;$i<$max_combo_length;$i++)
			$str.=$words[$counter[$i]];
		$str=str_replace("\r","", $str);
		return $str;
	}

	function previousCombination()
	{
		global $totalWords,$counter,$words,$max_combo_length;
		for($i=$max_combo_length-1;$i>=0;$i--)
		{
			if($counter[$i]==0)
			{
				if($i==0)
					return false;
				else
					$counter[$i]=$max_combo_length-1;
			}
			else
			{
				$counter[$i]--;
				break;
			}
		}
		$str="";
		for($i=0;$i<$max_combo_length;$i++)
			$str.=$words[$counter[$i]];
		$str=str_replace("\r","", $str);
		return $str;
	}
?>