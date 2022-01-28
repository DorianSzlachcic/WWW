<h2>Dodawanie osoby</h2>
<form method='post' action='osoba_zmiana.php'>
<input name='id' type=hidden>
	<input name='imie' placeholder='Imię'>
	<input name='nazwisko' placeholder='Nazwisko'>
	
	<select name='plec' placeholder='Płeć'>
		<option value=''>Płeć:</option>
		<option value='m'>Mężczyzna</option>
		<option value='k'>Kobieta</option>
	</select>

	<input name='ur' placeholder='Data urodzenia' type='date'>

	<input name='album' placeholder='Nr albumu' type='number'>

	<select name='kierunek' placeholder='Kierunek'>
		<option value=''>Kierunek:</option>
		<option value='fizyka'>Fizyka</option>
		<option value='astronomia'>Astronomia</option>
		<option value='chemia'>Chemia</option>
		<option value='informatyka'>Informatyka</option>
	</select>

	<input name='wzrost' placeholder='Wzrost' type='number'>
	<input type=submit name=co value=Dodaj>
	<input type=submit name=co value=Anuluj>
</form>
