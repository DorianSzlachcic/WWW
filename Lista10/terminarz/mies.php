<?php include_once "_top.php"?>

<?php
session_start();

if($_GET["date"]){
    $date = date("Y-m-d",strtotime($_GET["date"]));
} else {
    $date = date("Y-m-d",strtotime("now"));
}

echo "<button onclick=\"location='mies.php?date=". date("Y-m-d", strtotime('last month', strtotime($date))) ."'\"><<</button>";
echo "<button onclick=\"location='mies.php?date=". date("Y-m-d", strtotime('next month', strtotime($date))) ."'\">>></button>";
?>

<div style="position: relative">
<table id="mies">
<?php
    $miesiace = array("Styczeń","Luty","Marzec","Kwiecień","Maj","Czerwiec","Lipiec","Sierpień","Wrzesień","Październik","Listopad","Grudzień");
    $m = intval(date("m",strtotime($date)))-1;
    echo "<tr><td id='monthName' colspan='7'>".$miesiace[$m]."</td></tr>";
?>
<tr><th class="header">Niedziela</th><th class="header">Poniedziałek</th><th class="header">Wtorek</th><th class="header">Środa</th>
<th class="header">Czwartek</th><th class="header">Piątek</th><th class="header">Sobota</th></tr>

<?php
$temp_date = $date;
$date = date("Y-m-d",strtotime("last sunday of last month", strtotime($date)));
echo "<tr>";    
while($date != date("Y-m-d",strtotime("first sunday of next month", strtotime($temp_date))))
{
    if(date("w",strtotime($date))=="0")
        echo "<tr>";

    if(date("m",strtotime($date))==date("m",strtotime($temp_date)))    
        echo "<td class='active' id='d".date("d",strtotime($date))."'>".date("d",strtotime($date))."</td>";
    else
        echo "<td class='inactive'>".date("d",strtotime($date))."</td>";

    if(date("w",strtotime($date))=="6")
        echo "</tr>";
    
    $date = date("Y-m-d",strtotime("+1 day",strtotime($date)));
}

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

    $wynik = $baza -> query("select name,date,duration from terminy where date >= datetime('".date("Y-m-01",strtotime($temp_date))."') and date <= datetime('".date("Y-m-t",strtotime($temp_date))."');");

    echo "<script> mies([";

    while($r = $wynik->fetchArray())
    {
        echo "{'name':'$r[name]','date':'$r[date]','duration': $r[duration]},";
    }
    echo "]);</script>"
?>

<?php
include "_bottom.php";
  ?>