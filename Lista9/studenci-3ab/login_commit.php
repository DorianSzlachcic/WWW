<?php
include "baza.php";
session_start();

if($_POST['login']=='superuser' && $_POST['password']=='qwerty')
    { $_SESSION['admin']=true;

      echo "zalogowano pomyślnie";
    }
header("location:.");