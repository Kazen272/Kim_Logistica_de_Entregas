<?php

//conexão com o banco
require ('../app/database/connect.php');

//


//passo 1 seria receber esses dados via post e atribuir a uma variavel para conseguir manipular

//
$email = $_POST['email']; 
$senha = MD5 ($_POST['senha']);
$active =1;
//valida se email e senha não vieram vazios
if (empty($email) || empty($senha)):
    $resposta[] = ['mensagem' => "Email e Senha precisam ser preenchidos"];
    echo json_encode($resposta);
    exit();
endif;


//Validação do login no bd
$validacao_login = "SELECT `user_email`,`user_password`,`user_active` 
FROM user 
WHERE `user_email`='$email' AND `user_password`='$senha' AND `user_active`='$active';";

$result_login = $pdo->prepare($validacao_login);
$result_login -> execute();


$num_linhas = $result_login->rowCount();

//var_dump($num_linhas);


if  ($num_linhas == 1) {
   
} 


