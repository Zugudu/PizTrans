<html>
<head>
<meta charset=utf8>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<center>
<div id=cp>
<a href=/><img id=cpelem width=40 src=ico/home.png></a>
</div>
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
