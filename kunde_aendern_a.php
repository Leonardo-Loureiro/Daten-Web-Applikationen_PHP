<!DOCTYPE html>
<html lang="de">
<head>
   <meta charset="utf-8">
   <title>Datensatz auswählen</title>
   <style>
      table,td {border:1px solid black;}
   </style>
</head>
<body>
<p>Treffen Sie Ihre Auswahl:</p>
<form action = "kunde_aendern_b.php" method = "post">
<!--<table>
   <tr>
      <td>Auswahl</td> <td>Name</td>
      <td>Vorname</td> <td>P-Nr</td>
      <td>Gehalt</td> <td>Geburtstag</td>
   </tr>-->

<?php
   $con = new mysqli("", "root", "", "kino");
   $res = $con->query("SELECT * FROM kunde");
   
   //Tabellenbeginn
   echo "<table>";
   
   // Überschrift
   echo "<tr> <td>Auswahl</td><td>Kunde_ID</td>";
   echo "<td>Name</td><td>Vorname</td>";
   echo "<td>Strasse</td><td>PLZ</td><td>Ort</td>";
   echo "<td>Landcode</td><td>Telefon</td><td>E-Mail</td></tr>";

   while ($dsatz = $res->fetch_assoc())
   {
      echo "<tr>";
      echo "<td><input type='radio' name='auswahl' value='" . $dsatz["id"] . "'></td>";
      echo "<td>" . $dsatz["id"] . "</td>";
      echo "<td>" . $dsatz["name"] . "</td>";
      echo "<td>" . $dsatz["vorname"] . "</td>";
      echo "<td>" . $dsatz["strasse"] . "</td>";
      echo "<td>" . $dsatz["plz"] . "</td>";
      echo "<td>" . $dsatz["ort"] . " CHF</td>";
      echo "<td>" . $dsatz["landcode"] . "</td>";
      echo "<td>" . $dsatz["telefon"] . "</td>";
      echo "<td>" . $dsatz["email"] . "</td>";
      echo "</tr>";
   }
   
   // Tabellenende
   echo "</table>";

   $res->close();
   $con->close();
?>
<a href="mainSeite.php"><u>Zurück</u></a>
</table>
<p><input type="submit" value="Datensatz anzeigen"></p>
</form>
</body>
</html>
