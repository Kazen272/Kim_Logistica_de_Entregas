<?php

require ('../app/database/connect.php');

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = MD5 ($_POST['senha']);
$active = '1';


$sql = ("INSERT INTO `user` (`id_user`, `user_name`, `user_email`, `user_password`, `user_active`) 
        VALUES (NULL, '$nome', '$email', '$senha', '$active');");

$exec_query = $pdo->query($sql);
?>