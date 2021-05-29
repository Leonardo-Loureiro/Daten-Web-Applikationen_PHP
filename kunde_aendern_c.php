<!DOCTYPE html>
<html lang="de">
<head>
   <meta charset="utf-8">
   <title>Datensatz ändern</title>
</head>
<body>
<?php
   $oripn = $_POST["oripn"];
   $con = new mysqli("", "root", "", "kino");
   $ps = $con->prepare("UPDATE kunde SET name = ?,"
      . " vorname = ?, strasse = ?, plz = ?, ort = ?, landcode = ?, telefon = ?,"
      . " email = ? WHERE id = $oripn");
   $ps->bind_param("ssssssss", $_POST["nam"],
         $_POST["vor"], $_POST["str"], $_POST["plz"], $_POST["ort"], $_POST["land"], $_POST["tele"], $_POST["mail"]);
	  
   $ps->execute();

   if ($ps->affected_rows > 0)
      echo "Datensatz geändert<br>";
   else
      echo "Fehler, Datensatz nicht geändert<br>";

   $ps->close();
   $con->close();
?>
<p>Zur <a href="kunde_aendern_a.php">Auswahl</a></p>
</body>
</html>
