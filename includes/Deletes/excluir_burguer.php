<?php
ob_start(); // Inicia buffer para evitar erros de redirecionamento

include "../../includes/config.php";  
include "../../includes/conecta.php";

// Verifica se o ID foi enviado e é um número válido
if (isset($_GET['id_burguer']) && is_numeric($_GET['id_burguer'])) {
    $id = intval($_GET['id_burguer']); // Sanitiza o ID

    // Passo 1: Buscar caminho da imagem no banco
    $res = execute_query("SELECT src FROM menuburguers WHERE id_burguer = $id");

    if ($res) {
        $dados = $res->fetch_assoc();

        if ($dados && !empty($dados['src'])) {
            $caminhoImagem = "../../assets/images/burguer/" . $dados['src'];

            // Passo 2: Verifica se a imagem existe e exclui
            if (file_exists($caminhoImagem)) {
                unlink($caminhoImagem);
            }
        }
    }

    // Passo 3: Exclui o registro do banco
    $sql = "DELETE FROM menuburguers WHERE id_burguer = $id";

    if (execute_query($sql)) {
        ob_end_clean(); // Limpa qualquer saída
        header("Location: ../../edit_burguer.php?Mensagem=Sucesso");
        exit;
    } else {
        ob_end_clean();
        header("Location: ../../edit_burguer.php?Mensagem=Erro");
        exit;
    }
} else {
    // Se não foi enviado um ID válido, redireciona com erro
    ob_end_clean();
    header("Location: ../../edit_burguer.php?Mensagem=ID_invalido");
    exit;
}
?>
