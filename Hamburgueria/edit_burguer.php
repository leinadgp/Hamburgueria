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
	 
	 
	?>
	
<h1 style="text-align: center;">Lista de hamburgueres</h1>
			<?php  if(isset($_SESSION['usuario'])){  ?> 
			<div style="text-align: left;margin-left: 205px;"><a href="./includes/Creates/novo_burguer.php"> Novo Hamburguer </a></div>
			<hr/>
			<?php
			         }
					if(isset($_SESSION['mensagem']) )
					{
						echo "<h1>".$_SESSION['mensagem']."</h1>";
						unset($_SESSION['mensagem']);
					} ?>
            <ul class="burguer-list"> 
			
			
			<?php

				
				
					// estabelecer uma conexão com o banco de dadods
			
						
					// executar uma consulta no banco de dados
					
					$sql= "select * from menuburguers";
					$resultado= execute_query($sql);
										// extrair as informações contidas na consulta 
					
					while($burguer= $resultado -> fetch_array()) 
					{
                                       

						echo "<li class='item-price'>
                                <img class='imgBurguer' src='./assets/images/burguer/".$burguer['src']."'/>  
								<p>". $burguer['name']."</p>
								<p class='item-price'>R$ ".$burguer['price']."</p>
								<p>";
								
							if(isset($_SESSION['usuario'])){
								echo "<a href='./includes/Deletes/excluir_burguer.php?id_burguer=".$burguer['id_burguer']."'><img style='width:25px' src='./assets/images/excluir.png'/></a>
									/
									 <a href='./includes/Updates/editar_burguer.php?id_burguer=".$burguer['id_burguer']."'><img style='width:25px' src='./assets/images/editar.png'/></a>";
								}
								echo "</p><br/></li>";		
								
								
								
						
					}?>
					</ul>
					
 <?php include "./includes/footer.php"; ?>
