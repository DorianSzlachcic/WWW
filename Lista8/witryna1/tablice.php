<?php include "_top.php";?>

<h1>Tablice i słowniki</h1>

<?php
    $a=["Jurek","Zenon","Franek"];
    
    echo "<ul>";
    foreach($a as $x)
        echo "<li>$x</li>";
    echo "</ul>";

    $dict=["pies"=>"dog","kot"=>"cat","mysz"=>"mouse", "goni"=>"chases"];

    echo "<ul>";
    foreach($dict as $x=>$y)
        echo "<li><b>$x</b> - $y</li>";        
    echo "</ul>";

    function tłumacz($pl)
    {
        global $dict; // zmienne globalne trzeba deklarować
        echo "<b>$pl</b> - ",strtr ($pl,$dict);
    }

    tłumacz("kot goni mysz");



?>

<?php include "_bottom.php";?>