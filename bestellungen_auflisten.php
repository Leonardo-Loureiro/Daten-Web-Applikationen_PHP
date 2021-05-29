<!DOCTYPE html>
<html lang="de">
<head>
   <meta charset="utf-8">
   <title>Bestelldaten</title>
   <style>
      table,td {border:1px solid black;}
   </style>
</head>
<body>

<table>
<tr>
<td><a href="bestellungen_auflisten.php?sort=bes">Bestellung_ID</a></td>
<td><a href="bestellungen_auflisten.php?sort=kun">Kunde_ID</a></td>
<td><a href="bestellungen_auflisten.php?sort=vor">Vorstellung_ID</a></td>
<td><a href="bestellungen_auflisten.php?sort=anz">Anzahl</a></td>
<td><a href="bestellungen_auflisten.php?sort=kre">Kreditkartennummer</a></td>
<td><a href="bestellungen_auflisten.php?sort=krej">Kreditkartejahr</a></td>
<td><a href="bestellungen_auflisten.php?sort=abh">Abholdatum</a></td>
</tr>

<?php
   $con = new mysqli("", "root", "", "kino");
   $sql = "SELECT * FROM bestellung";
   //Hier wird dann die Sortierung stattfinden!
   if (isset($_GET['sort']) == FALSE)
{
    $sql .= " ORDER BY id asc";
}
elseif ($_GET['sort'] == 'bes')
{
    $sql .= " ORDER BY id desc";
} 
elseif ($_GET['sort'] == 'kun')
{
    $sql .= " ORDER BY kunde_id";
}
elseif ($_GET['sort'] == 'vor')
{
    $sql .= " ORDER BY vorstellung_id";
}
elseif ($_GET['sort'] == 'anz')
{
    $sql .= " ORDER BY anzahl";
}
elseif ($_GET['sort'] == 'kre')
{
    $sql .= " ORDER BY kreditkartenummer";
}
elseif ($_GET['sort'] == 'krej')
{
    $sql .= " ORDER BY kreditkartejahr";
}
elseif ($_GET['sort'] == 'abh')
{
    $sql .= " ORDER BY abholdatum";
}

   $res = $con->query($sql);

   //$lf = 1;
   while ($dsatz = $res->fetch_assoc())
   {
      echo "<tr>";
      echo "<td>" . $dsatz["id"] . "</td>";
      echo "<td>" . $dsatz["kunde_id"] . "</td>";
      echo "<td>" . $dsatz["vorstellung_id"] . "</td>";
	  echo "<td>" . $dsatz["anzahl"] . "</td>";
	  echo "<td>" . $dsatz["kreditkartenummer"] . "</td>";
	  echo "<td>" . $dsatz["kreditkartejahr"] . "</td>";
	  echo "<td>" . $dsatz["abholdatum"] . "</td>";
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
