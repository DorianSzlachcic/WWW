<?php
include "baza.php";

if($_GET["kierunek"]){
	$and = "and kierunek = '".$_GET['kierunek']."'";

	$wynik=$baza->query("select * from studenci where 1=1 $and ;");
}
else {
	$wynik=$baza->query("select * from studenci;");
}

echo "<table>";
echo "<h2>Lista osób</h2>";
echo "<div id='menu'><a href='?'>Wszyscy</a> <a href='?kierunek=fizyka'>Fizyka</a> <a href='?kierunek=astronomia'>Astronomia</a> <a href='?kierunek=chemia'>Chemia</a> <a href='?kierunek=informatyka'>Informatyka</a></div>";
echo "<tr><th>Id<th>Imię</th><th>Nazwisko</th><th>Płeć</th><th>Data urodzenia</th><th>Nr albumu</th><th>Kierunek</th><th>Wzrost</th></tr>";
while($r= $wynik->fetchArray())
{   
	echo "<tr onclick=\"location='?id=$r[id]'\">
			<td>$r[id]</td>
			<td>$r[imie]</td>
			<td>$r[nazwisko]</td>
			<td>$r[plec]</td>
			<td>$r[ur]</td>
			<td>$r[album]</td>
			<td>$r[kierunek]</td>
			<td>$r[wzrost]</td></tr>";
}
if($_SESSION['admin'])
	echo "<tr onclick=\"location='?id=dodaj'\">
		<td colspan=8>Dodaj nową osobę</td></tr>";
else
	echo "<tr onclick=\"location='?id=login'\">
		<td colspan=8>Zaloguj sie by edytować tabelę</td></tr>";

echo "</table>";
if($_SESSION['admin'])
   echo "<a href=?id=logout>Wyloguj się</a>";


?>
