<?php
include_once "_top.php";
session_start();

if($_GET['id']=='login')
{
   include "login.php";
   if ($_GET["fail"] == "true")
      echo "<script>alert('Zły login lub hasło!');</script>";
}

elseif($_GET['id']=='logout')
{
   session_destroy();
   header("location:index.php");
}

elseif($_GET['id']=='tyg')
{ 
   if($_SESSION["user"])
      include "tyg.php";
   else
      header("location:index.php?id=login");

}

elseif($_GET['id']=='mies')
{
   if($_SESSION["user"])
      include "mies.php";
   else
      header("location:index.php?id=login");
}

elseif ($_GET['id']=='signin') 
{
   include "signin.php";
   if ($_GET["fail"] == "login")
      echo "<script>alert('Podany login jest już zajęty!');</script>";
   if ($_GET["fail"] == "email")
      echo "<script>alert('Podany email jest już zajęty!');</script>";
}

elseif(intval($_GET['id']) and $_SESSION['user'])
   include "edit.php";

elseif($_GET['id']=='dodaj' and $_SESSION['user'])
   include "dodaj.php";

else
   include "terminy.php";
?>
<?php
include "_bottom.php";
  ?>