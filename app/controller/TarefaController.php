<?php

class TarefaController {
    public function verTodasAsTarefas() {
        $tarefas = (new TarefaService())->getAllTarefa();
        require_once RAIZ . "/views/verTodasAsTarefas.php";

        return 0;
    }

    public function criarTarefa() {
        
        // Verifica o Metodo Usado
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            require_once RAIZ . "/views/criarTarefa.php";
            return 0;
        }
        
        $tarefaService = new TarefaService();
        $response = $tarefaService->createTarefa($_POST['dataTarefa'], $_POST['descricao']);
        
        if ($response['status'] == 'success') {
            header('Location: /tarefas', true, 301);
            exit();
        }

        require_once RAIZ . "/views/criarTarefa.php";
        return 0;
    }

    public function deletarTarefa() {
        if (!isset($_GET['id'])) {
            header('Location: /tarefas', true, 301);
            exit();
        }

        $tarefaService = new TarefaService();
        $response = $tarefaService->deleteTarefa($_GET['id']);

        if ($response['status'] == 'success') {
            header('Location: /tarefas', true, 301);
            exit();
        }
    }
}