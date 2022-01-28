<?php
	include "baza.php";
	$id=intval($_GET['id']);
	$wynik=$baza->query("select * from studenci where id='$id'");
	$r=$wynik->fetchArray();
?>
<form method='post' action='osoba_zmiana.php'>
	<h2>Edycja osoby</h2>

	<input name='id' type=hidden value='<?=htmlentities($r['id'])?>'>
	<input name='imie' placeholder='Imię' value='<?=htmlentities($r['imie'])?>'>
	<input name='nazwisko' placeholder='Nazwisko'  value='<?=htmlentities($r['nazwisko'])?>'>
	
	<select name='plec' placeholder='Płeć'>
		<option value=''>Płeć:</option>
		<option value='m' <?php if($r['plec']=='m') echo 'selected' ;?>>Mężczyzna</option>
		<option value='k' <?php if($r['plec']=='k') echo 'selected' ;?>>Kobieta</option>
	</select>

	<input name='ur' placeholder='Data urodzenia' type='date' value='<?=htmlentities($r['ur'])?>'>

	<input name='album' placeholder='Nr albumu' type='number' value='<?=htmlentities($r['album'])?>'>

	<select name='kierunek' placeholder='Kierunek'>
		<option value=''>Kierunek:</option>
		<option value='fizyka' <?php if($r['kierunek']=='fizyka') echo 'selected' ;?>>Fizyka</option>
		<option value='astronomia' <?php if($r['kierunek']=='astronomia') echo 'selected' ;?>>Astronomia</option>
		<option value='chemia' <?php if($r['kierunek']=='chemia') echo 'selected' ;?>>Chemia</option>
		<option value='informatyka' <?php if($r['kierunek']=='informatyka') echo 'selected' ;?>>Informatyka</option>
	</select>

	<input name='wzrost' placeholder='Wzrost' type='number' value='<?=htmlentities($r['wzrost'])?>'>

	<input type=submit name=co value='Zapisz'>
	<input type=submit name=co value='Usun'>
	<input type=submit name=co value='Anuluj'>
</form>
