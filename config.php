<?php
@session_start();
$_SESSION['page'] = "profil";
$hostname='localhost'; 
$login='root'; 
$passwd=''; 
$base='covoit'; 
$mysqli = new mysqli($hostname, $login, $passwd, $base);
?>