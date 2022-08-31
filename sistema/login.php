<?php

session_start();


require "../app/database/connect.php";




$email = (isset ($_POST['email']));
$password =(isset ($_POST['senha']));
$ativo=1;


        $sql = "SELECT `user_name`, `user_password`, `user_active`
        FROM `users` WHERE  `user_email` = '$usuario' and `user_password` = '$senha' and `user_active` = '1'";

        $result = $pdo -> query($sql);

        $rows = $result->num_rows;

        if ( $rows == 1){
            $retorno = array('codigo' => '1');
            echo json_encode($retorno);
        }






