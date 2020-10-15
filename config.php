<?php

$host = "localhost";
$bd = "images";
$logBd = "root";
$passBd = "1234";
$connect = mysqli_connect($host,$logBd,$passBd,$bd) 
	or die("ошибка подключения к БД"); 
	
 ?>