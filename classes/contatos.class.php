<?php
    require 'conexao.class.php';
    
    class Contatos {
        private $id;
        private $nome;
        private $endereco;
        private $email;
        private $telefone;
        private $redeSocial;
        private $profissao;
        private $dtNasc;
        private $foto;
        private $ativo;

        private $con;
        
        public function __construct() {
            $this->con = new Conexao();
        }
        private function existeEmail ($email) {
            $sql = $this->con->conectar()->prepare("SELECT id FROM contatos WHERE email = :email");
            $sql->bindParam(":email", $email, PDO::PARAM_STR);
            $sql->execute();
            if ($sql->rowCount() > 0){
                $array = $sql->fetch(); //fetch retorna o email encontrado
            } else {
                $array = array();
            }
            return $array;
        }

        public function adicionar ($email, $nome, $endereco, $telefone, $redeSocial, $profissao, $dtNasc, $foto, $ativo){
            $emailExistente = $this->existeEmail($email);
            if (count($emailExistente) == 0){
                try{
                    $this->nome = $nome;
                    $this->endereco = $endereco;
                    $this->email = $email;
                    $this->telefone = $telefone;
                    $this->redeSocial = $redeSocial;
                    $this->profissao = $profissao;
                    $this->dtNasc = $dtNasc;
                    $this->foto = $foto;
                    $this->ativo = $ativo;
                    $sql = $this->con->conectar()->prepare("INSERT INTO contatos (nome, endereco, email, telefone, redeSocial, profissao, dtNasc, foto, ativo) VALUES (:nome, :endereco, :email, :telefone, :redeSocial, :profissao, :dtNasc, :foto, :ativo)");
                    $sql->bindParam(":nome", $this->nome, PDO::PARAM_STR);
                    $sql->bindParam(":endereco", $this->endereco, PDO::PARAM_STR);
                    $sql->bindParam(":email", $this->email, PDO::PARAM_STR);
                    $sql->bindParam(":telefone", $this->telefone, PDO::PARAM_STR);
                    $sql->bindParam(":redeSocial", $this->redeSocial, PDO::PARAM_STR);
                    $sql->bindParam(":profissao", $this->profissao, PDO::PARAM_STR);
                    $sql->bindParam(":dtNasc", $this->dtNasc, PDO::PARAM_STR);
                    $sql->bindParam(":foto", $this->foto, PDO::PARAM_STR);
                    $sql->bindParam(":ativo", $this->ativo, PDO::PARAM_STR);
                    $sql->execute();
                    return TRUE;
                }catch (PDOException $ex){
                    return 'ERRO: '.$ex->getMessage();
                }
            }else {
                return FALSE;
            }

        }
        public function listar (){
            try{
                $sql = $this->con->conectar()->prepare("SELECT * FROM contatos");
                $sql->execute();
                return $sql->fetchAll();
            } catch (PDOException $ex){
                echo 'ERRO: '.$ex->getMessage();
            }
        }
        public function buscar ($id){
            try{
                $sql = $this->con->conectar()->prepare("SELECT * FROM contatos WHERE id = :id");
                $sql->bindValue(":id", $id);
                $sql->execute();
                if ($sql->rowCount() > 0){
                    return $sql->fetch();
                }else {
                    return array();
                }
            }catch (PDOException $ex){
                echo 'ERRO: '.$ex->getMessage();
            }
        }
    }