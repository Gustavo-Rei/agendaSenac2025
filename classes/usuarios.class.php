<?php
    require_once 'conexao.class.php';

    class Usuarios {
        private $id;
        private $nome;
        private $email;
        private $senha;
        private $permissoes;

        private $con;
        
        public function __construct() {
            $this->con = new Conexao();
        }

        public function fazerLogin($email, $senha){
            $sql = $this->con->conectar()->prepare("SELECT * FROM usuario WHERE email = :email AND senha = :senha");
            $sql->bindValue(":email", $email);
            $sql->bindValue(":senha", $senha);
            $sql->execute();

            if($sql->rowCount() > 0){
                $sql = $sql->fetch();
                $_SESSION['logado'] = $sql['id'];
                return TRUE;
            }
            return FALSE;
        }
        
        private function existeEmail($email) {
            $sql = $this->con->conectar()->prepare("SELECT id FROM usuario WHERE email = :email");
            $sql->bindParam(":email", $email, PDO::PARAM_STR);
            $sql->execute();

            if($sql->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        }

        public function adicionar($email, $nome, $senha, $permissoes) {
            if($this->existeEmail($email) == false) {
                $sql = $this->con->conectar()->prepare("INSERT INTO usuario (nome, email, senha, permissoes) VALUES (:nome, :email, :senha, :permissoes)");
                $senhaCripto = md5($senha);
                $sql->bindParam(":nome", $nome, PDO::PARAM_STR);
                $sql->bindParam(":email", $email, PDO::PARAM_STR);
                $sql->bindParam(":senha", $senhaCripto, PDO::PARAM_STR);
                $sql->bindParam(":permissoes", $permissoes, PDO::PARAM_STR);
                $sql->execute();
            }
        }

        public function listar() {
            $sql = $this->con->conectar()->query("SELECT * FROM usuario");
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function buscar($id) {
        $sql = $this->con->conectar()->prepare("SELECT * FROM usuario WHERE id = :id");
        $sql->bindParam(':id', $id, PDO::PARAM_INT);
        $sql->execute();
        return $sql->fetch(PDO::FETCH_ASSOC);
        }

        public function editar($id, $email, $nome, $senha, $permissoes) {
            $sql = $this->con->conectar()->prepare(
                "UPDATE usuario SET nome = :nome, email = :email, senha = :senha, permissoes = :permissoes WHERE id = :id"
            );
            $sql->bindParam(':nome', $nome, PDO::PARAM_STR);
            $sql->bindParam(':email', $email, PDO::PARAM_STR);
            $sql->bindParam(':senha', $senha, PDO::PARAM_STR);
            $sql->bindParam(':permissoes', $permissoes, PDO::PARAM_STR);
            $sql->bindParam(':id', $id, PDO::PARAM_INT);
            $sql->execute();
        }

        public function deletar($id) {
            $sql = $this->con->conectar()->prepare("DELETE FROM usuario WHERE id = :id");
            $sql->bindParam(':id', $id, PDO::PARAM_INT);
            $sql->execute();
        }
    }

