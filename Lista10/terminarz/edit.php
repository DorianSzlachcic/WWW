<?php
include_once "_top.php";
session_start();
?>

<h1>Edytuj termin</h1>
<?php
session_start();
$baza = new SQLite3($_SESSION["user"].".db");
$baza -> exec("create table if not exists terminy
(id integer primary key autoincrement, 
name char(50),
date datetime,
description char(200));");

$wynik = $baza-> query("select * from terminy where id=".intval($_GET["id"]).";");
$r = $wynik->fetchArray();
?>
<form action="termin-commit.php" id="form" method="post">
        <input type="hidden" name ="id" id="id" value="<?=htmlentities($r["id"])?>">
        <input type="text" name="name" id="name" value="<?=htmlentities($r["name"])?>" placeholder="Nazwa Wydarzenia">
        <input type="datetime-local" name="date" id="date" value="<?=htmlentities($r["date"])?>" >
        <input type="number" name="duration" id="duration" value="<?=htmlentities($r["duration"])?>"><br>
        <textarea name="description" id="description" cols="50" rows="4" maxlenght="200" ><?=htmlentities($r["description"])?></textarea><br>
    <input type="submit" name="action" value="Edit">
    <input type="submit" name="action" value="Usun">
</form>

<?php
include "_bottom.php";
?>