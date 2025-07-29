<?php
$styles = "./assets/css/styles.css";
$imgHeader = "./assets/images/bkg/logoBurguer.jpg";
$scripts = "./assets/javascript/scripts.js";
$iconeBurguer = "./assets/images/iconeHamburguer.png";
include "./includes/header.php"; 
include "./includes/nav.php";

include "./includes/config.php";     // Primeiro
include "./includes/conecta.php";   // Depois

?>
<div id="content">
<?php 
if (isset($_POST['autenticar'])) {

    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    // Montar query
    $sql = "SELECT * FROM usuario WHERE nome='$usuario' AND senha='$senha'";

    // Executar consulta
    if ($resultado = execute_query($sql)) {
        if ($usuario_data = mysqli_fetch_assoc($resultado)) {
            $_SESSION['usuario'] = $usuario_data;
            header("Location: https://danielguimaraes.infinityfree.me/index.php");
            exit;
        } else {
            echo "Usuário não encontrado.";
        }
    } else {
        echo "Falha ao executar consulta.";
    }
} else {
?>
    <form action="https://danielguimaraes.infinityfree.me/login.php" method="post">
        <br/><br/>
        <p>Usuário: <input class="inputValues" type="text" name="usuario"/></p>
        <p>Senha: <input class="inputValues" type="password" name="senha"/></p>
        <input type="submit" name="autenticar" value="Autenticar"/>
    </form>
<?php
}
?>
</div>
<?php include "./includes/footer.php"; ?>