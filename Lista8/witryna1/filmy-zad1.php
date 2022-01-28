<?php include "_top.php";?>

<h1>Filmy</h1>

<?php
  foreach(scandir('video') as $plik)
  {
    if($plik[0]!='.')
      echo " <video width='320' height='240'><source src='video/$plik'>Your browser does not support the video tag.</video> ";
  }
?>

<?php include "_bottom.php";?>