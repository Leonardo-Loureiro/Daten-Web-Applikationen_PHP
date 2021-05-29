<!DOCTYPE html>
<html lang="de">
<head>
   <meta charset="utf-8">
   <title>Datensatz anzeigen</title>
</head>
<body>
<?php
if (isset($_POST["auswahl"]))
{
   $con = new mysqli("", "root", "", "kino");
   $sql = "SELECT * FROM kunde WHERE id = '" . $_POST["auswahl"] . "'";
   $res = $con->query($sql);
   $dsatz = $res->fetch_assoc();

   echo "<p>Bitte neue Inhalte eintragen und speichern:</p>";
   echo "<form action = 'kunde_aendern_c.php' method = 'post'>";

   echo "<p><input name='nam' value='" . $dsatz["name"] . "'> Name</p>";
   echo "<p><input name='vor' value='" . $dsatz["vorname"] . "'> Vorname</p>";
   echo "<p><input name='str' value='" . $dsatz["strasse"] . "'> Adresse Strasse</p>";
   echo "<p><input name='plz' value='" . $dsatz["plz"] . "'> PLZ</p>";
   echo "<p><input name='ort' value='" . $dsatz["ort"] . "'> Ort</p>";
   echo "<p><input name='land' value='" . $dsatz["landcode"] . "'> Landcode</p>";
   echo "<p><input name='tele' value='" . $dsatz["telefon"] . "'> Telefon</p>";
   echo "<p><input name='mail' value='" . $dsatz["email"] . "'> E-Mail</p>";
   echo "<input type='hidden' name='oripn' value='" . $_POST["auswahl"] . "'>";
   echo "<p><input type='submit' value='Speichern'>";
   echo "<input type='reset'></p>";
   echo "</form>";
   
   $res->close();
   $con->close();
}
else
   echo "<p>Keine Auswahl getroffen</p>";
?>
</body>
</html>
