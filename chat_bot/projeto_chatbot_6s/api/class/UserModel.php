<?php


# inclusão da classe de conexão com o banco de dados
include('PDOConnection.php');


class UserModel
{
    private static $pdo;

    /**
     * Método Construtor da classe UserModel
     */
    function __construct()
    {
        self::$pdo = \PDOConnection::connection();
    }

    /**
     * Insere um novo PEDIDO
     * # {"type":"new", "user":"André Cardoso", "produto":"produto1", "valor":"3444", "entrega":"dom", "end_tel":"rua a"}
     */

    public function new($user, $produto, $valor, $entrega, $end_tel)
    {
        try {
            # variável para armazenar a String SQL
            $sql = "INSERT INTO pedidos (user, produto, valor, entrega, end_tel) VALUES (:user, :produto, :valor, :entrega, :end_tel)";

            # variável para armazenar o objeto da conexão que será utilizado para executar as operações
            $stmt = self::$pdo->prepare($sql);

            # atribuição dos valores informados para os parâmetros SQL
            $stmt->bindValue(":user", $user, \PDO::PARAM_STR);
            $stmt->bindValue(":produto", $produto, \PDO::PARAM_STR);
            $stmt->bindValue(":valor", $valor, \PDO::PARAM_STR);
            $stmt->bindValue(":entrega", $entrega, \PDO::PARAM_STR);
            $stmt->bindValue(":end_tel", $end_tel, \PDO::PARAM_STR);

            # executa a inserção do registro no banco de dados
            $stmt->execute();

            return true;
        } catch (PDOException $ex) {
            # gera uma exceção (Exception) se ocorreu algum erro na interação com o banco de dados
            throw $ex;
        }
    }

    /**
     * ID do pedido recente
     */
    public function search($user, $produto, $valor, $entrega, $end_tel)
    {
        try {
            # variável para armazenar a String SQL
            $sql = "SELECT MAX(id_ped) FROM pedidos WHERE user = :user AND valor = :valor AND produto = :produto AND entrega = :entrega AND end_tel = :end_tel";

            # variável para armazenar o objeto da conexão que será utilizado para executar as operações
            $stmt = self::$pdo->prepare($sql);

            # atribuição dos valores informados para os parâmetros SQL
            $stmt->bindValue(":user", $user, \PDO::PARAM_STR);
            $stmt->bindValue(":produto", $produto, \PDO::PARAM_STR);
            $stmt->bindValue(":valor", $valor, \PDO::PARAM_STR);
            $stmt->bindValue(":entrega", $entrega, \PDO::PARAM_STR);
            $stmt->bindValue(":end_tel", $end_tel, \PDO::PARAM_STR);

            # executa a pesquisa no banco de dados
            $stmt->execute();

            # retorna um objeto - o tratamento deve ser feito no Controller para verificar se há dados retornados
            return $stmt->fetch(\PDO::FETCH_ASSOC);
        } catch (PDOException $ex) {
            # gera uma exceção (Exception) se ocorreu algum erro na interação com o banco de dados
            throw $ex;
        }
    }


    //
    public function id_ped($id_ped)
    {
        try {
            # variável para armazenar a String SQL
            $sql = "SELECT user, valor, produto, entrega, end_tel FROM pedidos WHERE id_ped = :id_ped";

            # variável para armazenar o objeto da conexão que será utilizado para executar as operações
            $stmt = self::$pdo->prepare($sql);

            # atribuição dos valores informados para os parâmetros SQL
            $stmt->bindValue(":id_ped", $id_ped, \PDO::PARAM_STR);

            # executa a pesquisa no banco de dados
            $stmt->execute();

            # retorna um objeto - o tratamento deve ser feito no Controller para verificar se há dados retornados
            return $stmt->fetch(\PDO::FETCH_ASSOC);
        } catch (PDOException $ex) {
            # gera uma exceção (Exception) se ocorreu algum erro na interação com o banco de dados
            throw $ex;
        }
    }

}