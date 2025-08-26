<?php
    //Fabrica de conexoes
    class Conexao {
        private $usuario;
        private $senha;
        private $banco;
        private $servidor;
        private static $pdo;


        public function __construct() {
            $this->servidor = "localhost";
            $this->banco = "agendaSenac2025";
            $this->usuario = "root";
            $this->senha = "";
        }

        public function conectar() {
            try {
                if(is_null(self::$pdo)){
                    self::$pdo = new PDO("mysql:host=".$this->servidor.";dbname=".$this->banco, $this->usuario, $this->senha);
                }
                //echo "Conectado com sucesso";
                return self::$pdo;
            }
     
            catch (PODException $ex) {
                echo $ex->getMessage();
            }
        }
    }