<?php
require "db.php";

require "functions.php";


$login = $_GET;
if (checkActivationLink($login, $key))
{
	activateUser($login);
	echo 'Все получилось<br><a href="login.php">Войти</a>';

} 
else 
echo 'не правильно';
?>