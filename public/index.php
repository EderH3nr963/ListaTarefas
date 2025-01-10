<?php

require_once (dirname(__DIR__) ."\app\config.php");

// Incluir o autoload
require_once dirname(__DIR__)."\app\autoload.php";

// Exemplo básico de roteamento
$requestUri = str_replace('/public', '', $_SERVER['REQUEST_URI']);

switch ($requestUri) {
    case '/':
        echo "Página inicial";
        break;

    case '/tarefas':
        $controller = new TarefaController();
        $controller->verTodasAsTarefas();
        break;

    default:
        http_response_code(404);
        echo "Página não encontrada.";
        break;
}
