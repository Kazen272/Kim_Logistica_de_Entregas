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
$query_entregas = "SELECT `logistic_order_number`,`logistic_order_origin_address`, 
`logistic_order_destiny_address`,`logistic_order_fleet`, 
`logistic_order_createdTime`,`logistic_client_name`, 
`logistic_fleet_name`,`logistic_order_status` 
FROM `logistic_order` 
ORDER BY `logistic_order_id` DESC;";

$result_entregas = $pdo->prepare($query_entregas);
$result_entregas -> execute();

while($row_entregas = $result_entregas->fetch(PDO::FETCH_ASSOC)){
    //var_dump($row_entregas);
    //Extract serve para conseguir pegar a coluna do bd como uma chave do array e usar como variavel
    extract($row_entregas);

    //Tratamento de datas:
    $time = strtotime( $logistic_order_createdTime );
    $data_hora = date("d/m/y H:i:s A", $time);



    //tratamento de status
    
   // if ($logistic_order_status = 1){
     //   $coletando = "coletando";
       // $a = $coletando;
    //}
    

    //1 - Coletando    
    //2 - entregando
    //3 - no cliente
    //4 - finalizado

    $registro_entregas = [];
    $registro_entregas[] = [$data_hora];
    $registro_entregas[] = [$logistic_order_number];
    $registro_entregas[] = [$logistic_client_name];
    $registro_entregas[] = [$logistic_order_origin_address];
    $registro_entregas[] = [$logistic_order_destiny_address];
    $registro_entregas[] = [$logistic_fleet_name];
    $registro_entregas[] ='<div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
     Status
    </button>
    <ul class="dropdown-menu dropdown-menu-dark">
      <li><a class="dropdown-item" href="#">Coletando</a></li>
      <li><a class="dropdown-item" href="#">Entregando</a></li>
      <li><a class="dropdown-item" href="#">No cliente</a></li>
      <li><a class="dropdown-item" href="#">Finalizado</a></li>
    </ul>
  </div>';
    $registro_entregas[] = '';
    $dados[] = $registro_entregas;
}

    //1 - Coletando    
    //2 - entregando
    //3 - no cliente
    //4 - finalizado


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
