<?php
    session_start();

    $baza = new SQLite3($_SESSION["user"].".db");
    $baza -> exec("create table if not exists terminy
    (id integer primary key autoincrement, 
    name char(50),
    date datetime,
    duration int,
    description char(200));");
    
    foreach($_POST as $x=>$y)
		$r[$x]=$baza->escapeString($y);

    if($r["action"]=="Dodaj"){
        if($r["name"] && $r["date"] && $r["duration"] && $r["description"]){
            $query = "insert into terminy(name,date,duration,description) values('".$r["name"]."','".$r["date"]."',".$r["duration"].",'". $r["description"]."');";
            $baza ->query($query);
        }
    }
    elseif ($r["action"]=="Edit"){
        if($r["id"] && $r["name"] && $r["date"] && $r["duration"] && $r["description"]){
            $query = "update terminy set name='$r[name]',date='$r[date]',duration='$r[duration]',description='$r[description]' where id='$r[id]';";
            $baza ->query($query);
        }
        else {
            echo "nie";
        }
    }
    elseif ($r["action"]=="Usun"){
        if($r["id"]){
            $baza -> query("delete from terminy where id='$r[id]'");
        }
    }
    header("location: index.php");
?>