<?php
// Permite acesso de qualquer origem (requisição)
if (isset($_SERVER['HTTP_ORIGIN'])) {
    header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Max-Age: 8640000');    // cache for 100 days
}

// Controle e Acesso para os cabeçalhos recebidos durante a requisição
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
        header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
}
# tipo do cabeçalho
header("Content-Type: application/json; charse=utf-8");

# recupera as informações enviadas via serviço
$json = file_get_contents("php://input");

# decodifica os dados enviados no formato JSON para um objeto PHP
$obj = json_decode($json);

# tratar algum erro de requisição
if ($obj === null && json_last_error() !== JSON_ERROR_NONE) {
    print(json_encode(
        ["data" => "err", "value" => "Incorrect Request"] # associativo
    ));
    die(); # para o processo 
}

# Incluindo/importando o arquivo do Modelo do Usuário
include("class/UserModel.php");

# criar um novo PEDIDO 
# {"type":"new", "user":"André Cardoso", "produto":"produto1", "valor":"3444", "entrega":"dom", "end_tel":"rua a"}

# procurar ID do pedido recente 
# {"type":"search", "user":"André Cardoso", "produto":"produto1", "valor":"3444", "entrega":"dom", "end_tel":"rua a"}

# procurar pedido pelo id_ped
# {"type":"id", "id_ped":"9"}

switch($obj->type){
    case 'new':
        try {
            $user = new UserModel();
        
            # verificar se os dados foram enviados corretamente
            if (empty($obj->user) == true || empty($obj->produto) == true || empty($obj->valor) == true) {
                print(json_encode(["data" => "err", "value" => "Invalid data"]));
                die();
            }


            # chama o método que insere no banco
            $result = $user->new($obj->user, $obj->produto, $obj->valor, $obj->entrega, $obj->end_tel);
        
            # verifica o retorno do método
            if ($result != null) {
                print(json_encode(["status" => "Pedido Finalizado"]));
            } else {
                print(json_encode(["data" => "err", "value" => "Falha ao realizar pedido, tente novamente"]));
            }
        } catch (Exception $ex) {
            print(json_encode(["data" => "err", "value" => $ex->getMessage()]));
        }
    break;

    case 'search':
        try{
            $search = new UserModel();
            if (empty($obj->user) == true || empty($obj->produto) == true || empty($obj->valor) == true) {
                print(json_encode(["data" => "err", "value" => "Invalid data"]));
                die();
            }
            $result = $search->search($obj->user, $obj->produto, $obj->valor, $obj->entrega, $obj->end_tel);

            # verifica se foi retornado algum dado
            if ($result != null) {
                print(json_encode($result)); # retorna o id_ped
            } else {
                print(json_encode(["data" => "err", "value" => "Pedido não localizado"]));
            }
        } catch(Exception $ex){
        }

        break;

    case 'id_ped':
        try{
            $id_ped = new UserModel();
            if (empty($obj->id_ped)) {
                print(json_encode(["data" => "err", "value" => "Invalid data"]));
                die();
            }
            $result = $id_ped->id_ped($obj->id_ped);

            # verifica se foi retornado algum dado
            if ($result != null) {
                $result["data"] = "ok"; # incluído o campo data para controle
                print(json_encode($result)); # retorna os dados de login
            } else {
                print(json_encode(["data" => "err", "value" => "Pedido não localizado"]));
            }
        } catch(Exception $ex){
        }

        break;
        

}
die();