<?php
include_once "_top.php";
session_start();
?>

<h1>Dodaj termin</h1>

<?php 
if($_SESSION["activated"]==1)
    echo'<form action="termin-commit.php" id="form" method="post">
    <input type="hidden" name ="id" id="id" value="">
    <input type="text" name="name" id="name" value="" placeholder="Nazwa Wydarzenia">
    <input type="datetime-local" name="date" id="date" >
    <input type="number" name="duration" id="duration" ><br>
    <textarea name="description" id="description" cols="50" rows="4" maxlenght="200" >Opis wydarzenia</textarea><br>
    <input type="submit" name="action" value="Dodaj">
    </form>';
else 
    echo "Aby dodawać terminy musisz aktywować konto.";?>

<?php
include "_bottom.php";
?>