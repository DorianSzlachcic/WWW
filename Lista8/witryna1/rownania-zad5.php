<?php include "_top.php";?>

<h1>Układ równań</h1>

    <form method="get">
<input id="in" name="a">x^2+<input id="in" name="b">x+<input id="in" name="c">=0<br>
    <input type="submit" value="Oblicz" />
    </form>
    <div id='wynik'></div>

<?php
    $a = $_GET["a"];
    $b = $_GET["b"];
    $c = $_GET["c"];

    $delta = $b * $b - 4*$a*$c;

    if ($delta < 0) {
        echo "Brak rozwiązań rzeczywistych";
    } elseif ($delta == 0) {
        $x = -$b / (2*$a);
        echo "x = ".$x;
    } else {
        $x1 = (-$b+sqrt($delta)) / (2*$a);
        $x2 = (-$b-sqrt($delta)) / (2*$a);
        echo "x1 = ".$x1."<br>x2 = ".$x2;
            }
    ?>

<?php include "_bottom.php";?>