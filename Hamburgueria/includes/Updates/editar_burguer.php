<?php 
		  
	      include "../config.php";  
          include "../conecta.php";
		  
							$sql="SELECT * FROM menuburguers where id_burguer=".$_GET['id_burguer'];
							
							if ( $resultado= execute_query($sql) ){
								$burguer= $resultado -> fetch_array();
								
									include "../forms/form_burguer.php";
							
							}
							
							else
							{
								header("Location:/ProjectPrincipal/burguer.php?Mensagem=ErroEDITAR");
							}
							
						


?>