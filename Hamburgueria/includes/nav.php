<nav>
			<ul>
				<li><a href="/ProjectPrincipal/index.php">Início</a></li>
				<li><a href="/ProjectPrincipal/burguer.php">Burguer</a></li>
					<?php  if(isset($_SESSION['usuario'])){  ?> 
					<li><a href="/ProjectPrincipal/edit_burguer.php">Editar Burguer</a></li>
				
					<?php }?>
					
				
			</ul>
			
		</nav>
		