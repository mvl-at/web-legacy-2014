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

		<center><center id="ueberschrift">Termine</center>

		<p></p>
		<div id="table">
		<table id="termine">
			<tr>
				<th class="zelle" valign="middle" align="center"><font>Termin</font></th>
				<th class="zelle" valign="middle" align="center"><font>Treffpunkt der Mitglieder</font></th>
				<th class="zelle" valign="middle" align="center"><font>Beginn</font></th>
				<th class="zelle" valign="middle" align="center"><font>Adjustierung</font></th>
			</tr>
			<?php $state = "SELECT * FROM termine ORDER BY beginn";
			$result = $db->query($state);
			foreach($result as $row): ?>
			<?php if((time()) - (60*60*24) < strtotime($row['beginn'])): ?>
			<tr>
				<td class="zelle" valign="center" align="center"><br><?php echo $row['name']; ?></br></td>
				<td class="zelle" valign="middle" align="center"><br><?php echo $row['treffpunkt']; ?></br></td>
				<td class="zelle" valign="middle" align="center"><br><?php echo $row['beginn']; ?></br></td>
				<td class="zelle" valign="middle" align="center"><br><?php echo $row['adjustierung']; ?></br></td>
			</tr>
			<?php endif; ?>
			<?php endforeach; ?>
		</table>
		</div><center/>

