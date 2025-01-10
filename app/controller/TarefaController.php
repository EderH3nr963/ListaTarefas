<?php

class TarefaController {
    public function verTodasAsTarefas() {
        $tarefas = (new TarefaService())->getAllTarefa($_SESSION['id_usuario']);
        require_once "/../views/verTodasAsTarefas.php";

        return 0;
    }
}