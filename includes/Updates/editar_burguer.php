<?php
ob_start(); // Inicia buffer de saída

include "../config.php";  
include "../conecta.php";

// Verifica se id_burguer foi enviado e é numérico
if (isset($_GET['id_burguer']) && is_numeric($_GET['id_burguer'])) {
    $id = intval($_GET['id_burguer']); // Sanitiza o ID

    $sql = "SELECT * FROM menuburguers WHERE id_burguer = $id";

    if ($resultado = execute_query($sql)) {
        $burguer = $resultado->fetch_array();

        include "../forms/form_burguer.php";

        ob_end_flush(); // Envia tudo corretamente (pois não há header após isso)
    } else {
        ob_end_clean(); // Limpa a saída se houver erro
        header("Location: https://danielguimaraes.infinityfree.me/burguer.php?Mensagem=ErroEDITAR");
        exit;
    }
} else {
    // ID inválido ou não enviado
    ob_end_clean();
    header("Location: https://danielguimaraes.infinityfree.me/burguer.php?Mensagem=IDinvalido");
    exit;
}
?>
