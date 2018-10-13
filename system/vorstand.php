



		<center><center id="ueberschrift">Vorstand</center>


		
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
?>


		<center>
		</table><center>
		<table padding="20px" cellspacing="20" id="members">
                <?php
            $user = 'sql6082583';
            $pass = 'vbpkt*m';
            $host = 'mysqlsvr05.world4you.com';
            $db_name = '6082583db1';
            $erg = 0;
            try
            {
                $db = new PDO("mysql:host=$host;dbname=$db_name;charset=utf8", $user,$pass);
            }
            catch(exception $e)
            {
                echo("Die Verbindung zur Datenbank kann nicht hergestellt werden");
            }
            $vorstabfrage = "SELECT * FROM mitglieder INNER JOIN (vorstand INNER JOIN vorstandfunktionen ON vorstand.vs_funktion=vorstandfunktionen.vf_kuerzel) ON mitglieder.mg_id=vorstand.vs_person ORDER BY vf_reihenfolge, vs_stellvertreter";
            $vorstres = $db->query($vorstabfrage);
            foreach($vorstres as $row)
            {
                $rangnummer = (int)$row['vs_stellvertreter'];
                $erg = $erg + $rangnummer;
                $rang = "";
                $suffix = "";
                if ($rangnummer > 0)
                {
                    if($rangnummer > 1)
                    {
                    $rang = $rangnummer.'. ';
                    }
                    $suffix = " Stellvertreter";
                }
                $bild = $row['mg_bild'];
                if(!file_exists('../bilder/mitglieder/'.$bild))
                {
                    $bild = "default.jpg";
                }
                echo('<tr><td><img src="../bilder/mitglieder/'.$bild.'" alt="Grafik kann nicht geladen werden" /></td><td>'.$rang.$range.$row['vf_name'].$suffix.'<br/>'.$row['mg_name'].' '.$row['mg_vorname'].'</td></tr>');
            }
            ?>
		</table>
		</center>



