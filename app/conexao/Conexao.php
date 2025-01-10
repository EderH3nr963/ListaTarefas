<?php

class Conexao {
    private $conexao;
    private $username = "root";
    private $password = "";

    public function __construct() {
        try {
            $conn = new PDO('mysql:host=localhost;dbname=meuBancoDeDados', $this->username, $this->password);
              $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          } catch(PDOException $e) {
              echo 'ERROR: ' . $e->getMessage();
          }
    }

    public function getConexao() {
        return $this->conexao;
    }
}