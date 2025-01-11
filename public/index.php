<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <?php include_once "navbar.php" ?>
    <?php

    require_once(dirname(__DIR__) . "\app\config.php");

    // Incluir o autoload
    require_once dirname(__DIR__) . "\app\autoload.php";

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

        case '/criar':
            $controller = new TarefaController();
            $controller->criarTarefa();
            break;

        default:
            http_response_code(404);
            echo "Página não encontrada.";
            break;
    }

    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>