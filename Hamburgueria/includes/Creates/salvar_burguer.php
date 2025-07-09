<?php 
include "../config.php";
include "../conecta.php";  

if (!is_dir('../../assets/images/burguer')) {
    mkdir('../../assets/images/burguer', 0777, true);
}

$src = ''; // Caminho da imagem para o banco

// Se a imagem foi enviada
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['imagem']) && !empty($_FILES['imagem']['name'])) {
    $arquivoTmp = $_FILES['imagem']['tmp_name'];
    $nomeOriginal = $_FILES['imagem']['name'];

    $extensao = pathinfo($nomeOriginal, PATHINFO_EXTENSION);
    $extensao = strtolower($extensao);

    $permitidas = ['jpg', 'jpeg', 'png', 'gif'];
    if (!in_array($extensao, $permitidas)) {
        $_SESSION['mensagem'] = "Formato de imagem não permitido!";
        header("Location: /ProjectPrincipal/burguer.php");
        exit;
    }

    $nomeLanche = $_POST['name'] ?? 'imagem';
    $nomeLancheSanitizado = preg_replace('/[^a-zA-Z0-9_-]/', '_', $nomeLanche);
    $nomeFinal = $nomeLancheSanitizado . '.' . $extensao;
    $caminhoDestino = '../../assets/images/burguer/' . $nomeFinal;

    if (move_uploaded_file($arquivoTmp, $caminhoDestino)) {
        $src = $nomeFinal;
    } else {
        $_SESSION['mensagem'] = "Erro ao enviar a imagem.";
        header("Location: /ProjectPrincipal/burguer.php");
        exit;
    }
}

// Se for edição e não enviou nova imagem, recupera a atual do banco
if (!empty($_POST['id_burguer']) && empty($src)) {
    $id = $_POST['id_burguer'];
    $res = execute_query("SELECT src FROM menuburguers WHERE id_burguer = $id");
    $dados = mysqli_fetch_assoc($res);
    $src = $dados['src'] ?? '';
}

// Query de insert ou update
if (empty($_POST['id_burguer'])) {
    $sql = "INSERT INTO menuburguers (name, price, tradicionais, especiais, infantis, src, disponivel,  vegan)
            VALUES (
                '" . $_POST['name'] . "',
                '" . $_POST['price'] . "',
                '" . $_POST['tradicionais'] . "',
                '" . $_POST['especiais'] . "',
                '" . $_POST['infantis'] . "',
                '" . $src . "',
                '" . $_POST['disponivel'] . "',
                '" . $_POST['vegan'] . "')"
                
                ;
} else {
    $sql = "UPDATE menuburguers SET
                name = '" . $_POST['name'] . "',
                price = '" . $_POST['price'] . "',
                tradicionais = '" . $_POST['tradicionais'] . "',
                especiais = '" . $_POST['especiais'] . "',
                infantis = '" . $_POST['infantis'] . "',                
                src = '" . $src . "',
                disponivel = '" . $_POST['disponivel'] . "',
                vegan = '" . $_POST['vegan'] . "'
            WHERE id_burguer = " . $_POST['id_burguer'];
}

// Executa e redireciona
if (execute_query($sql)) {
    $_SESSION['mensagem'] = "Sucesso";
    header("Location: /ProjectPrincipal/edit_burguer.php");
} else {
    $_SESSION['mensagem'] = "Erro ao salvar";
    header("Location: /ProjectPrincipal/edit_burguer.php");
}
?>
