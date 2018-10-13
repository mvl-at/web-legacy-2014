<!DOCTYPE html>
<html>
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Musikverein Leopoldsdorf</title>
<link href="./mitglieder.css" rel="stylesheet" type="text/css" />
</head>
    <body>
        <table>
            <?php
            $user = 'sql6082583';
            $pass = 'vbpkt*m';
            $host = 'mysqlsvr05.world4you.com';
            $db_name = '6082583db1';
            try
            {
                $db = new PDO("mysql:host=$host;dbname=$db_name;charset=utf8", $user,$pass);
            }
            catch(exception $e)
            {
                echo("Die Verbindung zur Datenbank kann nicht hergestellt werden");
            }
            $insabfrage = "SELECT * FROM instrumente ORDER BY ins_name";
                $insres = $db->query($insabfrage);
                foreach($insres as $row)
                {
                $innersh = 'SELECT * FROM mitglieder WHERE mg_instrument="'.$row['ins_kuerzel'].'"';
                $innerres = $db->query($innersh);
                $insfile = $row['ins_bild'];
                if(!file_exists('../../img/instrumente/'.$insfile))
                {
                    $insfile = "default.jpg";
                }
                echo("\n".'<tr id="'.$row['ins_kuerzel'].'" class="instrument" >'."<td><img src=");
                echo('"../../img/instrumente/'.$insfile.'" alt="Grafik kann nicht geladen werden" /></td><td>'.$row['ins_namemz'].'</td></tr>');
                
                foreach($innerres as $innerrow)
                {
                    if($innerrow['mg_aktiv'])
                    {
                    $file = $innerrow['mg_bild'];
                    if(!file_exists('../../bilder/mitglieder/'.$file))
                    {
                        $file = "default.jpg";
                    }
                    echo("\n".'<tr><td>');
                    echo('<img src="../../bilder/mitglieder/'.$file.'" alt="Grafik kann nicht geladen werden"/></td><td>'.$innerrow['mg_name'].' ');
                    echo($innerrow['mg_vorname']."<br/>Beitritt: ");
                    echo($innerrow['mg_beitrittsjahr']."</td></tr>");
                    
                    }
                }
                }
            ?>
        </table>
    </body>
</html>