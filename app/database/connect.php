<?php
//Você deverá alterar o valor setado para a variavel $host conforme o IP do seu servidor;
$host = "localhost";
$bdname = "app";


    $pdo = new PDO("mysql:host=$host;dbname=$bdname", "root", "");
    $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


?>