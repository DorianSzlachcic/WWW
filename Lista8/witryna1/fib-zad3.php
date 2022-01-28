<?php include "_top.php";?>

<h1>Ciąg Fibonacciego</h1>

<?php
  $poprz = 1;  
  $fib = 1;

  echo $fib."\n".$poprz."\n";

  while($fib + $poprz < 10000){
      $pom = $fib;
      $fib += $poprz;
      $poprz = $pom;
      echo $fib."\n";
  }

?>

<?php include "_bottom.php";?>