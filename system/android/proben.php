<?php
header('Content-Type: text/html; charset=utf-8');
$user = 'sql6082583';
$pass = 'vbpkt*m';
$host = 'mysqlsvr05.world4you.com';
$db_name = '6082583db1';
$table = 'probenblacklist';
try{
$db = new PDO("mysql:host=$host;dbname=$db_name", $user,$pass);
}
catch(exception $e)
{
echo("Die Verbindung zur Datenbank kann nicht hergestellt werden");
}
$ref = $db->query("SELECT * FROM $table");
$keyword = "Linux";
foreach($ref as $row)
{
    echo(utf8_encode("Probe".$keyword));
    echo(utf8_encode($keyword));
    echo(utf8_encode($row['datum'].$keyword));
    echo(utf8_encode($keyword));
    echo("\n");
}

?>