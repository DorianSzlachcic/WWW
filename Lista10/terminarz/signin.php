<?php
include_once "_top.php";
?>

<h1>Rejestracja</h1>

<form action='signin-commit.php' method='post'> 
  <input type='text' name='login' placeholder="Login"/> 
  <br/> 
  <input type='password' name='password' placeholder="Hasło"/> 
  <br/>
  <input type='email' name='email' placeholder="Email"/> 
  <br/>
  <button type='submit'>Zarejestruj się</button>
</form>

<?php
include "_bottom.php";
?>