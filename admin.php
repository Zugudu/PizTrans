<html>
<head>
<meta charset=utf8>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<center>
<?php
$db=new SQLite3("db");
if(isset($_POST['id_m']) && isset($_POST['id_g']))
{
	$stmt=$db->prepare("insert into hentai_genres values(:idm,:idg);");
			$stmt->bindValue(':idm',$_POST['id_m'],SQLITE3_INTEGER);
			$stmt->bindParam(':idg',$idg,SQLITE3_INTEGER);
	foreach ($_POST['id_g'] as $idg)
	{
		$stmt->execute();
	}
}
if(isset($_POST['genre']))
{
	$s_check=$db->prepare('select id from genres where name like :g_name');
		$s_check->bindValue(':g_name',$_POST['genre'],SQLITE3_TEXT);
		$r_check=$s_check->execute();

	if(!$r_check->fetchArray())
	{
		$s_add=$db->prepare('insert into genres values(null,:g_name);');
			$s_add->bindValue(':g_name',$_POST['genre'],SQLITE3_TEXT);
			$s_add->execute();
	}else{
		echo('THIS TAG EXISTS!');
	}
}

$res=$db->query("select id,name from hentai;");
echo "<form method=post><select name=id_m>";
while($arr=$res->fetchArray())
{
	echo("<option value=".$arr['id'].">".$arr['name']."</option>");
}
echo("</select> <select name=id_g[] multiple>");
$res=$db->query("select id,name from genres;");
while($arr=$res->fetchArray())
{
	echo("<option value=".$arr['id'].">".$arr['name']."</option>");
}
$db->close();
?>
</select> <input type='submit' value=Submit></form>
<br><hr>
<form method=post>
Назва теґу <input type=text name=genre>
<input type='submit' value='Add'>
</form>
</center>
</body>
</html>
