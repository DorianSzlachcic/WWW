<?php
session_start();

$baza = new SQLite3("users.db");
$baza -> query("create table if not exists users
    (id integer primary key autoincrement, 
    login char(30) unique,
    password char(256), 
    email char(100) unique),
    activated int;");

if($_POST["login"] && $_POST["password"] && $_POST["email"])
{
    $result = $baza->query("insert into users(login,password,email,activated) values('".$_POST["login"]."','".password_hash($_POST["password"],PASSWORD_DEFAULT)."','".$_POST["email"]."',0);");
    if ($result)
    {
        $_SESSION["user"] = $_POST["login"];
        $_SESSION["activated"] = 0;
        mail($_POST["email"],"Aktywacja konta - Terminarz", "Kliknij w link aby aktywować konto:\nhttp://panoramx.ift.uni.wroc.pl/~329666/terminarz/activate.php?login=".$_POST["login"]);
        header("location: index.php");
    }
    else
    {
        if($baza->querySingle("select login from users where login='".$_POST["login"]."';"))
            header("location: index.php?id=signin&fail=login");
        elseif($baza->querySingle("select email from users where email='".$_POST["email"]."';"))
            header("location: index.php?id=signin&fail=email");
    }
}
?>