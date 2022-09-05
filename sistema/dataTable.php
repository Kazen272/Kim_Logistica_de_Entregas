<?php

require ('../app/database/connect.php');

$dados_requisicao = $_REQUEST;


//obter a quantidade de registros no banco de dados
$query_qnt_entregas = "SELECT COUNT(logistic_order_id) as qnt_entregas FROM logistic_order";
$result_qnt_entregas = $pdo -> prepare($query_qnt_entregas);
$result_qnt_entregas -> execute();
$row_qnt_entregas = $result_qnt_entregas->fetch(PDO::FETCH_ASSOC);
//var_dump($row_qnt_entregas);


//recuperar os registros do banco de dados
$query_entregas = "SELECT `logistic_order_id`,`logistic_order_client`,
`logistic_order_number`,`logistic_order_origin_address`,
`logistic_order_destiny_address`,`logistic_order_fleet`,`logistic_order_createdTime` 
FROM `logistic_order`
ORDER BY `logistic_order_id` DESC";

$result_entregas = $pdo->prepare($query_entregas);
$result_entregas -> execute();

while($row_entregas = $result_entregas->fetch(PDO::FETCH_ASSOC)){
    //var_dump($row_entregas);
    //extract serve para conseguir pegar a coluna do bd como uma chave do array e usar como variavel
    extract($row_entregas);
    $registro_entregas = [];
    $registro_entregas[] = [$logistic_order_id];
    $registro_entregas[] = [$logistic_order_client];
    $registro_entregas[] = [$logistic_order_number];
    $registro_entregas[] = [$logistic_order_origin_address];
    $registro_entregas[] = [$logistic_order_destiny_address];
    $registro_entregas[] = [$logistic_order_fleet];
    $registro_entregas[] = [$logistic_order_createdTime];
    $dados[] = $registro_entregas;
}
    //var_dump($dados);



//Cria o objeto de informações/ um array de informações a serem retornadas ao JS
$resultado = [
   // "draw" => intval($dados_requisicao ['draw']), //para cada requisição será enviado um número como parâmetro
    "recordsTotal" => intval($row_qnt_entregas['qnt_entregas']), //Quantidades de registros que há no BD
    "recordsFiltered" => intval($row_qnt_entregas['qnt_entregas']), // Total de registros quando houver pesquisas
    "data" => $dados // Array de dados retornados com os registros da tabela usuarios
];

//var_dump($resultado);

echo json_encode($resultado);




// Onde parei: 
//Draw não está definido, preciso entender o motivo