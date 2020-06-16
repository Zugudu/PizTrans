<html>
<head>
<meta charset=utf8>
<link rel="stylesheet" type="text/css" href="style.css" />
<link rel="stylesheet" type="text/css" media="(max-device-width:480px)" href="mob.css"/>
<style>
@font-face
{
	font-family: Anime;
	src: url(a.ttf);
}
div
{
	margin: 15px 0;
	font: 100% Anime;
}
.block
{
	display: inline-block;
}
</style>
</head>
<body>
<center>
<?php
$db=new SQLite3("db");
$res=$db->querySingle("select name,dir from hentai where id=".
	$_GET['id'],true);

echo("<div class=name>".$res['name']."</div>");
echo("<div><div class=block>
	<a href=show.php?id=".urlencode($res['dir']).">
	<img class=image src=\"hentai/".
	$res['dir'].'/'
	.array_diff(scandir("hentai/".$res['dir']),array('.','..'))[2].'"></a></div>'.
	"<div class=disc>");
$genres=$db->query("select id_genres from hentai_genres 
	where id_hentai=".$_GET['id'].";");
while($genre=$genres->fetchArray())
{
	$r2=$db->querySingle("select id,name from genres where id=".
		$genre['id_genres'].';',true);
	echo("<a href=genres.php?id=\"".$r2['id']."\">".$r2['name']."</a> ");
}
echo("</div></div><div>
	<a href=/><img class=control src=ico/la.png></a>
	<a href=show.php?id=".urlencode($res['dir'])."><img class=control src=ico/ra.png></a></div>");
$db->close();
?>
</center>
</body>
</html>
