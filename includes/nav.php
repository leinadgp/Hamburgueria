<nav>
			<ul>
				<li><a href="https://danielguimaraes.infinityfree.me/index.php">Início</a></li>
				<li><a href="https://danielguimaraes.infinityfree.me/burguer.php">Burguer</a></li>
					<?php  if(isset($_SESSION['usuario'])){  ?> 
					<li><a href="https://danielguimaraes.infinityfree.me/edit_burguer.php">Editar Burguer</a></li>
				
					<?php }?>
					
				
			</ul>
			
		</nav>
		
