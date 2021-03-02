<?php
include "Bot.php";
$bot = new Bot;

// carregando informações
$obj = json_decode(file_get_contents('regras.json'), True);
$questions = array();
foreach ($obj as $values) {
    foreach ($values as $key => $value) {
        $questions[$key] = $value;
    }
}

#começando o chat
if (isset($_GET['msg'])) {
    $msg = strtolower($_GET['msg']);
    $bot->hears($msg, function (Bot $botty) {
        global $msg;
        global $questions;
        global $produto;
        global $valor;
        $optz = ['z']; #mais informações
        $opt1 =  ['1']; #fazer pedido
        $opt2 =  ['2']; #cardapio
        $opt3 = ['3']; #combos
        $opt4 = ['4']; #hamburguer e refri
        $combo1 = ['5'];
        $combo2 = ['6'];
        $combo3 = ['7'];
        $prod1 = ['8'];
        $prod2 = ['9'];
        $prod3 = ['10'];
        $prod4 = ['11'];
        $prod5 = ['12'];

        #opz mais informações
        if (in_array($msg, $optz)) {
            $botty->reply('Digite "Onde" ou "Telefone" caso não tenha nosso contato e endereço');
        } 

        #op1 fazer pedido
        if (in_array($msg, $opt1)) {
            $botty->reply('Escolha o que deseja: <br>
                            3- Combos <br>
                            4- Hamburguer ou refri a parte');
        } 
        #opt2 cardapio
        if (in_array($msg, $opt2)) {
            $botty->reply('Cardápio: <br> <br>
                            Hambúrgueres:<br>
                            X-Egg: Pão, carne bovina, ovo, alface, tomate e queijo;<br>
                            X-Bacon: Pão, carne bovina, Bacon, alface, tomate e queijo;<br>
                            Duplo Cheddar Bacon: Pão, duas carnes bovinas, Bacon, alface, tomate e queijo;<br>
                            X-Calabresa: Pão, carne bovina, Calabresa, alface, tomate e queijo;<br>
                            <br>
                            Selecione as opções:<br><br>1 - Fazer pedido<br>2 - Cardápio<br>Z - Mais informações');
        }

        #opt3 combos
        if (in_array($msg, $opt3)) {
            $botty->reply('Escolha um combo, digite o número do combo: <br>
                            5- Combo 1 ( 1 x-egg + 1 x-bacon+ Fritas pequena + 2 Coca-Cola 600ml) <br>R$:54,50 <br><br>
                            6- Combo 2 ( 1 Duplo Cheddar bacon + 1 x-calabresa + Fritas pequena + 2 Coca-Cola 600ml) <br>R$:58,50 <br><br>
                            7- Combo 3 ( 1 Duplo Cheddar bacon + 1 x-egg + Fritas pequena + 2 Coca-Cola 600ml) <br>R$:56,50 <br>');
        } 
        #opções do combo
        #COMBO1
        if (in_array($msg, $combo1)) {
            
            $produto =  "Combo 1";
            $valor = "54,50";
            $botty->reply('Você escolheu o  '. $produto. '! <br> Ele estará disponível para retirada em 30 minutos na nossa unidade, em caso de dúvida ligue para 99898-8989, Aguardamos você! <br>');
            
            #ENVIAR PARA O BANCO
            $url = 'http://chatbot6semcc.atwebpages.com/api/user.php';
            //Initiate cURL.
            $ch = curl_init($url);
            //The JSON data.
            $jsonData = array(
                'type' => 'new',
                'user' => 'na',
                'produto' => $produto,
                'valor' => $valor,
                'entrega' => 'retirada',
                'end_tel' => 'na'
            );
            //Encode the array into JSON.
            $jsonDataEncoded = json_encode($jsonData);
            //Tell cURL that we want to send a POST request.
            curl_setopt($ch, CURLOPT_POST, 1);
            //Attach our encoded JSON string to the POST fields.
            curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
            //Set the content type to application/json
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); 
            //Execute the request
            $result = curl_exec($ch);
            sleep(0.1);

            $botty->reply('<br> <br> Ao chegar no local, utilize o ID de pedido abaixo');

            #ID PEDIDO
            $url = 'http://chatbot6semcc.atwebpages.com/api/user.php';
            //Initiate cURL.
            $ch = curl_init($url);
            //The JSON data.
            $jsonData = array(
                'type' => 'search',
                'user' => 'na',
                'produto' => $produto,
                'valor' => $valor,
                'entrega' => 'retirada',
                'end_tel' => 'na'
            );
            //Encode the array into JSON.
            $jsonDataEncoded = json_encode($jsonData);
            //Tell cURL that we want to send a POST request.
            curl_setopt($ch, CURLOPT_POST, 1);
            //Attach our encoded JSON string to the POST fields.
            curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
            //Set the content type to application/json
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); 
            //Execute the request
            $result = curl_exec($ch);
        }
        #COMBO2
        if (in_array($msg, $combo2)) {
            
            $produto =  "Combo 2";
            $valor = "58,50";
            $botty->reply('Você escolheu o  '. $produto. '! <br> Ele estará disponível para retirada em 30 minutos na nossa unidade, em caso de dúvida ligue para 99898-8989, Aguardamos você! <br>');
            
            #ENVIAR PARA O BANCO
            $url = 'http://chatbot6semcc.atwebpages.com/api/user.php';
            //Initiate cURL.
            $ch = curl_init($url);
            //The JSON data.
            $jsonData = array(
                'type' => 'new',
                'user' => 'na',
                'produto' => $produto,
                'valor' => $valor,
                'entrega' => 'retirada',
                'end_tel' => 'na'
            );
            //Encode the array into JSON.
            $jsonDataEncoded = json_encode($jsonData);
            //Tell cURL that we want to send a POST request.
            curl_setopt($ch, CURLOPT_POST, 1);
            //Attach our encoded JSON string to the POST fields.
            curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
            //Set the content type to application/json
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); 
            //Execute the request
            $result = curl_exec($ch);
            sleep(0.1);

            $botty->reply('<br> <br> Ao chegar no local, utilize o ID de pedido abaixo');

            #ID PEDIDO
            $url = 'http://chatbot6semcc.atwebpages.com/api/user.php';
            //Initiate cURL.
            $ch = curl_init($url);
            //The JSON data.
            $jsonData = array(
                'type' => 'search',
                'user' => 'na',
                'produto' => $produto,
                'valor' => $valor,
                'entrega' => 'retirada',
                'end_tel' => 'na'
            );
            //Encode the array into JSON.
            $jsonDataEncoded = json_encode($jsonData);
            //Tell cURL that we want to send a POST request.
            curl_setopt($ch, CURLOPT_POST, 1);
            //Attach our encoded JSON string to the POST fields.
            curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
            //Set the content type to application/json
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); 
            //Execute the request
            $result = curl_exec($ch);
        }
        #COMBO3
        if (in_array($msg, $combo3)) {
            
            $produto =  "Combo 3";
            $valor = "56,50";
            $botty->reply('Você escolheu o  '. $produto. '! <br> Ele estará disponível para retirada em 30 minutos na nossa unidade, em caso de dúvida ligue para 99898-8989, Aguardamos você! <br>');
            
            #ENVIAR PARA O BANCO
            $url = 'http://chatbot6semcc.atwebpages.com/api/user.php';
            //Initiate cURL.
            $ch = curl_init($url);
            //The JSON data.
            $jsonData = array(
                'type' => 'new',
                'user' => 'na',
                'produto' => $produto,
                'valor' => $valor,
                'entrega' => 'retirada',
                'end_tel' => 'na'
            );
            //Encode the array into JSON.
            $jsonDataEncoded = json_encode($jsonData);
            //Tell cURL that we want to send a POST request.
            curl_setopt($ch, CURLOPT_POST, 1);
            //Attach our encoded JSON string to the POST fields.
            curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
            //Set the content type to application/json
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); 
            //Execute the request
            $result = curl_exec($ch);
            sleep(0.1);

            $botty->reply('<br> <br> Ao chegar no local, utilize o ID de pedido abaixo');

            #ID PEDIDO
            $url = 'http://chatbot6semcc.atwebpages.com/api/user.php';
            //Initiate cURL.
            $ch = curl_init($url);
            //The JSON data.
            $jsonData = array(
                'type' => 'search',
                'user' => 'na',
                'produto' => $produto,
                'valor' => $valor,
                'entrega' => 'retirada',
                'end_tel' => 'na'
            );
            //Encode the array into JSON.
            $jsonDataEncoded = json_encode($jsonData);
            //Tell cURL that we want to send a POST request.
            curl_setopt($ch, CURLOPT_POST, 1);
            //Attach our encoded JSON string to the POST fields.
            curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
            //Set the content type to application/json
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); 
            //Execute the request
            $result = curl_exec($ch);
        }

        #opt4 hamburguer e refri
        if (in_array($msg, $opt4)) {
            $botty->reply('Escolha um hamburguer ou refrigerante para retirada, o número do item desejado: <br>
                            8- x-egg R$:18,50 <br><br>
                            9- x-bacon R$:19,50 <br><br>
                            10- x-calabresa R$:18,50 <br><br>
                            11- Fritas pequena R$:6,50 <br><br>
                            12- Coca-Cola 600ML R$:7,50 <br>');
        } 
        #PROD1 x-egg
        if (in_array($msg, $prod1)) {
            
            $produto =  "x-egg";
            $valor = "18,50";
            $botty->reply('Você escolheu o  '. $produto. '! <br> Ele estará disponível para retirada em 30 minutos na nossa unidade, em caso de dúvida ligue para 99898-8989, Aguardamos você! <br>');
            
            #ENVIAR PARA O BANCO
            $url = 'http://chatbot6semcc.atwebpages.com/api/user.php';
            //Initiate cURL.
            $ch = curl_init($url);
            //The JSON data.
            $jsonData = array(
                'type' => 'new',
                'user' => 'na',
                'produto' => $produto,
                'valor' => $valor,
                'entrega' => 'retirada',
                'end_tel' => 'na'
            );
            //Encode the array into JSON.
            $jsonDataEncoded = json_encode($jsonData);
            //Tell cURL that we want to send a POST request.
            curl_setopt($ch, CURLOPT_POST, 1);
            //Attach our encoded JSON string to the POST fields.
            curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
            //Set the content type to application/json
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); 
            //Execute the request
            $result = curl_exec($ch);
            sleep(0.1);

            $botty->reply('<br> <br> Ao chegar no local, utilize o ID de pedido abaixo');

            #ID PEDIDO
            $url = 'http://chatbot6semcc.atwebpages.com/api/user.php';
            //Initiate cURL.
            $ch = curl_init($url);
            //The JSON data.
            $jsonData = array(
                'type' => 'search',
                'user' => 'na',
                'produto' => $produto,
                'valor' => $valor,
                'entrega' => 'retirada',
                'end_tel' => 'na'
            );
            //Encode the array into JSON.
            $jsonDataEncoded = json_encode($jsonData);
            //Tell cURL that we want to send a POST request.
            curl_setopt($ch, CURLOPT_POST, 1);
            //Attach our encoded JSON string to the POST fields.
            curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
            //Set the content type to application/json
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); 
            //Execute the request
            $result = curl_exec($ch);
        }
        #PROD2 x-bacon
        if (in_array($msg, $prod2)) {
            
            $produto =  "x-bacon";
            $valor = "19,50";
            $botty->reply('Você escolheu o  '. $produto. '! <br> Ele estará disponível para retirada em 30 minutos na nossa unidade, em caso de dúvida ligue para 99898-8989, Aguardamos você! <br>');
            
            #ENVIAR PARA O BANCO
            $url = 'http://chatbot6semcc.atwebpages.com/api/user.php';
            //Initiate cURL.
            $ch = curl_init($url);
            //The JSON data.
            $jsonData = array(
                'type' => 'new',
                'user' => 'na',
                'produto' => $produto,
                'valor' => $valor,
                'entrega' => 'retirada',
                'end_tel' => 'na'
            );
            //Encode the array into JSON.
            $jsonDataEncoded = json_encode($jsonData);
            //Tell cURL that we want to send a POST request.
            curl_setopt($ch, CURLOPT_POST, 1);
            //Attach our encoded JSON string to the POST fields.
            curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
            //Set the content type to application/json
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); 
            //Execute the request
            $result = curl_exec($ch);
            sleep(0.1);

            $botty->reply('<br> <br> Ao chegar no local, utilize o ID de pedido abaixo');

            #ID PEDIDO
            $url = 'http://chatbot6semcc.atwebpages.com/api/user.php';
            //Initiate cURL.
            $ch = curl_init($url);
            //The JSON data.
            $jsonData = array(
                'type' => 'search',
                'user' => 'na',
                'produto' => $produto,
                'valor' => $valor,
                'entrega' => 'retirada',
                'end_tel' => 'na'
            );
            //Encode the array into JSON.
            $jsonDataEncoded = json_encode($jsonData);
            //Tell cURL that we want to send a POST request.
            curl_setopt($ch, CURLOPT_POST, 1);
            //Attach our encoded JSON string to the POST fields.
            curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
            //Set the content type to application/json
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); 
            //Execute the request
            $result = curl_exec($ch);
        }
        #PROD3 x-calabresa
        if (in_array($msg, $prod3)) {
            
            $produto =  "x-calabresa";
            $valor = "18,50";
            $botty->reply('Você escolheu o  '. $produto. '! <br> Ele estará disponível para retirada em 30 minutos na nossa unidade, em caso de dúvida ligue para 99898-8989, Aguardamos você! <br>');
            
            #ENVIAR PARA O BANCO
            $url = 'http://chatbot6semcc.atwebpages.com/api/user.php';
            //Initiate cURL.
            $ch = curl_init($url);
            //The JSON data.
            $jsonData = array(
                'type' => 'new',
                'user' => 'na',
                'produto' => $produto,
                'valor' => $valor,
                'entrega' => 'retirada',
                'end_tel' => 'na'
            );
            //Encode the array into JSON.
            $jsonDataEncoded = json_encode($jsonData);
            //Tell cURL that we want to send a POST request.
            curl_setopt($ch, CURLOPT_POST, 1);
            //Attach our encoded JSON string to the POST fields.
            curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
            //Set the content type to application/json
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); 
            //Execute the request
            $result = curl_exec($ch);
            sleep(0.1);

            $botty->reply('<br> <br> Ao chegar no local, utilize o ID de pedido abaixo');

            #ID PEDIDO
            $url = 'http://chatbot6semcc.atwebpages.com/api/user.php';
            //Initiate cURL.
            $ch = curl_init($url);
            //The JSON data.
            $jsonData = array(
                'type' => 'search',
                'user' => 'na',
                'produto' => $produto,
                'valor' => $valor,
                'entrega' => 'retirada',
                'end_tel' => 'na'
            );
            //Encode the array into JSON.
            $jsonDataEncoded = json_encode($jsonData);
            //Tell cURL that we want to send a POST request.
            curl_setopt($ch, CURLOPT_POST, 1);
            //Attach our encoded JSON string to the POST fields.
            curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
            //Set the content type to application/json
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); 
            //Execute the request
            $result = curl_exec($ch);
        }
        #PROD4 fritas
        if (in_array($msg, $prod4)) {
            
            $produto =  "Fritas pequena";
            $valor = "6,50";
            $botty->reply('Você escolheu o  '. $produto. '! <br> Ele estará disponível para retirada em 30 minutos na nossa unidade, em caso de dúvida ligue para 99898-8989, Aguardamos você! <br>');
            
            #ENVIAR PARA O BANCO
            $url = 'http://chatbot6semcc.atwebpages.com/api/user.php';
            //Initiate cURL.
            $ch = curl_init($url);
            //The JSON data.
            $jsonData = array(
                'type' => 'new',
                'user' => 'na',
                'produto' => $produto,
                'valor' => $valor,
                'entrega' => 'retirada',
                'end_tel' => 'na'
            );
            //Encode the array into JSON.
            $jsonDataEncoded = json_encode($jsonData);
            //Tell cURL that we want to send a POST request.
            curl_setopt($ch, CURLOPT_POST, 1);
            //Attach our encoded JSON string to the POST fields.
            curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
            //Set the content type to application/json
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); 
            //Execute the request
            $result = curl_exec($ch);
            sleep(0.1);

            $botty->reply('<br> <br> Ao chegar no local, utilize o ID de pedido abaixo');

            #ID PEDIDO
            $url = 'http://chatbot6semcc.atwebpages.com/api/user.php';
            //Initiate cURL.
            $ch = curl_init($url);
            //The JSON data.
            $jsonData = array(
                'type' => 'search',
                'user' => 'na',
                'produto' => $produto,
                'valor' => $valor,
                'entrega' => 'retirada',
                'end_tel' => 'na'
            );
            //Encode the array into JSON.
            $jsonDataEncoded = json_encode($jsonData);
            //Tell cURL that we want to send a POST request.
            curl_setopt($ch, CURLOPT_POST, 1);
            //Attach our encoded JSON string to the POST fields.
            curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
            //Set the content type to application/json
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); 
            //Execute the request
            $result = curl_exec($ch);
        }
        #PROD5 Coca-Cola   
        if (in_array($msg, $prod5)) {
            
            $produto =  "Coca-Cola 600ml";
            $valor = "7,50";
            $botty->reply('Você escolheu o  '. $produto. '! <br> Ele estará disponível para retirada em 30 minutos na nossa unidade, em caso de dúvida ligue para 99898-8989, Aguardamos você! <br>');
            
            #ENVIAR PARA O BANCO
            $url = 'http://chatbot6semcc.atwebpages.com/api/user.php';
            //Initiate cURL.
            $ch = curl_init($url);
            //The JSON data.
            $jsonData = array(
                'type' => 'new',
                'user' => 'na',
                'produto' => $produto,
                'valor' => $valor,
                'entrega' => 'retirada',
                'end_tel' => 'na'
            );
            //Encode the array into JSON.
            $jsonDataEncoded = json_encode($jsonData);
            //Tell cURL that we want to send a POST request.
            curl_setopt($ch, CURLOPT_POST, 1);
            //Attach our encoded JSON string to the POST fields.
            curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
            //Set the content type to application/json
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); 
            //Execute the request
            $result = curl_exec($ch);
            sleep(0.1);

            $botty->reply('<br> <br> Ao chegar no local, utilize o ID de pedido abaixo');

            #ID PEDIDO
            $url = 'http://chatbot6semcc.atwebpages.com/api/user.php';
            //Initiate cURL.
            $ch = curl_init($url);
            //The JSON data.
            $jsonData = array(
                'type' => 'search',
                'user' => 'na',
                'produto' => $produto,
                'valor' => $valor,
                'entrega' => 'retirada',
                'end_tel' => 'na'
            );
            //Encode the array into JSON.
            $jsonDataEncoded = json_encode($jsonData);
            //Tell cURL that we want to send a POST request.
            curl_setopt($ch, CURLOPT_POST, 1);
            //Attach our encoded JSON string to the POST fields.
            curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
            //Set the content type to application/json
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); 
            //Execute the request
            $result = curl_exec($ch);
        }
        elseif ($botty->ask($msg, $questions) == "") {
            $botty->reply("Desculpe, não entendi.");
        } else {
            $botty->reply($botty->ask($msg, $questions));
        }

    });
}