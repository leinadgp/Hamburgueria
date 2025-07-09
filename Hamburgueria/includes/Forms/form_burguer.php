<?php
// Cria a pasta "uploads" se não existir
$styles = "../../assets/css/styles.css";
$imgHeader = "../../assets/images/bkg/logoBurguer.jpg";
$scripts = "../../assets/javascript/scripts.js";
$iconeBurguer = "../../assets/images/iconeHamburguer.png";
include "../header.php";
include "../nav.php";

?>

<div id="content">
    <form action="../Creates/salvar_burguer.php" enctype="multipart/form-data" method="POST">

        <input class="inputValues" type="hidden" name="id_burguer" value="<?php echo $burguer['id_burguer'] ?? ''; ?>" />

        <p> Nome do lanche:
            <input class="inputValues" type="text" name="name" required placeholder="Informe o nome do lanche" value="<?php echo $burguer['name'] ?? ''; ?>" />
        </p>

        <p> Preço:
            <input class="inputValues" type="number" step="0.01" name="price" required placeholder="Informe o preço" value="<?php echo $burguer['price'] ?? ''; ?>" />
        </p>

        <p> É vegano?
            <select class="inputValues" name="vegan" required>
                <option value="0" <?php echo (isset($burguer['vegan']) && $burguer['vegan'] == 0) ? 'selected' : ''; ?>>Não</option>
                <option value="1" <?php echo (isset($burguer['vegan']) && $burguer['vegan'] == 1) ? 'selected' : ''; ?>>Sim</option>
            </select>
        </p>
         <p> É Tradicional?
            <select class="inputValues" name="tradicionais" required>
                <option value="0" <?php echo (isset($burguer['tradicionais']) && $burguer['tradicionais'] == 0) ? 'selected' : ''; ?>>Não</option>
                <option value="1" <?php echo (isset($burguer['tradicionais']) && $burguer['tradicionais'] == 1) ? 'selected' : ''; ?>>Sim</option>
            </select>
        </p>
         <p> É Especial?
            <select class="inputValues" name="especiais" required>
                <option value="0" <?php echo (isset($burguer['especiais']) && $burguer['especiais'] == 0) ? 'selected' : ''; ?>>Não</option>
                <option value="1" <?php echo (isset($burguer['especiais']) && $burguer['especiais'] == 1) ? 'selected' : ''; ?>>Sim</option>
            </select>
        </p>
         <p> É Infantil?
                <select class="inputValues" name="infantis" required>
                    <option value="0" <?php echo (isset($burguer['infantis']) && $burguer['infantis'] == 0) ? 'selected' : ''; ?>>Não</option>
                    <option value="1" <?php echo (isset($burguer['infantis']) && $burguer['infantis'] == 1) ? 'selected' : ''; ?>>Sim</option>
                </select>
        </p>

        <p>Imagem do Hamburguer:</p>

        <?php if (!empty($burguer['src'])): ?>
            <p>
                <img src="../../assets/images/burguer/<?php echo $burguer['src']; ?>" width="120" alt="Imagem atual do lanche">
            </p>
        <?php endif; ?>

        <p>
            <input type="file" name="imagem" accept="image/*" <?php echo empty($burguer['id_burguer']) ? 'required' : ''; ?>>
        </p>

         <p> É Disponivel?
                <select class="inputValues" name="disponivel" required>
                    <option value="0" <?php echo (isset($burguer['disponivel']) && $burguer['disponivel'] == 0) ? 'selected' : ''; ?>>Não</option>
                    <option value="1" <?php echo (isset($burguer['disponivel']) && $burguer['disponivel'] == 1) ? 'selected' : ''; ?>>Sim</option>
                </select>
        </p>
        <input type="submit" name="salvar" value="Salvar">

    </form>
</div>

<?php include "../footer.php"; ?>