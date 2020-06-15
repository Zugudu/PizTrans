<html>
<head>
<meta charset=utf8>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<center>
<form method=post>
<select name=id_m>
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

$res=$db->query("select id,name from hentai;");
while($arr=$res->fetchArray())
{
	echo("<option value=".$arr['id'].">".$arr['name']."</option>");
}
echo("</select><select name=id_g[] multiple>");
$res=$db->query("select id,name from genres;");
while($arr=$res->fetchArray())
{
	echo("<option value=".$arr['id'].">".$arr['name']."</option>");
}
echo("</select>");
$db->close();
?>
<input type='submit' value=Submit>
</form>
</center>
</body>
</html>
