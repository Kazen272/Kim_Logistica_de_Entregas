<?php

session_start();


require "../app/database/connect.php";




$email = (isset ($_POST['email']));
$password =(isset ($_POST['senha']));
$ativo=1;


        $sql = "SELECT `user_name`, `user_password`, `user_active`
        FROM `users` WHERE  `user_email` = '$usuario' and `user_password` = '$senha' and `user_active` = '1'";

        $result = $pdo -> query($sql);

        $rows = $result->fetch_assoc();

        if ( $rows['user_active'] == 1){


            $usuario = $sql->fetch_Assoc();

            if (!isset($_SESSION)){
                session_start();
            }
            $_SESSION['id_user'] = $usuario ['id_user'];
            $_SESSION['user_name'] = $usuario ['user_name'];

            header("location: dashboard.html");
        } else {
            echo "falha ao logar! E-mail ou senha incorretos ";

        }







