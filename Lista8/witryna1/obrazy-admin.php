<?php
include "_top.php";
?>
<form method="post" enctype="multipart/form-data">
  Wybierz obrazek do dodania: <br><br>
  <input type="file" name="image" id="image"><br><br>
  <input type="submit" value="Dodaj obrazek" name="submit"><br><br>
</form>

<form method="get" onsubmit="return confirm('Jesteś pewien że chcesz usuąć zdjęcia?')">
<?php
  foreach(scandir('img') as $plik)
  {
    if($plik[0]!='.')
      echo "<input type='checkbox' name='toDelete[]' value='$plik'><img src='img/$plik' width='100'/><br>";
  }
?><br>
<input type="submit" value="Usuń zaznaczone">
</form>


<?php
include "_bottom.php";
?>

<?php
if($_POST["submit"]){
    $file = 'img/' . basename($_FILES['image']['name']);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $file)) {
        echo "Obrazek dodany.\n";
    } else {
        echo "Wystąpił problem. Obrazek nie został dodany.\n";
    }
}

foreach($_GET["toDelete"] as $delete){
    unlink("img/".$delete."");
}
?>
