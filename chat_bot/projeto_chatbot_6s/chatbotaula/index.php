<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ChatBot Loucos Por Lanche</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container">
        <div class="chatbox">
            <div class="header">
                <div class="nome">
                <h1 style="text-align:center;">Loucos Por Lanches</h1> 
                </div>
                <br>
                <p>Faça perguntas como: Onde e Telefone.</p>
            </div>

            <div class="body" id="chatbody">
                <div class="scroller"></div>
            </div>

            <form class="chat" method="post" autocomplete="off">
                <div>
                    <input type="text" name="chat" id="chat" placeholder="Mensagem...">
                </div>
                <div>
                    <input type="submit" value="Enviar" id="btn">
                </div>
            </form>

        </div>
    </div>
    <script src="app.js"></script>
    <script>
        divCpu = document.createElement("div");
        chatBody = document.querySelector(".scroller");
        divCpu.className = "bot visible";
        divCpu.innerHTML = "Bom dia, bem vindo(a) à Lanchonete Loucos por Lanche,<br>Siga as instruções para realizar seu pedido! <br>Selecione a opção desejada:<br><br>1 - Fazer pedido<br>2 - Cardápio<br>Z - Mais informações";
        chatBody.append(divCpu);
    </script>
</body>

</html>