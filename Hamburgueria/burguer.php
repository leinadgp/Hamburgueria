<?php
$styles = "./assets/css/styles.css";
$imgHeader = "./assets/images/bkg/logoBurguer.jpg";
$scripts = "./assets/javascript/scripts.js";
$stylesBurguer = "./assets/css/burguer.css";
$iconeBurguer = "./assets/images/iconeHamburguer.png";
include "./includes/config.php";
include "./includes/conecta.php";
include "./includes/header.php";
include "./includes/nav.php";




$sql = "select * from menuburguers";
$resultado = execute_query($sql);
// ... conexão e consulta como antes
// Armazenar todas as linhas
$dados = array();
while ($linha = $resultado->fetch_assoc()) {
    $dados[] = $linha;
}

// Converter para JSON
$json = json_encode($dados);
?>

<script>
    const menuOptions = <?php echo $json; ?>;
    // Agora produtos é um array JS com os burguers
</script>

<div class="container-button">
    <button onclick="btnForEach()">Todos Hamburgueres</button>
    <button onclick="btnFilter('vegan')">Burguers Vegetariano </button>
    <button onclick="btnFilter('tradicionais')">Burguers Tradicionais </button>
    <button onclick="btnFilter('especiais')">Burguers Especiais </button>
    <button onclick="btnFilter('infantis')">Burguers Infantis </button>

</div>
<ul class="burguer-list">
</ul>


<?php include "./includes/footer.php"; ?>