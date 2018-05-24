<?php

header("Content-Type: text/plain");
header("Cache-Control: no-cache");

$array = Array(
    Array("jmcpeak", "someone@zyx.com"),
    Array("pwilton", "someone@xyz.com")
);

if (isset( $_GET["username"]) || isset( $_GET["email"])) 
{
	$result = false;

	if (isset( $_GET["username"])) 
	{
		$searchTerm = $_GET["username"];
	    
		for ($i = 0; $i < count($array); $i++) 
		{
			if (strtolower($array[$i][0]) == strtolower($searchTerm)) 
			{
				$result = true;
			}
		}
	}

	if (isset( $_GET["email"])) 
	{
		$searchTerm = $_GET["email"];
	    
		for ($i = 0; $i < count($array); $i++) 
		{
			if (strtolower($array[$i][1]) == strtolower($searchTerm)) 
			{
				$result = true;
			}
		}
	}

	$strResult = ($result)?"not available":"available";

	echo $strResult;
} 
else 
{
	echo "PHP is working correctly. Congratulations!";
}
?>