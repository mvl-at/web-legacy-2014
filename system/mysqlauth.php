 $DB_HOST = 'mysql.viennaweb.at';
	$DB_USER = 'u10803_1';
	$DB_PASSWORD = 'cPJsGKnq';
	$DB_NAME = 'd10803_1';

	// Kann in eine Datei mit allgemeinen Initialisierungsfunktionen ausgelagert werden
	mysql_connect($DB_HOST, $DB_USER, $DB_PASSWORD) or die (mysql_error());
	mysql_select_db($DB_NAME) or die (mysql_error());
	mysql_set_charset('utf8_bin'); 
	
