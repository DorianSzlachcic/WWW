<?php include "_top.php";?>

<h1>Ciąg Fibonacciego</h1>

<h2> Tabliczka mnożenia </h2>
<a href="?n=10"> do 10 </a>
<a href="?n=20"> do 20 </a>
<a href="?n=30"> do 30 </a>

<?php
    $n=$_GET["n"];
    if(!isset($n)) $n=20;

    echo "<table>";
    for($i=1;$i<=$n;$i++)
    {
        echo "<tr>";
        for($j=1;$j<=$n;$j++)
        {
            echo "<td>".$j*$i."</td>";
        }
    }
    echo "</table>"
?>


<?php include "_bottom.php";?>