<?php
spl_autoload_register(function ($class_name) {
    // Lista de diretórios onde as classes podem estar
    $diretorios = ['model', 'conexao', 'controller', 'views', 'services'];

    foreach ($diretorios as $diretorio) {
        // Monta o caminho do arquivo
        $caminhoArquivo = __DIR__ . DIRECTORY_SEPARATOR . $diretorio . DIRECTORY_SEPARATOR . $class_name . '.php';

        // Verifica se o arquivo existe antes de incluir
        if (file_exists($caminhoArquivo)) {
            include_once $caminhoArquivo;
            return; // Sai do loop após encontrar e incluir o arquivo
        }
    }

    // Se o arquivo não for encontrado
    throw new Exception("Classe {$class_name} não encontrada.");
});
