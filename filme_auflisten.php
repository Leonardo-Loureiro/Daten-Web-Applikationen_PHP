<!DOCTYPE html>
<html lang="de">
<head>
   <meta charset="utf-8">
   <title>Filmdaten</title>
   <style>
      table,td {border:1px solid black;}
   </style>
</head>
<body>

<table>
<tr>
<td><a href="filme_auflisten.php?sort=fil">Film_ID</a></td>
<td><a href="filme_auflisten.php?sort=tit">Titel</a></td>
<td><a href="filme_auflisten.php?sort=ver">Verleiher_ID</a></td>
</tr>

<?php
   $con = new mysqli("", "root", "", "kino");
   $sql = "SELECT * FROM film";
   //Hier wird dann die Sortierung stattfinden!
   if (isset($_GET['sort']) == FALSE)
{
    $sql .= " ORDER BY id asc";
}
elseif ($_GET['sort'] == 'fil')
{
    $sql .= " ORDER BY id desc";
} 
elseif ($_GET['sort'] == 'tit')
{
    $sql .= " ORDER BY titel";
}
elseif ($_GET['sort'] == 'ver')
{
    $sql .= " ORDER BY verleiher_id";
}
   $res = $con->query($sql);

   //$lf = 1;
   while ($dsatz = $res->fetch_assoc())
   {
      echo "<tr>";
      echo "<td>" . $dsatz["id"] . "</td>";
      echo "<td>" . $dsatz["titel"] . "</td>";
      echo "<td>" . $dsatz["verleiher_id"] . "</td>";
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
