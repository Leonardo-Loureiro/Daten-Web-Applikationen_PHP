<!DOCTYPE html>
<html lang="de">
<head>
   <meta charset="utf-8">
   <title>Verleiherdaten</title>
   <style>
      table,td {border:1px solid black;}
   </style>
</head>
<body>

<table>
<tr>
<td><a href="verleiher_auflisten.php?sort=verl">Verleiher_ID</a></td>
<td><a href="verleiher_auflisten.php?sort=nam">Name</a></td>
</tr>

<?php
   $con = new mysqli("", "root", "", "kino");
   $sql = "SELECT * FROM verleiher";
   //Hier wird dann die Sortierung stattfinden!
   if (isset($_GET['sort']) == FALSE)
{
    $sql .= " ORDER BY id asc";
}
elseif ($_GET['sort'] == 'verl')
{
    $sql .= " ORDER BY id desc";
} 
elseif ($_GET['sort'] == 'nam')
{
    $sql .= " ORDER BY name";
}

   $res = $con->query($sql);

   //$lf = 1;
   while ($dsatz = $res->fetch_assoc())
   {
      echo "<tr>";
      echo "<td>" . $dsatz["id"] . "</td>";
      echo "<td>" . $dsatz["name"] . "</td>";
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
