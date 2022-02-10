<?php
session_start();

$baza = new SQLite3("users.db");
$baza -> query("create table if not exists users
    (id integer primary key autoincrement, 
    login char(30) unique,
    password char(256), 
    email char(100) unique,
    activated int);");
    echo "tu";

if($_POST["login"] && $_POST["password"])
{
    $password = $baza->querySingle("select password from users where login='".$_POST["login"]."';");
    if($password){
        if(password_verify($_POST["password"], $password))
        {
            $_SESSION["user"] = htmlspecialchars($_POST["login"]);
            $_SESSION["activated"] = $baza->querySingle("select activated from users where login='".$_POST["login"]."';");

            header("location:index.php");
        }
        else{
            header("location:index.php?id=login&fail=true");
        }
    }
    else {
        header("location:index.php?id=login&fail=true");
    }
    
}
?>