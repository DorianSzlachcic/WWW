<?php include "_top.php";?>

<h1>Aktualności</h1>

<?php
    if($_GET["haslo"]=="adminpassword")
    {
      echo "<form method='post'>
        Tytuł: 
        <input type='text' name='title'><br>
        Artykuł: 
        <textarea name='text' cols='30' rows='10'></textarea><br><br>
        <input type='submit' value='Dodaj'>
      </form>";
      foreach(scandir('news') as $plik) 
      if($plik[0]!='.')
      {
        include "news/$plik";
        echo "<a style='color:red' href='?x=".$plik."'>X</a><hr>\n\n";
      }
    }
    else{
      foreach(scandir('news') as $plik) 
      if($plik[0]!='.')
      {
        include "news/$plik";
        echo "<hr>\n\n";
      }
    }
      function usuń($plik)
      {
          unlink("news/$plik");
          header("location:news.php");
      }

      function dodaj($dane)
      {
          $i = count(glob("news/*.php"))+1;
          $filename="news/news".$i.".php";
          file_put_contents($filename,"<h2>".$dane["title"]."</h2>\n".$dane["text"]);
          header("location:news.php");
      }
 
    if($_POST)
    dodaj($_POST);

    if($_GET['x'])    
      usuń($_GET['x']);
?>

<?php include "_bottom.php";?>