<?php
@session_start();
$hostname='localhost'; 
$login='root'; 
$passwd=''; 
$base='covoit'; 
$mysqli = new mysqli($hostname, $login, $passwd, $base); 
?>