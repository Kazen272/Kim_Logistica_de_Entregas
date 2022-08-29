<?php

$host = "localhost";
$bdname = "app";


$pdo = new PDO("mysql:host=$host;dbname=$bdname", "root", "");
$pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


?>