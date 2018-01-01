<?php

session_start (); /*Session start, Cookie wird auf Rechner hinterlegt. Immer an erster Stelle im Skript, auch vor html*/
$verhalten = 0;
if (!isset($_SESSION ["username"]) and !isset($_GET["page"]))
	{
	$verhalten = 0; 
	}
/*Abfrage ob die Session 'username' nicht! (!, bedeutet Gegenteil) vorhanden ist */
if (isset($_GET["page"]) && ($_GET["page"]) == "log") 
{
$user = strtolower ($_POST["user"]);
$passwort = md5 ($_POST ["passwort"]); //Abruf der eingegeben Informationen, Verschluesselung, Ignorieren der Gross/ Kleinschreibung
}

//mysql Datenbankzugriffsvariable erstellen
include 'database.php';


$control = 0;
$abfrage = "SELECT * FROM login WHERE user = '$user' AND passwort = '$passwort'"; // abfrage des eingegeben Wertes fuer User, wenn gleich mit einem Wert aus der Datenbank-> control +1
$ergebnis = mysqli_query ($connect, $abfrage);
while ($row = mysqli_fetch_object ($ergebnis))
	{
	$control++; 
	}



if ($control != 0)
{ 
$_SESSION ["username"] = $user;
$verhalten = 1; }
else 
{ 
$verhalten == 2; }
?>

<html>
<head>
<title> LOGIN </title>
<?php
if ($verhalten == 1) {
?>
	<meta http-equiv="refresh" content="3; URL=index_select_db.php"/>
<?php
}
?>
<h1> Willkommen bei der Pflegonaut Redaktion </h1>
</head>
<body>
<!-- nicht eingeloggt/ Verhalten 0 -->
<?php
if ($verhalten == 0)
{
?>
<h2>Bitte logge Dich ein: </h2><br/>
<form method="post" action="index_login.php?page=log">
	User: </br> <input type="text" name="user"/> </br>
	Passwort: </br> <input type="password" name="passwort"/> </br>
	</br> <input type="submit" value="einloggen"/>
	
<p>Du willst mithelfen? <a href='register.php'> Jetzt registrieren </a> </p>
</form>

<?php
}
?>

<?php 
if ($verhalten == 1)
{
?>
Du hast Dich richtig eingeloggt und wirst nun weiter geleitet.....
<?php
}
?>

<?php
if ($verhalten == 2)
{
?>
Du hast Dich nicht richtig eingeloggt, <a href="index_login.php"> back </a>.
<?php
}
?>
</body>
</html>
