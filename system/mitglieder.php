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
		<center id="ueberschrift">Mitglieder</center></center>
		<table id="contentbox1" class="insbox">
		<?php
                    $insabfrage = "SELECT * FROM instrumente ORDER BY ins_name";
                    $insres = $db->query($insabfrage);
                    foreach($insres as $row)
                    {
                        echo('<tr><td><a href="#'.$row['ins_kuerzel'].'">'.$row['ins_name'].'</a></td></tr>'."\n");
                    }
                ?>
                <tr><td><a href="#emg">Ehrenmitglieder</a></td></tr>
		</table><center>
		<table padding="20px" cellspacing="20" id="members">
                <?php
                $insabfrage = "SELECT * FROM instrumente ORDER BY ins_name";
                $insres = $db->query($insabfrage);
                foreach($insres as $row)
                {
                $insfile = $row['ins_bild'];
                if(!file_exists('../img/instrumente/'.$insfile))
                {
                    $insfile = "default.jpg";
                }
                echo("\n".'<tr id="'.$row['ins_kuerzel'].'">'."<td><img src=");
                echo('"../img/instrumente/'.$insfile.'" alt="Grafik kann nicht geladen werden" /></td></tr>');
                $innersh = 'SELECT * FROM mitglieder WHERE mg_instrument="'.$row['ins_kuerzel'].'"';
                $innerres = $db->query($innersh);
                foreach($innerres as $innerrow)
                {
                    if($innerrow['mg_aktiv'])
                    {
                    $file = $innerrow['mg_bild'];
                    if(!file_exists('../bilder/mitglieder/'.$file))
                    {
                        $file = "default.jpg";
                    }
                    echo("\n".'<tr><td>');
                    echo($innerrow['mg_name']."</td><td>");
                    echo($innerrow['mg_vorname']."</td><td>");
                    $jahr = $innerrow['mg_beitrittsjahr'];
                    if ($jahr < 1950){
                        $jahr = "";
                    }
                    echo($jahr."</td><td><img src=");
                    echo('"../bilder/mitglieder/'.$file.'" alt="Grafik kann nicht geladen werden"/>');
                    }
                }
                }
                
                $emabfrage = "SELECT * FROM ehrenmitglieder ORDER BY em_name";
                $emres = $db->query($emabfrage);
                echo('<tr id="emg"><td>Ehrenmitglieder</td></tr>');
                foreach($emres as $row)
                {
                    echo("<tr><td>".$row['em_name']."</td><td>".$row['em_vorname']." ".$row['em_zusatz']."</td></tr>\n");
                }
                ?>
		</table>
		</center>

