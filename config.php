<?php
@session_start();
$hostname='localhost'; 
$login='root'; 
$passwd=''; 
$base='covoit'; 
$mysqli = new mysqli($hostname, $login, $passwd, $base);
mb_internal_encoding('UTF-8'); //Afin que mb_strtolower() connaisse l'encodage utilisé
?>