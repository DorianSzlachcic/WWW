<?php include "_top.php";?>

<h1>Galeria</h1>
<div class="galleria" style="height: 400px">

<?php
  foreach(scandir('img') as $plik)
  {
    if($plik[0]!='.')
      echo "<img src='img/$plik' width='600'/>";
  }
?>
</div>

<script>
  //plik galleria-1.2.9.min.js nie może zostać pobrany przez przeglądarkę
  // co skutkuje błędem "Galleria is not defined"
        Galleria.loadTheme('galleria/themes/classic/galleria.classic.min.js');
        Galleria.run('.galleria');
  </script>
<?php include "_bottom.php";?>