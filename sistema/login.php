<?php

require ('../app/database/connect.php');


//passo 1 seria receber esses dados via post e atribuir a uma variavel para conseguir manipular

$email = $_POST['email'];
$senha = MD5 ($_POST['senha']);
$active = 1; 


$validacao_login = "SELECT `user_email`,`user_password`,`user_active` 
FROM user 
WHERE `user_email`='$email' AND `user_password`='$senha' AND `user_active`='$active';";

$result_login = $pdo->prepare($validacao_login);
$result_login -> execute();

($row_login = $result_login->fetch(PDO::FETCH_ASSOC));

if  ($row_login == 1) {
    echo "Você Entrou";
} 


