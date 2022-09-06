<?php

//Chamando a conexão com o banco
require ('../app/database/connect.php');


//Receber os dados via post e atribuir a uma variável
$email = $_POST['email']; 
$senha = MD5 ($_POST['senha']);
$active =1;


// validando se o usuário está cadastrado no banco de dados
$validacao_login = "SELECT `user_email`,`user_password`,`user_active` 
FROM user 
WHERE `user_email`='$email' AND `user_password`='$senha' AND `user_active`='$active';";

$result_login = $pdo->prepare($validacao_login);
$result_login -> execute();


$num_linhas = $result_login->rowCount();

//var_dump($num_linhas);



// validação de usuario ativo
if ($result_login [`user_active`] == $active):
    $resposta [] = ['codigo'=>1,'mensagem'=> 'usuário ativo'];
    echo json_encode($resposta);
    exit();
endif;

//validação de usuario cadastrado no banco de dados
if  ($num_linhas == 1):
    $resposta[] = ['codigo'=> 2, 'mensagem' => 'usuário cadastrado no banco de dados'];
    echo json_encode($resposta);
    exit();
endif;
