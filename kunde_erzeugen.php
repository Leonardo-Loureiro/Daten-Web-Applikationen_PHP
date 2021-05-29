<!DOCTYPE html>
<html lang="de">
<head>
   <meta charset="utf-8">
   <title>Eingabe von Datensätzen</title>
<?php
   if (isset($_POST["gesendet"]))
   {
      $con = new mysqli("", "root", "", "kino");
      $ps = $con->prepare("INSERT INTO kunde"
         . "(name, vorname, strasse, plz, ort, landcode, telefon, email)"
         . "VALUES(?, ?, ?, ?, ?, ?, ?, ?)");
      $ps->bind_param("ssssssss", $_POST["nam"],
         $_POST["vor"], $_POST["str"], $_POST["plz"], $_POST["ort"], $_POST["land"], $_POST["tele"], $_POST["mail"]);
      $ps->execute();

      if ($ps->affected_rows > 0)
         echo "Datensatz hinzugekommen<br>";
      else
         echo "Fehler, kein Datensatz hinzugekommen<br>";

      $ps->close();
      $con->close();
   }
?>
</head>
<body>
<p>Geben Sie bitte einen Datensatz ein<br>
und senden Sie das Formular ab:</p>
<a href="mainSeite.php"><u>Zurück</u></a>
<form action = "kunde_erzeugen.php" method = "post">
   <p><input name="nam"> Name</p>
   <p><input name="vor"> Vorname</p>
   <p><input name="str"> Strasse</p>
   <p><input name="plz"> PLZ</p>
   <p><input name="ort"> Ort</p>
   <p><input name="land"> Landcode</p> 
   <p><input name="tele"> Telefon</p>    
   <p><input name="mail"> E-Mail</p>
   <p><input type="submit" name="gesendet">
   <input type="reset"></p>
</form>

<!-- <p>Alle <a href="db_tabelle_mine.php">anzeigen</a></p> -->
</body></html>
