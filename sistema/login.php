<?php

require ('../app/database/connect.php');


//passo 1 seria receber esses dados via post e atribuir a uma variavel para conseguir manipular

//$email = $_POST['email'];
//$senha = MD5 ($_POST['senha']);
$active = 1; 
$email = "admin@admin.com.br";
$senha = "1234";

$validacao_login = "SELECT `user_email`,`user_password`,`user_active` 
FROM user 
WHERE `user_email`='$email' AND `user_password`=$senha AND `user_active`=$active;";

$result_login = $pdo->prepare($validacao_login);
$result_login -> execute();

($row_login = $result_login->fetch(PDO::FETCH_ASSOC));
$num_linhas = $result_login->rowCount();

//var_dump($num_linhas);


if  ($num_linhas == 1) {
   
} 


