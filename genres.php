<html>
<head>
<meta charset=utf8>
<meta name=viewport width=device-width>
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" media="(max-device-width:480px)" href="mob.css"/>
</head>
<body>
<center>
<a href=/><img class="home control" src=ico/home.png></a>
<?php
$db=new SQLite3("db");
$res=$db->query("select id,name,dir from hentai,hentai_genres where id_hentai=id and id_genres=".$_GET['id'].";");

echo("<div class=wrap>");
while($arr=$res->fetchArray())
{
	echo ("<div class=block><a href=manga.php?id=".
		$arr['id']."><img class=image src=\"hentai/".
		$arr['dir']."/".
		array_diff(scandir("hentai/".$arr['dir']),array('.','..'))[2].
		"\"></a>".
		"<div class=caption>".$arr['name']."</div></div>");
}
echo("</div>");
$db->close();
?>
</center>
</body>
</html>
