<?php

class TarefaService
{
    private $conexao;

    public function __construct()
    {
        $this->conexao = (new Conexao())->getConexao();
    }

    public function getAllTarefa($idCliente)
    {
        $tarefas = array();

        $sql = "SELECT * FROM tarefas WHERE Id_client='$idCliente'";
        foreach ($this->conexao->query($sql) as $row) {
            array_push(
                $tarefas,
                (new TarefaModel(
                    $row["id"],
                    $row["dataDaTarefa"],
                    $row["dataDeCriacao"],
                    $row["descricao"]
                ))
            );
        }

        return $tarefas;
    }
}