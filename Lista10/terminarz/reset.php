<?php 
session_start();
session_unset();
echo password_hash("admin",PASSWORD_DEFAULT);