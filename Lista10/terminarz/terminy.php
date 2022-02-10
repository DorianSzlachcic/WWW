<?php
include_once "_top.php";
session_start();

if($_SESSION["user"])
{
    $baza = new SQLite3($_SESSION["user"].".db");
    $baza -> exec("create table if not exists terminy
    (id integer primary key autoincrement, 
    name char(50),
    date datetime,
    duration int,
    description char(200));");

    $wynik = $baza -> query("select id,name,strftime('%d-%m-%Y %H:%M',date) as date,duration,description from terminy;");

    echo "<h1>Witaj ".$_SESSION["user"]."!</h1>";

    echo "<table id='terminy'><tr><th class='header'>Nazwa</th><th class='header'>Data</th><th class='header'>Czas trwania</th><th class='header'>Opis</th></tr>";

    while($r = $wynik->fetchArray())
    {
        echo "<tr onclick=\"location='edit.php?id=$r[id]';\"><td id='name'>$r[name]</td>
        <td id='date'>$r[date]</td><td id='duration'>$r[duration]</td><td id='description'>$r[description]</td></tr>";
    }

    echo "<tr onclick=\"location='dodaj.php';\"><td colspan='4'>Dodaj termin</td></tr></table>";
}
else
    header("location:index.php?id=login");
?>
<br>
<a href="?id=logout">Wyloguj się</a>
    
<?php
include "_bottom.php";
?>