<?php
include_once "_top.php";
?>

<h1>Logowanie</h1>

<form action='login-commit.php' method='post'> 
  <input type='text' name='login' placeholder="Login"/> 
  <br/> 
  <input type='password' name='password' placeholder="Hasło"/> 
  <br/>
  <button type='submit'>Zaloguj</button>
</form>
<a href="?id=signin">Zarejestruj się</a>

<?php
include "_bottom.php";
?>