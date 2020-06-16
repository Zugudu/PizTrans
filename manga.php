<html>
<head>
<meta charset=utf8>
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
.disc
{
	display: inline-block;
	vertical-align: top;
	width: 200px;
	margin-left:10px;
}
.name
{
	font: bold 120% Anime;
}
.image
{
	display: block;
	width: 200px;
	height: 300px;
	outline: #515151 solid 3px;
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
echo("<div><div class=block><img class=image width=200 height=300 src=\"hentai/".
	$res['dir'].'/'
	.array_diff(scandir("hentai/".$res['dir']),array('.','..'))[2].'"></div>'.
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
	<a href=/><img width=40 src=ico/la.png></a>
	<a href=show.php?id=".urlencode($res['dir'])."><img width=40 src=ico/ra.png></a></div>");
$db->close();
?>
</center>
</body>
</html>
