<?php
// Verbindungsherrstellung	
define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_DATABASE", "Pflegonaut");

//mysql Datenbankzugriffsvariable erstellen
$connect = mysqli_connect(DB_SERVER , DB_USER, DB_PASSWORD, DB_DATABASE);

//Fehlerausgabe bei Nichtfunktion der Verbindung
if ($connect== false)
	{
	printf ("Verbindung zur Datenbank fehlgeschlagen:", $connect->connect_error);
	exit ();
	}
?>