<?php 
include "../config.php";  
include "../conecta.php";

// ID do hambúrguer a ser excluído
$id = $_GET['id_burguer'];

// Passo 1: Buscar caminho da imagem no banco
$res = execute_query("SELECT src FROM menuburguers WHERE id_burguer = $id");
$dados = $res->fetch_assoc();

if ($dados && !empty($dados['src'])) {
    $caminhoImagem = "../../assets/images/burguer/" . $dados['src']; // ajusta para o caminho real

    // Passo 2: Verifica se a imagem existe e exclui
    if (file_exists($caminhoImagem)) {
        unlink($caminhoImagem);
    }
}

// Passo 3: Exclui o registro do banco
$sql = "DELETE FROM menuburguers WHERE id_burguer = $id";

if (execute_query($sql)) {
    header("Location: /ProjectPrincipal/edit_burguer.php?Mensagem=Sucesso");
} else {
    header("Location: /ProjectPrincipal/edit_burguer.php?Mensagem=Erro");
}
?>
