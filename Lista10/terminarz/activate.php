<?php
session_start();

$baza = new SQLite3("users.db");
$baza -> query("create table if not exists users
    (id integer primary key autoincrement, 
    login char(30) unique,
    password char(256), 
    email char(100) unique),
    activated int;");

if($_GET["login"]){
    $baza->query("update users set activated=1 where login='$_GET[login]'");
    $_SESSION["activated"]=1;
}
header("location: index.php");

?>