<?php


class Contato
{
    private $pod;

    // Iniciando uma função construtora que da conexao com o banco de dados atravez do PDO.
    public function __construct()
    {
        $this->pdo = new PDO("mysql:dbname=crudoo; host=127.0.0.1", "root", "");

    }

    // Adiciona e verifica se algum contato com o email já está cadastrada no banco de dados.
    public function add($email, $nome = '')
    {
        if ($this->existeEmail($email) != true) {
            $sql = "INSERT INTO contatos (nome, email) VALUES (:nome, :email)";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(':nome', $nome);
            $sql->bindValue(':email', $email);
            $sql->execute();

            return true;
        } else {
            return false;
        }
    }


    // Busca o nome do contato no banco de dados, caso esteja cadastrado.

    private function existeEmail($email)
    {
        $sql = "SELECT * FROM contatos WHERE email = :email";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':email', $email);
        $sql->execute();

        return $sql->rowCount() > 0 ? true : false;


    }


    // Busca todas as informações na tabela contatos e armazena em uma array.

    public function getNome($email)
    {
        $sql = "SELECT nome FROM contatos WHERE email = :email";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue('email', $email);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $info = $sql->fetch();
            return $info['nome'];
        } else {
            return '';
        }
    }

    // Metodo para modificar o nome do contato, caso o seu email seja válido.

    public function getAll()
    {
        $sql = "SELECT * FROM contatos";
        $sql = $this->pdo->query($sql);

        if ($sql->rowCount() > 0) {
            return $sql->fetchAll();
        } else {
            return array();
        }
    }

    // Metodo para deletar um contato.

    public function editar($nome, $email)
    {
        if ($this->existeEmail($email)) {
            $sql = "UPDATE contatos SET nome = :nome WHERE email = :email";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(':nome', $nome);
            $sql->bindValue(':email', $email);
            $sql->execute();

            return true;
        } else {
            return false;
        }
    }

    public function excluir($email)
    {
        if ($this->existeEmail($email)) {
            $sql = "DELETE FROM contatos WHERE email = :email";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(':email', $email);
            $sql->execute();

            return true;

        } else {
            return false;
        }
    }
}