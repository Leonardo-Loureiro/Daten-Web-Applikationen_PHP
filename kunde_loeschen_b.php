<!DOCTYPE html>
<html lang="de">
<head>
   <meta charset="utf-8">
   <title>Datensatz auswählen</title>
</head>
<body>
<?php
if (isset($_POST["auswahl"]))
{
   $con = new mysqli("", "root", "", "kino");
   $sql = "DELETE FROM kunde WHERE id = '" . $_POST["auswahl"] . "'";
   $con->query($sql);
   echo "Betroffen: $con->affected_rows<br>";
   $con->close();
}
else
   echo "<p>Keine Auswahl getroffen</p>";
   
?>

<p>Zur <a href="kunde_loeschen_a.php">Auswahl</a></p>
</body>
</html>
