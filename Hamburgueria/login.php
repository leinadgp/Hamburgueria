<?php
	  $styles = "./assets/css/styles.css";
	  $imgHeader = "./assets/images/bkg/logoBurguer.jpg";
	  $scripts = "./assets/javascript/scripts.js";	
	  $iconeBurguer = "./assets/images/iconeHamburguer.png";	
	  include "./includes/header.php"; 
 	  include "./includes/nav.php";
	  
		?>

<div id="content">
			
		
<?php 
		include "./includes/conecta.php";
		include "./includes/config.php";
		
		if(isset($_POST['autenticar']))
		{
			
			$sql="select * from usuario 
					where nome='".$_POST['usuario']."' AND "."senha='".$_POST['senha']."'";
			
				// $resultado=execute_query($sql);
				// print_r($resultado);
			
			
			if($resultado=execute_query($sql)){
					if($usuario=mysqli_fetch_row($resultado)){
						print_r($usuario);
						$_SESSION['usuario']=$usuario;
						header("Location: /ProjectPrincipal/index.php");
					}
					else{
						echo "usuario nao encontrado";
					}
					
					
				
					
				}
					
				else{
					echo"falha ao executar consulta";
				}
		}
		else {
			

?>

<form action="/ProjectPrincipal/login.php" method="post">
					<br/>
					<br/>
					<p> Usuario:<input class="inputValues" type="text" name="usuario"/></p>
					<p> Senha: <input class="inputValues" type="password" name="senha"/></p>
					<input  type="submit" name="autenticar" value="autenticar"/>
			
			</form>
<?php
		
		}
	
		



 ?></div>
		
<?php include "./includes/footer.php"; ?>
				
 
			