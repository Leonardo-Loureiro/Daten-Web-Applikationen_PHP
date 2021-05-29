<!DOCTYPE html>
<html lang="de">
<head>
   <meta charset="utf-8">
   <title>Vorstellungsdaten</title>
   <style>
      table,td {border:1px solid black;}
   </style>
</head>
<body>

<table>
<tr>
<td><a href="vorstellungen_auflisten.php?sort=vor">Vorstellung_ID</a></td>
<td><a href="vorstellungen_auflisten.php?sort=dat">Datum</a></td>
<td><a href="vorstellungen_auflisten.php?sort=fil">Film_ID</a></td>
<td><a href="vorstellungen_auflisten.php?sort=prei">Preis</a></td>
</tr>

<?php
   $con = new mysqli("", "root", "", "kino");
   $sql = "SELECT * FROM vorstellung";
   //Hier wird dann die Sortierung stattfinden!
   if (isset($_GET['sort']) == FALSE)
{
    $sql .= " ORDER BY id asc";
}
elseif ($_GET['sort'] == 'vor')
{
    $sql .= " ORDER BY id desc";
} 
elseif ($_GET['sort'] == 'dat')
{
    $sql .= " ORDER BY datum";
}
elseif ($_GET['sort'] == 'fil')
{
    $sql .= " ORDER BY film_id";
}
elseif ($_GET['sort'] == 'prei')
{
    $sql .= " ORDER BY preis";
}
   $res = $con->query($sql);

   //$lf = 1;
   while ($dsatz = $res->fetch_assoc())
   {
      echo "<tr>";
      echo "<td>" . $dsatz["id"] . "</td>";
      echo "<td>" . $dsatz["datum"] . "</td>";
      echo "<td>" . $dsatz["film_id"] . "</td>";
	  echo "<td>" . $dsatz["preis"] . "</td>";
      echo "</tr>";
     // $lf++;
   }
   $res->close();
   $con->close();
?>
<a href="mainSeite.php"><u>Zurück</u></a>
</table>
</body>
</html>
