<!DOCTYPE html>
<html>
<?php
session_start ();

if (isset ($_SESSION["username"])) 
	{
	//mysql Datenbankzugriffsvariable erstellen
	include 'database.php';
	
// Uebernehmen der Eingabe aus dem Dropdown Menue
/*$selectOption = $_POST ['Lerneinheit_Medizin'];

// Checken, ob Lerneinheit ausgewaehlt wurde
$option = isset($_POST['Lerneinheit_Medizin']) ? $_POST['Lerneinheit_Medizin'] : false;
   if ($option) {
      echo htmlentities($_POST['Lerneinheit_Medizin'], ENT_QUOTES, "UTF-8");
   } else {
     echo "task option is required";
     exit; 
   }
   */
?>
	<head>
		<title> Pflegonaut Willkommen </title>
	</head>
	<body>
			<fieldset>
		<h1> Willkommen bei der Frageeingabe des Pflegonauts </h1>
			<legend> Neue Frage eingeben </legend>
			<form action = "senden.php" method="post">
			Frage: </br> <input type="text"  name = "Frage" /><br /><br />
			Antwort 1: </br> <input type="text" name = "Antwort1" /><br /><br />
			Antwort 2: </br> <input type="text" name = "Antwort2" /><br/><br />
			Antwort 3: </br> <input type="text" name = "Antwort3" /><br/><br />
			Antwort 4: </br> <input type="text" name = "Antwort4" /><br /><br />
			korrekte Antwort:   </br> <input type="text" name = "correct" 
			required="required" pattern="[0-4]{1}"
			title="Bitte eine Zahl von 1 bis 4 eintragen"/><br /><br />
			<br/> <br/>
			Anmerkungen: </br>
			<textarea id="area" name="Anmerkungen"> </textarea> </br> </br>	



<!--Upload der Bilder-->				
<input type="submit" value = "Eintragen">
</form>
</fieldset>

<!--
<?php

$session_id='1'; //$session id unnoetig?
?>
<script type="text/javascript" src="scripts/jquery.min.js"></script>
<script type="text/javascript" src="scripts/jquery.form.js"></script>

<script type="text/javascript" >
 $(document).ready(function() { 
		
            $('#photoimg').live('change', function()			{ 
			           $("#preview").html('');
			    $("#preview").html('<img src="loader.gif" alt="Uploading...."/>');
			$("#imageform").ajaxForm({
						target: '#preview'
		}).submit();
		
			});
        }); 
</script>

<style>

body
{
font-family:arial;
}
.preview
{
width:200px;
border:solid 1px #dedede;
padding:10px;
}
#preview
{
color:#cc0000;
font-size:12px
}

</style>


<div style="width:600px">

<form id="imageform" method="post" enctype="multipart/form-data" action='ajaximage.php'>
Optional:
<br/>
Lade ein Bild zu der Frage hoch
<br/><br/>
<input type="file" name="photoimg" id="photoimg" />
</form>
<br/>
<div id='preview'>
</div>
</div>

-->


<style>
  .thumb {
    height: 75px;
    border: 1px solid #000;
    margin: 10px 5px 0 0;
  }
</style>

<input type="file" id="files" name="files[]" multiple />
<output id="list"></output>

<script>
  function handleFileSelect(evt) {
    var files = evt.target.files; // FileList object

    // Loop through the FileList and render image files as thumbnails.
    for (var i = 0, f; f = files[i]; i++) {

      // Only process image files.
      if (!f.type.match('image.*')) {
        continue;
      }

      var reader = new FileReader();

      // Closure to capture the file information.
      reader.onload = (function(theFile) {
        return function(e) {
          // Render thumbnail.
          var span = document.createElement('span');
          span.innerHTML = ['<img class="thumb" src="', e.target.result,
                            '" title="', escape(theFile.name), '"/>'].join('');
          document.getElementById('list').insertBefore(span, null);
        };
      })(f);

      // Read in the image file as a data URL.
      reader.readAsDataURL(f);
    }
  }

  document.getElementById('files').addEventListener('change', handleFileSelect, false);
</script>










<!-- Logout-->		
<p> <a href="logout.php"> Ausloggen</a> </p>		
</br>
	

				
<?php

// Auflisten der bisherigen Ergebnisse
$abfrage = "SELECT * FROM Bewegungsapperat  ORDER BY id DESC";
// alternativ: fuer jede Lerneinheit eine Tabelle 
//$abfrage = "SELECT * FROM @Lerneinheit_Auswahl  ORDER BY id DESC";
$ergebnis = mysqli_query ($connect, $abfrage);
while ($row = mysqli_fetch_object ($ergebnis))

{
echo "<fieldset>";
echo "<b>Frage: </b><br/>"; 
echo $row->Frage;
echo "</b><p></p>";

echo "<b>Antwort1: </b><br/>";
echo $row-> Antwort1;
echo "</b><p></p>";

echo "<b>Antwort2: </b><br/>";
echo $row-> Antwort2;
echo "</b><p></p>";

echo "<b>Antwort3: </b><br/>";
echo $row-> Antwort3;
echo "</b><p></p>";

echo "<b>Antwort4: </b><br/>";
echo $row-> Antwort4;
echo "</b><p></p>";

echo "<b>korrekte Antwort: </b><br/>";
echo $row-> correct;
echo "</b><p></p>";

echo "<b>Anmerkungen: </b><br/>";
echo $row-> Anmerkungen;
echo "</b><p></p>";

echo "Erstellt am: ";
echo $row-> created_at;

echo "</fieldset>";

echo "<hr>"; 
} 

?>




<?php
//Session Ende
}
?>		
		
			
			
	</body>
</html>
	