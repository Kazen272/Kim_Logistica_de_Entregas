<?php

require ('../app/database/connect.php');


//Recebe a requisição de pesquisa
$requestData = $_REQUEST;


//indice da coluna na tabela visualizar resultado => nome da coluna no banco de dados

$columns = array(
    array ('0' => 'logistic_order_createdTime'),
    array ('1' => 'logistic_order_number'),
    array ('2' => 'logistic_order_client'),
    array ('3' => 'logistic_order_origin_address'),
    array ('4' => 'logistic_order_destiny_address'),
    array ('5' => 'logistic_order_fleet'), 
);

//obtendo registros de número total sem qualquer pesquisa
$result_orders = "SELECT `logistic_order_client`,`logistic_order_number`,`logistic_order_origin_address`,
`logistic_order_destiny_address`,`logistic_order_fleet`,`logistic_order_createdTime` 
FROM `logistic_order`;";

$resultado_pedidos = $pdo->query($result_orders);
$qnt_linhas  = $resultado_pedidos->rowCount();

//obter dados a serem apresentados
$result_entregas = "SELECT `logistic_order_client`,`logistic_order_number`,`logistic_order_origin_address`,
`logistic_order_destiny_address`,`logistic_order_fleet`,`logistic_order_createdTime` 
FROM `logistic_order`;"

$resultado_entregas = $pdo->query($result_entregas);
$total_filtered  = $resultado_entregas->rowCount();


$result_entregas.="ORDER BY".$columns[$requestData['order']]

