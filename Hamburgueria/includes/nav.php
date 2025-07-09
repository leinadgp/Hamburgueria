<nav>
			<ul>
				<li><a href="/Hamburgueria/index.php">Início</a></li>
				<li><a href="/Hamburgueria/burguer.php">Burguer</a></li>
					<?php  if(isset($_SESSION['usuario'])){  ?> 
					<li><a href="/Hamburgueria/edit_burguer.php">Editar Burguer</a></li>
				
					<?php }?>
					
				
			</ul>
			
		</nav>
		
