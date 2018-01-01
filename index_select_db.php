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
			<h1> Willkommen beim Pflegonaut <?php echo $_SESSION["username"]; ?> </h1>
			<a href = "Frageneingabe.php"> Neuen Lerninhalt erstellen </a>

		</fieldset>
		

	 
<?php
if (!$connect) {
    echo "Keine Verbindung zu DB möglich: " . mysql_error();
    exit;
    }  
      
$abfrage = "SELECT ID, Lernbereich FROM Lernbereiche ORDER BY ID ASC";
$result = mysqli_query($connect, $abfrage);

if (!$result) {
    echo "Konnte Abfrage ($abfrage) nicht erfolgreich ausführen von DB: " . mysqli_error();
    exit;
}
if (mysqli_num_rows($result) == 0) {
    echo "Keine Zeilen gefunden, nichts auszugeben, also Ende";
    exit;
}
while ($row = mysqli_fetch_assoc($result)) {
    echo $row["Lernbereich"];
   echo '<select name="select_item">';
while ($row = mysqli_fetch_assoc($result)) {
    echo '<option value="' . $row['ID'] .  '">' . htmlspecialchars($row['Lernbereich'] ENT_QUOTES | ENT_HTML5, 'UTF-8') . '</option>';
}
echo '</select>';  
}

mysqli_free_result($result);





		
/*	$sql=mysqli_query($connect, "SELECT Frage FROM Bewegungsapperat");
		if(mysqli_num_rows($sql))
		{
		$select= '<select name="select">';
				while($rs=mysqli_fetch_array($sql))
				{
      			$select.='<option value="'.$rs['Frage'].'">'.$rs['Frage'].'</option>';
 				}
		}
	$select.='</select>';
	echo $select; 
	*/
	
	
	


	
	
?>	
		
<!-- Dropdown zur Lerneinheiten Auswahl-->
<form action="index_select_db.php" method="post">
  <label><h4>Lerneinheiten Medizin:</h4>
      <select name="Lerneinheit_Medizin[]" multiple="multiple">
  		<option value=""></option>
  		<option value="Bewegungsapperat">Bewegungsapperat</option>
  		<option value="innere Organe">innere Organe</option>
  		<option value="3">Third</option>
	  </select>
  </label>
<input type="submit" name="absenden" value="Fragen hinzufügen">
</form>

<?php
//Ausgabe der Auswahl
 if (isset($_POST['absenden']))
 			{
              foreach ($_POST['Lerneinheit_Medizin'] as $Lerneinheit_Auswahl)
            	{
              echo $Lerneinheit_Auswahl."<br>";
              }
            } 
         
?>



			
			
	</body>

<?php
}
else
{
?>
Bitte erst einloggen, <a href="index_login.php">hier</a>
<?php
}
?>
</html>
