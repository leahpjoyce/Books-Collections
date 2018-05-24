<html>
<head>
    <title>Returned Data</title>
</head>
<body>
<?php
$array = Array(
    Array("jmcpeak", "someone@zyx.com"),
    Array("pwilton", "someone@xyz.com")
);

if (isset( $_GET["username"]) || isset( $_GET["email"])) 
{
	$result = false;
	$jsFunction = "";
	$searchTerm = "";
	
	if (isset( $_GET["username"])) 
	{
		$searchTerm = $_GET["username"];
		$jsFunction = "checkUsername_callBack";
		
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
		$jsFunction = "checkEmail_callBack";
		
		for ($i = 0; $i < count($array); $i++) 
		{
			if (strtolower($array[$i][1]) == strtolower($searchTerm)) 
			{
				$result = true;
			}
		}
	}

	$strResult = ($result)?"not available":"available";
?>
    <script>
		top.<?php echo $jsFunction; ?>("<?php echo $strResult; ?>", "<?php echo $searchTerm; ?>" );
    </script>
<?php
} 
else 
{
	echo "PHP is working correctly. Congratulations!";
}
?>
</body>
</html>