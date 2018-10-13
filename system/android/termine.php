<?php
header('Content-Type: text/html; charset=utf-8');
$user = 'sql6082583';
$pass = 'vbpkt*m';
$host = 'mysqlsvr05.world4you.com';
$db_name = '6082583db1';
$table = 'termine';
try{
$db = new PDO("mysql:host=$host;dbname=$db_name", $user,$pass);
}
catch(exception $e)
{
echo("Die Verbindung zur Datenbank kann nicht hergestellt werden");
}
$ref = $db->query("SELECT * FROM $table ORDER BY beginn");
$keyword = "Linux";
foreach($ref as $row)
{
    if((time() - (60*60*24)) < strtotime($row['beginn'])) {
    echo(utf8_encode($row['name'].$keyword));
    echo(utf8_encode($row['treffpunkt'].$keyword));
    echo(utf8_encode($row['beginn'].$keyword));
    echo(utf8_encode($row['adjustierung'].$keyword));
    echo(utf8_encode($row['dauer']));
    echo("\n");
    }
}

?>
