<?php
session_start ();
if (isset ($_SESSION["username"])) 
{
//mysql Datenbankzugriffsvariable erstellen
include 'database.php';
?>

<!DOCTYPE html>
<html>
	<head>
		<title> Pflegonaut Willkommen </title>
	</head> 
	<body>
		<fieldset>
		<h1> Willkommen beim Pflegonaut </h1>
<?php
	
	
		$Frage = $_POST ["Frage"];
		$Antwort1 = $_POST ["Antwort1"];	
		$Antwort2 = $_POST ["Antwort2"];	
		$Antwort3 = $_POST ["Antwort3"];	
		$Antwort4 = $_POST ["Antwort4"];
		$korrekte_Antwort = $_POST ["correct"];
		$Anmerkungen = $_POST ["Anmerkungen"];	
		$Bild = $_FILES; // Eintrag Bild fehlerhaft
			
		if ($Frage == "" or $Antwort1 == "" or $Antwort2 == "" or $Antwort3 == "" or $Antwort4 == "")
		 	{
		 		echo "Du hast leider in eins der Felder nichts eingetragen (Anmerkungen ausgenommen).</b> </p>  
		 		Bitte gehe zurück 	und versuche es erneut.</b> </p></p>";
		 	}
		else 
		 	{
		 		$connect = mysqli_connect (DB_SERVER , DB_USER, DB_PASSWORD, DB_DATABASE)
		 		or die ("Die Verbindung hat nicht funktioniert");
		 	}
		 	
		 	mysqli_select_db ($connect, "Pflegonaut" )
		 	or die ("Verbindung zur Datenbank hat nicht funktioniert");
		 	
		 	{
		 		$eintrag = "INSERT INTO Bewegungsapperat
		 		(Frage, Antwort1, Antwort2, Antwort3, Antwort4, correct, Anmerkungen)
		 	
		 		VALUES
		 		('$Frage', '$Antwort1', '$Antwort2', '$Antwort3', '$Antwort4', '$korrekte_Antwort', '$Anmerkungen')";
		 	}
		 	
		 	{
		 		$eintragen = mysqli_query ($connect, $eintrag);
		 	
		 		//Eintrag Bild fehlerhaft
		 		$Bildeintrag = "INSERT INTO Bewegungsapperat
		 		(Frage_Bild)
		 		
		 		Values
		 		('$Bild')";
		 		
		 		mysqli_query ($connect, $Bildeintrag);
						
							
		 	
		 	
		 	
		 	/* $Fragen_und_Antworten_ID = "select max(Fragen_und_Antworten_ID) from Bewegungsapperat";        
		 	 // Größte ID wird ausgelesen und in $sqli gespeichert
		 	 $Fragen_und_Antworten_ID = $Fragen_und_Antworten_ID + 1;
		 	 $eintrag = "INSERT INTO Bewegungsapperat
		 	(Fragen_und_Antworten_ID)
		 	VALUES
		 	('$Fragen_und_Antworten_ID')";
		 	$eintragen = mysqli_query ($connect, $eintrag);
		 	echo $Fragen_und_Antworten_ID; 
		 	*/ 
		 	 
		 	
		 	if ($eintragen == true)
		 	echo "</p> Vielen Dank für Deine tolle Mithilfe!";
		 	

		 	// Hinzufuegen der Fragen Id
//////////////////////////////////////////////////////////////////////////////////////////////////////
/*
$Frage = $_POST ["Frage"];
$choices = array();
$Antwort1 = $_POST ["Antwort1"];	
$Antwort2 = $_POST ["Antwort2"];	
$Antwort3 = $_POST ["Antwort3"];	
$Antwort4 = $_POST ["Antwort4"];
$Anmerkungen = $_POST ["Anmerkungen"];
$correct_choice = $_POST ["correct"];


		 	
$eintrag = "INSERT INTO Bewegungsapperat
		 	(Frage, Antwort1, Antwort2, Antwort3, Antwort4, Anmerkungen)
		 	
		 	VALUES
		 	('$Frage', '$Antwort1', '$Antwort2', '$Antwort3', '$Antwort4', '$Anmerkungen')";
		 	
$eintragen = mysqli_query ($connect, $eintrag);
		 	
		 			 	
		 	
		 	if ($eintragen)
		 		{
		 		foreach($choices as $choice -> $value)
		 			{
   					if($value != '')
   						{
    					if($correct_choice == $choice)
    						{
     						$is_correct =1;
    						} 
    					else
    						{
    						$is_correct = 0;
    						}
    					$eintrag = "INSERT INTO Bewegungsapperat
		 					(Frage, Antwort1, Antwort2, Antwort3, Antwort4, correct, Anmerkungen)
		 	
		 					VALUES
		 					('$Frage', '$Antwort1', '$Antwort2', '$Antwort3', '$Antwort4', '$is_correct', '$Anmerkungen')";
		 				$eintragen = mysqli_query ($connect, $eintrag);
		 				
		 				 if($insert_row)
		 				 	{
     						continue;
    						}
    					 else 
    					 	{
     						die('Error: ('.$mysqli->errno . ') '.$mysqli->error);
    						}	
    					}
    				}
    			
    			
		 	
?
*/		 	
		 	
		 	
		 	
		 	
		 
		 	mysqli_close ($connect);
}
		 				
	?>	
		</fieldset>
		
		
		
		
		<fieldset>
		<form action="Frageneingabe.php">
    <input type="submit" value="Nächste Frage eingeben" />
		</fieldset>
		
			
			
	</body>
</html>

<?php
//Session und Verbindung
}
?>
	