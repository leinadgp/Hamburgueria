<?php 
	  $styles = "./assets/css/styles.css";
	  $imgHeader = "./assets/images/bkg/logoBurguer.jpg";	
	  $scripts = "./assets/javascript/scripts.js";	
	  $iconeBurguer = "./assets/images/iconeHamburguer.png";
	  include "./includes/config.php";
	  include "./includes/header.php"; 
	  include "./includes/nav.php"; 
	  
?>


<div id="content" style="padding-top:50px">
			<h2 class="objetivo">  Objetivo do site</h2> <br />
			<p class="sobre" style="width: 800px;" >
O objetivo deste site é simular o sistema de controle de uma hamburgueria, permitindo a gestão dinâmica do cardápio de lanches. Para isso, foram utilizadas as tecnologias HTML, CSS, JavaScript, PHP e MySQL.
<br />
O menu de hambúrgueres é armazenado em um banco de dados, contendo informações como nome, preço e caminho da imagem. A listagem do cardápio na página é feita de forma dinâmica com JavaScript, utilizando dados recebidos via JSON do PHP.
<br>
O sistema permite, através de um painel administrativo, a inserção, edição e exclusão de hambúrgueres, funcionalidades essas desenvolvidas com PHP.
<br>
Para garantir a segurança nas alterações, o site conta com um sistema de login, com validação de usuário e senha, que controla o acesso às funcionalidades administrativas. Apenas usuários autenticados têm acesso às opções de gerenciamento do cardápio.</p> <br />
			
		</div>
		
<?php include "./includes/footer.php"; ?>
