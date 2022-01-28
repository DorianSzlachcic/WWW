
<h2>Lista osób</h2>
<form>
	<select id="kierunek" name="kierunek" onchange="this.form.submit()">
	<option value=''>Wszystkie kierunki</option>
	<option>fizyka</option>
	<option>astronomia</option>
	<option>chemia</option>
	<option>informatyka</option>
	</select>
	<select id="plec" name="plec" onchange="this.form.submit()">
	<option value=''>Wybierz płeć</option>
	<option value="k">Kobieta</option>
	<option value="m">Mężczyzna</option>
	</select>
</form>
<br>
<script>
	document.getElementById("kierunek").value = "<?= $_GET['kierunek'] ?>";
	document.getElementById("plec").value = "<?= $_GET['plec'] ?>";
</script>


<table><tr><th>Id<th>Imię</th><th>Nazwisko</th><th>Płeć</th><th>Data urodzenia</th><th>Nr albumu</th><th>Kierunek</th><th>Wzrost</th></tr>

<?php
include "baza.php";

$query = "select * from studenci where 1=1 ";

if($_GET["kierunek"]){
	$query .= "and kierunek = '".$_GET['kierunek']."' ";
}
if($_GET["plec"]){
	$query .= "and plec = '".$_GET['plec']."' ";
}

$wynik=$baza->query($query);


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
