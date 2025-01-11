<?php

require_once RAIZ . "/lib/FormatarData.php";

class TarefaService
{
    private $conexao;

    public function __construct()
    {
        $this->conexao = (new Conexao())->getConexao();
    }

    public function getAllTarefa()
    {
        $tarefas = array();

        try {
            $sql = "SELECT * FROM tarefas";
            $stmt = $this->conexao->prepare($sql);
            $stmt->execute();

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $tarefas[] = new TarefaModel(
                    $row["id"],
                    $row["dataDaTarefa"],
                    $row["dataDeCriacao"],
                    $row["descricao"]
                );
            }

            return $tarefas;
        } catch (PDOException $e) {
            error_log("Erro ao buscar tarefas: " . $e->getMessage());
            return [];
        }
    }

    public function createTarefa($dataDaTarefaNaoFormatada, $descricao)
    {
        if (!$descricao) {
            return [
                'status' => 'error',
                'campo' => 'descricao',
                'mensagem' => 'Descrição não pode ser nula'
            ];
        }

        $dataDaTarefaFormatada  = validarEFormatarData($dataDaTarefaNaoFormatada);
        if(!$dataDaTarefaFormatada) {
            return [
                'status' => 'error',
                'campo' => 'data',
                'mensagem' => 'Data inválida'
            ];
        }

        try {
            $sql = "INSERT INTO tarefas (dataDaTarefa, dataDeCriacao, descricao) VALUES (:dataDaTarefa, NOW(), :descricao)";
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindParam(':dataDaTarefa', $dataDaTarefaFormatada);
            $stmt->bindParam(':descricao', $descricao, PDO::PARAM_STR);

            $stmt->execute();

            return [
                'status' => 'success',
                'mensagem' => 'Tarefa criada com sucesso!'
            ];
        } catch (PDOException $e) {
            error_log("Erro ao criar tarefa: " . $e->getMessage());
            return [
                'status' => 'error',
                'mensagem' => $e->getMessage()
            ];
        }
    }
}
