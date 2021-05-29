<!DOCTYPE html>
<html lang="de">
<head>
   <meta charset="utf-8">
   <title>Kundedaten</title>
   <style>
      table,td {border:1px solid black;}
   </style>
</head>
<body>

<table>
<tr>
<td><a href="kunden_auflisten.php?sort=kun">Kunde_ID</a></td>
<td><a href="kunden_auflisten.php?sort=nam">Name</a></td>
<td><a href="kunden_auflisten.php?sort=vor">Vorname</a></td>
<td><a href="kunden_auflisten.php?sort=adr">Adresse Strasse</a></td>
<td><a href="kunden_auflisten.php?sort=plz">PLZ</a></td>
<td><a href="kunden_auflisten.php?sort=ort">Ort</a></td>
<td><a href="kunden_auflisten.php?sort=land">Landcode</a></td>
<td><a href="kunden_auflisten.php?sort=tele">Telefon</a></td>
<td><a href="kunden_auflisten.php?sort=mail">E-Mail</a></td>
</tr>

<?php
   $con = new mysqli("", "root", "", "kino");
   $sql = "SELECT * FROM kunde";
   //Hier wird dann die Sortierung stattfinden!
   if (isset($_GET['sort']) == FALSE)
{
    $sql .= " ORDER BY id asc";
}
elseif ($_GET['sort'] == 'kun')
{
    $sql .= " ORDER BY id desc";
} 
elseif ($_GET['sort'] == 'nam')
{
    $sql .= " ORDER BY name";
}
elseif ($_GET['sort'] == 'vor')
{
    $sql .= " ORDER BY vorname";
}
elseif ($_GET['sort'] == 'adr')
{
    $sql .= " ORDER BY strasse";
}
elseif ($_GET['sort'] == 'plz')
{
    $sql .= " ORDER BY plz";
}
elseif ($_GET['sort'] == 'ort')
{
    $sql .= " ORDER BY ort";
}
elseif ($_GET['sort'] == 'land')
{
    $sql .= " ORDER BY landcode";
}
elseif ($_GET['sort'] == 'tele')
{
    $sql .= " ORDER BY telefon";
}
elseif ($_GET['sort'] == 'mail')
{
    $sql .= " ORDER BY email";
}
   $res = $con->query($sql);

   //$lf = 1;
   while ($dsatz = $res->fetch_assoc())
   {
      echo "<tr>";
      echo "<td>" . $dsatz["id"] . "</td>";
      echo "<td>" . $dsatz["name"] . "</td>";
      echo "<td>" . $dsatz["vorname"] . "</td>";
	  echo "<td>" . $dsatz["strasse"] . "</td>";
	  echo "<td>" . $dsatz["plz"] . "</td>";
	  echo "<td>" . $dsatz["ort"] . "</td>";
	  echo "<td>" . $dsatz["landcode"] . "</td>";
	  echo "<td>" . $dsatz["telefon"] . "</td>";
	  echo "<td>" . $dsatz["email"] . "</td>";
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
