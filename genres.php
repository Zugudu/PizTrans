<html>
<head>
<meta charset=utf8>
<meta name=viewport width=device-width>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<center>
<div id=cp>
<a href=/><img id=cpelem width=40 src=ico/home.png></a>
</div>
<?php
$db=new SQLite3("db");
$res=$db->query("select id,name,dir from hentai,hentai_genres where id_hentai=id and id_genres=".$_GET['id'].";");

$cx=0;
echo("<div class=wrap>");
while($arr=$res->fetchArray())
{
	if($cx++==4)
	{
		echo("</div><div class=wrap>");
		$cx=1;
	}
	echo ("<div class=block><div class=image><a href=manga.php?id=".
		$arr['id']."><img src=\"hentai/".
		$arr['dir']."/".
		array_diff(scandir("hentai/".$arr['dir']),array('.','..'))[2].
		"\" width=200 height=300></a></div>".
		"<div class=caption>".$arr['name']."</div></div>");
}
echo("</div>");
$db->close();
?>
</center>
</body>
</html>
