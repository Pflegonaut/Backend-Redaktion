<html>
<head> 
	<title>
	Registrieren
	</title>
</head>
<body>
<h3> Registrieren </h3>
<?php

  if (!isset ($_GET["page"])) { 
  // wenn 
    ?>
  <form action="register.php?page=2" method="post">
    Name: <input type="text" name="user" /><br /></br>
    Passwort: <input type="password" name="pw" /><br /><br />
    Passwort wiederholen: <input type="password" name="pw2" /><br /><br />
    <input type="submit" name="Senden" /><br /><br />
    <a href = "index_login.php"> zurück zum Login </a>
    </form>
  <?php
}
   ?>
<?php
if (isset($_GET["page"])) 
	{
    if ($_GET["page"] == "2") 
    {
    //Seite 2 in der Page gespeichert?
    $user = strtolower($_POST["user"]);  //str (string) tolower = alle Grossbuchstaben werden zu Kleinbuchstaben
    $pw = md5($_POST["pw"]); // md5 = Verschluesselung der Passwoerter, siehe andere Verschluesselung fuer Passwort zuruecksetzen Methode
    $pw2 = md5($_POST["pw2"]);
    
    if($pw != $pw2){ //pw ist ungleich der Wiederholung
       echo "Du hast deine Passwörter falsch wiederholt, bitte gib sie erneut ein...<a href=\"register.php\">zurück</a>";
    }
	else
    
//mysql Datenbankzugriffsvariable erstellen
include 'database.php';


$control = 0;
$abfrage = "SELECT user FROM login WHERE user = '$user'"; // abfrage des eingegeben Wertes fuer User, wenn gleich mit einem Wert aus der Datenbank-> control +1
$ergebnis = mysqli_query ($connect, $abfrage);
while ($row = mysqli_fetch_object ($ergebnis))
	{
	$control++; 
	}

		if ($control != 0)
		{
		echo "username schon vergeben, bitte verwende einen anderen Namen...<a href=\"register.php\">zurück</a>";
		}
		
		else
		{
		$eintrag = "INSERT INTO login
		(user, Passwort)
		 	
		VALUES
		('$user', '$pw')";
		 	
		 	$eintragen = mysqli_query ($connect, $eintrag);
		 	
		 	echo ($eintrag);
		 	
		 	if ($eintragen == true)
		 	{
		 	echo "<p> Vielen Dank für Deine Registrierung! </p><a href=\"index_login.php\">jetzt einloggen</a></p>";
		 	}
		 	else
		 	{
		 	echo "<p> Deine Registrierung hat leider nicht funktioniert. </br> Bitte kontaktiere Valentin.
		 	<a href=\"register.php\">zurück</a></p>";
		 	}
		 	 mysqli_close ($connect);
		 
		}



}
}
    ?>




</body>
</html>