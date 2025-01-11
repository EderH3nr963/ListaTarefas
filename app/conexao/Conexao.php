<?php

class Conexao {
    private $conexao;
    private $username = "root";
    private $password = "";

    public function __construct() {
        try {
            $this->conexao = new PDO('mysql:host=localhost;dbname=meuBancoDeDados', $this->username, $this->password);
              $this->conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          } catch(PDOException $e) {
              echo 'ERROR: ' . $e->getMessage();
          }
    }

    public function getConexao() {
        return $this->conexao;
    }
}