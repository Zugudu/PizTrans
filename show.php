<html>
<head>
<meta charset=utf8>
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" media="(max-device-width:480px)" href="mob.css"/>
</head>
<body>
<center>
<a href=/><img class="control home" src=ico/home.png></a>
<?php
if(strpos($_GET['id'],'..')===false)
{
	$imgs=array_diff(scandir("hentai/".$_GET['id']),array('.','..'));
	foreach($imgs as $img)
	{
		echo("<img id=imgs src=\"hentai/".$_GET['id']."/$img\"><br>");
	}
}
?>
</center>
</body>
</html>
