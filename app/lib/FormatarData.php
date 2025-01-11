<?php

function validarEFormatarData($data) {
    try {
        // Tenta criar um objeto DateTime a partir da string fornecida
        $dateTime = new DateTime($data);
        
        // Retorna a data formatada no padrão MySQL
        return $dateTime->format('Y-m-d');
    } catch (Exception $e) {
        // Retorna false caso a data seja inválida
        return false;
    }
}
