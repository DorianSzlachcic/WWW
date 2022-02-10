<?php include_once "_top.php"?>

<?php
session_start();

if($_GET["date"]){
    $date = date("Y-m-d",strtotime($_GET["date"]));
} else {
    $date = date("Y-m-d");
}

echo "<button onclick=\"location='tyg.php?date=". date("Y-m-d", strtotime('last week', strtotime($date))) ."'\"><<</button>";
echo "<button onclick=\"location='tyg.php?date=". date("Y-m-d", strtotime('next week', strtotime($date))) ."'\">>></button>";
?>


<div style="position: relative">
<table id="tyg">
<tr><th class="header"></th><th class="header">Niedziela</th><th class="header">Poniedziałek</th><th class="header">Wtorek</th><th class="header">Środa</th>
<th class="header">Czwartek</th><th class="header">Piątek</th><th class="header">Sobota</th></tr>
<?php
    echo "<tr><th></th><th>".date("d.m.Y", strtotime('sunday last week', strtotime($date)))."</th>
    <th>".date("d.m.Y", strtotime('monday this week', strtotime($date)))."</th>
    <th>".date("d.m.Y", strtotime('tuesday this week', strtotime($date)))."</th>
    <th>".date("d.m.Y", strtotime('wednesday this week', strtotime($date)))."</th>
    <th>".date("d.m.Y", strtotime('thursday this week', strtotime($date)))."</th>
    <th>".date("d.m.Y", strtotime('friday this week', strtotime($date)))."</th>
    <th>".date("d.m.Y", strtotime('saturday this week', strtotime($date)))."</th></tr>";

    for($i=0;$i<=24;$i++)
        echo "<tr><th>".$i.":00</th><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>"
?>
</table>
</div>

<?php
    $baza = new SQLite3($_SESSION["user"].".db");
    $baza -> exec("create table if not exists terminy
    (id integer primary key autoincrement, 
    name char(50),
    date datetime,
    duration int,
    description char(200));");

    

    $wynik = $baza -> query("select name,date,duration from terminy where date >= datetime('".date("Y-m-d", strtotime('sunday last week', strtotime($date)))."') and date < datetime('".date("Y-m-d", strtotime('sunday this week', strtotime($date)))."');");

    echo "<script> tyg([";

    while($r = $wynik->fetchArray())
    {
        echo "{'name':'$r[name]','date':'$r[date]','duration': $r[duration]},";
    }
    echo "]);</script>"
?>

<?php include_once "_bottom.php"?>