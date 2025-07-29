<?php
function execute_query($query)
{
    // Estabelecer conexão
    $mysqli = new mysqli(HOST_DB, USER_DB, PASS_DB, DATABASE, PORTA);

    // Verificar erro na conexão e exibir erro real
    if ($mysqli->connect_error) {
        echo "<p>Erro ao conectar: " . $mysqli->connect_error . "</p>";
        return false;
    }

    // Executar a query
    $result = $mysqli->query($query);

    if (!$result) {
        echo "<p>Erro ao executar a consulta: " . $mysqli->error . "</p>";
    }

    $mysqli->close();
    return $result;
}
?>